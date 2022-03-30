<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\push_notification;
use App\Models\CenterServicesPackage;
use App\Models\CenterServicesPackageUser;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PackagesController extends Controller
{
    use push_notification;

    public function packages(){
        $packages = CenterServicesPackage::where('active',1)->orderBy('created_at','desc')->get();
        return view('frontend.packages',compact('packages'));
    }

    public function index(){
        $userPackages = CenterServicesPackageUser::with(['payments','package'])->where('user_id',Auth::id())->orderBy('created_at','desc')->paginate(10);
        return view('frontend.packages.index',compact('userPackages'));
    }
    public function store(Request $request){

        $package = CenterServicesPackage::findOrFail($request->package_id);
        CenterServicesPackageUser::create([
            'user_id' => Auth::id(),
            'center_services_package_id' => $request->package_id,
            'sessions' => $package->sessions,
            'free_sessions' => $package->free_sessions,
            'remaining_sessions' => $package->sessions,
            'remaining_free_sessions' => $package->free_sessions,
            'package_value' => $package->package_value,
        ]);

        $alert_text = 'طلب باقة جديد من '.Auth::user()->name;
        $alert_link = Patient::where('user_id',Auth::id())->first()->id ?? 0;
        $data = [
            'user' => Auth::user()->name,
            'package_name' => $package->name,
        ];
        $this->send_notification( $alert_text , $alert_link , 'patient_package',$data);

        Alert::success('تم بنجاح');

        return redirect()->route('frontend.packages_user.index');
    }

    public function destroy($id)
    {

        $packageuser = CenterServicesPackageUser::findOrFail($id);
        $packageuser->delete();

        Alert::success('تم الحذف بنجاح');
        return back();
    }
}
