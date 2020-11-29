<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
class Products extends Model
{
    protected $table = "products";
    protected $primaryKey = "id_product";
    public $timestamps = true;

    public function count() {
        return DB::table('products')->count();
    }

    public function getAll() {
        $products = DB::table('products')
            ->join('categories','products.id_cat','=','categories.id_cat')
            ->join('brands','products.id_brand','=','brands.id_brand')
            ->select('products.*','categories.name_cat', 'brands.name_brand')
            ->orderBy('id_product','DESC')
            ->get();
        foreach ($products as $item) {
            $item->size = DB::table('product_size as pz')
                ->join('size as s','pz.id_size','s.id_size')
                ->where('pz.id_product',$item->id_product)
                ->select('pz.*','s.size')
                ->get();
        }
        return $products;
    }

    public function list(Request $request){
        $products = DB::table('products as pd');

        if($request->options == null || $request->options == 1){
            $products->orderBy('id_product','DESC');
        }

        if($request->options == 2){
            $products->orderBy('price', 'ASC');
        }

        if($request->options == 3){
            $products->orderBy('price', 'DESC');
        }

        return $products
            ->join('categories as c','pd.id_cat','c.id_cat')
            ->select('pd.*','c.name_cat')
            ->paginate(16);
    }

    public function search(Request $request){
        $products = DB::table('products as pd');

        if($request->keyword){
            $products->where('name_product', 'like', '%' . $request->keyword . '%');
        }

        if($request->category){
            $products->where('id_cat', $request->category);
        }

        if($request->brand){
            $products->where('id_brand', $request->brand);
        }

        if($request->options == null || $request->options == 1){
            $products->orderBy('id_product','DESC');
        }

        if($request->options == 2){
            $products->orderBy('price', 'ASC');
        }

        if($request->options == 3){
            $products->orderBy('price', 'DESC');
        }

        return $products
            ->paginate(16);
    }

    public function add($arAdd) {
        $product = new Products();
        $product->name_product  =   $arAdd['name_product'];
        $product->slug_product  =   $arAdd['slug_product'];
        $product->qty           =   $arAdd['qty'];
        $product->price         =   $arAdd['price'];
        $product->sale          =   $arAdd['sale'];
        $product->preview       =   $arAdd['preview'];
        $product->description   =   $arAdd['description'];
        $product->images        =   $arAdd['images'];
        $product->id_cat        =   $arAdd['id_cat'];
        $product->id_brand        =   $arAdd['id_brand'];
        $product->save();
        return $product->id_product;
    }
    public function getId($id) {
        return Products::find($id);
    }
    public function check($object) {
        $result = Products::where('name_product','like',$object)->get();
        return $result->count();
    }
    public function del($id) {
        $del = $this->getId($id);
        $images = json_decode($del->images);
        if ( $images!=null ) {
            foreach ($images as $value) {
                Storage::delete('products/'.$value);
            }
        }
        return $del->delete();
    }
    public function edit($id,$arEdit) {
        $object = $this->getId($id);
        $object->name_product = $arEdit['name_product'];
        $object->slug_product  = $arEdit['slug_product'];
        $object->qty = $arEdit['qty'];
        $object->price = $arEdit['price'];
        $object->sale   = $arEdit['sale'];
        $object->preview = $arEdit['preview'];
        $object->description = $arEdit['description'];
        $object->images = $arEdit['images'];
        $object->id_cat = $arEdit['id_cat'];
        $object->id_brand = $arEdit['id_brand'];
        return $object->update();
    }
    public function updateQty($qty,$id) {
        $update = $this->getId($id);
        $update->qty = $qty;
        return $update->update();
    }
    public function getProductNews() {
        return DB::table('products as pd')
            ->join('categories as c','pd.id_cat','c.id_cat')
            ->select('pd.*','c.name_cat')
            ->orderBy('id_product','ASC')
            ->where('sale',0)
            ->limit(6)
            ->get();
    }
    public function getSlugPro($slug) {
        return DB::table('products as p')
            ->where('slug_product',$slug)
            ->first();
    }
    public function getSale() {
        return DB::table('products as pd')
            ->join('categories as c','pd.id_cat','c.id_cat')
            ->select('pd.*','c.name_cat')
            ->where('sale','!=',0)
            ->limit(8)
            ->orderBy('sale','ASC')
            ->get();
    }
    public function getProD() {
        return DB::table('products as pd')
            ->join('categories as c','pd.id_cat','c.id_cat')
            ->select('pd.*','c.name_cat')
            ->where('pd.id_cat',118)
            ->limit(8)
            ->orderBy('id_product','ASC')
            ->get();
    }
    public function getProductNewsV2() {
        return DB::table('products')
            ->orderBy('id_product','DESC')
            ->limit(8)
            ->get();
    }
    public function getProductCat($id, Request $request) {
        $products = DB::table('products')
            ->where('id_cat',$id);
            if($request->options == null || $request->options == 1){
                $products->orderBy('id_product','DESC');
            }

            if($request->options == 2){
                $products->orderBy('price', 'ASC');
            }

            if($request->options == 3){
                $products->orderBy('price', 'DESC');
            }
            return $products
            ->paginate(12);
    }

    public function getProductBrand($id, Request $request){
        $products = DB::table('products')
            ->where('id_brand',$id);
            if($request->options == null || $request->options == 1){
                $products->orderBy('id_product','DESC');
            }

            if($request->options == 2){
                $products->orderBy('price', 'ASC');
            }

            if($request->options == 3){
                $products->orderBy('price', 'DESC');
            }
            return $products
            ->paginate(12);
    }

    public function getChart() {
        return DB::table('products')
            ->orderBy('hot_pay','DESC')
            ->limit(10)
            ->select('name_product as name','hot_pay as y')
            ->get();
    }
    public function selling() {
        return DB::table('products')
            ->orderBy('hot_pay','DESC')
            ->limit(8)
            ->get();
    }
    public function newProduct() {
        return DB::table('products')
            ->orderBy('id_product','DESC')
            ->limit(10)
            ->get();
    }
    public function proSameType($object) {
        return DB::table('products')
            ->where('id_cat',$object->id_cat)
            ->where('id_product','!=',$object->id_product)
            ->limit(4)
            ->get();
    }
    public function random() {
        return Products::inRandomOrder()->limit(3)->get();
    }
    public function updateRating($id,$qty) {
        $object = $this->getId($id);
        $object->pro_rating = $qty;
        $object->update();
    }
}
