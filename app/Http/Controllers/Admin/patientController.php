<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPatientRequest;
use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use App\Models\CenterServicesPackage;
use App\Models\Patient;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Alert;
use Auth;

class patientController extends Controller
{
    public function store_patient_package(Request $request){
        
        $patient = Patient::findOrFail($request->patient_id);  
        $package = CenterServicesPackage::findOrFail($request->package_id);  
        $patient->packages()->attach([
            $request->package_id => [
                'remaining' => $package->package_value,
                'payment_status' => $request->payment_status,
                'payment_type' => $request->payment_type,
                'transfer_name' => $request->transfer_name,
                'reference_number' => $request->reference_number, 
            ]
        ]); 

        Alert::success('تم بنجاح');

        return redirect()->route('admin.patients.show',$request->patient_id);
    }

    public function update_patient_package(Request $request){
        $patient = Patient::findOrFail($request->patient_id);  
        $package = CenterServicesPackage::findOrFail($request->package_id);  
        $patient->packages()->wherePivot('id','=',$request->row_id)->syncWithoutDetaching([
            $request->package_id => [
                'remaining' => $package->package_value,
                'payment_status' => $request->payment_status,
                'payment_type' => $request->payment_type,
                'transfer_name' => $request->transfer_name,
                'reference_number' => $request->reference_number, 
            ]
        ]); 
        Alert::success('تم بنجاح');

        return redirect()->route('admin.patients.show',$request->patient_id);
    }

    public function edit_patient_package($row_id,$patient_id){
        $patient = Patient::findOrFail($patient_id);
        $centerServicesPackage = $patient->packages()->wherePivot('id','=',$row_id)->first();
        return view('admin.patients.partials.edit_patient_package',compact('patient','centerServicesPackage'));
    }

    public function destroy_patient_package($row_id,$patient_id){ 

        $patient = Patient::findOrFail($patient_id);
        $patient->packages()->wherePivot('id','=',$row_id)->detach();
        
        Alert::success('تم بنجاح');
        return redirect()->route('admin.patients.show',$patient->id);
    }

    public function index()
    {
        abort_if(Gate::denies('patient_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $patients = Patient::with(['user', 'packages'])->get();

        return view('admin.patients.index', compact('patients'));
    }

    public function create()
    {
        abort_if(Gate::denies('patient_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $packages = CenterServicesPackage::all();

        return view('admin.patients.create', compact('packages'));
    }

    public function store(StorePatientRequest $request)
    {
        $validated_request = $request->all();
        $validated_request['user_type'] = 'patient'; 
        $user = User::create($validated_request);

        $patient = Patient::create(['user_id' => $user->id]); 


        if($request->ajax()){
            $users = User::where('user_type','patient')->get()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
            return view('admin.reservations.partials.patients_select',compact('users'));
        }else{
            Alert::success('تم بنجاح', 'تم إضافة المراجع بنجاح ');
            return redirect()->route('admin.patients.index');
        }
    }

    public function edit(Patient $patient)
    {
        abort_if(Gate::denies('patient_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden'); 

        $patient->load('user');

        return view('admin.patients.edit', compact('patient'));
    }

    public function update(UpdatePatientRequest $request, Patient $patient)
    {
        
        $user = User::find($request->user_id);

        $user->update($request->all());  

        Alert::success('تم بنجاح', 'تم تعديل بيانات المراجع بنجاح ');

        return redirect()->route('admin.patients.index');
    }

    public function show(Patient $patient)
    {
        abort_if(Gate::denies('patient_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $patient->load('user', 'packages');

        return view('admin.patients.show', compact('patient'));
    }

    public function destroy(Patient $patient)
    {
        abort_if(Gate::denies('patient_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $patient->delete();

        Alert::success('تم بنجاح', 'تم  حذف المراجع بنجاح ');

        return back();
    }

    public function massDestroy(MassDestroyPatientRequest $request)
    {
        Patient::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    } 
}