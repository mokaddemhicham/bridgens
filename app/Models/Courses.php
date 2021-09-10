<?php

namespace App\Models;

use App\Models\Document;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Courses extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'slug' ,'enseignant','image'];
}
