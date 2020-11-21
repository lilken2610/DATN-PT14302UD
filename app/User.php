<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function getUser() {
        return DB::table('users')
            ->join('level','users.id_level','level.id_level')
            ->select('users.*','level.level')
            ->get();
    }
    public function getId($id) {
        return User::find($id);
    }
    public function add($arAdd) {
        return User::insert($arAdd);
    }
    public function edit($id,$arEdit) {
        $object = $this->getId($id);
        $object->username  = $arEdit['username'];
        $object->fullname  = $arEdit['fullname'];
        $object->email  = $arEdit['email'];
        $object->password  = $arEdit['password'];
        $object->address  = $arEdit['address'];
        $object->phone  = $arEdit['phone'];
        $object->id_level  = $arEdit['id_level'];
        return $object->update();
    }
    public function updateInfo($id,$arUpdate) {
        $object = $this->getId($id);
        $object->username  = $arUpdate['username'];
        $object->fullname  = $arUpdate['fullname'];
        $object->email  = $arUpdate['email'];
        $object->password  = $arUpdate['password'];
        $object->address  = $arUpdate['address'];
        $object->phone  = $arUpdate['phone'];
        $object->avatar = $arUpdate['avatar'];
        return $object->update();
    }
    public function count() {
        return DB::table('users')->count();
    }
    public function del($id) {
        $object = $this->getId($id);
        $count = DB::table('transaction')->where('id_user',$id)->count();
        if ( $count == 0 ) {
            return $object->delete();
        }else {
            return 0;
        }
    }
    public function getStatis() {
        $arUser = User::all();
        foreach ($arUser as $key => $value) {
            $orders = DB::table('transaction')->where('id_user',$value->id)->count();
            DB::table('users')->where('id',$value->id)->update(array('orders'=>$orders));
        }
        return DB::table('users')
            ->orderBy('orders','DESC')
            ->limit(5)
            ->select('username','orders','email')
            ->get();
    }
    public function addSignUp($arAdd) {
        $user = new User();
        $user->username = $arAdd['username'];
        $user->fullname = $arAdd['fullname'];
        $user->password = $arAdd['password'];
        $user->email = $arAdd['email'];
        $user->address = $arAdd['address'];
        $user->phone = $arAdd['phone'];
        $user->id_level = $arAdd['id_level'];
        $user->active = $arAdd['active'];
        $user->email_code = $arAdd['email_code'];
        $user->save();
        return $user->id;
    }
    public function active($id) {
        $object = $this->getId($id);
        $object->active = 1;
        return $object->update();
    }
}
