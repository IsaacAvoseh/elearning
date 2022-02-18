<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use UConverter;

class Course extends Model
{
    use HasFactory;
protected $table = 'courses';
    protected $fillable = ['title', 'duration', 'description', 'language', 'price', 'user_id'];
    protected $primaryKey = 'id';
    // protected $table = 'courses';

// public function lesson()
// {
//     return $this->hasMany(Lesson::class);

// }

// public function module()
// {
//     return $this->hasMany(Module::class);
// }


public function lessons()
{
    return $this->hasMany(Lesson::class, 'course_id');

}

public function modules()
{
    return $this->hasMany(Module::class);
}


public function users()
{
    return $this->belongsTo(User::class, 'user_id');
}

public function payments()
{
    return $this->hasMany(Payments::class);

}









}