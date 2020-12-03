<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Admin\LoginRequest;
use App\Http\Requests\Shoes\ActiveRequest;
use App\Http\Requests\Shoes\SignUpRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\PasswordReset;
use Illuminate\Support\Facades\Hash;

class HomeLoginController extends Controller
{
    public function __construct(User $user, Transaction $transaction)
    {
        $this->User = $user;
        $this->Transaction = $transaction;
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
        $remember = ($request->remember_me) ? true : false;
        if (Auth::attempt($credentials, $remember)) {
            $user = Auth::user();
            if($user->id_level == 3){
                Auth::logout();
                $request->flash('request',$request->all());
                Session()->flash('message_error','Sai tên đăng nhập hoặc mật khẩu!');
                return back();
            }else if($user->active == 0){
            $request->flash('request',$request->all());
            Session()->flash('message_error', 'Tài khoản bạn đã bị khóa, vui lòng liên hệ quản trị viên!');
            return back();
            }
            else{
                return redirect()->intended(route('shoes.admin.index'));
            }
        }else {
            $request->flash('request',$request->all());
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
            $checkEmail = PasswordReset::where('email', $email)->orderBy('expiration_date', 'DESC')->get()->first();
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
        $remember = ($request->remember_me) ? true : false;
        if (Auth::attempt($credentials, $remember)) {
            if(Auth::user()->active == 0){
                $request->flash('request',$request->all());
            alert()->error('Thông báo', 'Tài khoản bạn đã bị khóa, vui lòng liên hệ quản trị viên!');
            return back();
            }else{
                return redirect('/');
            }
        }else {
            $request->flash('request',$request->all());
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
            $checkEmail = PasswordReset::where('email', $email)->orderBy('expiration_date', 'DESC')->get()->first();
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
            return view('auth.infoUser');
        }else {
            return redirect()->back();
        }
    }
    public function history(Request $request) {
        if ( Auth::check() ) {
            $object = $this->Transaction->getTransactionForUser($request);
            $record = $request->record;
            $date = $request->date;
            $status = $request->status;
            return view('auth.history', compact('object', 'record', 'date', 'status'));
        }else {
            return redirect()->back();
        }
    }
    //post update info user public
    public function postInfo(Request $request) {
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
            'password'   => Hash::make($request->pwd),
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
        if( $object->email_code != null ) {
            return view('auth.email_code',compact('object'));
        }
        return redirect()->route('shoes.shoes.index');
    }
    public function postActiveAc($id,ActiveRequest $request) {
        $object = $this->User->getId($id);
        if ( $object->email_code == $request->acitve ) {
            $object->email_code = "";
            $object->save();
            Session()->flash('success', "");
            return redirect('/');
            }
        else{
            $request->flash('request',$request->all());
            Session()->flash('error', "");
            return back();
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
            'active' => 1,
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
