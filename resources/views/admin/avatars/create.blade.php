@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.avatar.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.avatars.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('avatar') ? 'has-error' : '' }}">
                            <label class="required" for="avatar">{{ trans('cruds.avatar.fields.avatar') }}</label>
                            <div class="needsclick dropzone" id="avatar-dropzone">
                            </div>
                            @if($errors->has('avatar'))
                                <span class="help-block" role="alert">{{ $errors->first('avatar') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.avatar.fields.avatar_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('avatar_name') ? 'has-error' : '' }}">
                            <label for="avatar_name">{{ trans('cruds.avatar.fields.avatar_name') }}</label>
                            <input class="form-control" type="text" name="avatar_name" id="avatar_name" value="{{ old('avatar_name', '') }}">
                            @if($errors->has('avatar_name'))
                                <span class="help-block" role="alert">{{ $errors->first('avatar_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.avatar.fields.avatar_name_helper') }}</span>
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
    Dropzone.options.avatarDropzone = {
    url: '{{ route('admin.avatars.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="avatar"]').remove()
      $('form').append('<input type="hidden" name="avatar" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="avatar"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($avatar) && $avatar->avatar)
      var file = {!! json_encode($avatar->avatar) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="avatar" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
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