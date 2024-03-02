<?php

namespace App\Http\Services\Menu;

use App\Models\Menu;
use Illuminate\Console\View\Components\Secret;
use Illuminate\Support\Str;
use MongoDB\Driver\Session;

class MenuService
{
    public function getParent(){
        return Menu::where('parent_id',0)->get();
    }
    public  function  getAll(){

            return Menu::orderbyDesc('id')->paginate(20);

    }

    public function create($request)
    {
        try {
            return Menu::create([
                'name'=> (string) $request -> input('name'),
                'parent_id'=> (int) $request -> input('parent_id'),
                'description'=> (string) $request -> input('description'),
                'content'=> (string) $request -> input('content'),
                'active'=> (string) $request -> input('active'),


            ]);

            \Illuminate\Support\Facades\Session::flash('success','tao thu muc thanh cong');

        }catch (\Exception $err){
            \Illuminate\Support\Facades\Session::flash('error',$err->getMessage());
            return false;
        }
        return true;
    }

    public function update($request,$menu):bool
    {
        if ($request->input('parent_id')!=$menu->id){
            $menu->parent_id=(int) $request->input('parent_id');
        }
            $menu->name=(string) $request->input('name');

        $menu->description=(string) $request->input('description');
        $menu->content=(string) $request->input('content');
        $menu->active=(string) $request->input('active');
        $menu->save();
        \Illuminate\Support\Facades\Session::flash('Cap nhat thanh cong danh muc');
        return true;
    }
    function destroy($request)
    {
        $id = (int) $request->input('id');
        $menu = Menu::where('id', $id)->first();//lay 1 thang trong do
        if($menu){
            return Menu::where('id',$id)->orWhere('parent_id',$id)->delete();
        }return false;
    }


}
