@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                {{ trans('cruds.payment.new_payment') }}
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('admin.reservations.update', [$reservation->id]) }}" enctype="multipart/form-data" id="edit_reservation_form">
                    @method('PUT')
                    @csrf
                        @include('partials.payments.create',['cost' => $reservation->cost, 'package' => true,'form_name' => '#edit_reservation_form','patientPackages' => $patientPackages])
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                {{ trans('cruds.payment.title_singular') }}
            </div>

            <div class="card-body">
                @include('partials.payments.index',['payments' => $reservation->payments,'required_amount' => $reservation->cost])
            </div>
        </div>
    </div>
</div>



@endsection
