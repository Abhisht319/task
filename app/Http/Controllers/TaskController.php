<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\{Task,User};
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $userId = $request->header('user_id');
        
        $user = User::where('id',$userId)->first();
        

        if($user->role_id == 1){
            $data = Task::whereNull('deleted_at')->get();
        } else{
            $data = Task::whereNull('deleted_at')->where('user_id',$user->id)->get();
        }


        $response = [

            'success' => true,

            'data'    => $data,

            'message' => 'Data get successfully',

        ];



        return response()->json($response, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required',
            'user_id' => 'required',
        ]);
        
        $task = new Task();
        $task->user_id = $validated['user_id'];
        $task->title = $validated['title'];
        $task->description = $validated['description'];
        $task->status = $validated['status'];

        $task->save();

        
        return response()->json([
            'success' => true,
            'message' => 'Task created successfully',
            'task' => $task
        ], 201); 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Task::where('id',$id)->first();

        return response()->json([
            'success' => true,
            'message' => 'Task Data get successfully',
            'task' => $data
        ], 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required',
            'user_id' => 'required',
        ]);
        
        $task = Task::where('id',$request->task_id)->first();
        // $task->user_id = $validated['user_id'];
        $task->title = $validated['title'];
        $task->description = $validated['description'];
        $task->status = $validated['status'];
        $task->updated_at = now();

        $task->save();

        
        return response()->json([
            'success' => true,
            'message' => 'Task Updated successfully',
            'task' => $task
        ], 201); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Task::where('id',$id)->first();

        $data->deleted_at = now();  
        $data->save();

        return response()->json([
            'success' => true,
            'message' => 'Task created successfully',
            'task' => $data
        ], 201);
    }
}
