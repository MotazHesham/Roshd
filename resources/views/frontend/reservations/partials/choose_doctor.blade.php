<form method="POST" action="{{ route('frontend.reservations.store') }}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="choosen_time" id="choosen_time">
    <input type="hidden" name="choosen_date" id="choosen_date">
    <input type="hidden" name="user_id" value="{{Auth::id()}}" id="">
<div class="custom-select book-date" style="width:250px;">
        <select class="form-control select2 {{ $errors->has('doctor') ? 'is-invalid' : '' }}" name="doctor_id"
            id="doctor_id" required>
            @foreach ($doctors as $id => $entry)
                <option value="{{ $id }}" {{ old('doctor_id') == $id ? 'selected' : '' }}>
                    {{ $entry }}</option>
            @endforeach
        </select>
        @if ($errors->has('doctor'))
            <div class="invalid-feedback">
                {{ $errors->first('doctor') }}
            </div>
        @endif
        <span class="help-block">{{ trans('cruds.reservation.fields.doctor_helper') }}</span>
    </div>
    <div class="col-md-6" id="times">
        <div class="hour-options ">
        {{-- times --}}
    </div>
    </div>
    <button class="btn blue-btn col-md-8" type="submit">
              تم
    </button>
</form>