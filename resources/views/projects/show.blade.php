@extends('layout')

@section('content')
  <div class="d-flex">
    <div class="mr-auto p-2">
      <h1>{{$project->title}}</h1>
      <div class="row">
        <a href="/projects/{{$project->id}}/edit" class="mr-2"><button class="btn btn-primary"><i class="fas fa-edit fa-xs"></i></button></a>
        <form action="/projects/{{$project->id}}" method="post">
          @method('DELETE')
          @csrf
          <button class="btn btn-danger"><i class="fas fa-trash fa-xs"></i></button>
        </form>
      </div>
    </div>
    <div class="p-2">
      @if(($productivity == 100) && ($project->status !== 'completed'))
        <form action="/projects/{{$project->id}}" method="post">
          @method('PATCH')
          @csrf
          <input type="hidden" name="title" value="{{$project->title}}">
          <input type="hidden" name="description" value="{{$project->description}}">
          <input type="hidden" name="deadline" value="{{$project->deadline}}">
          <input type="hidden" name="status" value="completed">
          <button type="submit" class="btn btn-success">Complete project</button>
        </form>
        @elseif(($productivity == 100) && ($project->status == 'completed'))
          <div class="alert alert-info">
            Project complete
          </div>
      @endif
    </div>
    <div class="p-2">
      <h2>{{$productivity}}%</h2>
    </div>
  </div>
  <hr>
  <p>{{$project->description}}</p>
  <div class="row">
    @if ($project->tasks->count())
      @foreach ($project->tasks as $task)
        <div class="card  mb-2 mr-3" style="width: 13rem;">
          <div class="card-header">
            {{$task->title}}
          </div>
          <div class="card-body">
            <p class="card-text">{{$task->description}}</p>
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
                <form action="/projects/{{$project->id}}/{{$task->id}}/subtasks" method="post">
                  @csrf
                  <div class="form-group">
                      <input type="text" class="form-control" name="description" placeholder="Sub task" value="{{old('description')}}">
                  </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary" name="button">Add Subtask</button>
                    </div>
                </form>
                @php
                  $subtaskcount = $task->subtasks->count();
                  $subtaskcompleted = $task->subtasks->where('status', '==', 'completed')->count()
                @endphp
                @if($subtaskcompleted == $subtaskcount)
                  <div class="row">
                    <p class="card-text">Complete task</p>
                    <span>
                      <form action="/tasks/{{$task->id}}" method="post">
                        @method('PATCH')
                        @csrf
                        <label class="checkbox" for="completed">
                          <input type="checkbox" name="status" onChange="this.form.submit()" value="completed" {{ old('status', $task->status) === 'completed' ? 'checked': '' }}>
                        </label>
                      </form>
                    </span>
                  </div>
                @endif
              </div>
              <div class="card-footer">
                <div class="row">
                  <form action="/projects/{{$project->id}}/{{$task->id}}" method="post">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger"><i class="fas fa-trash fa-sm"></i></button>
                  </form>
                </div>
              </div>
            </div>
          @endforeach
        @endif
        <div class="card  mb-2 mr-3" style="width: 13rem;">
          <div class="card-header">Add Task</div>
          <div class="card-body">
            <form action="/projects/{{$project->id}}/tasks" method="post">
              @csrf
              <div class="form-group">
                <input type="text" class="form-control" name="title" placeholder="Title" value="{{old('title')}}">
              </div>
              <div class="form-group">
                  <input type="text" class="form-control" name="description" placeholder="Description" value="{{old('description')}}">
              </div>
              <div class="form-group">
                  <input type="date" class="form-control" name="deadline" value="{{old('title')}}">
              </div>
              <div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary" name="button">Add Task</button>
                </div>
              </div>
            </form>
          </div>
        </a>
      </div>
      </div>

    </div>
@endsection
