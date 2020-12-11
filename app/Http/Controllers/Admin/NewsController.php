<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddNewRequest;
use App\Models\News;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
            $value = $request->pic;
            $filename = Str::random().time() . '.' . $value->getClientOriginalExtension();
            $value->move(public_path('images/app/news/'), $filename);
            $img = $filename;
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
        if($request->hasFile('pic')) {
                $filename = public_path("images/app/news/$img");
                File::delete($filename);

            //add file
            $value = $request->pic;
            $filename = Str::random().time() . '.' . $value->getClientOriginalExtension();
            $value->move(public_path('images/app/news/'), $filename);
            $img = $filename;
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
