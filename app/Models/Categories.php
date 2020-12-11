<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Categories extends Model
{
    protected $table = "categories";
    protected $primaryKey = "id_cat";
    public $timestamps = true;
    protected $fillable = [
        'id_cat', 'name_cat', 'slug_cat','created_at','updated_at',
    ];

    public function setUpdatedAt($value)
    {
        return $this;
    }

    public function getId($id) {
        return Categories::find($id);
    }

    public function getIdById($slug) {
        return Categories::where('slug_cat', $slug);
    }

    public function getAll() {
        return Categories::orderBy('id_cat', 'DESC')->get();
    }
    //add categories
    public function addCat ($arAdd) {
        return Categories::insert($arAdd);
    }
    //delete
    public function delId($id) {
        $result = Categories::find($id);
        return $result->delete();
    }
    //edit
    public function edit($arEdit,$id) {
        $object = $this->getId($id);
        $object->name_cat = $arEdit['name_cat'];
        $object->slug_cat = $arEdit['slug_cat'];
        return $object->update();
    }
}
