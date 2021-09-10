<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'cours_id'];

    public function document(){
        return $this->has(Courses::class,'cours_id', 'id');
    }
}
