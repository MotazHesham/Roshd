<table class="table table-bordered table-striped">
    <tbody>
        <tr>
            <th>
                {{ trans('cruds.user.fields.id') }}
            </th>
            <td>
                {{ $patient->user->id }}
            </td>
        </tr>
        <tr>
            <th>
                {{ trans('cruds.user.fields.name') }}
            </th>
            <td>
                {{ $patient->user->name }}
            </td>
        </tr>
        <tr>
            <th>
                {{ trans('cruds.user.fields.email') }}
            </th>
            <td>
                {{ $patient->user->email }}
            </td>
        </tr>
        <tr>
            <th>
                {{ trans('cruds.user.fields.phone') }}
            </th>
            <td>
                {{ $patient->user->phone }}
            </td>
        </tr>
    </tbody>
</table>
