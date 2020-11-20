<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddNewRequest;
use App\Model\Admin\News;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function __construct(News $news)
    {
        $this->News = $news;
    }

    public function index() {
        $getAll = $this->News->getAll();
        return view('admin.news.index',compact('getAll'));
    }
    public function add() {
        return view('admin.news.add');
    }
    public function postAdd(AddNewRequest $request) {
        $img = '';
        if ( $request->hasFile('pic') ) {
            $filePath = $request->pic->store('news');
            $arFile = explode("/",$filePath);
            $img = end($arFile);
        }
        $arNews = [
            'title'     => $request->namenew,
            'preview'   => $request->previewnew,
            'detail'    => $request->detailnew,
            'picture'   => $img
        ];
        $result = $this->News->add($arNews);
        if ( $result == 1 ) {
            return redirect()->route('shoes.news.index')->with('msg','Thêm thành công !');
        }else {
            return redirect()->route('shoes.news.index')->with('error','Thêm thành công !');
        }
    }
    public function del($id) {
        $result = $this->News->del($id);
        if ( $result == 1 ) {
            return redirect()->route('shoes.news.index')->with('msg','Xóa thành công !');
        }else {
            return redirect()->route('shoes.news.index')->with('error','Có lỗi xảy ra !');
        }
    }
    public function edit($id) {
        $object = $this->News->getId($id);
        return view('admin.news.edit',compact('object'));
    }
    public function postEdit($id,Request $request) {
        $object = $this->News->getId($id);
        $img = $object->picture;
        if ( $request->hasFile('pic') ) {
            Storage::delete('news/'.$img);
            $filePath = $request->pic->store('news');
            $arFile = explode("/",$filePath);
            $img = end($arFile);
        }
        $arEdit = [
            'title'     => $request->namenew,
            'preview'   => $request->previewnew,
            'detail'    => $request->detailnew,
            'picture'   => $img
        ];
        $result = $this->News->edit($id,$arEdit);
        if ( $result == 1 ) {
            return redirect()->route('shoes.news.index')->with('msg','Cập nhập thành công !');
        }else {
            return redirect()->route('shoes.news.index')->with('error','Có lỗi xảy ra!');
        }
    }
}
