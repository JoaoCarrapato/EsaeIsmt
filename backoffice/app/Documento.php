<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $table = "documentos";
    protected $primaryKey = "id";
    protected $fillable = array("name", "type");
    public $timestamps = true;
}