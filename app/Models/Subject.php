<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = ['name','semester','credit',
             'subject_id','user_id', 'number-student', 'code','description'];


    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
    public function teacher()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function students()
    {
        return $this->belongsToMany(User::class);
    }
}
