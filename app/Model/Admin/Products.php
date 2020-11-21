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
            ->select('products.*','categories.name_cat')
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

    public function search(Request $request){
        return DB::table('products as pd')
        ->where('name_product', 'like', '%' . $request->keyword . '%')
            ->join('categories as c','pd.id_cat','c.id_cat')
            ->select('pd.*','c.name_cat')
            ->orderBy('id_product','DESC')
            ->paginate(16);
    }

    public function add($arAdd) {
        $product = new Products();
        $product->name_product  =   $arAdd['name_product'];
        $product->qty           =   $arAdd['qty'];
        $product->price         =   $arAdd['price'];
        $product->sale          =   $arAdd['sale'];
        $product->preview       =   $arAdd['preview'];
        $product->description   =   $arAdd['description'];
        $product->images        =   $arAdd['images'];
        $product->id_cat        =   $arAdd['id_cat'];
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
        $object->qty = $arEdit['qty'];
        $object->price = $arEdit['price'];
        $object->sale   = $arEdit['sale'];
        $object->preview = $arEdit['preview'];
        $object->description = $arEdit['description'];
        $object->images = $arEdit['images'];
        $object->id_cat = $arEdit['id_cat'];
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
            ->limit(8)
            ->get();
    }
    public function getIdPro($id) {
        return DB::table('products as p')
            ->where('id_product',$id)
            ->join('categories as c','p.id_cat','c.id_cat')
            ->select('p.*','c.name_cat')
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
    public function getProductCat($id) {
        return DB::table('products as pd')
            ->join('categories as c','pd.id_cat','c.id_cat')
            ->select('pd.*','c.name_cat')
            ->where('pd.id_cat',$id)
            ->orderBy('id_product','ASC')
            ->get();
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
            ->limit(10)
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
