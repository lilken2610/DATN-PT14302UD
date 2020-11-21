<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GiftCode extends Model
{
    protected $table = "gift_code";
    protected $primaryKey = "id_code";
    public $timestamps = false;

    public function add($arAdd) {
        return GiftCode::insert($arAdd);
    }
    public function getGift() {
        return DB::table('gift_code')
            ->orderBy('id_code','DESC')
            ->get();
    }
    public function getId($id) {
        return GiftCode::find($id);
    }
    public function del($id) {
        $object = $this->getId($id);
        return $object->delete();
    }
    public function edit($id,$arEdit) {
        $object = $this->getId($id);
        $object->code = $arEdit['code'];
        $object->value = $arEdit['value'];
        $object->qty = $arEdit['qty'];
        $object->created_day = $arEdit['created_day'];
        $object->end_day = $arEdit['end_day'];
        return $object->update();
    }
    public function getGiftOrder($gift) {
        return DB::table('gift_code')
            ->where('status',1)
            ->where('code',$gift)
            ->get();
    }
    public function updateQty($id) {
        $object = $this->getId($id);
        $object->qty = $object->qty - 1;
        $object->update();
    }
}
