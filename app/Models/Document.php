<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'type', 'document' , 'chapitre_id' , 'cours_id'];

    public function chapitre(){
        return $this->belongsTo(Chapter::class,'chapitre_id', 'id');
    }
}
