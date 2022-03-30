<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CenterServicesPackageUser;
use App\Models\GroupStudent;
use App\Models\Payment;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Traits\PaymentTrait;
use App\Http\Controllers\Traits\push_notification;
use App\Http\Requests\UpdatePaymentRequest;
use App\Models\Patient;

class PaymentsController extends Controller
{

    use PaymentTrait;
    use push_notification;

    public function edit_partials(Request $request){
        $payment = Payment::findOrFail($request->id);
        $frontend = true;
        return view('partials.payments.edit',compact('payment','frontend'));
    }

    public function payment_model(Request $request){
        $model_type = $request->model;
        $model_id = $request->model_id;
        $payments = Payment::where('paymentable_id',$request->model_id)->where('paymentable_type','App\Models\\'.$model_type)->orderBy('created_at','desc')->get();
        $already_paid = $payments->where('payment_status','paid')->sum('amount');
        if($model_type == 'Reservation'){
            $patientPackages = CenterServicesPackageUser::with('package','payments')->where('user_id',Auth::id())->where(function($query){
                $query->where('remaining_sessions','>',0)->orWhere('remaining_free_sessions','>',0);
            })->orderBy('id','desc')->get();
            $reservation = Reservation::findOrFail($model_id);
            $required_amount = $reservation->cost;
            return view('partials.payments.frontend_payment',compact('patientPackages','payments','model_type','model_id','required_amount','already_paid'));
        }elseif($model_type == 'CenterServicesPackageUser'){
            $user_package = CenterServicesPackageUser::findOrFail($model_id);
            $required_amount = $user_package->package_value;
            return view('partials.payments.frontend_payment',compact('payments','model_type','model_id','required_amount','already_paid'));
        }elseif($model_type == 'GroupStudent'){
            $group_student = GroupStudent::findOrFail($model_id);
            $required_amount = $group_student->course_cost;
            return view('partials.payments.frontend_payment',compact('payments','model_type','model_id','required_amount','already_paid'));
        }
        return 0;
    }

    public function store(Request $request){

        $this->validate($request,[
            'paymentable_id' => [
                'required',
            ],
            'paymentable_type' => [
                'required',
                'in:GroupStudent,CenterServicesPackageUser,Reservation'
            ],
            'amount' => [
                'required',
            ],
            'payment_type' => [
                'string',
                'required',
            ],
            'transfer_name' => [
                'string',
                'nullable',
            ],
            'reference_number' => [
                'string',
                'nullable',
            ],
            'last_4_digits' => [
                'string',
                'nullable',
            ],
        ]);

        $amount = $request->amount;
        $payment_status = 'not_paid';
        if($request->paymentable_type == 'Reservation' && $request->payment_type == 'package'){
            $reservation = Reservation::findOrFail($request->paymentable_id);
            $valid = $this->package_payment($request->all(),$reservation);

            if(!$valid){
                return back();
            }

            $amount = 0;
            $payment_status = 'paid';
        }

        $payment = Payment::create([
            'paymentable_id' => $request->paymentable_id ,
            'paymentable_type' => 'App\Models\\' . $request->paymentable_type ,
            'amount' => $amount ,
            'payment_type' => $request->payment_type ,
            'transfer_name' => $request->transfer_name ,
            'reference_number' => $request->reference_number ,
            'last_4_digits' => $request->last_4_digits ,
            'user_id' => Auth::id(),
            'payment_status' => $payment_status,
        ]);

        if($request->payment_type == 'package'){
            Alert::success('تم تسديد الحجز بنجاح','تم التسديد عن طريق باقة');
        }else{
            Alert::success('تم تسجيل معلومات التحويل بنجاح','سيتم مراجعة معلومات التحويل من الأدارة');
        }

        $alert_text = 'تحويل جديد من '.Auth::user()->name;
        if($request->paymentable_type == 'Reservation'){
            $alert_link = '/admin/reservations/' . $request->paymentable_id . '/edit';
        }elseif($request->paymentable_type == 'CenterServicesPackageUser'){
            $model = CenterServicesPackageUser::find($request->paymentable_id);
            $patient_id = Patient::where('user_id',$model->user_id)->first()->id ?? 0;
            $alert_link = '/admin/patients/' . $patient_id . '?paymentable_id='.$request->paymentable_id . '&payment_id=' . $payment->id;
        }elseif($request->paymentable_type == 'GroupStudent'){
            $model = GroupStudent::find($request->paymentable_id);
            $alert_link = '/admin/students/' . $model->student_id . '?paymentable_id='.$request->paymentable_id . '&payment_id=' . $payment->id;
        }else{
            $alert_link = $request->paymentable_id;
        }

        $data = [
            'user' => Auth::user()->name,
            'payment_type' => $request->payment_type,
            'transfer_name' => $request->transfer_name ,
            'reference_number' => $request->reference_number ,
            'last_4_digits' => $request->last_4_digits ,
            'paymentable_id' => $request->paymentable_id ,
            'amount' => $amount,
        ];
        $this->send_notification( $alert_text , $alert_link , 'payment',$data);

        return back();
    }


    public function update(UpdatePaymentRequest $request, Payment $payment)
    {
        $payment->update($request->all());

        Alert::success('تمت التعديل بنجاح');
        return back();
    }

    public function destroy(Payment $payment)
    {

        $payment->delete();

        Alert::success('تم الحذف بنجاح');
        return back();
    }
}
