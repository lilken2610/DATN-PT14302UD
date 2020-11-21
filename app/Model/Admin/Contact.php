<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = "contact";
    protected $primaryKey = "id_contact";
    public $timestamps = true;

    public function getId($id) {
        return Contact::find($id);
    }
    public function del($id) {
        $object = $this->getId($id);
        return $object->delete();
    }
    public function getContact() {
        return Contact::all();
    }
    public function add($arAdd) {
        return Contact::insert($arAdd);
    }
}
