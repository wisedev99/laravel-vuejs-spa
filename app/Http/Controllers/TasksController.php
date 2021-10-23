<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Clients;
use App\Tasks;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Clients::with(['tasks'])->get();
        return response()->json($clients);
    }

    public function store(Request $request)
    {
       $tasks = new Tasks();

       $tasks->client_id = $request->input('client_id');
       $tasks->task_name = $request->input('task_name');
       $tasks->task_text = $request->input('task_text');
       $tasks->status = $request->input('status');
       $tasks->died_line = $request->input('died_line');

       $tasks->save();

       return response()->json($tasks);
    }

    public function show($id)
    {
        $tasks = Tasks::find($id);
        return response()->json($tasks);
    }

    public function update($id, Request $request)
    {
        $this->validate($request,[
            'task_name' => 'required',
            'task_text' => 'required',
            'died_line' => 'required',
            'status' => 'required'
        ]);

        $tasks = Tasks::find($id);

        $tasks->task_name = $request->task_name;
        $tasks->task_text = $request->task_text;
        $tasks->died_line = $request->died_line;
        $tasks->status = $request->status;

         $tasks->save();
    }

    public function destroy($id)
    {
//         Tasks::delete($id);
//
//         return response()->json('Product deleted!');
  $tasks = Tasks::find($id);
        $tasks->delete();

        return response()->json('Product deleted!');
    }
}
