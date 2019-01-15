@extends('layouts.app')

@section('content')
<div class="container">
    @if($user->user_type=="admin")
        <div class="row form-group">
            <a href="{{route('project.create')}}" class="btn btn-outline-success">Add New Project</a>
        </div>
    @endif
    <div class="row justify-content-center">

        @if(session('not_admin'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> {{session()->get('not_admin')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{session()->get('success')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

         @foreach($projects as $key => $project)
        <div class="col-md-12" style="margin-bottom:10px">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('project.show',$project->id)}}">{{$project->title}}</a>

                    @if($user->user_type=="admin")
                        <a href="{{route('project.edit',$project->id)}}" class="btn btn-sm btn-outline-primary float-right">Edit</a>
                        <form method="post" class="float-right mr-md-1" action="{{route('project.destroy',$project->id)}}">
                            @csrf()
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger ">Delete</button>
                        </form>
                    @endif    

                </div>
                <div class="card-body">
                    <p class="card-text d-block">Author: {{ $project->author }}</p>
                        <a href="{{route('project.show',$project->id)}}">
                            <img src="{{url($project->image_banner)}}" class="img-thumbnail" width="250px" height="200px" alt="Responsive image">
                        </a>
                        
                        <p class="card-text">
                            {{ $project->content_short }}
                        </p>
                </div>
            </div>
        </div>

         @endforeach
    </div>
</div>
@endsection
