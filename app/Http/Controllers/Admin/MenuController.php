<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CreateFormRequest;
use App\Models\Menu;
use http\Env\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Services\Menu\MenuService;

class MenuController extends Controller
{

    protected $menuService;
    public function __construct(MenuService $menuService)
    {
        $this->menuService=$menuService;
    }

     public function create(){
        return view('admin.menu.add',[
            'title'=>'Them Danh Muc',
            'menus'=>$this->menuService->getParent()
        ]);
     }
    public function store(CreateFormRequest $request)
    {
        $this->menuService->create($request);
        return redirect()-> back();
    }

    public  function listview(){
        return view('admin.menu.list',[
            'title'=>'Hien Danh Sach Danh Muc',
            'menus'=>$this->menuService->getAll()
        ]);

    }
    public function show(Menu $menu){
        return view('admin.menu.edit',[
           'title'=>'chinh sua danh muc: '.$menu->name,
            'menu'=>$menu,
            'menus'=>$this->menuService->getParent()
        ]);
    }
    public function update(Menu $menu,CreateFormRequest $request){
        $this->menuService->update($request,$menu);
        return redirect('/admin/menus/list');
    }

    public function destroy(Request $request): JsonResponse
    {
        $result = $this -> menuService -> destroy($request);

        if($result){
            return Response()-> json([
                'error'=> false,
                'message'=> 'xoa thanh cong'
            ]);
        }
            return Response()-> json([
                'error'=> true
                ]);



    }


}
