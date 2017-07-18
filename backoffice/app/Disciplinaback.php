<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cursos;
use App\Horario;

class Disciplinaback extends Model
{
    protected $table = "disciplinas";
    protected $primaryKey = "id";
    protected $fillable = array("name", "semester", "prof");
    public $timestamps = true;

    public function cursos()
    {
    	
        return $this->belongsToMany('App\Cursoback', 'curso_disciplinas')->withTimestamps();
    }

    public function horarios()
    {
    	
        return $this->belongsToMany('App\Horarioback', 'disciplinas_horarios')->withTimestamps();
    }
}