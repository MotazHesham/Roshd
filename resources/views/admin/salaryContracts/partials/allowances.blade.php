<table>
    @foreach($allowances as   $allowance)
        <tr>
            <td><input {{ $allowance->extra_salary ? 'checked' : null }} data-id="{{ $allowance->id }}" type="checkbox" class="ingredient-enable"></td>
            <td>{{ $allowance->name }}</td>
            <td><input value="{{ $allowance->extra_salary ?? null }}" {{ $allowance->extra_salary ? null : 'disabled' }} data-id="{{ $allowance->id }}" name="allowances[{{ $allowance->id }}]" type="text" class="ingredient-amount form-control" placeholder="القيمة الزائدة"></td>
        </tr>
    @endforeach
</table>

@section('scripts')
    @parent
    <script>
        $('document').ready(function () {
            $('.ingredient-enable').on('click', function () {
                let id = $(this).attr('data-id')
                let enabled = $(this).is(":checked")
                $('.ingredient-amount[data-id="' + id + '"]').attr('disabled', !enabled)
                $('.ingredient-amount[data-id="' + id + '"]').val(0)
            })
        });
    </script>
@endsection