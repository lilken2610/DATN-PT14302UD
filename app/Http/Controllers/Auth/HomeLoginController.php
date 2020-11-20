<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Admin\LoginRequest;
use App\Http\Requests\Shoes\ActiveRequest;
use App\Http\Requests\Shoes\SignUpRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class HomeLoginController extends Controller
{
    public function __construct(User $user)
    {
        $this->User = $user;
    }
    //login admin
    public function login() {
        return view('auth.login');
    }
    //post login admin
    public function postLogin(LoginRequest $request) {
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended(route('shoes.admin.index'));
        }else {
            return redirect()
                ->route('shoes.auth.login')
                ->with('error','Sai tên đăng nhập hoặc mật khẩu !');
        }
    }
    //logout
    public function logOut() {
        Auth::logout();
        return redirect()->route('shoes.auth.login');
    }
    //login public ajax
    public function postLoginUser() {
        if ( Request()->ajax() ) {
            if (Auth::attempt( [ 'username' => Request()->get('user'), 'password' => Request()->get('pwd') ] )) {
                return Auth::user()->fullname;
            }else {
                return 0;
            }
        }
    }
    //logout public
    public function logOutUser() {
        Auth::logout();
        return redirect()->route('shoes.shoes.index');
    }
    //update info user public
    public function info() {
        if ( Auth::check() ) {
            return view('auth.loginUser');
        }else {
            return redirect()->back();
        }
    }
    //post update info user public
    public function postInfo(Request $request) {
        $pwd = bcrypt($request->pwd);
        $object = $this->User->getId( Auth::id() );
        $img = $object->avatar;
        $image = $request->file('avatar');
        if( $request->hasFile('avatar') ) {
            $nowImageName = Str::slug($request->username) . '-' . time() . '.' . ($request->avatar)->getClientOriginalExtension();
            if ($img != null) {
                $filename = public_path("images/app/users/$img");
                File::delete($filename);
            }
            $image->move(public_path('images/app/users'), $nowImageName);
            $img = $nowImageName;
        }
        $arInfo = [
            'username'   => $request->username,
            'fullname'   => $request->fullname,
            'email'      => $request->email,
            'password'   => $pwd,
            'address'    => $request->address,
            'phone'      => $request->phone,
            'avatar'     => $img
        ];
        $result = $this->User->updateInfo( Auth::id() ,$arInfo);
        if ( $result == 1 ) {
            return redirect()->back()->with('msg', 'Lưu thành công !');
        }else {
            return redirect()->back()->with('msg', 'Có lỗi xảy ra !');
        }
    }
    //dang ky
    public function activeAc($id) {
        $object = $this->User->getId($id);
        if( $object->active == 0 ) {
            return view('auth.email_code',compact('object'));
        }
        return redirect()->route('shoes.shoes.index');
    }
    public function postActiveAc($id,ActiveRequest $request) {
        $object = $this->User->getId($id);
        if ( $object->email_code == $request->acitve ) {
            $actvie = $this->User->active($id);
            if ( $actvie == 1 ) {
                return '<script>alert("Kích hoạt thành công");window.location.href="/"</script>';
            }else {
                return redirect()->route('shoes.shoes.index');
            }
        }
    }
    public function signUp() {
        return view('auth.signUp');
    }
    public function postSignUp(SignUpRequest $request) {
        $email_code = time().uniqid(true);
        $arAdd = [
            'username' => $request->username,
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' => bcrypt($request->pwd),
            'address'   => $request->address,
            'phone' => $request->phone,
            'id_level' => 3,
            'active' => 0,
            'email_code' => $email_code,
        ];
        $id_user = $this->User->addSignUp($arAdd);
        if ( isset($id_user) ) {
            $to_name = 'binh';
            $to_mail = $arAdd['email'];
            $array = [
                'code' => $email_code,
                'name' => $request->fullname
            ];
            Mail::send('auth.sendmail_active', ['array'=>$array], function($message) use ($to_name,$to_mail){
                $message->to( $to_mail )->subject('Xác nhận đăng ký');
            });
            return redirect()->route('shoes.auth.activeAc',$id_user);
        }else {
            return redirect()->home('/');
        }
    }
}
