@extends('layouts.frontend')
@section('content')
    </div>
    <div class="account-settings-section">
        <div class="container">
            <div class=" row">
                @include('frontend.partial.menue')
                <div class="col-lg-8 ">
                    <a class="btn btn-info text-white" href="{{ route('frontend.packages') }}">أضافة باقة</a>
                    <table id="booking-table">
                        <thead>

                            <tr>
                                <th scope="col">اسم الباقة</th>
                                <th scope="col">السعر</th>
                                <th scope="col">الجلسات المتبقية</th>
                                <th scope="col">نوع الحضور</th>
                                <th scope="col">نوع الباقة</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($userPackages as $key => $userpackage)
                                <tr>
                                    <td data-label="اسم الباقة"> {{ $userpackage->package->name ?? '' }} </td>
                                    <td data-label="السعر"> {{ $userpackage->package_value ?? '' }} </td>
                                    <td data-label="الجلسات المتبقية">

                                        <span class="badge bg-info text-muted">
                                            {{ $userpackage->remaining_sessions ?? '' }} جلسة
                                            <br>
                                            من أصل {{ $userpackage->sessions ?? '' }} </span>
                                        <span class="badge bg-warning text-muted">
                                            {{ $userpackage->remaining_free_sessions ?? '' }} جلسة مجانية
                                            <br>
                                            من أصل {{ $userpackage->free_sessions ?? '' }} </span>
                                    </td>
                                    <td data-label="نوع الحضور">
                                        {{ App\Models\CenterServicesPackage::ATTEND_TYPE_RADIO[$userpackage->package->attend_type] ?? '' }}</td>
                                    <td class="" data-label="نوع الباقة">
                                        {{ App\Models\CenterServicesPackage::DOCTOR_TYPE_RADIO[$userpackage->package->doctor_type] ?? '' }}</td>
                                    <td class="" data-label="تعديل/حذف">
                                        <button class="btn btn-success btn-sm text-white"
                                            onclick="payment_model('{{ $userpackage->id }}','CenterServicesPackageUser')">الدفع</button>
                                        @if ($userpackage->frontend_delatable())
                                            <div class="delete-ediy-buttons">
                                                <form
                                                    action="{{ route('frontend.packages_user.destroy', $userpackage->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                                    style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button class="btn btn-icon btn-sm btn-danger" style="float: none;">
                                                        <span><strong>حذف</strong></span>
                                                    </button>
                                                </form>
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="text-center">
                        {{ $userPackages->links() }}
                    </div>
                </div>

            </div>
        </div>


    </div>
@endsection
