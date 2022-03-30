<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPatientRequest;
use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use App\Models\CenterServicesPackage;
use App\Models\CenterServicesPackageUser;
use App\Models\Patient;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Traits\PaymentTrait;
use App\Http\Requests\StoreV2PaymentRequest;
use Illuminate\Support\Facades\Gate;
use RealRashid\SweetAlert\Facades\Alert;

class patientController extends Controller
{
    use PaymentTrait;

    public function store_patient_package(StoreV2PaymentRequest $request){

        $package = CenterServicesPackage::findOrFail($request->package_id);
        $packagePatient = CenterServicesPackageUser::create([
            'user_id' => $request->user_id,
            'center_services_package_id' => $request->package_id,
            'sessions' => $package->sessions,
            'free_sessions' => $package->free_sessions,
            'remaining_sessions' => $package->sessions,
            'remaining_free_sessions' => $package->free_sessions,
            'package_value' => $package->package_value,
        ]);

        $this->store_payment($request->all(),'App\Models\CenterServicesPackageUser',$packagePatient->id);

        Alert::success('تم بنجاح');

        return redirect()->route('admin.patients.show',$request->patient_id);
    }

    public function destroy_patient_package($raw_id){
        $packagePatient = CenterServicesPackageUser::findOrFail($raw_id);
        $packagePatient->delete();
        Alert::success('تم بنجاح');
        return back();
    }


    public function index()
    {
        abort_if(Gate::denies('patient_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $patients = Patient::with(['user.packages'])->get();

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

        $patient->load('user');

        $patientPackages = CenterServicesPackageUser::with(['package','payments'])->where('user_id',$patient->user_id)->orderBy('id','desc')->get();

        return view('admin.patients.show', compact('patient','patientPackages'));
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
