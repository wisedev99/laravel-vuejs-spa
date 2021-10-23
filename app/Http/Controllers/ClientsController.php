<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Tasks;
use App\Clients;

class ClientsController extends Controller
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
//           return Clients::get();
    }

    public function store(Request $request)
    {
       $clients = new Clients();
       $clients->full_name = $request->input('full_name');
       $clients->birth_date = $request->input('birth_date');
       $clients->email = $request->input('email');
       $clients->signed_at = today()->format('Y-m-d');
       $clients->save();

       return response()->json($clients);
    }

    public function show($id)
    {
        $clients = Clients::find($id);
        return response()->json($clients);
    }

    public function update($id, Request $request)
    {
        $this->validate($request,[
            'full_name' => 'required',
            'birth_date' => 'required',
            'email' => 'required'
        ]);

        $clients = Clients::find($id);

        $clients->full_name = $request->full_name;
        $clients->birth_date = $request->birth_date;
        $clients->email = $request->email;
        $clients->signed_at = today()->format('Y-m-d');

         $clients->save();
    }

    public function destroy($id)
    {
    //          Clients::delete($id);
    //
    //         return response()->json('Product deleted!');

        $clients = Clients::find($id);
        $clients->delete();

        return response()->json('Product deleted!');


    }
}
