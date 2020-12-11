<?php

namespace App\Http\Controllers\Admin;

use App\Models\Products;
use App\Models\Transaction;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatisticsController extends Controller
{
    public function __construct(Transaction $transaction,Products $products,User $user)
    {
        $this->Transaction = $transaction;
        $this->Products  = $products;
        $this->User = $user;
    }

    public function index($year) {
        $arResult = [
            'year'  => $this->Transaction->year(),
            'chart' => json_encode($this->Transaction->charts($year)),
            'product' => json_encode($this->Products->getChart()),
            'user' => $this->User->getStatis()
        ];
        return view('admin.statistics.index',compact('arResult','year'));
    }
}
