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
use App\PasswordReset;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Aler;
Use Alert;
use SweetAlert;

class HomeLoginController extends Controller
{
    public function __construct(User $user)
    {
        $this->User = $user;
    }
    //login admin
    public function login() {
        return view('auth.admin.login_page');
    }
    //post login admin
    public function postLogin(LoginRequest $request) {
        $credentials = $request->validate([
            'username' => 'required|max:255',
            'password' => 'required|max:255'
        ]);
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if($user->id_level == 3){
                Auth::logout();
                Session()->flash('message_error','Sai tên đăng nhập hoặc mật khẩu!');
                return back();
            }else{
                return redirect()->intended(route('shoes.admin.index'));
            }
        }else {
            Session()->flash('message_error','Sai tên đăng nhập hoặc mật khẩu!');
            return back();
        }
    }

    public function sendEmail(){
        return view('auth.admin.send_email_reset');
    }

    public function postSendResetPassword(Request $request)
    {
        $request->validate([
            'email' => 'email:rfc,dns',
        ]);

        $email = $request->email;

        $resultEmail = User::where('email', $email)->first();
        if (empty($resultEmail)) {
                Session()->flash('message_error', 'Email không đúng, vui lòng thử lại');
                return back();
        } else {
            $checkEmail = PasswordReset::where('email', $email)->get()->first();
            if($checkEmail != null && now() <= $checkEmail->expiration_date){
                Session()->flash('message_error', 'Thư đổi mật khẩu đã tồn tại, vui lòng kiểm tra hoặc đợi sau 15 phút!');
                return back();
            }
            else            {
            $resultName = User::where('email', $email)->first();
            $resultReset = new PasswordReset;
            $resultReset->email = $email;
            $resultReset->token = Str::random(80);
            $resultReset->expiration_date = now()->addMinutes(15);
            $resultReset->save();
            $this->email = $resultReset['email'];
            $this->token = $resultReset['token'];
            $this->name = $resultName['fullname'];
            Mail::send('common.send_password', array('fullname' => $this->name, 'token' => $this->token), function ($message) {
                $message->to($this->email, $this->name)->subject('Lấy lại mật khẩu');
            });
            Session()->flash('message_success', 'Link đổi mật khẩu đã gửi về email của bạn, vui lòng kiểm tra trong thư rác');
            return back();
        }
        }
    }

    public function getChangePassword($token)
    {
        $result = PasswordReset::where('token', $token)->first();
        if (!empty($result)) {
            $resultDate = $result->expiration_date;
            if (now() <= $resultDate) {
                $token = $result['token'];
                return view('auth.admin.change_password', ['token'=> $token]);
            } else {
                PasswordReset::where('token', $token)->delete();
                return view('common.403');
            }
        } else {
            return view('common.403');
        }
    }

    public function postChangePassword(Request $request)
    {
        $request->validate([
            'password' => 'required', 'confirmed',
            're_password' => 'required'
        ]);

        $rePassword = $request['re_password'];
        $token = $request['token'];
        $checkToken = PasswordReset::where('token', $token)->get()->first();

        if ($checkToken) {
            $findEmail = PasswordReset::where('token', $token)->get()->first();
            $updatePassword = User::where('email', $findEmail->email)->first();
            $updatePassword->password = Hash::make($rePassword);
            $updatePassword->save();
            if ($updatePassword) {
                PasswordReset::where('token', $token)->delete();                
                Session()->flash('message_success', 'Đổi mật khẩu thành công, bạn có thể đăng nhập!');
                return view('auth.admin.success_change_password');
            } else {
                Session()->flash('message_error', 'Đã có lỗi xảy ra, vui lòng liên hệ quản trị viên!');
                return back();
            }
        } else {
            Session()->flash('message_error', 'Đã có lỗi xảy ra, vui lòng liên hệ quản trị viên!');
            return back();
        }
    }

    //logout
    public function logOut() {
        Auth::logout();
        return redirect('/admin/dang-nhap');
    }
    //public
    public function getLoginUser(){
        return view('auth.login');
    }
    public function postLoginUser(Request $request) {
        $credentials = $request->validate([
            'username' => 'required|max:255',
            'password' => 'required|max:255'
        ]);
        if (Auth::attempt($credentials)) {
            return redirect('/');
        }else {
            alert()->error('Thông báo', 'Sai tài khoản hoặc mật khẩu!');
            return back();
        }
    }

    public function getSendEmail(){
        return view('auth.sendEmail');
    }

    public function postSendEmail(Request $request)
    {
        $request->validate([
            'email' => 'email:rfc,dns',
        ]);

        $email = $request->email;

        $resultEmail = User::where('email', $email)->first();
        if (empty($resultEmail)) {
                Session()->flash('message_error', 'Email không đúng, vui lòng thử lại');
                return back();
        } else {
            $checkEmail = PasswordReset::where('email', $email)->get()->first();
            if($checkEmail != null && now() <= $checkEmail->expiration_date){
                Session()->flash('message_error', 'Thư đổi mật khẩu đã tồn tại, vui lòng kiểm tra hoặc đợi sau 15 phút!');
                return back();
            }else{
                $resultName = User::where('email', $email)->first();
                $resultReset = new PasswordReset;
               $resultReset->email = $email;
            $resultReset->token = Str::random(80);
            $resultReset->expiration_date = now()->addMinutes(15);
            $resultReset->save();
            $this->email = $resultReset['email'];
            $this->token = $resultReset['token'];
            $this->name = $resultName['fullname'];
            Mail::send('common.send_password_user', array('fullname' => $this->name, 'token' => $this->token), function ($message) {
                $message->to($this->email, $this->name)->subject('Lấy lại mật khẩu');
            });
            Session()->flash('message_success', 'Link đổi mật khẩu đã gửi về email của bạn, vui lòng kiểm tra trong thư rác');
            return back();
            }
        }
    }

    public function getChangePasswordUser($token)
    {
        $result = PasswordReset::where('token', $token)->first();
        if (!empty($result)) {
            $resultDate = $result->expiration_date;
            if (now() <= $resultDate) {
                $token = $result['token'];
                return view('auth.changePassword', ['token'=> $token]);
            } else {
                PasswordReset::where('token', $token)->delete();
                return view('common.403');
            }
        } else {
            return view('common.403');
        }
    }

    public function postChangePasswordUser(Request $request)
    {
        $request->validate([
            'password' => 'required', 'confirmed',
            're_password' => 'required'
        ]);

        $rePassword = $request['re_password'];
        $token = $request['token'];
        $checkToken = PasswordReset::where('token', $token)->get()->first();

        if ($checkToken) {
            $findEmail = PasswordReset::where('token', $token)->get()->first();
            $updatePassword = User::where('email', $findEmail->email)->first();
            $updatePassword->password = Hash::make($rePassword);
            $updatePassword->save();
            if ($updatePassword) {
                PasswordReset::where('token', $token)->delete();                
                Session()->flash('message_success', 'Đổi mật khẩu thành công, bạn có thể đăng nhập!');
                return view('auth.success');
            } else {
                Session()->flash('message_error', 'Đã có lỗi xảy ra, vui lòng liên hệ quản trị viên!');
                return back();
            }
        } else {
            Session()->flash('message_error', 'Đã có lỗi xảy ra, vui lòng liên hệ quản trị viên!');
            return back();
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
