<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_abbreviation', 'course_title'
    ];

    public function subjects(){
        // return $this->belongsToMany(Subject::class, 'course_subject','course_id', 'subject_id');
        return $this->belongsToMany(Subject::class);
    }

    public function users(){
        return $this->belongsTo(User::class);
    }
}
