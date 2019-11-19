@extends('layout')
@section('content')
  <h1>Edit project</h1>
  <form method="POST" action="/projects/{{$project->id}}">
    @method('PATCH')
    @csrf
    <div class="form-group">
      <label for="title">Project Title</label>
      <input type="text" name="title" class="form-control" placeholder="Title" value="{{$project->title}}">
    </div>
    <div class="form-group">
      <label for="description">Project Description</label>
      <textarea name="description" class="form-control" rows="8" value="{{$project->description}}">{{$project->description}}</textarea>
    </div>
    <div class="form-group">
      <label for="deadline">Deadline</label>
      <input type="date" name="deadline" value="{{$project->deadline}}" class="form-control"><br>
    </div>
    <input type="hidden" name="status" value="{{$project->status}}">
    <div class="form-group">
      <button type="submit" class="btn btn-primary">Update</button>
    </div>
  </form>
  @include('inc.errors')

  <form action="/projects/{{$project->id}}" method="post">
    @method('DELETE')
    @csrf
    <button type="submit" class="btn btn-danger">Delete</button>
  </form>
@endsection
