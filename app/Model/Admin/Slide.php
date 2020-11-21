<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Slide extends Model
{
    protected $table = "slide";
    protected $primaryKey = "id_slide";
    public $timestamps = false;

    public function getId($id) {
        return Slide::find($id);
    }
    public function add($arAdd) {
        return Slide::insert($arAdd);
    }
    public function getSlide() {
        return DB::table('slide')->orderBy('id_slide','DESC')->get();
    }
    public function del($id) {
        $object = $this->getId($id);
        Storage::delete('slide/'.$object->img);
        return $object->delete();
    }
    public function edit($id,$arEdit) {
        $object = $this->getId($id);
        $object->title = $arEdit['title'];
        $object->content = $arEdit['content'];
        $object->position_text = $arEdit['position_text'];
        $object->img = $arEdit['img'];
        return $object->update();
    }
}
