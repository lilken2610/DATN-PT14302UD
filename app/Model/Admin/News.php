<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    protected $table = "news";
    protected $primaryKey = "id_new";
    public $timestamps = true;

    public function count() {
        return DB::table('news')->count();
    }
    public function add($arAdd) {
        return News::insert($arAdd);
    }
    public function getAll() {
        return News::all();
    }
    public function getId($id) {
        return News::find($id);
    }
    public function del($id) {
        $del = $this->getId($id);
        if ( !empty($del->picture) ) {
            Storage::delete('news/'.$del->picture);
        }
        return $del->delete();
    }
    public function edit($id,$arEdit) {
        $object = $this->getId($id);
        $object->title = $arEdit['title'];
        $object->preview = $arEdit['preview'];
        $object->detail = $arEdit['detail'];
        $object->picture = $arEdit['picture'];
        return $object->update();
    }
    public function arNews() {
        return News::all();
    }
    public function hotNews() {
        return DB::table('news')
            ->orderBy('id_new')
            ->limit(5)
            ->get();
    }
    public function newsOk($id) {
        return DB::table('news')
            ->where('id_new','!=',$id)
            ->limit(5)
            ->get();
    }
}
