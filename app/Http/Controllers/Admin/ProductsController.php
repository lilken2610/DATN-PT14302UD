<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddProRequest;
use App\Model\Admin\Categories;
use App\Model\Admin\Products;
use App\Model\Admin\ProductSize;
use App\Model\Admin\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
class ProductsController extends Controller
{
    public function __construct(Categories $categories,Products $products,Size $size,ProductSize $productSize) {
        $this->Categories = $categories;
        $this->Products   = $products;
        $this->Size       = $size;
        $this->ProductSize= $productSize;
    }

    public function index() {
        $arProducts = $this->Products->getAll();
        return view('admin.products.index',compact('arProducts'));
    }
    //add
    public function add() {
        $optionNameCat = $this->Categories->getCategories();
        $allCat = $this->Categories->getAll();
        $size   = $this->Size->getAll();
        return view('admin.products.add',compact('optionNameCat','allCat','size'));
    }
    public function postAdd(AddProRequest $request) {
        $image  = '';
        if($request->hasFile('img')) {
            $files = $request->img;
            foreach ($files as $key => $value) {
                $filePath = $value->store('products');
                $value->move(public_path('images/app/products/'),$value->getClientOriginalName());
                // $arFile = explode("/",$filePath);
                // $nameImg = end($arFile);
                $dataImg[$key] = $value->getClientOriginalName(); 
            }
            $image = json_encode($dataImg);
        }
        $arAdd = [
            'name_product'  => $request->nameproduct,
            'qty'           => 0,
            'price'         => $request->price,
            'sale'          => $request->sale,
            'preview'       => $request->preview,
            'description'   => $request->detail,
            'images'        => $image,
            'id_cat'        => $request->idcat
        ];
        $id_product = $this->Products->add($arAdd);
        //size
        $arSize = $request->input('ch_name');
        $totalQty = 0;
        foreach ($arSize as $key => $size){
            $class = 'qty'.$size;
            $qtySize = $request->$class;
            $proSize[$key]['id_product'] = $id_product;
            $proSize[$key]['id_size']    = $size;
            $proSize[$key]['qty']        = $qtySize;
            $addProSize = $this->ProductSize->add($proSize[$key]);
            $totalQty+=$qtySize;
        }
        $updateQty = $this->Products->updateQty($totalQty,$id_product);
        if ( $updateQty == 1 ) {
            return redirect()->route('shoes.products.index')->with('msg', 'Thêm thành công !');
        }else {
            return redirect()->route('shoes.products.index')->with('error', 'Có lỗi xảy ra !');
        }

    }
    //del
    public function del($id) {
        $delSize = $this->ProductSize->delIdPro($id);
        $result = $this->Products->del($id);
        if ( $result==1 ) {
            return redirect()->route('shoes.products.index')->with('msg', 'Xóa thành công !');
        }else {
            return redirect()->route('shoes.products.index')->with('error', 'Có lỗi xảy ra !');
        }
    }
    //edit
    public function edit($id) {
        $object = $this->Products->getId($id);
        $optionNameCat = $this->Categories->getCategories();
        $allCat = $this->Categories->getAll();
        $size   = $this->Size->getAll();
        $activeSize = $this->ProductSize->getSizePro($id);
        return view('admin.products.edit',compact('object','optionNameCat','allCat','size','activeSize'));
    }
    public function postEdit($id,Request $request) {
        $images = $this->Products->getId($id)->images;
        if($request->hasFile('imgedit')) {

            //delete file
            $object = json_decode($images);
            foreach ($object as $item) {
                // Storage::delete('products/'.$item);
                $filename = public_path("images/app/products/$item");
                File::delete($filename);
            }

            //add file
            $files = $request->imgedit;
            foreach ($files as $key => $value) {
                $value->move(public_path('images/app/products/'),$value->getClientOriginalName());
                $dataImg[$key] = $value->getClientOriginalName(); 
            }
            $images = json_encode($dataImg);
        }
        $arEdit = [
            'name_product'  => $request->nameproduct,
            'qty'           => 0,
            'price'         => $request->price,
            'sale'         => $request->sale,
            'preview'       => $request->preview,
            'description'   => $request->detail,
            'images'           => $images,
            'id_cat'        => $request->idcat
        ];
        $arSizeUpdate = $this->ProductSize->getSizePro($id);
        foreach ($arSizeUpdate as $key => $item) {
            $class = 'qty'.$item->id_size;
            $qty   = $request->$class;
            $arQty[$key]['qty'] = $qty;
            $arQty[$key]['id_size'] = $item->id_size;
        }
        $this->Products->edit($id,$arEdit);
        $qtyProduct = $this->ProductSize->updateSize($id,$arQty);
        $result = $this->Products->updateQty($qtyProduct,$id);
        if ( $result==1 ) {
            return redirect()->route('shoes.products.index')->with('msg', 'Cập nhập thành công !');
        }else {
            return redirect()->route('shoes.products.index')->with('error', 'Có lỗi xảy ra !');
        }

    }
}
