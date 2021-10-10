@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.activate.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.activates.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.activate.fields.id') }}
                        </th>
                        <td>
                            {{ $activate->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.activate.fields.title') }}
                        </th>
                        <td>
                            {{ $activate->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.activate.fields.date') }}
                        </th>
                        <td>
                            {{ $activate->date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.activate.fields.description') }}
                        </th>
                        <td>
                            {{ $activate->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.activate.fields.photo') }}
                        </th>
                        <td>
                            @if($activate->photo)
                                <a href="{{ $activate->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $activate->photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.activate.fields.video') }}
                        </th>
                        <td>
                            @if($activate->video)
                                <a href="{{ $activate->video->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.activate.fields.images') }}
                        </th>
                        <td>
                            @foreach($activate->images as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.activates.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection