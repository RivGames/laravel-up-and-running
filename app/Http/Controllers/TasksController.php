<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index(){
        return view('tasks.index')->with('tasks',[['name' => 'Learn Laravel <3','date' => '14.12.2022']]);
    }

    public function create()
    {
        
    }

    public function store()
    {
        
    }
}
