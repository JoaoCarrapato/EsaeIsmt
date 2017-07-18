<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Disciplina;
use App\User;

class Cursoback extends Model
{
    protected $table = "cursos";
    protected $primaryKey = "id";
    protected $fillable = array("name", "type", "ects", "descri");
    public $timestamps = true;

    public function users()
    {
    	//esta  linha diz que um curso tem muitas disciplinas e diz lhe a tabela de ligação (curso_disciplina)
        return $this->belongsToMany('App\Userback', 'user_curso')->withTimestamps();
    }

    public function disciplinas()
    {
    	//esta  linha diz que um curso tem muitas disciplinas e diz lhe a tabela de ligação (curso_disciplina)
        return $this->belongsToMany('App\Disciplinaback', 'curso_disciplinas')->withTimestamps();
    }
}