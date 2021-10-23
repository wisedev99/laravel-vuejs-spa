<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Clients;

class ProductController extends Controller
{
    public function index()
    {
        $clients = Clients::with(['tasks'])->get();
        return response()->json($clients);
    }

    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->input('name');
        $product->tasks = $request->input('tasks');
        $product->birth_date = today()->format('Y-m-d');
        $product->save();

        return response()->json($product);
    }

    public function show($id)
    {
        $product = Product::find($id);
        return response()->json($product);
    }

    public function update($id, Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'tasks' => 'required'
        ]);

        $product = Product::find($id);

        $product->name = $request->name;
        $product->tasks = $request->tasks;

         $product->save();
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return response()->json('Product deleted!');
    }
}
