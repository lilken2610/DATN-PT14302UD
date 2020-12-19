<?php

#multiple language
Route::get('/locale/{locale}', function ($locale) {
    Session::put('locale', $locale);
    return redirect()->back();
})->name('locale');

/* Admin */
Route::group(['namespace' => 'Admin', 'prefix' => 'admincp', 'middleware' => 'admin'], function () {
    Route::get('/', [
        'uses' => 'IndexController@index',
        'as'   => 'shoes.admin.index'
    ]);
    /*danh mục*/
    Route::group(['prefix' => 'danh-muc'], function () {
        Route::get('/', [
            'uses' => 'CategoriesController@index',
            'as'   => 'shoes.categories.index'
        ]);
        //thêm danh mục
        Route::get('/them-danh-muc', [
            'uses' => 'CategoriesController@add',
            'as'   => 'shoes.categories.add'
        ])->middleware('role:1');
        Route::post('/them-danh-muc', [
            'uses' => 'CategoriesController@postAdd',
            'as'   => 'shoes.categories.postAdd'
        ])->middleware('role:1');
        Route::get('/delete/{id}', [
            'uses' => 'CategoriesController@del',
            'as'   => 'shoes.categories.del'
        ])->middleware('role:1');
        //edit
        Route::get('/sua-danh-muc/{id}', [
            'uses' => 'CategoriesController@edit',
            'as'   => 'shoes.categories.edit'
        ])->middleware('role:1');
        Route::post('/sua-danh-muc/{id}', [
            'uses' => 'CategoriesController@postEdit',
            'as'   => 'shoes.categories.postEdit'
        ])->middleware('role:1');
        //status
        Route::get('/status/{id}', [
            'uses' => 'CategoriesController@status',
            'as'   => 'shoes.categories.status'
        ])->middleware('role:1');
    });
    /*nhãn hiệu*/
    Route::group(['prefix' => 'thuong-hieu'], function () {
        Route::get('/', [
            'uses' => 'BrandsController@index',
            'as'   => 'shoes.brands.index'
        ]);
        //thêm danh mục
        Route::get('/them-thuon-hieu', [
            'uses' => 'BrandsController@add',
            'as'   => 'shoes.brands.add'
        ])->middleware('role:1');
        Route::post('/them-thuong-hieu', [
            'uses' => 'BrandsController@postAdd',
            'as'   => 'shoes.brands.postAdd'
        ])->middleware('role:1');
        Route::get('/delete/{id}', [
            'uses' => 'BrandsController@del',
            'as'   => 'shoes.brands.del'
        ])->middleware('role:1');
        //edit
        Route::get('/sua-danh-muc/{id}', [
            'uses' => 'BrandsController@edit',
            'as'   => 'shoes.brands.edit'
        ])->middleware('role:1');
        Route::post('/sua-danh-muc/{id}', [
            'uses' => 'BrandsController@postEdit',
            'as'   => 'shoes.brands.postEdit'
        ])->middleware('role:1');
    });
    /*sản phẩm*/
    Route::group(['prefix' => 'san-pham'], function () {
        Route::get('/', [
            'uses' => 'ProductsController@index',
            'as'   => 'shoes.products.index'
        ]);
        Route::get('/them-san-pham', [
            'uses' => 'ProductsController@add',
            'as'   => 'shoes.products.add'
        ]);
        Route::post('/them-san-pham', [
            'uses' => 'ProductsController@postAdd',
            'as'   => 'shoes.products.postAdd'
        ]);
        Route::get('/del/{id}', [
            'uses' => 'ProductsController@del',
            'as'   => 'shoes.products.del'
        ])->middleware('role:1')->middleware('role:2');
        Route::get('/sua-san-pham/{id}', [
            'uses' => 'ProductsController@edit',
            'as'   => 'shoes.products.edit'
        ]);
        Route::post('/sua-san-pham/{id}', [
            'uses' => 'ProductsController@postEdit',
            'as'   => 'shoes.products.postEdit'
        ]);
    });
    /*mã giảm giá*/
    Route::group(['prefix' => 'ma-giam-gia'], function () {
        Route::get('/', [
            'uses' => 'GiftCodeController@index',
            'as'   => 'shoes.gift.index'
        ]);
        Route::get('/them', [
            'uses' => 'GiftCodeController@add',
            'as'   => 'shoes.gift.add'
        ]);
        Route::post('/them', [
            'uses' => 'GiftCodeController@postAdd',
            'as'   => 'shoes.gift.postAdd'
        ]);
        Route::get('/xoa/{id}', [
            'uses' => 'GiftCodeController@del',
            'as'   => 'shoes.gift.del'
        ])->middleware('role:1')->middleware('role:2');
        Route::get('/sua/{id}', [
            'uses' => 'GiftCodeController@edit',
            'as'   => 'shoes.gift.edit'
        ]);
        Route::post('/sua/{id}', [
            'uses' => 'GiftCodeController@postEdit',
            'as'   => 'shoes.gift.postEdit'
        ]);
    });
    /*size*/
    Route::group(['prefix' => 'size'], function () {
        Route::get('/', [
            'uses' => 'SizeController@index',
            'as'   => 'shoes.size.index'
        ]);
        Route::get('/them-size', [
            'uses' => 'SizeController@add',
            'as'   => 'shoes.size.add'
        ]);
        Route::post('/them-size', [
            'uses' => 'SizeController@postAdd',
            'as'   => 'shoes.size.postAdd'
        ]);
        Route::get('/xoa-size/{id}', [
            'uses' => 'SizeController@del',
            'as'   => 'shoes.size.del'
        ])->middleware('role:1')->middleware('role:2');
    });
    /*tin tức*/
    Route::group(['prefix' => 'tin-tuc'], function () {
        Route::get('/', [
            'uses' => 'NewsController@index',
            'as'   => 'shoes.news.index'
        ]);
        Route::get('/them-tin', [
            'uses' => 'NewsController@add',
            'as'   => 'shoes.news.add'
        ]);
        Route::post('/them-tin', [
            'uses' => 'NewsController@postAdd',
            'as'   => 'shoes.news.postAdd'
        ]);
        Route::get('/xoa-tin/{id}', [
            'uses' => 'NewsController@del',
            'as'   => 'shoes.news.del'
        ])->middleware('role:1')->middleware('role:2');
        Route::get('/sua-tin/{id}', [
            'uses' => 'NewsController@edit',
            'as'   => 'shoes.news.edit'
        ]);
        Route::post('/sua-tin/{id}', [
            'uses' => 'NewsController@postEdit',
            'as'   => 'shoes.news.postEdit'
        ]);
    });
    /*slide*/
    Route::group(['prefix' => 'slide'], function () {
        Route::get('/', [
            'uses' => 'SlideController@index',
            'as'   => 'shoes.slide.index'
        ]);
        Route::get('/them-slide', [
            'uses' => 'SlideController@add',
            'as'   => 'shoes.slide.add'
        ]);
        Route::post('/them-slide', [
            'uses' => 'SlideController@postAdd',
            'as'   => 'shoes.slide.postAdd'
        ]);
        Route::get('/xoa-slide/{id}', [
            'uses' => 'SlideController@del',
            'as'   => 'shoes.slide.del'
        ])->middleware('role:1')->middleware('role:2');
        Route::get('/sua-slide/{id}', [
            'uses' => 'SlideController@edit',
            'as'   => 'shoes.slide.edit'
        ]);
        Route::post('/sua-slide{id}', [
            'uses' => 'SlideController@postEdit',
            'as'   => 'shoes.slide.postEdit'
        ]);
    });
    /*người dùng*/
    Route::group(['prefix' => 'nguoi-dung'], function () {
        Route::get('/', [
            'uses' => 'UserController@index',
            'as'   => 'shoes.user.index'
        ])->middleware('role:1')->middleware('role:2');
        Route::get('/them-nguoi-dung', [
            'uses' => 'UserController@add',
            'as'   => 'shoes.user.add'
        ])->middleware('role:1')->middleware('role:2');
        Route::post('/them-nguoi-dung', [
            'uses' => 'UserController@postAdd',
            'as'   => 'shoes.user.postAdd'
        ])->middleware('role:1')->middleware('role:2');
        Route::get('/xoa-nguoi-dung', [
            'uses' => 'UserController@del',
            'as'   => 'shoes.user.del'
        ])->middleware('role:1')->middleware('role:2');
        Route::get('/sua-nguoi-dung/{id}', [
            'uses' => 'UserController@edit',
            'as'   => 'shoes.user.edit'
        ]);
        Route::post('/sua-nguoi-dung/{id}', [
            'uses' => 'UserController@postEdit',
            'as'   => 'shoes.user.postEdit'
        ])->middleware('role:1')->middleware('role:2');
    });
    /*liên hệ*/
    Route::group(['prefix' => 'lien-he'], function () {
        Route::get('/', [
            'uses' => 'ContactController@index',
            'as'   => 'shoes.contact.index'
        ]);
        Route::get('/xoa-lien-he/{id}', [
            'uses' => 'ContactController@del',
            'as'   => 'shoes.contact.del'
        ])->middleware('role:1')->middleware('role:2');
        Route::post('/confilm/{id}', [
            'uses' => 'ContactController@confilm',
            'as'   => 'shoes.contact.confilm'
        ]);
    });
    /*đơn hàng*/
    Route::group(['prefix' => 'don-hang'], function () {
        Route::get('/', [
            'uses' => 'TranSacTionController@index',
            'as'   => 'shoes.transaction.index'
        ]);
        Route::post('/view', [
            'uses' => 'TranSacTionController@viewTransaction',
            'as'   => 'shoes.transaction.viewTransaction'
        ]);
        Route::get('/bill/{id}', [
            'uses' => 'TranSacTionController@bill',
            'as'   => 'shoes.transaction.bill'
        ]);
        Route::post('/check-success-order', [
            'uses' => 'TranSacTionController@checksuccessOrder',
            'as'   => 'shoes.transaction.checksuccessOrder'
        ]);
        Route::get('/xoa/{id}', [
            'uses' => 'TranSacTionController@del',
            'as'   => 'shoes.transaction.del'
        ])->middleware('role:1')->middleware('role:2');
        Route::get('/duyet-don/{id}', [
            'uses' => 'TranSacTionController@approvedBill',
            'as'   => 'shoes.transaction.approvedBill'
        ]);
        Route::post('/check-duyet-don', [
            'uses' => 'TranSacTionController@checkApprovedBill',
            'as'   => 'shoes.transaction.checkApprovedBill'
        ]);
    });
     /*Thanh toán VNPAY*/
    Route::group(['prefix' => 'thanh-toan-vnpay'], function () {
        Route::get('/', [
            'uses' => 'PaymentController@index',
            'as'   => 'shoes.payments.index'
        ]);
       
    });
    /*Doanh thu*/
    Route::group(['prefix' => 'doanh-thu:{id}'], function () {
        Route::get('/', [
            'uses' => 'StatisticsController@index',
            'as'   => 'shoes.statistics.index'
        ]);
    });
});

/* Public */
Route::group(['namespace' => 'Shoes'], function () {
    Route::get('/', [
        'uses' => 'IndexController@index',
        'as'   => 'shoes.shoes.index'
    ]);

    Route::get('/san-pham', [
        'uses' => 'IndexController@list',
        'as'   => 'shoes.shopping.list'
    ]);

    Route::get('/giam-gia', [
        'uses' => 'IndexController@sale',
        'as'   => 'shoes.shopping.sale'
    ]);

    Route::get('/tim-kiem', [
        'uses' => 'IndexController@search',
        'as'   => 'shoes.shopping.search'
    ]);
    Route::get('/the-loai/{slug}', [
        'uses' => 'IndexController@categories',
        'as'   => 'shoes.shoes.categories'
    ]);

    Route::get('/thuong-hieu/{slug}', [
        'uses' => 'IndexController@brands',
        'as'   => 'shoes.shoes.brands'
    ]);
    Route::group(['prefix' => 'tin-tuc'], function () {
        Route::get('/', [
            'uses' => 'IndexController@news',
            'as'   => 'shoes.shoes.news'
        ]);
        Route::get('/tin/{slug}-{id}', [
            'uses' => 'IndexController@newDetail',
            'as'   => 'shoes.shoes.newDetail'
        ]);
    });
    Route::get('/san-pham/{slug}', [
        'uses' => 'IndexController@product',
        'as'   => 'shoes.shoes.product'
    ]);
    Route::post('/rating/{id}', [
        'uses' => 'RatingController@rating',
        'as'   => 'shoes.shoes.rating'
    ]);
    Route::group(['prefix' => 'thanh-toan'], function () {
        Route::get('/', [
            'uses' => 'IndexController@pay',
            'as'   => 'shoes.shoes.pay'
        ]);
        Route::post('/', [
            'uses' => 'IndexController@postPay',
            'as'   => 'shoes.shoes.postPay'
        ]);
        Route::get('/vnpay/{id}', [
            'uses' => 'IndexController@paymentVnpay',
            'as'   => 'shoes.shoes.paymentVnpay'
        ]);
        Route::post('/vnp', [
            'uses' => 'IndexController@postPayment',
            'as'   => 'shoes.shoes.postPayment'
        ]);
        Route::post('/tt', [
            'uses' => 'IndexController@postPayVnPay',
            'as'   => 'shoes.shoes.postPayVnPay'
        ]);
        Route::get('/tc', [
            'uses' => 'IndexController@xulyVnpay',
            'as'   => 'shoes.shoes.tc'
        ]);
        Route::post('/cap-nhap-thong-tin', [
            'uses' => 'IndexController@updateInfo',
            'as'   => 'shoes.shoes.updateInfo'
        ]);
        Route::post('/gift-code', [
            'uses' => 'IndexController@giftCode',
            'as'   => 'shoes.shoes.giftCode'
        ]);
    });
    
    Route::get('/lien-he', [
        'uses' => 'IndexController@contact',
        'as'   => 'shoes.shoes.contact'
    ]);
    Route::post('/lien-he', [
        'uses' => 'IndexController@postContact',
        'as'   => 'shoes.shoes.postContact'
    ]);
    Route::group(['prefix' => 'gio-hang'], function () {
        Route::get('/', [
            'uses' => 'ShoppingCartController@index',
            'as'   => 'shoes.shopping.index'
        ]);
        Route::post('/add-cart/{id}', [
            'uses' => 'ShoppingCartController@add',
            'as'   => 'shoes.shopping.add'
        ]);
        Route::get('/del-cart/{id}', [
            'uses' => 'ShoppingCartController@del',
            'as'   => 'shoes.shopping.del'
        ]);
        Route::post('/update', [
            'uses' => 'ShoppingCartController@update',
            'as'   => 'shoes.shopping.update'
        ]);
    });
});

/*auth*/
Route::group(['namespace' => 'Auth'], function () {
    Route::get('/admin/dang-nhap', [
        'uses' => 'HomeLoginController@login',
        'as'   => 'shoes.auth.login'
    ]);
    Route::post('/admin/dang-nhap', [
        'uses' => 'HomeLoginController@postLogin',
        'as'   => 'shoes.auth.postLogin'
    ]);
    Route::get('/admin/reset-password', [
        'uses' => 'HomeLoginController@sendEmail',
        'as'   => 'shoes.auth.sendEmail'
    ]);
    Route::post('/admin/reset-password', [
        'uses' => 'HomeLoginController@postSendResetPassword',
        'as'   => 'shoes.auth.postSendResetPassword'
    ]);
    Route::get('/admin/reset-password-with-token/token={token}', [
        'uses' => 'HomeLoginController@getChangePassword',
        'as'   => 'shoes.auth.getChangePassword'
    ]);
    Route::put('/admin/reset-password-with-token/token', [
        'uses' => 'HomeLoginController@postChangePassword',
        'as'   => 'shoes.auth.postChangePassword'
    ]);
    Route::get('/dang-xuat', [
        'uses' => 'HomeLoginController@logout',
        'as'   => 'shoes.auth.logout'
    ]);
    Route::get('/redirect/{social}', [
        'uses' => 'LoginFaceController@redirect',
        'as'   => 'shoes.auth.redirect'
    ]);
    Route::get('/callback/{social}', [
        'uses' => 'LoginFaceController@callback',
        'as'   => 'shoes.auth.callback'
    ]);
    /*login public*/
    Route::get('/dang-nhap', [
        'uses' => 'HomeLoginController@getLoginUser',
        'as'   => 'shoes.auth.getLoginUser'
    ]);
    Route::post('/dang-nhap', [
        'uses' => 'HomeLoginController@postLoginUser',
        'as'   => 'shoes.auth.postLoginUser'
    ]);
    Route::get('/gui-email', [
        'uses' => 'HomeLoginController@getSendEmail',
        'as'   => 'shoes.auth.getSendEmail'
    ]);
    Route::post('/gui-email', [
        'uses' => 'HomeLoginController@postSendEmail',
        'as'   => 'shoes.auth.postSendEmail'
    ]);
    Route::get('/reset-password-with-token/token={token}', [
        'uses' => 'HomeLoginController@getChangePasswordUser',
        'as'   => 'shoes.auth.getChangePasswordUser'
    ]);
    Route::put('/reset-password-with-token/token', [
        'uses' => 'HomeLoginController@postChangePasswordUser',
        'as'   => 'shoes.auth.postChangePasswordUser'
    ]);
    Route::get('/tai-khoan-cua-toi', [
        'uses' => 'HomeLoginController@info',
        'as'   => 'shoes.auth.info'
    ]);
    Route::post('/tai-khoan-cua-toi', [
        'uses' => 'HomeLoginController@postInfo',
        'as'   => 'shoes.auth.postInfo'
    ]);
    Route::get('/tai-khoan-cua-toi/lich-su-dat-hang', [
        'uses' => 'HomeLoginController@history',
        'as'   => 'shoes.auth.history'
    ]);
    Route::get('/viewForUser', [
        'uses' => 'HomeLoginController@viewTransaction',
        'as'   => 'shoes.auth.viewTransactionForUser'
    ]);
    Route::get('/cancel-order/{id}', [
        'uses' => 'HomeLoginController@cancelOrder',
        'as'   => 'shoes.auth.cancelOrder'
    ]);
    Route::get('/success-order/{id}', [
        'uses' => 'HomeLoginController@successOrder',
        'as'   => 'shoes.auth.successOrder'
    ]);
    Route::get('/logOutUser', [
        'uses' => 'HomeLoginController@logoutUser',
        'as'   => 'shoes.auth.logoutUser'
    ]);
    Route::get('/dang-ky', [
        'uses' => 'HomeLoginController@signUp',
        'as'   => 'shoes.auth.signUp'
    ]);
    Route::post('/dang-ky', [
        'uses' => 'HomeLoginController@postSignUp',
        'as'   => 'shoes.auth.postSignUp'
    ]);
    Route::get('/kich-hoat-tai-khoan/{id}', [
        'uses' => 'HomeLoginController@activeAc',
        'as'   => 'shoes.auth.activeAc'
    ]);
    Route::post('/kich-hoat-tai-khoan/{id}', [
        'uses' => 'HomeLoginController@postActiveAc',
        'as'   => 'shoes.auth.postActiveAc'
    ]);
});

//clear cache
Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('view:clear');
    return 'DONE'; //Return anything
});
