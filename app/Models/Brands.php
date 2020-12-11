<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Brands extends Model
{
    protected $table = "brands";
    protected $primaryKey = "id_brand";
    public $timestamps = true;
    protected $fillable = [
        'id_brand', 'name_brand', 'slug_brand','created_at','updated_at',
    ];

    public function setUpdatedAt($value)
    {
        return $this;
    }

    public function getId($id) {
        return Brands::find($id);
    }

    public function getIdById($slug) {
        return Brands::where('slug_brand', $slug);
    }

    public function getAll() {
        return Brands::orderBy('id_brand', 'DESC')->get();
    }
    //add Brands
    public function addBrand ($arAdd) {
        return Brands::insert($arAdd);
    }
    //delete
    public function delId($id) {
        $result = Brands::find($id);
        return $result->delete();
    }
    //edit
    public function edit($arEdit,$id) {
        $object = $this->getId($id);
        $object->name_brand = $arEdit['name_brand'];
        $object->slug_brand = $arEdit['slug_brand'];
        return $object->update();
    }
}
