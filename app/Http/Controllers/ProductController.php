<?php

namespace App\Http\Controllers;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\EditRequest;
use App\Actions\MyAction;
use App\Actions\EditAction;
use App\Models\Product;


use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
;        $products=Product::all();
        return view('index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request, MyAction $action)
    {
        
        $Datavalidated=$action->execute(collect($request->validated()));

        if($Datavalidated)
        {
            die('added successfully');
        }
        else{
            die('something wrong');
        }
        

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
        $product=Product::find($id);
       return view('edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditRequest $request, EditAction $action,string $id)
    {
        $product=Product::find($id);
     
        $product->update([
            
        ]);


        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    // public function view_product()
    // {
    //     return view('')
    // }
}
