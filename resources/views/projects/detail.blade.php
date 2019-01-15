@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{$project->title}}</div>
                <div class="card-body">
                    <p class="card-text d-block">Author: {{ $project->author }}</p>
                    <a href="{{route('project.show',$project->id)}}">
                        <img src="{{url($project->image_banner)}}" class="img-fluid" alt="Responsive image">
                    </a>
                    <p class="card-text">
                        {{$project->content}}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection