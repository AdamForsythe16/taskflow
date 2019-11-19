<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subtask extends Model
{
  protected $fillable = [
    'description',
    'status'
  ];

    public function task()
    {
      return $this->belongsTo(Task::class);
    }
}
