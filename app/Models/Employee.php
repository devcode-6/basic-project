<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    /** @use HasFactory<\Database\Factories\EmployeeFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'mobile',
        'salary',
        'department_id',
    ];

    public function department(){
        return $this->belongsTo(Department::class);
    }
    public function getCompany(){
        return $this->department?->company;
    }
    public function post(){
        return $this->hasMany(Post::class);
    }
}
