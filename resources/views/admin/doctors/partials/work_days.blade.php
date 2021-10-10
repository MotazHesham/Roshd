<label class="required">{{ trans('cruds.doctor.fields.work_days') }}</label>

@foreach ($days as $row)
    <div class="row">
        <div class="col-md-3">
            <input {{ $row['value'] ? 'checked' : null }} data-id="{{ $row['day'] }}"
                type="checkbox" class="work_days-enable">
            {{ $row['day_ar'] }}
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                    <label class="required">{{ trans('cruds.doctor.fields.start_time') }}</label>
                    <input value="{{ $row['start_time'] ?? null }}"
                        {{ $row['value'] ? null : 'disabled' }} data-id="{{ $row['day'] }}"
                        name="work_days[{{ $row['day'] }}][start_time]" type="text"
                        class="work_days-start_time timepicker form-control" placeholder="">
                </div>
                <div class="col-md-6">
                    <label class="required">{{ trans('cruds.doctor.fields.end_time') }}</label>
                    <input value="{{ $row['end_time'] ?? null }}"
                        {{ $row['value'] ? null : 'disabled' }} data-id="{{ $row['day'] }}"
                        name="work_days[{{ $row['day'] }}][end_time]" type="text"
                        class="work_days-end_time timepicker form-control" placeholder="">
                </div>
            </div>
        </div>

    </div>
    <hr>
@endforeach
@section('scripts')
    @parent
    <script>
        $('document').ready(function() {
            $('.work_days-enable').on('click', function() {
                let id = $(this).attr('data-id')
                let enabled = $(this).is(":checked")
                $('.work_days-start_time[data-id="' + id + '"]').attr('disabled', !enabled)
                $('.work_days-start_time[data-id="' + id + '"]').attr('required', enabled ? true : false)

                $('.work_days-end_time[data-id="' + id + '"]').attr('disabled', !enabled)
                $('.work_days-end_time[data-id="' + id + '"]').attr('required', enabled ? true : false)
            })
        });
    </script>
@endsection
