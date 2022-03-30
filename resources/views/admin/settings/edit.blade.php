@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.setting.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.settings.update', [$setting->id]) }}"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="required" for="site_name">{{ trans('cruds.setting.fields.site_name') }}</label>
                        <input class="form-control {{ $errors->has('site_name') ? 'is-invalid' : '' }}" type="text"
                            name="site_name" id="site_name" value="{{ old('site_name', $setting->site_name) }}" required>
                        @if ($errors->has('site_name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('site_name') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.setting.fields.site_name_helper') }}</span>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="required" for="email">{{ trans('cruds.setting.fields.email') }}</label>
                        <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email"
                            name="email" id="email" value="{{ old('email', $setting->email) }}" required>
                        @if ($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.setting.fields.site_name_helper') }}</span>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="required" for="phone">{{ trans('cruds.setting.fields.phone') }}</label>
                        <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text"
                            name="phone" id="phone" value="{{ old('phone', $setting->phone) }}" required>
                        @if ($errors->has('phone'))
                            <div class="invalid-feedback">
                                {{ $errors->first('phone') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.setting.fields.phone_helper') }}</span>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="required" for="address">{{ trans('cruds.setting.fields.address') }}</label>
                        <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text"
                            name="address" id="address" value="{{ old('address', $setting->address) }}" required>
                        @if ($errors->has('address'))
                            <div class="invalid-feedback">
                                {{ $errors->first('address') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.setting.fields.address_helper') }}</span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="facebook">{{ trans('cruds.setting.fields.facebook') }}</label>
                        <input class="form-control {{ $errors->has('facebook') ? 'is-invalid' : '' }}" type="text"
                            name="facebook" id="facebook" value="{{ old('facebook', $setting->facebook) }}">
                        @if ($errors->has('facebook'))
                            <div class="invalid-feedback">
                                {{ $errors->first('facebook') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.setting.fields.facebook_helper') }}</span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="twitter">{{ trans('cruds.setting.fields.twitter') }}</label>
                        <input class="form-control {{ $errors->has('twitter') ? 'is-invalid' : '' }}" type="text"
                            name="twitter" id="twitter" value="{{ old('twitter', $setting->twitter) }}">
                        @if ($errors->has('twitter'))
                            <div class="invalid-feedback">
                                {{ $errors->first('twitter') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.setting.fields.twitter_helper') }}</span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="instagram">{{ trans('cruds.setting.fields.instagram') }}</label>
                        <input class="form-control {{ $errors->has('instagram') ? 'is-invalid' : '' }}" type="text"
                            name="instagram" id="instagram" value="{{ old('instagram', $setting->instagram) }}">
                        @if ($errors->has('instagram'))
                            <div class="invalid-feedback">
                                {{ $errors->first('instagram') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.setting.fields.instagram_helper') }}</span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="you_tube">{{ trans('cruds.setting.fields.you_tube') }}</label>
                        <input class="form-control {{ $errors->has('you_tube') ? 'is-invalid' : '' }}" type="text"
                            name="you_tube" id="you_tube" value="{{ old('you_tube', $setting->you_tube) }}">
                        @if ($errors->has('you_tube'))
                            <div class="invalid-feedback">
                                {{ $errors->first('you_tube') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.setting.fields.you_tube_helper') }}</span>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="required"
                            for="about_rosd">{{ trans('cruds.setting.fields.about_rosd') }}</label>
                        <textarea class="form-control {{ $errors->has('about_rosd') ? 'is-invalid' : '' }}" name="about_rosd" id="about_rosd"
                            required>{{ old('about_rosd', $setting->about_rosd) }}</textarea>
                        @if ($errors->has('about_rosd'))
                            <div class="invalid-feedback">
                                {{ $errors->first('about_rosd') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.setting.fields.about_rosd_helper') }}</span>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="required"
                            for="familly_advice">{{ trans('cruds.setting.fields.familly_advice') }}</label>
                        <textarea class="form-control {{ $errors->has('familly_advice') ? 'is-invalid' : '' }}" name="familly_advice"
                            id="familly_advice"
                            required>{{ old('familly_advice', $setting->familly_advice) }}</textarea>
                        @if ($errors->has('familly_advice'))
                            <div class="invalid-feedback">
                                {{ $errors->first('familly_advice') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.setting.fields.familly_advice_helper') }}</span>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="required"
                            for="individual_advice">{{ trans('cruds.setting.fields.individual_advice') }}</label>
                        <textarea class="form-control {{ $errors->has('individual_advice') ? 'is-invalid' : '' }}" name="individual_advice"
                            id="individual_advice"
                            required>{{ old('individual_advice', $setting->individual_advice) }}</textarea>
                        @if ($errors->has('individual_advice'))
                            <div class="invalid-feedback">
                                {{ $errors->first('individual_advice') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.setting.fields.individual_advice_helper') }}</span>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="required"
                            for="el_gadaly_elsloky">{{ trans('cruds.setting.fields.el_gadaly_elsloky') }}</label>
                        <textarea class="form-control {{ $errors->has('el_gadaly_elsloky') ? 'is-invalid' : '' }}" name="el_gadaly_elsloky"
                            id="el_gadaly_elsloky"
                            required>{{ old('el_gadaly_elsloky', $setting->el_gadaly_elsloky) }}</textarea>
                        @if ($errors->has('el_gadaly_elsloky'))
                            <div class="invalid-feedback">
                                {{ $errors->first('el_gadaly_elsloky') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.setting.fields.el_gadaly_elsloky_helper') }}</span>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="required"
                            for="el_maarefe_elsloky">{{ trans('cruds.setting.fields.el_maarefe_elsloky') }}</label>
                        <textarea class="form-control {{ $errors->has('el_maarefe_elsloky') ? 'is-invalid' : '' }}" name="el_maarefe_elsloky"
                            id="el_maarefe_elsloky"
                            required>{{ old('el_maarefe_elsloky', $setting->el_maarefe_elsloky) }}</textarea>
                        @if ($errors->has('el_maarefe_elsloky'))
                            <div class="invalid-feedback">
                                {{ $errors->first('el_maarefe_elsloky') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.setting.fields.el_maarefe_elsloky_helper') }}</span>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="required"
                            for="art_therapy">{{ trans('cruds.setting.fields.art_therapy') }}</label>
                        <textarea class="form-control {{ $errors->has('art_therapy') ? 'is-invalid' : '' }}" name="art_therapy"
                            id="art_therapy" required>{{ old('art_therapy', $setting->art_therapy) }}</textarea>
                        @if ($errors->has('art_therapy'))
                            <div class="invalid-feedback">
                                {{ $errors->first('art_therapy') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.setting.fields.art_therapy_helper') }}</span>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="required"
                            for="play_therapy">{{ trans('cruds.setting.fields.play_therapy') }}</label>
                        <textarea class="form-control {{ $errors->has('play_therapy') ? 'is-invalid' : '' }}" name="play_therapy"
                            id="play_therapy" required>{{ old('play_therapy', $setting->play_therapy) }}</textarea>
                        @if ($errors->has('play_therapy'))
                            <div class="invalid-feedback">
                                {{ $errors->first('play_therapy') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.setting.fields.play_therapy_helper') }}</span>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="required" for="logo">{{ trans('cruds.setting.fields.logo') }}</label>
                        <div class="needsclick dropzone {{ $errors->has('logo') ? 'is-invalid' : '' }}"
                            id="logo-dropzone">
                        </div>
                        @if ($errors->has('logo'))
                            <div class="invalid-feedback">
                                {{ $errors->first('logo') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.setting.fields.logo_helper') }}</span>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="required" for="message">{{ trans('cruds.setting.fields.message') }}</label>
                        <textarea class="form-control {{ $errors->has('message') ? 'is-invalid' : '' }}" name="message" id="message"
                            required>{{ old('message', $setting->message) }}</textarea>
                        @if ($errors->has('message'))
                            <div class="invalid-feedback">
                                {{ $errors->first('message') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.setting.fields.message_helper') }}</span>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="required" for="vision">{{ trans('cruds.setting.fields.vision') }}</label>
                        <textarea class="form-control {{ $errors->has('vision') ? 'is-invalid' : '' }}" name="vision" id="vision"
                            required>{{ old('vision', $setting->vision) }}</textarea>
                        @if ($errors->has('vision'))
                            <div class="invalid-feedback">
                                {{ $errors->first('vision') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.setting.fields.vision_helper') }}</span>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="required" for="services">{{ trans('cruds.setting.fields.services') }}</label>
                        <textarea class="form-control {{ $errors->has('services') ? 'is-invalid' : '' }}" name="services" id="services"
                            required>{{ old('services', $setting->services) }}</textarea>
                        @if ($errors->has('services'))
                            <div class="invalid-feedback">
                                {{ $errors->first('services') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.setting.fields.services_helper') }}</span>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="required" for="why">{{ trans('cruds.setting.fields.why') }}</label>
                        <textarea class="form-control {{ $errors->has('why') ? 'is-invalid' : '' }}" name="why" id="why"
                            required>{{ old('why', $setting->why) }}</textarea>
                        @if ($errors->has('why'))
                            <div class="invalid-feedback">
                                {{ $errors->first('why') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.setting.fields.why_helper') }}</span>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        Dropzone.options.logoDropzone = {
            url: '{{ route('admin.settings.storeMedia') }}',
            maxFilesize: 5, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif',
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 5,
                width: 4096,
                height: 4096
            },
            success: function(file, response) {
                $('form').find('input[name="logo"]').remove()
                $('form').append('<input type="hidden" name="logo" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="logo"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                @if (isset($setting) && $setting->logo)
                    var file = {!! json_encode($setting->logo) !!}
                    this.options.addedfile.call(this, file)
                    this.options.thumbnail.call(this, file, file.preview)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="logo" value="' + file.file_name + '">')
                    this.options.maxFiles = this.options.maxFiles - 1
                @endif
            },
            error: function(file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }

                return _results
            }
        }
    </script>
@endsection
