<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Size extends Model
{
    protected $table = "size";
    protected $primaryKey = "id_size";
    public $timestamps = false;

    public function getAll() {
        return Size::all();
    }
    public function add($arAdd) {
        return Size::insert($arAdd);
    }
    public function getSize() {
        $getSize = $this->getAll();
        foreach ($getSize as $value) {
            $object = DB::table('product_size')->where('id_size',$value->id_size)->sum('qty');
            $value->sum = $object;
        }
        return $getSize;
    }
    public function del($id) {
        $object = Size::find($id);
        return $object->delete();
    }
}
