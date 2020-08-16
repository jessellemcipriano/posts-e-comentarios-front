<?php

namespace App\Http\Controllers;
use illuminate\Support\Facades\Auth;
use App\Post;
use App\User;
use App\Comentario;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('profile')
        ->with('Arposts',Post::All())
        ->with('Arcomentarios', Comentario::All())
        ->with('Arusuarios',User::All());
        
    }

    
}
