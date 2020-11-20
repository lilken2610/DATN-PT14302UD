<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TransactionDetail extends Model
{
    protected $table = "transaction_detail";
    protected $primaryKey = "id_transaction_dt";
    public $timestamps = true;

    public function add($arAdd) {
        return TransactionDetail::insert($arAdd);
    }
    public function getTransactionDt($id) {
        return DB::table('transaction_detail as td')
            ->where('id_transaction', $id)
            ->join('products as pd','td.id_product','pd.id_product')
            ->select('td.*','td.qty as qtyTr','td.createad_at as dayTr','pd.*','pd.qty as qtProduct')
            ->get();
    }
}
