<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Rating extends Model
{
    protected $table = "rating";
    protected $primaryKey = "id_rating";
    public $timestamps = true;

    public function add($arAdd) {
        return Rating::insert($arAdd);
    }
    public function getRating($id) {
        return DB::table('rating')
            ->join('users','rating.id_user','users.id')
            ->where('id_product',$id)
            ->orderBy('id_rating','DESC')
            ->select('rating.*','users.username')
            ->get();
    }
    public function totalRating($id) {
        return Rating::where('id_product',$id)->avg('rating');
    }

}
