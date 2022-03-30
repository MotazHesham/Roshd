<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\Income;
use App\Models\Payment;
use Carbon\Carbon;

class ExpenseReportController extends Controller
{
    public function index(Request $request)
    {
        $from = Carbon::parse(sprintf(
            '%s-%s-01',
            request()->query('y', Carbon::now()->year),
            request()->query('m', Carbon::now()->month)
        ));
        $to      = clone $from;
        $to->day = $to->daysInMonth;

        $start_date = $request->start_date;
        $end_date = $request->end_date;

        if($request->has('start_date')){

            $expenses = Expense::with('expense_category')
                ->whereBetween('entry_date',
                [   Carbon::createFromFormat(config('panel.date_format'), $start_date)->format('Y-m-d')
                    , Carbon::createFromFormat(config('panel.date_format'), $end_date)->format('Y-m-d')
                ]);

            $incomes = Income::with('income_category')
                ->whereBetween('entry_date',
                [   Carbon::createFromFormat(config('panel.date_format'), $start_date)->format('Y-m-d')
                    , Carbon::createFromFormat(config('panel.date_format'), $end_date)->format('Y-m-d')
                ]);

            $payments_packages = Payment::where('payment_status','paid')->where('paymentable_type','App\Models\CenterServicesPackageUser')->whereBetween('updated_at',
                [   Carbon::createFromFormat(config('panel.date_format'), $start_date)->format('Y-m-d')
                    , Carbon::createFromFormat(config('panel.date_format'), $end_date)->format('Y-m-d')
                ]);

            $payments_courses = Payment::where('payment_status','paid')->where('paymentable_type','App\Models\GroupStudent')->whereBetween('updated_at',
                [   Carbon::createFromFormat(config('panel.date_format'), $start_date)->format('Y-m-d')
                    , Carbon::createFromFormat(config('panel.date_format'), $end_date)->format('Y-m-d')
                ]);

            $payments_reservations = Payment::where('payment_status','paid')->where('paymentable_type','App\Models\Reservation')->whereBetween('updated_at',
                [   Carbon::createFromFormat(config('panel.date_format'), $start_date)->format('Y-m-d')
                    , Carbon::createFromFormat(config('panel.date_format'), $end_date)->format('Y-m-d')
                ]);
        }else{
            $expenses = Expense::with('expense_category')
                ->whereBetween('entry_date', [$from, $to]);

            $incomes = Income::with('income_category')
                ->whereBetween('entry_date', [$from, $to]);

            $payments_packages = Payment::where('payment_status','paid')->where('paymentable_type','App\Models\CenterServicesPackageUser')->whereBetween('updated_at', [$from, $to]);

            $payments_courses = Payment::where('payment_status','paid')->where('paymentable_type','App\Models\GroupStudent')->whereBetween('updated_at', [$from, $to]);

            $payments_reservations = Payment::where('payment_status','paid')->where('paymentable_type','App\Models\Reservation')->whereBetween('updated_at', [$from, $to]);
        }

        $expensesTotal   = $expenses->sum('amount');
        $incomesTotal    = $incomes->sum('amount');
        $payments_packages_total    = $payments_packages->sum('amount') ?? 0;
        $payments_courses_total    = $payments_courses->sum('amount') ?? 0;
        $payments_reservations_total    = $payments_reservations->sum('amount') ?? 0;
        $groupedExpenses = $expenses->whereNotNull('expense_category_id')->orderBy('amount', 'desc')->get()->groupBy('expense_category_id');
        $groupedIncomes  = $incomes->whereNotNull('income_category_id')->orderBy('amount', 'desc')->get()->groupBy('income_category_id');
        $profit          = ($incomesTotal + $payments_packages_total + $payments_courses_total + $payments_reservations_total) - $expensesTotal;

        $expensesSummary = [];
        foreach ($groupedExpenses as $exp) {
            foreach ($exp as $line) {
                if (!isset($expensesSummary[$line->expense_category->name])) {
                    $expensesSummary[$line->expense_category->name] = [
                        'name'   => $line->expense_category->name,
                        'amount' => 0,
                    ];
                }
                $expensesSummary[$line->expense_category->name]['amount'] += $line->amount;
            }
        }

        $incomesSummary = [];
        foreach ($groupedIncomes as $inc) {
            foreach ($inc as $line) {
                if (!isset($incomesSummary[$line->income_category->name])) {
                    $incomesSummary[$line->income_category->name] = [
                        'name'   => $line->income_category->name,
                        'amount' => 0,
                    ];
                }
                $incomesSummary[$line->income_category->name]['amount'] += $line->amount;
            }
        }


        $incomesSummary['الحجوزات'] = [
            'name' => 'الحجوزات',
            'amount' => $payments_reservations_total,
        ];

        $incomesSummary['الدورات التدريبية'] = [
            'name' => 'الدورات التدريبية',
            'amount' => $payments_courses_total,
        ];

        $incomesSummary['باقات المركز'] = [
            'name' => 'باقات المركز',
            'amount' => $payments_packages_total,
        ];

        return view('admin.expenseReports.index', compact(
            'expensesSummary',
            'incomesSummary',
            'expensesTotal',
            'incomesTotal',
            'payments_packages_total',
            'payments_courses_total',
            'payments_reservations_total',
            'start_date',
            'end_date',
            'profit'
        ));
    }
}
