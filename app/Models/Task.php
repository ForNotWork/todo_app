<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // use HasFactory;
    protected $primaryKey = 'tid';
    protected $fillable = ['title', 'description','complete'];
    protected $guarded = ['_token'];
}
