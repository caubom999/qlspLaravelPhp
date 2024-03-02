<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Producs\RequestProducs;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Services\Product\ProductAdminService;

class ProductsController extends Controller
{
    protected $producService;
    public function __construct(ProductAdminService $producService)
    {
        $this-> producService = $producService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.producs.list',[
            'title'=>'List Products',
            'products'=>$this ->producService->get()
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/producs/add',[
            'title'=>'add producs',
            'menus'=> $this ->producService ->getMenu()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RequestProducs $request)
    {
        $this->producService->insert($request);
        $this->producService->isValiPrice($request);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('admin.producs.edit',[
            'title'=>'chinh sua',
            'product'=>$product,
            'menus'=> $this ->producService ->getMenu()

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
      $x=  $this->producService->update($request,$product);
      if ($x){
          return redirect('admin/products/list');
      }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $result = $this->producService->delete($request);
        if ($result){
            return response()->json([
                'error'=>false,
                'message'=>'Xoa thanh cong'
            ]);
        }
        return response()->json([
            'error'=>true,
        ]);
    }
}
