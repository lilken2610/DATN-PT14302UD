<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\AddGiftRequest;
use App\Model\Admin\GiftCode;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GiftCodeController extends Controller
{
    public function __construct(GiftCode $giftCode)
    {
        $this->GiftCode = $giftCode;
    }
    public function index() {
        $getGift = $this->GiftCode->getGift();
        return view('admin.gift.index',compact('getGift'));
    }
    public function add() {
        return view('admin.gift.add');
    }
    public function postAdd(AddGiftRequest $request) {
        $arAdd = [
            'code' => $request->gift,
            'value' => $request->value,
            'qty' => $request->qty,
            'status' => 1,
            'created_day' => $request->created_at,
            'end_day' => $request->end_day
        ];
        $result = $this->GiftCode->add($arAdd);
        if ( $result == 1 ) {
            return redirect()->route('shoes.gift.index')->with('msg','Thêm thành công');
        }else {
            return redirect()->route('shoes.gift.index')->with('msg','Có lỗi xảy ra');
        }
    }
    public function del($id) {
        $result = $this->GiftCode->del($id);
        if ( $result == 1 ) {
            return redirect()->route('shoes.gift.index')->with('msg','Xóa thành công');
        }else {
            return redirect()->route('shoes.gift.index')->with('msg','Có lỗi xảy ra');
        }
    }
    public function edit($id) {
        $object = $this->GiftCode->getId($id);
        return view('admin.gift.edit',compact('object'));
    }
    public function postEdit(Request $request,$id) {
        $arEdit = [
            'code' => $request->gift,
            'value' => $request->value,
            'qty' => $request->qty,
            'created_day' => $request->created_at,
            'end_day' => $request->end_day
        ];
        $result = $this->GiftCode->edit($id,$arEdit);
        if ( $result == 1 ) {
            return redirect()->route('shoes.gift.index')->with('msg','Cập nhập thành công');
        }else {
            return redirect()->route('shoes.gift.index')->with('msg','Có lỗi xảy ra');
        }
    }
}
