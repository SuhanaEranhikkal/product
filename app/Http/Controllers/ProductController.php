<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Requests\EditRequest;
use App\Actions\MyAction;
use App\Actions\EditAction;
use App\Models\Product;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductExport;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use DataTables;
use App\Http\Requests\ProductExportRequest;


use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $row = Product::orderby('id', 'desc');
            $searchname = $request->searchname;
            $searchprice = $request->searchprice;

            $row->when($searchname, function ($q, $searchname) {
                return $q->where('name', 'like', '%' . $searchname . '%');
            });

            $row->when($searchprice, function ($q, $searchprice) {
                return $q->where('price', 'like', '%' . $searchprice . '%');
            });
            return DataTables::of($row)
                // ->addIndexColumn()

                ->addColumn('action', function ($row) {
                    return view('actions', ['row' => $row]);
                })
                ->addColumn('image', function ($row) {
                    return view('imageshow', ['row' => $row]);
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('index');
        // $products=Product::all();
        // return view('index',compact('products'));
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
        $action->execute(collect($request->validated()));
        return redirect()->route('products.index')->with('message', 'added successfully');
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
        return view('edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditRequest $request, EditAction $action, Product $product)
    {

        $Datavalidated = $action->execute(collect($request->validated()), $product);
        if ($Datavalidated) {
            return redirect()->route('products.index')->with('success', 'updated successfully');
        } else {
            return redirect()->back()->with('message', 'something went wrong');
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
    public function excel_export(Request $rq)
    {
        if ($rq->export == 'excel') {
            $searchname = $rq->searchname;
            $searchprice = $rq->searchprice;
            $products=Product::orderby('id','desc');
            
            $products->when($searchname, function ($q, $searchname) {
                return $q->where('name', 'like', '%' . $searchname . '%');
            });

            $products->when($searchprice, function ($q, $searchprice) {
                return $q->where('price', 'like', '%' . $searchprice . '%');
            });
            $lists=$products->get();

            return Excel::download(new ProductExport($lists), 'products.xlsx',);
        }
        if ($rq->export == 'pdf') {
            $products = Product::orderby('id', 'desc');
            $searchname = $rq->searchname;
            $searchprice = $rq->searchprice;

            $products->when($searchname, function ($q, $searchname) {
                return $q->where('name', 'like', '%' . $searchname . '%');
            });

            $products->when($searchprice, function ($q, $searchprice) {
                return $q->where('price', 'like', '%' . $searchprice . '%');
            });
            $lists=$products->get();
            
            $pdf = PDF::loadView('pdf.products', ['lists' => $lists]);
            return $pdf->download('products.pdf');
        }
    }
    
}
