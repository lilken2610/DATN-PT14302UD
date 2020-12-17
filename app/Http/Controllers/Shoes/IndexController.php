<?php

namespace App\Http\Controllers\Shoes;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Categories;
use App\Models\Brands;
use App\Models\Contact;
use App\Models\GiftCode;
use App\Models\News;
use App\Models\Pay;
use App\Models\Products;
use App\Models\ProductSize;
use App\Models\Rating;
use App\Models\Slide;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class IndexController extends Controller
{
    public function __construct(Products $products, ProductSize $productSize, Categories $categories, Brands $brands, Slide $slide, User $user, Transaction $transaction, TransactionDetail $transactionDetail, News $news, GiftCode $giftCode, Pay $pay, Rating $rating, Contact $contact)
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

    public function index()
    {
        $arIndex = [
            'randomPro'   => $this->Products->random(),
            'productNews' => $this->Products->getProductNews(),
            'sale'        => $this->Products->getSale(),
            'accessories' => $this->Products->getProD(),
            'slide'       => $this->Slide->getSlide(),
            'product_selling'    => $this->Products->selling(),
            'new_produts'  => $this->Products->getProductNewsV2(),
        ];
        return view('shoes.index', compact('arIndex'));
    }

    public function list(Request $request)
    {
        $arProductBar = [
            'noibat' => $this->Products->getProductNews(),
            'muanhieu' => $this->Products->selling()
        ];
        $listProducts = $this->Products->list($request);
        $option = $request->options;
        $minPrice = $request->minPrice;
        $maxPrice = $request->maxPrice;

        return view('shoes.page.listProducts', compact('listProducts', 'arProductBar', 'option', 'minPrice', 'maxPrice'));
    }

    public function sale(Request $request)
    {
        $arProductBar = [
            'noibat' => $this->Products->getProductNews(),
            'muanhieu' => $this->Products->selling()
        ];
        $saleProducts = $this->Products->sale($request);
        $option = $request->options;
        $minPrice = $request->minPrice;
        $maxPrice = $request->maxPrice;

        return view('shoes.page.saleProducts', compact('saleProducts', 'arProductBar', 'option', 'minPrice', 'maxPrice'));
    }

    public function search(Request $request)
    {
        $arProductBar = [
            'noibat' => $this->Products->getProductNews(),
            'muanhieu' => $this->Products->selling()
        ];
        $resultSearch = $this->Products->search($request);
        $keyword = $request->keyword;
        $option = $request->options;
        $category = $request->category;
        $brand = $request->brand;
        $minPrice = $request->minPrice;
        $maxPrice = $request->maxPrice;

        return view('shoes.page.search', compact('resultSearch', 'arProductBar', 'keyword', 'option', 'category', 'brand', 'minPrice', 'maxPrice'));
    }

    public function categories($slug, Request $request)
    {
        $cat = $this->Categories->getIdById($slug)->get()->first();
        $idCat = $cat->id_cat;
        $nameCat = $cat->name_cat;
        $getProductCat = $this->Products->getProductCat($idCat, $request);
        $arProductBar = [
            'noibat' => $this->Products->getProductNews(),
            'muanhieu' => $this->Products->selling()
        ];
        $slug = $slug;
        $option = $request->options;
        $minPrice = $request->minPrice;
        $maxPrice = $request->maxPrice;

        return view('shoes.page.categories', compact('getProductCat', 'nameCat', 'arProductBar', 'slug', 'option', 'minPrice', 'maxPrice'));
    }

    public function brands($slug, Request $request)
    {
        $brand = $this->Brands->getIdById($slug)->get()->first();
        $idBrand = $brand->id_brand;
        $nameBrand = $brand->name_brand;
        $getProductBrand = $this->Products->getProductBrand($idBrand, $request);
        $arProductBar = [
            'noibat' => $this->Products->getProductNews(),
            'muanhieu' => $this->Products->selling()
        ];
        $slug = $slug;
        $option = $request->options;
        $minPrice = $request->minPrice;
        $maxPrice = $request->maxPrice;

        return view('shoes.page.brands', compact('getProductBrand', 'nameBrand', 'arProductBar', 'slug', 'option', 'minPrice', 'maxPrice'));
    }

    public function product($slug)
    {
        $object = $this->Products->getSlugPro($slug);
        $getId = $object->id_product;
        $getSize = $this->ProductSize->getProductPb($getId);
        $proSameType = $this->Products->proSameType($object);
        $rating = $this->Rating->getRating($getId);
        return view('shoes.page.product', compact('object', 'getSize', 'proSameType', 'rating'));
    }
    public function updateInfo(Request $request)
    {
        $arInfo = [
            'fullname'  => $request->fullname,
            'address'   => $request->address,
            'phone'     => $request->phone,
            'email'     => $request->email,
            'username'  => Auth::user()->username,
            'password'  => Auth::user()->password,
            'id_level'  => Auth::user()->id_level
        ];
        $result = $this->User->edit(Auth::id(), $arInfo);
        if ($result == 1) {
            return redirect()->back()->with('msg', 'Cập nhập thành công');
        } else {
            return redirect()->back()->with('error', 'Có lỗi xảy ra');
        }
    }
    public function pay()
    {
        if (Auth::check()) {
            if (Auth::user()->email_code) {
                return '<script>alert("Tài khoản của bạn chưa được kích hoạt, vui lòng kích hoạt để sử dụng chức năng này");window.location.href="/kich-hoat-tai-khoan/' . Auth::id() . '"</script>';
            } else {

                $order_pays = $this->Pay->getPay();

                return view('shoes.page.pay', compact('order_pays'));
            }
        } else {
            return redirect()->route('shoes.shopping.index');
        }
    }
    public function postPay()
    {
        if (Request()->ajax()) {
            $id_pay = Request()->get('id_pay');
            $arrTotal = explode(',', Cart::initial(0));
            $total = implode($arrTotal);
            $arTax  = explode(',', Cart::tax(0));
            $tax = implode($arTax);
            $arDiscount = explode(',', Cart::discount(0));
            $discount = implode($arDiscount);
            $status = -1;
            $arTransaction = [
                'totalPrice'     => $total,
                'tax'       => $tax,
                'discount'  => $discount,
                'id_pay'    => $id_pay,
                'id_user'   => Auth::id(),
                'status'   => $status
            ];
            $id_transaction = $this->Transaction->add($arTransaction);
            if (isset($id_transaction)) {
                foreach (Cart::content() as $key => $item) {
                    $arPrice = explode(',', $item->priceTotal);
                    $priceTotal = implode($arPrice);

                    $arTrDetail[$key]['qty'] = $item->qty;
                    $arTrDetail[$key]['size'] = $item->options->size;
                    $arTrDetail[$key]['totalproduct'] = $priceTotal;
                    $arTrDetail[$key]['id_transaction'] = $id_transaction;
                    $arTrDetail[$key]['id_product'] = $item->id;

                    $this->TransactionDetail->add($arTrDetail[$key]);
                }
                Cart::destroy();
                return 1;
            }
        }
    }
    public function postPayment(Request $request)
    {

        // session(['url_prev' => url()->previous()]);
        $vnp_TmnCode = env('vnp_TmnCode'); //Mã website tại VNPAY 
        $vnp_HashSecret = env('vnp_HashSecret'); //Chuỗi bí mật
        $vnp_Url = env('vnp_Url');
        $vnp_Returnurl = env('vnp_Returnurl');
        $vnp_TxnRef = $request->order_id; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = $request->order_desc;
        $vnp_Amount = str_replace(',', '', $request->amount) * 100;
        $vnp_Locale = $request->language;
        $vnp_BankCode = $request->bank_code;

        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        $inputData = array(
            "vnp_Version" => "2.0.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_ReturnUrl" =>  $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );
        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . $key . "=" . $value;
            } else {
                $hashdata .= $key . "=" . $value;
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
            $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
            $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
        }
        return redirect($vnp_Url);
    }
    public function xulyVnpay(Request $request)
    {
        $object = $this->Transaction->getBill($request->vnp_TxnRef)->first();
        if (
            !isset($object->id_transaction) || $object->id_user != Auth::id() || $object->status == 1
            || $object->id_transaction != $request->vnp_TxnRef
            || $object->id_transaction == null
        ) {
            return redirect()->route('shoes.shoes.index');
        }
        $request = $request;
        $request['vnp_HashSecret'] = env('vnp_HashSecret');
        return view('shoes.page.vnpay_return', compact('request'));
    }


    public function paymentVnpay($id)
    {
        $object = $this->Transaction->getBill($id)->first();
        
        if (
            !isset($object->id_transaction) || $object->id_user != Auth::id() || $object->status == 1
            || $object->id_transaction != $id
            || $object->id_transaction == null
        ) {
            return redirect()->route('shoes.shoes.index');
        }
        return view('shoes.page.payment', compact('object'));
    }
    public function postPayVnPay()
    {
        if (Request()->ajax()) {
            $id_pay = Request()->get('id_pay');
            $arrTotal = explode(',', Cart::initial(0));
            $total = implode($arrTotal);
            $arTax  = explode(',', Cart::tax(0));
            $tax = implode($arTax);
            $arDiscount = explode(',', Cart::discount(0));
            $discount = implode($arDiscount);
            $status = -1;
            $arTransaction = [
                'totalPrice'     => $total,
                'tax'       => $tax,
                'discount'  => $discount,
                'id_pay'    => $id_pay,
                'id_user'   => Auth::id(),
                'status' => $status
            ];
            $id_transaction = $this->Transaction->add($arTransaction);
            if (isset($id_transaction)) {
                foreach (Cart::content() as $key => $item) {
                    $arPrice = explode(',', $item->priceTotal);
                    $priceTotal = implode($arPrice);

                    $arTrDetail[$key]['qty'] = $item->qty;
                    $arTrDetail[$key]['size'] = $item->options->size;
                    $arTrDetail[$key]['totalproduct'] = $priceTotal;
                    $arTrDetail[$key]['id_transaction'] = $id_transaction;
                    $arTrDetail[$key]['id_product'] = $item->id;

                    $this->TransactionDetail->add($arTrDetail[$key]);
                }
                Cart::destroy();
            }
            return $id_transaction;
        }
    }
   
    public function giftCode()
    {
        if (Request()->ajax()) {
            $gift = Request()->get('gift');
            $result = $this->GiftCode->getGiftOrder($gift);
            $count = $result->count();
            if ($count > 0) {
                $this->GiftCode->updateQty($result->first()->id_code);
                Cart::setGlobalDiscount($result->first()->value);
                $arReturn = [
                    'discount' => Cart::discount(0),
                    'total'    => Cart::total(),
                    'value'    => $gift
                ];
                return json_encode($arReturn);
            } else {
                return 0;
            }
        }
    }
    public function contact()
    {
        return view('shoes.page.contact');
    }
    public function postContact(ContactRequest $request)
    {
        $arContact = [
            'fullname' => $request->fullname,
            'email'     => $request->email,
            'title'     => $request->title,
            'content'   => $request->content,
            'phone'     => $request->phone
        ];
        $result = $this->Contact->add($arContact);
        if ($result == 1) {
            return '<script>alert("Cảm ơn bạn đã gởi phản hồi cho chúng tôi");window.location.href="/"</script>';
        }
    }
    public function news()
    {
        $arNew = [
            'news' => $this->News->arNews(),
            'hot_news' => $this->News->hotNews()
        ];
        return view('shoes.page.news', compact('arNew'));
    }
    public function newDetail($slug, $id)
    {
        $arrayId = explode('-', $id);
        $getId = end($arrayId);
        $object = $this->News->getId($getId);
        $newOk = $this->News->newsOk($getId);
        return view('shoes.page.newDetail', compact('object', 'newOk'));
    }
}
