<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Curso;

class Horario extends Model
{
    protected $table = "horarios";
    protected $primaryKey = "id";
    protected $fillable = array("weekday", "timebegin", "timeend", "classroom");
    public $timestamps = true;

    public function cursos()
    {
    	
        return $this->belongsToMany('App\Cursos', 'disciplinas_horarios')->withTimestamps();
    }
}