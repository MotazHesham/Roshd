<?php

namespace App\Http\Controllers\Traits;

use App\Models\CenterServicesPackageUser;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

trait PaymentTrait
{
    public function store_payment($request, $model, $model_id){
        return Payment::create([
            'paymentable_type' => $model,
            'paymentable_id' => $model_id,
            'payment_status' => $request['payment_status'],
            'payment_type' => $request['payment_type'],
            'amount' => $request['payment_type'] == 'package' ? 0 :$request['amount'],
            'transfer_name' => $request['transfer_name'],
            'reference_number' => $request['reference_number'],
            'last_4_digits' => $request['last_4_digits'],
            'user_id' => Auth::id(),
        ]);
    }

    public function package_payment($request,$reservation){

        if($request['payment_type'] == 'package'){
            // check request has user package selected
            if(array_key_exists('user_package_id',$request) && $request['user_package_id'] != null){
                // check the reservation has not any paid payments before
                if(Payment::where('paymentable_type','App\Models\Reservation')->where('paymentable_id',$reservation->id)->where('payment_status','paid')->first()){
                    Alert::error('لم تتم العملية','لا يمكن الدفع عن طريق باقة لهذا الحجز لوجود عمليات مدفوعة سابقا');
                    return false;
                }else{
                    $userPackage = CenterServicesPackageUser::find($request['user_package_id']);
                    $userPackage->load('payments');
                    $sum = $userPackage->payments()->where('payment_status','paid')->sum('amount'); //get payments of the package

                    if($userPackage->package_value > 0){
                        $precentage = round(($sum / $userPackage->package_value) * 100); // get precentage of payments of the package

                        if($userPackage->remaining_sessions > $userPackage->sessions * 1/2){
                            // if payments precentage that paid to the package not greater than 50% so cant pay by package
                            if($precentage >= 50){
                                $userPackage->remaining_sessions -= 1;
                                $userPackage->save();
                            }else{
                                Alert::error('لم تتم العملية','يجب تسديد 50% من قيمة الباقة لاستكمال العملية');
                                return false;
                            }
                        }else{
                            // After less than half of the number of sessions remain
                            // if payments precentage that paid to the package not equal to 100% so cant pay by package
                            if($precentage >= 100){
                                if($userPackage->remaining_sessions > 0){
                                    $userPackage->remaining_sessions -= 1;
                                    $userPackage->save();
                                }else{
                                    if($userPackage->remaining_free_sessions > 0){
                                        $userPackage->remaining_free_sessions -= 1;
                                        $userPackage->save();
                                    }else{
                                        Alert::error('لم تتم العملية','لا يوجد جلسات متبقية لهذة الباقة');
                                        return false;
                                    }
                                }
                            }else{
                                Alert::error('لم تتم العملية','يجب تسديد 100% من قيمة الباقة لاستكمال العملية');
                                return false;
                            }
                        }
                    }else{
                        Alert::error('حدث خطأ');
                        return false;
                    }
                }
            }else{
                Alert::error('لم تتم العملية','يجب اختيار باقة');
                return false;
            }
        }else{
            if(Payment::where('paymentable_type','App\Models\Reservation')->where('paymentable_id',$reservation->id)->where('payment_type','package')->first()){
                Alert::error('لم تتم العملية','تم دفع الحجز عن طريق باقة');
                return false;
            }
        }
        return true;
    }
}
