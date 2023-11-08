<?php

namespace App\Http\Controllers;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\EditRequest;
use App\Actions\MyAction;
use App\Actions\EditAction;
use App\Models\Product;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductExport;
// use App\Http\Requests\ProductExportRequest;
use PDF;

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
        return redirect()->route('list')->with('message','added successfully');
       
        

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
    public function edit(Product $product)
    {
      return view('edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditRequest $request, EditAction $action,Product $product)
    {
       
        $Datavalidated=$action->execute(collect($request->validated()),$product);
        if($Datavalidated)
        {
            return redirect()->route('list')->with('success','updated successfully');
        }
        else{
            return redirect()->back()->with('message','something went wrong');
        }
      
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->back();
    }
    public function excel_export()
    {
        return Excel::download(new ProductExport,'products.xlsx');
    }
    public function pdf_export(){

        // $product=Product::select();
        $pdf = PDF::loadView('pdfview');
        return $pdf->stream('products.pdf');
    }
}
