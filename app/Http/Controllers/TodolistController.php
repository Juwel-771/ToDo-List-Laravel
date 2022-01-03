<?php

namespace App\Http\Controllers;

use App\Models\Todolist;
use Illuminate\Http\Request;

class TodolistController extends Controller
{
    
    public function index()
    {
        $todolist = Todolist::all();
        return view('home',['todolist'=>$todolist]);
    }


    public function store(Request $request)
    {
        $data =  $request->validate([
            'text' => 'required',
            'body'=> 'required',
            'due' => 'required'
        ]);

        Todolist::create($data);
        return back();
    }

    public function destroy(Todolist $todolist)
    {
        $todolist->delete();
        return back();
    }
}
