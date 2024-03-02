<?php

namespace App\Http\Services\Product;

use App\Models\Menu;
use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class ProductAdminService
{
    public function update($request,$product){
        $isValiPrice = $this->isValiPrice($request);
        if ($isValiPrice === false){
            return false;
        }
        try {
            $product->fill($request->input());
            $product->save();
            Session::flash('success','Cap nhat thanh cong');
        }catch (\Exception $err){
            Session::flash('error','Cap nhat thanh Bai');
            Log::info($err->getMessage());
            return false;
        }
        return true;

    }
    public function get(){
        return Product::with('menu')->
        orderByDesc('id')->paginate(15);

    }
    public function getMenu(){
        return Menu::where('active', 1)-> get();
    }
    public function isValiPrice($request)
    {
        if ($request->input('price')!= 0 && $request -> input('price_sale')!=0&&
            $request->input('price') <= $request -> input('price_sale')){
            Session::flash('error','Gia Giam phai nho hon gia goc');
            return false;
        }
        if ($request -> input('price_sale')!=0 && (int)$request->input('price') == 0){
            Session::flash('error','Ban chua nhap gia goc');
            return false;
        }
        return true;
    }
    public function insert($request){
        $isValiPrice = $this->isValiPrice($request);
        if ($isValiPrice === false){
            return false;
        }
        try {
            $request->except('_token'); // lenh bo cai thang _token
            Product::create($request->all());
            Session::flash('success','them thanh cong sp');
        }
        catch (\Exception $err){
            Session::flash('error','them that bai sp');
            \Log::info($err->getMessage());
            return false;
        }
        return true;

    }
    public function delete($request){
        $product = Product::where('id', $request->input('id'))->first();
        if ($product){
            $product->delete();
            return true;
        }
        return false;
    }

}
