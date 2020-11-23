<?php

namespace App\Http\Controllers\Shoes;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Model\Admin\Categories;
use App\Model\Admin\Brands;
use App\Model\Admin\Contact;
use App\Model\Admin\GiftCode;
use App\Model\Admin\News;
use App\Model\Admin\Pay;
use App\Model\Admin\Products;
use App\Model\Admin\ProductSize;
use App\Model\Admin\Rating;
use App\Model\Admin\Slide;
use App\Model\Admin\Transaction;
use App\Model\Admin\TransactionDetail;
use App\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class IndexController extends Controller
{
    public function __construct(Products $products,ProductSize $productSize,Categories $categories,Brands $brands,Slide $slide,User $user,Transaction $transaction,TransactionDetail $transactionDetail,News $news,GiftCode $giftCode,Pay $pay,Rating $rating,Contact $contact)
    {
        $this->Products = $products;
        $this->ProductSize = $productSize;
        $this->Categories = $categories;
        $this->Brands = $brands;
        $this->Slide = $slide;
        $this->User = $user;
        $this->Transaction = $transaction;
        $this->TransactionDetail = $transactionDetail;
        $this->News = $news;
        $this->GiftCode = $giftCode;
        $this->Pay = $pay;
        $this->Rating = $rating;
        $this->Contact = $contact;
    }

    public function index() {
        $arIndex = [
            'randomPro'   => $this->Products->random(),
            'productNews' => $this->Products->getProductNews(),
            'sale'        => $this->Products->getSale(),
            'accessories' => $this->Products->getProD(),
            'slide'       => $this->Slide->getSlide(),
            'product_selling'    => $this->Products->selling(),
            'new_produts'  => $this->Products->getProductNewsV2(),
        ];
    	return view('shoes.index',compact('arIndex'));
    }

    public function list(Request $request){
        $arProductBar = [
            'noibat' => $this->Products->getProductNews(),
            'muanhieu' => $this->Products->selling()
        ];
        $listProducts = $this->Products->list($request);
        $option = $request->options;

        return view('shoes.page.listProducts',compact('listProducts','arProductBar', 'option'));
    }

    public function search(Request $request){
        $arProductBar = [
            'noibat' => $this->Products->getProductNews(),
            'muanhieu' => $this->Products->selling()
        ];
        $resultSearch = $this->Products->search($request);
        $keyword = $request->keyword;
        $option = $request->options;

        return view('shoes.page.search',compact('resultSearch','arProductBar', 'keyword', 'option'));
    }

    public function categories($slug) {
        $cat = $this->Categories->getIdById($slug)->get()->first();
        $idCat = $cat->id_cat;
        $nameCat = $cat->name_cat;
        $getProductCat = $this->Products->getProductCat($idCat);
        $arProductBar = [
            'noibat' => $this->Products->getProductNews(),
            'muanhieu' => $this->Products->selling()
        ];
        return view('shoes.page.categories',compact('getProductCat','nameCat','arProductBar'));
    }

    public function brands($slug){
        $brand = $this->Brands->getIdById($slug)->get()->first();
        $idBrand = $brand->id_brand;
        $nameBrand = $brand->name_brand;
        $getProductBrand = $this->Products->getProductBrand($idBrand);
        $arProductBar = [
            'noibat' => $this->Products->getProductNews(),
            'muanhieu' => $this->Products->selling()
        ];
        return view('shoes.page.brands',compact('getProductBrand','nameBrand','arProductBar'));
    }

    public function product($slug) {
        $object = $this->Products->getSlugPro($slug);
        $getId = $object->id_product;
        $getSize = $this->ProductSize->getProductPb($getId);
        $proSameType = $this->Products->proSameType($object);
        $rating = $this->Rating->getRating($getId);
        return view('shoes.page.product',compact('object','getSize','proSameType','rating'));
    }
    public function updateInfo(Request $request) {
        $arInfo = [
            'fullname'  => $request->fullname,
            'address'   => $request->address,
            'phone'     => $request->phone,
            'email'     => $request->email,
            'username'  => Auth::user()->username,
            'password'  => Auth::user()->password,
            'id_level'  => Auth::user()->id_level
        ];
        $result = $this->User->edit(Auth::id(),$arInfo);
        if ( $result==1 ) {
            return redirect()->back()->with('msg','Cập nhập thành công');
        }else {
            return redirect()->back()->with('error','Có lỗi xảy ra');
        }
    }
    public function pay() {
        if ( Auth::check() ) {
            if ( Auth::user()->active != 0 ) {
                $order_pays = $this->Pay->getPay();
                return view('shoes.page.pay',compact('order_pays'));
            }else {
                return '<script>alert("Tài khoản của bạn chưa được kích hoạt, vui lòng kích hoạt để sử dụng chức năng này");window.location.href="/kich-hoat-tai-khoan/'.Auth::id().'"</script>';
            }
        }else {
            return redirect()->route('shoes.shopping.index');
        }
    }
    public function postPay() {
        if ( Request()->ajax() ) {
            $id_pay = Request()->get('id_pay');

            $arrTotal = explode(',', Cart::initial(0) );
            $total = implode($arrTotal);
            $arTax  = explode(',', Cart::tax(0));
            $tax = implode($arTax);
            $arDiscount = explode(',', Cart::discount(0) );
            $discount = implode($arDiscount);

            $arTransaction = [
                'totalPrice'     => $total,
                'tax'       => $tax,
                'discount'  => $discount,
                'id_pay'    => $id_pay,
                'id_user'   => Auth::id()
            ];
            $id_transaction = $this->Transaction->add($arTransaction);
            if ( isset($id_transaction) ) {
                foreach ( Cart::content() as $key => $item ) {
                    $arPrice = explode(',', $item->priceTotal );
                    $priceTotal = implode($arPrice);

                    $arTrDetail[$key]['qty'] = $item->qty;
                    $arTrDetail[$key]['size'] = $item->options->size;
                    $arTrDetail[$key]['totalproduct'] = $priceTotal;
                    $arTrDetail[$key]['id_transaction'] = $id_transaction;
                    $arTrDetail[$key]['id_product'] = $item->id;

                    $this->TransactionDetail->add( $arTrDetail[$key] );
                }
                Cart::destroy();
                return 1;
            }
        }
    }
    public function giftCode() {
        if ( Request()->ajax() ) {
            $gift = Request()->get('gift');
            $result = $this->GiftCode->getGiftOrder($gift);
            $count = $result->count();
            if ( $count > 0 ) {
                $this->GiftCode->updateQty( $result->first()->id_code );
                Cart::setGlobalDiscount( $result->first()->value );
                $arReturn = [
                    'discount' => Cart::discount(0),
                    'total'    => Cart::total(),
                    'value'    => $gift
                ];
                return json_encode($arReturn);
            }else {
                return 0;
            }
        }
    }
    public function contact() {
        return view('shoes.page.contact');
    }
    public function postContact(ContactRequest $request) {
        $arContact = [
            'fullname' => $request->fullname,
            'email'     => $request->email,
            'title'     => $request->title,
            'content'   => $request->content,
            'phone'     => $request->phone
        ];
        $result = $this->Contact->add($arContact);
        if ( $result==1 ) {
            return '<script>alert("Cảm ơn bạn đã gởi phản hồi cho chúng tôi");window.location.href="/"</script>';
        }
    }
    public function news() {
        $arNew = [
            'news' => $this->News->arNews(),
            'hot_news' => $this->News->hotNews()
        ];
        return view('shoes.page.news',compact('arNew'));
    }
    public function newDetail($slug,$id) {
        $arrayId = explode('-',$id);
        $getId = end($arrayId);
        $object = $this->News->getId($getId);
        $newOk = $this->News->newsOk($getId);
        return view('shoes.page.newDetail',compact('object','newOk'));
    }
}
