<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Financa extends Model
{
    protected $table = "financas";
    protected $primaryKey = "id";
    protected $fillable = array("date", "price", "paid");
    public $timestamps = true;
}