<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Products;
use App\Models\Transaction;
use App\Models\User;

class IndexController extends Controller
{
    public function __construct(Products $products,News $news,Transaction $transaction,User $user)
    {
        $this->Products = $products;
        $this->News = $news;
        $this->Transaction = $transaction;
        $this->User = $user;
    }

    public function index() {
        $arCount = [
            'product' => $this->Products->count(),
            'new'     => $this->News->count(),
            'order'   => $this->Transaction->count(),
            'user'    => $this->User->count()
        ];
        return view('admin.index',compact('arCount'));
    }
}
