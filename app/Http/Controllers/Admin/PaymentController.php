<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddBrandRequest;
use App\Model\Admin\Payments;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public function __construct(Payments $payments) {
        $this->Payments = $payments;
    }
    public  function index() {
        $allPayment = $this->Payments->getAll();
        return view('admin.payments.index',compact('allPayment'));
    }

}
