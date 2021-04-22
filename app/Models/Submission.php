<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    use HasFactory;
    protected $fillable = ['task_id','user_id','grade','answer'];
    public function task()
    {
        return $this->belongsTo(Task::class,'task_id');
    }
    public function student()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
