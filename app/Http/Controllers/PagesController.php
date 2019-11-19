<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class PagesController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  
    public function home()
      {
        return view('welcome');
      }

    public function profile()
    {
      $projects = auth()->user()->projects->count();
      $completed = auth()->user()->projects->where('status', '==', 'completed')->count();
      $productivity = ($completed / $projects)*100;

      return view('profile', compact('projects', 'completed', 'productivity'));
    }

    public function logout()
    {
      auth()->logout();

      return redirect('/');
    }
}
