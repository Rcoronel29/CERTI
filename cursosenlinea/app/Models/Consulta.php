<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;
    protected $table = 'certificados';
    public $timestamps = true;

    public function getUser(){
        return $this->hasOne(User::class,'id','idUser');
    }
    public function getCurso(){
        return $this->hasOne(Curso::class,'id','idCurso');
    }
}
