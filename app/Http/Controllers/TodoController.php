<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
   
    public function index()
    {
        return Todo::all();
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'alertAt' => 'required',
            'isDone' => 'boolean'
        ]);

        $todo = Todo::create($request->all());

        return response()->json($todo, 201);
    }

  
    public function show(Todo $todo)
    {
        return $todo;
    }

    
    public function update(Request $request, Todo $todo)
    {
        $request->validate([
            'title' => 'required',
            'alertAt' => 'required',
            'isDone' => 'boolean'
        ]);

        $todo->update($request->all());

        return response()->json($todo, 200);
    }

   
    public function destroy(Todo $todo)
    {
        $todo->delete();

        return response()->json(null, 404);
    }
}