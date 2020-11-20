<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\News;
use App\Model\Admin\Products;
use App\Model\Admin\Transaction;
use App\User;

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
