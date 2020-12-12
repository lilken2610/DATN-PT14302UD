<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddUsersRequest;
use App\Models\Level;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct(Level $level,User $user)
    {
        $this->Level = $level;
        $this->User  = $user;
    }

    public function index() {
        $object = $this->User->getUser();
        return view('admin.users.index',compact('object'));
    }
    public function add() {
        $select = $this->Level->getAll();
        return view('admin.users.add',compact('select'));
    }
    public function postAdd(AddUsersRequest $request) {
        $pwd = Hash::make($request->pwd);
        $arAdd = [
            'username'   => $request->username,
            'fullname'   => $request->fullname,
            'email'      => $request->email,
            'password'   => $pwd,
            'active' => 1,
            'address'    => $request->address,
            'phone'      => $request->phone,
            'id_level'   => $request->level
        ];
        $result = $this->User->add($arAdd);
        if ( $result== 1 ) {
            return redirect()->route('shoes.user.index')->with('msg', 'Thêm thành công !');
        }else {
            return redirect()->route('shoes.user.index')->with('error', 'Có lỗi xảy ra !');
        }
    }
    public function del() {
        if ( Request()->ajax() ) {
            $id = Request()->get('id');
            $object = $this->User->del($id);
            if ( $object == 1 ) {
                return 1; // 1 : ok
            }else {
                return 0; // 2: fail
            }
        }
    }
    public function edit($id) {
        $select = $this->Level->getAll();
        $object = $this->User->getId($id);
        return view('admin.users.edit',compact('select','object'));
    }
    public function postEdit($id,Request $request) {
        $pwd = $this->User->getId($id)->password;
        if ( !empty($request->pwd) ) {
            $pwd = Hash::make($request->pwd);
        }
        $arEdit = [
            'username'   => $request->username,
            'fullname'   => $request->fullname,
            'email'      => $request->email,
            'password'   => $pwd,
            'address'    => $request->address,
            'phone'      => $request->phone,
            'id_level'   => $request->level
        ];
        $result = $this->User->edit($id,$arEdit);
        if ( $result== 1 ) {
            return redirect()->route('shoes.user.index')->with('msg', 'Cập nhập thành công !');
        }else {
            return redirect()->route('shoes.user.index')->with('error', 'Có lỗi xảy ra !');
        }
    }
}
