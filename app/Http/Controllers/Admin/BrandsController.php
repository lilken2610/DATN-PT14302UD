<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddBrandRequest;
use App\Model\Admin\Brands;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BrandsController extends Controller
{
    public function __construct(Brands $brands) {
        $this->Brands = $brands;
    }
    public  function index() {
        $allBrand = $this->Brands->getAll();
        return view('admin.brands.index',compact('allBrand'));
    }
    /*add*/
    public function add() {
        return view('admin.brands.add');
    }
    public function postAdd(AddBrandRequest $request) {
        $arAdd = [
            'name_brand' => $request->namebrand,
            'slug_brand'   =>  Str::slug($request->namebrand)
        ];
        $result = $this->Brands->addBrand($arAdd);
        if ($result==1 ) {
            return redirect()->route('shoes.brands.index')->with('msg', 'Thêm thành công !');
        }else {
            return redirect()->route('shoes.brands.index')->with('error', 'Có lỗi xảy ra !');
        }
    }
    /*delete*/
    public function del($id) {
            $this->Brands->delId($id);
       return redirect()->route('shoes.brands.index')->with('msg','Xóa thành công !');

    }
    //edit
    public function edit($id) {
        $getId = $this->Brands->getId($id);
        return view('admin.brands.edit',compact('getId'));
    }
    public function postEdit($id,Request $request) {
        $arEdit = [
            'name_brand' => $request->editnamebrand,
            'slug_brand'   =>  Str::slug($request->editnamebrand)
        ];
        $result = $this->Brands->edit($arEdit,$id);
        if ( $result== 1 ) {
            return redirect()->route('shoes.brands.index')->with('msg', 'Cập nhập thành công !');
        }else {
            return redirect()->route('shoes.brands.index')->with('error', 'Có lỗi xảy ra !');
        }
    }
}
