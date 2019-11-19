@extends('layout')

@section('content')
  <h1>{{$task->title}}</h1>
  <hr>
  <p>{{$task->description}}</p>
  <p>{{$task->deadline}}</p>

  <div class="card mb-4" style="width: 32rem;">
    <ul class="list-group list-group-flush">
      @foreach($task->subtasks as $subtask)
        <li class="list-group-item">
          {{$subtask->description}}
          <span>
            <form class="form-check form-check-inline" action="/subtasks/{{$subtask->id}}" method="post">
              @method('PATCH')
              @csrf
              <label class="checkbox" for="status">
                <input type="checkbox" name="status" onChange="this.form.submit()" value="completed" {{ old('status', $subtask->status) === 'completed' ? 'checked': '' }}>
              </label>
            </form>
          </span>
        </li>
      @endforeach
    </ul>
  </div>

  <form action="/projects/{{$project->id}}/{{$task->id}}/subtasks" method="post">
    @csrf
    <div class="form-group">
        <input type="text" class="form-control" name="description" placeholder="Description" value="{{old('description')}}"
        style="width: 32rem;">
    </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary" name="button">Add Subtask</button>
      </div>
    </div>
  </form>

  <a href="/projects/{{$project->id}}"><button type="button" class="btn btn-primary">Back</button></a>

@endsection
