<div class="row">
    <div class="col-md-4" id="payment_create">

        <form method="POST" action="{{ route('frontend.payments.store') }}" enctype="multipart/form-data" id="add_payment">
            @csrf
            <input type="hidden" name="paymentable_id" value="{{ $model_id }}">
            <input type="hidden" name="paymentable_type" value="{{ $model_type }}">

            @if($model_type == 'Reservation')
                @include('partials.payments.create',['cost' => ( $required_amount - $already_paid ),'frontend' => true,'form_name' => '#add_payment','patientPackages' => $patientPackages, 'package' => true])
            @elseif($model_type == 'CenterServicesPackageUser')
                @include('partials.payments.create',['cost' => ( $required_amount - $already_paid ),'frontend' => true,'form_name' => '#add_payment'])
            @elseif($model_type == 'GroupStudent')
                @include('partials.payments.create',['cost' => ( $required_amount - $already_paid ),'frontend' => true,'form_name' => '#add_payment'])
            @endif
        </form>
    </div>
    <div class="col-md-8" id="payment_index">
        @include('partials.payments.index',['payments' => $payments ,'required_amount' => $required_amount,'frontend' => true])
    </div>
</div>
