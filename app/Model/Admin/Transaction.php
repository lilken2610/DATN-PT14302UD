<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Transaction extends Model
{
    protected $table = "transaction";
    protected $primaryKey = "id_transaction";
    public $timestamps = true;

    public function add($arAdd) {
        $object = new Transaction();
        $object->totalPrice   = $arAdd['totalPrice'];
        $object->tax   = $arAdd['tax'];
        $object->discount   = $arAdd['discount'];
        $object->id_pay   = $arAdd['id_pay'];
        $object->id_user = $arAdd['id_user'];
        $object->status  = -1;
        $object->save();
        return $object->id_transaction;
    }
    public function getTransaction () {
       return DB::table('transaction')
        ->join('users','users.id','transaction.id_user')->orderBy('id_transaction','DESC')
        ->select('transaction.*','users.*')->get();
    }
    public function getBill($id) {
        $object = DB::table('transaction')
            ->join('users','users.id','transaction.id_user')
            ->where('id_transaction',$id)
            ->get();
        foreach ( $object as $key => $value ) {
            $value->detail = DB::table('transaction_detail as td')
                ->where('id_transaction', $value->id_transaction)
                ->join('products as pd','td.id_product','pd.id_product')
                ->select('td.*','td.qty as qtyTr','td.createad_at as dayTr','pd.*','pd.qty as qtProduct')
                ->get();
        }
        return $object;
    }
    public function del($id) {
        $object = Transaction::find($id);
        $transactionDt = DB::table('transaction_detail')->where('id_transaction',$object->id_transaction)->delete();
        return $object->delete();
    }
    public function count() {
        return DB::table('transaction')->count();
    }
    public function charts($year) {
        return DB::table('transaction')
            ->where('status',1)
            ->whereYear('created_at',$year)
            ->select(DB::raw('month(created_at) as name'),DB::raw('cast(sum(totalPrice) as int) as y'),DB::raw('count(*) as qty'))
            ->groupBy('name')
            ->orderBy('name', 'ASC')
            ->get();
    }
    public function year() {
        return DB::table('transaction')
            ->select(DB::raw('year(created_at) as year'))
            ->groupBy('year')
            ->get();
    }
    public function getId($id) {
        return Transaction::find($id);
    }
    public function updateQtyTransaction($id) {
        $object = $this->getBill($id)->first();
        foreach ( $object->detail as $item ) {
            $objectSize = DB::table('product_size')
                ->where('id_product',$item->id_product)
                ->where('id_size',$item->size)
                ->select('product_size.*','product_size.qty as qtySizPro')
                ->first();
            $qty = $objectSize->qtySizPro;
            $updateQty = $qty - $item->qtyTr;
            DB::table('product_size')
                ->where('id_product',$item->id_product)
                ->where('id_size',$item->size)
                ->update(array('qty' =>$updateQty) );
            $product = Products::find($item->id_product);
            $product->qty = $product->qty - $item->qtyTr;
            $product->update();
            return 1;
        }
    }
    public function updateButton($id) {
        $object = Transaction::find($id);
        $object->status = 1;
        return $object->update();
    }

}
