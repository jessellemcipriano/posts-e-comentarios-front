<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Comentario;


class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home')
            ->with('Arposts',Post::All())
            ->with('Arcomentarios',Comentario::All())
            ->with('Arusuarios',User::All());
            
    }
}
