<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;
    protected $table = 'cursos';
    public $timestamps = true;


    
    public function getUser(){
        return $this->hasOne(User::class,'id','idUser');
    }
}
