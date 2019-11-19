@extends('layout')
@section('content')
  <h1>Create project</h1>
  <form method="POST" action="/projects">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" name="title" class="form-control" placeholder="Title" value="{{old('title')}}">
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <textarea name="description" class="form-control" rows="8" cols="80" value="{{old('description')}}"></textarea>
    </div>
    <div class="form-group">
      <label for="deadline">Deadline</label>
      <input type="date" class="form-control" name="deadline" value="{{old('deadline')}}">
    </div>
    <input type="date" name="status" value="{{old('status')}}">
    <div class="form-group">
      <button type="submit" class="btn btn-success">Submit</button>
    </div>
    @include('inc.errors')
  </form>
@endsection
