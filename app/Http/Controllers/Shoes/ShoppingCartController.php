<?php

namespace App\Http\Controllers\Shoes;

use App\Http\Requests\Shoes\ProductRequest;
use App\Model\Admin\Products;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShoppingCartController extends Controller
{
    public function __construct(Products $products)
    {
        $this->Products = $products;
    }

    public function index() {
        $cart = Cart::content();
        return view('shoes.page.cart',compact('cart'));
    }
    public function add($id,ProductRequest $request) {
        $objectProduct = $this->Products->getId($id);
        $price = $objectProduct->price * (100 - $objectProduct->sale)/100;
        $images = json_decode($objectProduct->images);
        $cart = Cart::add(
            [
                'id'    => $id,
                'name'  => $objectProduct->name_product,
                'qty'   => $request->qty,
                'price' => $price,
                'weight'=> 0,
                'tax'   => 2,
                'options' => [
                    'image'     => reset($images),
                    'price_old' => $objectProduct->price,
                    'size'      => $request->size
                ]
            ]
        );
        return redirect()->route('shoes.shopping.index')->with('msg','Thêm sản phẩm vào giỏ hàng thành công');
    }
    public function del($id) {
        Cart::remove($id);
        return redirect()->back()->with('msg','Xóa thành công');
    }
    public function update() {
        if ( Request()->ajax() ) {
            $rowId = Request()->get('rowid');
            $qty   = Request()->get('qty');
            Cart::update($rowId,$qty);
            $object = [
                'priceId'       => Cart::get($rowId)->priceTotal(0),
                'priceTotal'    => Cart::priceTotal(0),
                'tax'           => Cart::tax(0),
                'total'         => Cart::total(0)
            ];
            return json_encode($object);
        }
    }
}
