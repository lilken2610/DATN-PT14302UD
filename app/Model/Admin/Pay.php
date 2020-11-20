<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pay extends Model
{
    protected $table = "pay";
    protected $primaryKey = "id_pay";
    public $timestamps = false;

    public function getPay() {
        return Pay::all();
    }
}
