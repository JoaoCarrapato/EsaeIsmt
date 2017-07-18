<?php

namespace App\Http\Controllers;

class PagesController extends Controller
{
    public function index() {
    	return view('index');
    }

    public function curso() {
      return view('curso.index');
    }

    public function disciplina() {
      return view('disciplina.index');
    }

    public function evento() {
      return view('evento.index');
    }

    public function propina() {
      return view('propina.index');
    }

    public function utilizadores() {
      return view('utilizador.index');
    }

    public function user() {
      return view('user.index');
    }
}
