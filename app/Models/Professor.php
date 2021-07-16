<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    use HasFactory;

    protected $fillable = [
        'professor_name', 'professor_email'
    ];
    
    // public function subjects(){
    //     return $this->belongsToMany(Subject::class);
    // }
    /**
     * The roles that belong to the Professor
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }
}
