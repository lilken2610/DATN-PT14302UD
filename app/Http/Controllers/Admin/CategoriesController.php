<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddCatRequest;
use App\Model\Admin\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function __construct(Categories $categories) {
        $this->Categories = $categories;
    }
    public  function index() {
        $objectItem = $this->Categories->getCategories();
        $allCat     = $this->Categories->getAll();
        return view('admin.categories.index',compact('objectItem','allCat'));
    }
    /*add*/
    public function add() {
        $optionNameCat = $this->Categories->getCategories();
        $allCat = $this->Categories->getAll();
        return view('admin.categories.add',compact('optionNameCat','allCat'));
    }
    public function postAdd(AddCatRequest $request) {
        $arAdd = [
            'name_cat' => $request->namecat,
            'parent_id'   => $request->idsub,
            'status'  => 1
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
        $arParent = $this->Categories->getParentId($id);
        if ( $arParent != null ) {
            foreach ($arParent as $key => $value) {
                $this->Categories->delId($value->id_cat);
                $this->del($value->id_cat);
            };
            $this->Categories->delId($id);
        }
       return redirect()->route('shoes.categories.index')->with('msg','Xóa thành công !');

    }
    //edit
    public function edit($id) {
        $getId = $this->Categories->getId($id);
        $optionNameCat = $this->Categories->getCategories();
        $allCat = $this->Categories->getAll();
        return view('admin.categories.edit',compact('getId','optionNameCat','allCat'));
    }
    public function postEdit($id,Request $request) {
        $arEdit = [
            'name_cat' => $request->editnamecat,
            'parent_id' => $request->editidsub
        ];
        $result = $this->Categories->edit($arEdit,$id);
        if ( $result== 1 ) {
            return redirect()->route('shoes.categories.index')->with('msg', 'Cập nhập thành công !');
        }else {
            return redirect()->route('shoes.categories.index')->with('error', 'Có lỗi xảy ra !');
        }
    }
    //status
    public function status($id) {
        $result = $this->Categories->status($id);
        if ( $result== 1 ) {
            return redirect()->route('shoes.categories.index')->with('msg', 'Cập nhập thành công !');
        }else {
            return redirect()->route('shoes.categories.index')->with('error', 'Có lỗi xảy ra !');
        }
    }
}
