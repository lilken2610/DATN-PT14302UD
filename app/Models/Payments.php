<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Payments extends Model
{
    protected $table = "payments";
    protected $primaryKey = "id";
    public $timestamps = false;
    protected $fillable = [
        'id', 'order_id', 'thanh_vien','money','note', 'vnp_response_code','code_vnpay', 'code_bank','time',
    ];
    public function getPay() {
        return Payments::all();
    }
    public function getPayAll()
    {
        $object = DB::table('payments')
            ->join('users', 'users.id', 'payments.thanh_vien')
           -> orderBy('payments.id', 'DESC')
            ->select('payments.*','users.fullname as username')
            ->get();

        return $object;
    }
    public function getAll() {
        return Payments::orderBy('id', 'DESC')->get();
    }
}
