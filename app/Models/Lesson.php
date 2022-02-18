<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;
protected $fillable = ['title', 'video_link', 'user_id', 'course_id', 'module_id'];

// protected $primaryKey = 'id';

    public function modules()
    {
        return $this->belongsTo(Module::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

   

}
