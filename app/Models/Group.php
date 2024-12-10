<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    use HasFactory;

    protected $table = 'groups';
    public $fillable = ['id','educational_experience_id','teacher_id','shift','period'];
    
}
