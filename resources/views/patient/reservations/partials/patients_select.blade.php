
    @foreach ($users as $id => $entry)
        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>
            {{ $entry }}</option>
    @endforeach 