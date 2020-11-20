<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddSizeRequest;
use App\Model\Admin\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function __construct(Size $size)
    {
        $this->Size = $size;
    }
    public function index() {
        $getSize = $this->Size->getSize();
        return view('admin.size.index',compact('getSize'));
    }
    public function add() {
        return view('admin.size.add');
    }
    public function postAdd(AddSizeRequest $request) {
        $arSize = ['size' => $request->size ];
        $result = $this->Size->add($arSize);
        if ( $result==1 ){
            return redirect()->route('shoes.size.index')->with('msg','Thêm thành công !');
        }else {
            return redirect()->route('shoes.size.index')->with('error','Có lỗi xảy ra !');

        }
    }
    public function del($id) {
        $result = $this->Size->del($id);
        if ( $result==1 ){
            return redirect()->route('shoes.size.index')->with('msg','Xóa thành công !');
        }else {
            return redirect()->route('shoes.size.index')->with('error','Có lỗi xảy ra !');
        }
    }
}
