<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';
    protected $primaryKey='id';

    protected $fillable = [
        'name',
        'address',
        'mobile',
        'age',
    ];


    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    
    use HasFactory;
}
