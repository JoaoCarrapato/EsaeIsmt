<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Curso;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','curso','photo','type', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function cursos()
    {
        //esta  linha diz que um user tem um ou mais cursos e diz lhe que a tabela de ligação (user_curso)
        return $this->belongsToMany('App\Curso', 'user_curso')->withTimestamps();
    }
}
