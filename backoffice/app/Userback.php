<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userback extends Model
{
    protected $table = "users";
    protected $primaryKey = "id";
    protected $fillable = array('name', 'email','curso','photo','type', 'password');
    public $timestamps = true;
}