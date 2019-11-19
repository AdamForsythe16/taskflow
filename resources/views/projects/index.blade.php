@extends('layout')

@section('content')
  <h1>projects</h1>
  <hr>
  <div class="row">
    @foreach($projects as $project)
      <a href="/projects/{{$project->id}}">
        <div class="card  mb-2 mr-3" style="width: 13rem;">
          <div class="card-header">
            {{$project->title}}
          </div>
          <div class="card-body">
            <p class="card-text">{{$project->description}}</p>
          </div>
          <div class="card-footer">
            <div class="row">
              <a href="/projects/{{$project->id}}/edit" class="mr-2"><button class="btn btn-primary"><i class="fas fa-edit fa-sm"></i></button></a>
              <form action="/projects/{{$project->id}}" method="post">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger"><i class="fas fa-trash fa-sm"></i></button>
              </form>
            </div>
          </div>
        </div>
      </a>
    @endforeach
    <a href="/projects/create" id="blue-link">
      <div class="card  mb-2 mr-2" style="width: 13rem;">
        <div class="card-body">
          <p class="card-text">Create Project</p>
        </div>
      </div>
    </a>
  </div>
@endsection
