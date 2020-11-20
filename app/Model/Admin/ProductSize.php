<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProductSize extends Model
{
    protected $table = "product_size";
    protected $primaryKey = "id_product";
    public $timestamps = false;

    public function add($arAdd) {
        return ProductSize::insert($arAdd);
    }
    public function getAll() {
        return DB::table('product_size')
            ->join('size','size.id_size','product_size.id_size')
            ->select('product_size.*','size.size')
            ->get();
    }
    public function delIdPro($id) {
        return $object = DB::table('product_size')->where('id_product',$id)->delete();
    }
    public function getSizePro($idPro) {
        return DB::table('product_size')
            ->where('id_product',$idPro)
            ->join('size','size.id_size','product_size.id_size')
            ->select('product_size.*','size.size')
            ->get();
    }
    public function updateSize($idPro,$arQty) {
        $totalQty = 0;
        foreach ($arQty as $key => $value) {
            $totalQty += $value['qty'];
            $object[$key] = DB::table('product_size')
                ->where('id_product',$idPro)
                ->where('id_size',$value['id_size'])
                ->update(['qty' => $value['qty'] ]);
        }
        return $totalQty;
    }
    public function getProductPb ($id) {
        return DB::table('product_size')
            ->join('size','size.id_size','product_size.id_size')
            ->where('id_product',$id)
            ->select('product_size.*','size.size','size.id_size as idsize')
            ->get();
    }
}
