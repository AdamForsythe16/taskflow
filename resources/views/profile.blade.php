@extends('layout')

@section('content')
  <h1>My profile</h1>
  <hr>
  <i class="fas fa-user-circle fa-7x mb-2"></i>
  <div class="card  mb-2 mr-2" style="width: 13rem;">
    <div class="card-header">
      <h2>{{Auth::user()->name}}</h2>
    </div>
    <div class="card-body">
      <p class="card-text">Productivity: {{$productivity}}%</p>
      <p class="card-text">Number of projects: {{$projects}}</p>
      <p class="card-text">Completed projects: {{$completed}}</p>
    </div>
  </div>

@endsection
