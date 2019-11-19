<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
  protected $fillable = [
    'title',
    'description',
    'deadline',
    'status'
  ];

  // public function complete($status = 'completed')
  // {
  //   $this->update(compact('status'));
  // }

  public function project()
  {
    return $this->belongsTo(Project::class);
  }

  public function subtasks()
  {
    return $this->hasMany(Subtask::class);
  }

  public function addSubtask($subtask)
  {
    $this->subtasks()->create($subtask);
  }
}
