<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject_abbreviation', 'subject_title','subject_description','subject_unit'
    ];
    protected $with = ['professors'];

    public function courses(){
        return $this->belongsToMany(Course::class);
    }

    public function professors(){
        return $this->belongsToMany(Professor::class);
    }
}
