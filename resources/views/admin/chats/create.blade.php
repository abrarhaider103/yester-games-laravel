@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.chat.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.chats.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('message') ? 'has-error' : '' }}">
                            <label class="required" for="message">{{ trans('cruds.chat.fields.message') }}</label>
                            <input class="form-control" type="text" name="message" id="message" value="{{ old('message', '') }}" required>
                            @if($errors->has('message'))
                                <span class="help-block" role="alert">{{ $errors->first('message') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.chat.fields.message_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('attachments') ? 'has-error' : '' }}">
                            <label for="attachments">{{ trans('cruds.chat.fields.attachments') }}</label>
                            <div class="needsclick dropzone" id="attachments-dropzone">
                            </div>
                            @if($errors->has('attachments'))
                                <span class="help-block" role="alert">{{ $errors->first('attachments') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.chat.fields.attachments_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('feature_type') ? 'has-error' : '' }}">
                            <label for="feature_type">{{ trans('cruds.chat.fields.feature_type') }}</label>
                            <input class="form-control" type="text" name="feature_type" id="feature_type" value="{{ old('feature_type', '') }}">
                            @if($errors->has('feature_type'))
                                <span class="help-block" role="alert">{{ $errors->first('feature_type') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.chat.fields.feature_type_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('feature') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.chat.fields.feature') }}</label>
                            @foreach(App\Models\Chat::FEATURE_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="feature_{{ $key }}" name="feature" value="{{ $key }}" {{ old('feature', '') === (string) $key ? 'checked' : '' }}>
                                    <label for="feature_{{ $key }}" style="font-weight: 400">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('feature'))
                                <span class="help-block" role="alert">{{ $errors->first('feature') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.chat.fields.feature_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('session') ? 'has-error' : '' }}">
                            <label class="required" for="session_id">{{ trans('cruds.chat.fields.session') }}</label>
                            <select class="form-control select2" name="session_id" id="session_id" required>
                                @foreach($sessions as $id => $entry)
                                    <option value="{{ $id }}" {{ old('session_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('session'))
                                <span class="help-block" role="alert">{{ $errors->first('session') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.chat.fields.session_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('message_from') ? 'has-error' : '' }}">
                            <label class="required" for="message_from_id">{{ trans('cruds.chat.fields.message_from') }}</label>
                            <select class="form-control select2" name="message_from_id" id="message_from_id" required>
                                @foreach($message_froms as $id => $entry)
                                    <option value="{{ $id }}" {{ old('message_from_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('message_from'))
                                <span class="help-block" role="alert">{{ $errors->first('message_from') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.chat.fields.message_from_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    var uploadedAttachmentsMap = {}
Dropzone.options.attachmentsDropzone = {
    url: '{{ route('admin.chats.storeMedia') }}',
    maxFilesize: 5, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 5
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="attachments[]" value="' + response.name + '">')
      uploadedAttachmentsMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedAttachmentsMap[file.name]
      }
      $('form').find('input[name="attachments[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($chat) && $chat->attachments)
          var files =
            {!! json_encode($chat->attachments) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="attachments[]" value="' + file.file_name + '">')
            }
@endif
    },
     error: function (file, response) {
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