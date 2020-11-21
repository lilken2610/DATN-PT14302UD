<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddSlideRequest;
use App\Model\Admin\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class SlideController extends Controller
{
    public function __construct(Slide $slide)
    {
        $this->Slide = $slide;
    }
    public function index(){
        $object = $this->Slide->getSlide();
        return view('admin.slide.index',compact('object'));
    }
    public function add() {
        return view('admin.slide.add');
    }
    public function postAdd(AddSlideRequest $request) {
        $file = $request->img;
        $file->move(public_path('images/app/slide/'),$file->getClientOriginalName());
        $arAdd = [
            'title' => $request->title,
            'position_text' => $request->position,
            'content'   => $request->addcontent,
            'img'   => $file->getClientOriginalName()
        ];
        $result = $this->Slide->add($arAdd);
        if ( $result == 1 ) {
            return redirect()->route('shoes.slide.index')->with('msg','Thêm thành công !');
        }else {
            return redirect()->route('shoes.slide.index')->with('error','Có lỗi xảy ra !');
        }
    }
    public function del($id) {
        $result = $this->Slide->del($id);
        if ( $result == 1 ) {
            return redirect()->route('shoes.slide.index')->with('msg','Xóa thành công !');
        }else {
            return redirect()->route('shoes.slide.index')->with('error','Có lỗi xảy ra !');
        }
    }
    public function edit($id) {
        $object = $this->Slide->getId($id);
        return view('admin.slide.edit',compact('object'));
    }
    public function postEdit($id,Request $request) {
        $imgName = $this->Slide->getId($id)->img;
        if ( $request->hasFile('img') ) {            
            File::delete(public_path("images/app/slide/$imgName"));
            $file = $request->img;
            $file->move(public_path('images/app/slide/'),$file->getClientOriginalName());
            $imgName = $file->getClientOriginalName();
        }
        $arEdit = [
            'title' => $request->edittitle,
            'position_text' => $request->editposition,
            'content'   => $request->editcontent,
            'img'   => $imgName
        ];
        $result = $this->Slide->edit($id,$arEdit);
        if ( $result == 1 ) {
            return redirect()->route('shoes.slide.index')->with('msg','Cập nhập thành công !');
        }else {
            return redirect()->route('shoes.slide.index')->with('error','Có lỗi xảy ra !');
        }
    }
}
