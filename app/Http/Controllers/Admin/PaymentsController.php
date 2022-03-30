<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Models\Payment;
use App\Models\CenterServicesPackageUser;
use App\Models\GroupStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpFoundation\Response;

class PaymentsController extends Controller
{
    public function show_payments(Request $request){

        $payment_id = $request->payment_id;
        if($request->model == 'CenterServicesPackageUser'){
            $package_user = CenterServicesPackageUser::find($request->model_id);
            $required_amount = $package_user->package_value ?? 0;
        }elseif($request->model == 'GroupStudent'){
            $group_student = GroupStudent::find($request->model_id);
            $required_amount = $group_student->course_cost ?? 0;
        }else{
            $required_amount = 0;
        }

        $payments = Payment::where('paymentable_type','App\Models\\' .$request->model)->where('paymentable_id',$request->model_id)->orderBy('created_at','desc')->get();

        return view('partials.payments.index',compact('payments','required_amount','payment_id'));
    }

    public function edit_partials(Request $request){
        $payment = Payment::findOrFail($request->id);

        return view('partials.payments.edit',compact('payment'));
    }

    public function store(StorePaymentRequest $request)
    {
        $valideted_request = $request->all();
        $valideted_request['paymentable_type'] = 'App\Models\\' . $valideted_request['paymentable_type'];
        $payment = Payment::create($valideted_request);
        Alert::success('تمت الأضافة بنجاح');
        return back();
    }

    public function update(UpdatePaymentRequest $request, Payment $payment)
    {
        abort_if(Gate::denies('payment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $payment->update($request->all());

        Alert::success('تمت التعديل بنجاح');
        return back();
    }

    public function destroy(Payment $payment)
    {
        abort_if(Gate::denies('payment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $payment->delete();

        return back();
    }

}
