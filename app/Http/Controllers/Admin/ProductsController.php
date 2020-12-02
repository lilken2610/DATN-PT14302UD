<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddProRequest;
use App\Model\Admin\Categories;
use App\Model\Admin\Brands;
use App\Model\Admin\Products;
use App\Model\Admin\ProductSize;
use App\Model\Admin\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
class ProductsController extends Controller
{
    public function __construct(Categories $categories,Brands $brands, Products $products,Size $size,ProductSize $productSize) {
        $this->Categories = $categories;
        $this->Brands = $brands;
        $this->Products   = $products;
        $this->Size       = $size;
        $this->ProductSize= $productSize;
    }

    public function index(Request $request) {
        $arProducts = $this->Products->getAll($request);
        $keyword = $request->keyword;
        $category = $request->category;
        $brand = $request->brand;
        return view('admin.products.index',compact('arProducts', 'keyword', 'category', 'brand'));
    }
    //add
    public function add() {
        $allCat = $this->Categories->getAll();
        $allBrand = $this->Brands->getAll();
        $size   = $this->Size->getAll();
        return view('admin.products.add',compact('allCat', 'allBrand','size'));
    }
    public function postAdd(AddProRequest $request) {
        $image  = '';
        if($request->hasFile('img')) {
            $files = $request->img;
            foreach ($files as $key => $value) {
                $filename = Str::random().time() . '.' . $value->getClientOriginalExtension();
                $value->move(public_path('images/app/products/'), $filename);
                $dataImg[$key] = $filename;
            }
            $image = json_encode($dataImg);
        }
        $arAdd = [
            'name_product'  => $request->nameproduct,
            'slug_product'  => Str::slug($request->nameproduct.'-'.time()),
            'qty'           => 0,
            'price'         => $request->price,
            'sale'          => $request->sale,
            'preview'       => $request->preview,
            'description'   => $request->detail,
            'images'        => $image,
            'id_cat'        => $request->idcat,
            'id_brand'        => $request->idbrand
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
        $allCat = $this->Categories->getAll();
        $allBrand = $this->Brands->getAll();
        $size   = $this->Size->getAll();
        $activeSize = $this->ProductSize->getSizePro($id);
        return view('admin.products.edit',compact('object','allCat','allBrand','size','activeSize'));
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
                $filename = Str::random().time() . '.' . $value->getClientOriginalExtension();
                $value->move(public_path('images/app/products/'),$filename);
                $dataImg[$key] = $filename;
            }
            $images = json_encode($dataImg);
        }
        $arEdit = [
            'name_product'  => $request->nameproduct,
            'slug_product'  => Str::slug($request->nameproduct.'-'.time()),
            'qty'           => 0,
            'price'         => $request->price,
            'sale'         => $request->sale,
            'preview'       => $request->preview,
            'description'   => $request->detail,
            'images'           => $images,
            'id_cat'        => $request->idcat,
            'id_brand'        => $request->idbrand
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
