<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddCatRequest;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class CategoriesController extends Controller
{
    public function __construct(Categories $categories) {
        $this->Categories = $categories;
    }
    public  function index() {
        $allCat     = $this->Categories->getAll();
        return view('admin.categories.index',compact('allCat'));
    }
    /*add*/
    public function add() {
        return view('admin.categories.add');
    }
    public function postAdd(AddCatRequest $request) {
        $arAdd = [
            'name_cat' => $request->namecat,
            'slug_cat'   => Str::slug($request->namecat)
        ];
        $result = $this->Categories->addCat($arAdd);
        if ($result==1 ) {
            return redirect()->route('shoes.categories.index')->with('msg', 'Thêm thành công !');
        }else {
            return redirect()->route('shoes.categories.index')->with('error', 'Có lỗi xảy ra !');
        }
    }
    /*delete*/
    public function del($id) {
       $this->Categories->delId($id);
       return redirect()->route('shoes.categories.index')->with('msg','Xóa thành công !');

    }
    //edit
    public function edit($id) {
        $getId = $this->Categories->getId($id);
        return view('admin.categories.edit',compact('getId'));
    }
    public function postEdit($id,Request $request) {
        $arEdit = [
            'name_cat' => $request->editnamecat,
            'slug_cat' => Str::slug($request->editnamecat)
        ];
        $result = $this->Categories->edit($arEdit,$id);
        if ( $result== 1 ) {
            return redirect()->route('shoes.categories.index')->with('msg', 'Cập nhập thành công !');
        }else {
            return redirect()->route('shoes.categories.index')->with('error', 'Có lỗi xảy ra !');
        }
    }
}
