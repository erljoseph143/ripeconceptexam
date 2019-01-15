@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Adding New Project</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('project.update',$project->id) }}" enctype='multipart/form-data'>
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Title:</label>
                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid d-block' : '' }}" name="title" value="{{ old('title',$project->title) }}" required autofocus>
                                @if ($errors->has('title'))
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="author" class="col-md-4 col-form-label text-md-right">Author:</label>
                            <div class="col-md-6">
                                <input id="author" type="text" class="form-control{{ $errors->has('author') ? ' is-invalid d-block' : '' }}" name="author" value="{{ old('author',$project->author) }}" required autofocus>
                                @if($errors->has('author'))
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $errors->first('author') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image_banner" class="col-md-4 col-form-label text-md-right">Image Banner:</label>
                            <div class="col-md-6">
                                <input id="image_banner" type="file" class="form-control{{ $errors->has('image_banner') ? ' is-invalid d-block' : '' }}" name="image_banner" value="{{ old('image_banner') }}" required autofocus>
                                <img src="{{url($project->image_banner)}}" class="img-thumbnail" width="250px" height="200px" alt="Responsive image">
                                @if($errors->has('image_banner'))
                                    <span class="invalid-feedback d-block" role="alert">

                                        <strong>{{ $errors->first('image_banner') }}</strong>
                                        
                                    </span>
                                @endif
                            </div>
                        </div>



                         <div class="form-group row">
                            <label for="content" class="col-md-4 col-form-label text-md-right">Content:</label>
                            <div class="col-md-6">
                                <textarea rows="10" id="content" class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}" name="content"  required autofocus>
                                    {{ old('content',$project->content) }}
                                </textarea>
                                @if($errors->has('content'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>

                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
