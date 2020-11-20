<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Categories extends Model
{
    protected $table = "categories";
    protected $primaryKey = "id_cat";
    public $timestamps = true;
    protected $fillable = [
        'id_cat', 'name_cat', 'parent_id', 'status','created_at','updated_at',
    ];

    public function setUpdatedAt($value)
    {
        return $this;
    }

    public function getId($id) {
        return Categories::find($id);
    }
    public function getAll() {
        return Categories::all();
    }
    //select id_sub = 0
    public function getCategories() {
        return Categories::where('parent_id',0)->get();
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
    public function getParentId($id) {
        return Categories::where('parent_id',$id)->get();
    }
    //edit
    public function edit($arEdit,$id) {
        $object = $this->getId($id);
        $object->name_cat = $arEdit['name_cat'];
        $object->parent_id = $arEdit['parent_id'];
        return $object->update();
    }
    //status
    public function status($id) {
        $object = $this->getId($id);
        if ( $object->status == 1 ) {
            $object->status = 0;
            return $object->update();
        }else if ( $object->status == 0 ) {
            $object->status = 1;
            return $object->update();
        }
    }
}
