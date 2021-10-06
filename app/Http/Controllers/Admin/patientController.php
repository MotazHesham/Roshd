<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\CenterServicesPackage;
use App\Models\Role;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Alert;

class patientController extends Controller
{
    //

    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::where('user_type','patient')->with(['roles', 'packages'])->get();

        return view('admin.patients.index', compact('users'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::pluck('title', 'id');
        $packages = CenterServicesPackage::all();

        return view('admin.patients.create', compact('roles','packages'));
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->all());
        //$user->roles()->sync($request->input('roles', []));

        $user->packages()->sync($this->mappackages($request['packages']));

        Alert::success('تم بنجاح', 'تم إضافة المريض بنجاح ');

        return redirect()->route('admin.patients.index');
    }

    public function edit(User $user)
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::pluck('title', 'id');

        //$packages = CenterServicesPackage::pluck('name', 'id');

        $packages1 = CenterServicesPackage::get()->map(function($package) use ($user) {
            $package->remaining = data_get($user->packages->firstWhere('id', $user->id), 'pivot.remaining') ?? null;
            return $package;
        });

        $packages2 = CenterServicesPackage::get()->map(function($package) use ($user) {
            $package->payment_status = data_get($user->packages->firstWhere('id', $user->id), 'pivot.payment_status') ?? null;
            return $package;
        });

        $packages3 = CenterServicesPackage::get()->map(function($package) use ($user) {
            $package->payment_type = data_get($user->packages->firstWhere('id', $user->id), 'pivot.payment_type') ?? null;
            return $package;
        });

        $packages4 = CenterServicesPackage::get()->map(function($package) use ($user) {
            $package->transfer_name = data_get($user->packages->firstWhere('id', $user->id), 'pivot.transfer_name') ?? null;
            return $package;
        });

        $packages5 = CenterServicesPackage::get()->map(function($package) use ($user) {
            $package->reference_number = data_get($user->packages->firstWhere('id', $user->id), 'pivot.reference_number') ?? null;
            return $package;
        });


        $user->load('roles', 'packages1', 'packages2', 'packages3', 'packages4', 'packages5');

        return view('admin.patients.edit', compact('roles', 'packages', 'user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->all());
        $user->roles()->sync($request->input('roles', []));
        // $user->packages()->sync($request->input('packages', []));
        $user->packages()->sync($this->mappackages($request['packages']));

        Alert::success('تم بنجاح', 'تم تعديل بيانات المستخدم بنجاح ');

        return redirect()->route('admin.patients.index');
    }

    public function show(User $user)
    {
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->load('roles', 'packages', 'userUserAlerts');

        return view('admin.patients.show', compact('user'));
    }

    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->delete();

        Alert::success('تم بنجاح', 'تم  حذف المستخدم بنجاح ');

        return back();
    }

    public function massDestroy(MassDestroyUserRequest $request)
    {
        User::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    private function mappackages($packages)
{
    return collect($packages)->map(function ($i) {
        return ['remaining' => $i];
    });
}
}

