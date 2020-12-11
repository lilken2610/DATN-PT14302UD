<?php

namespace App\Http\Controllers\Shoes;

use App\Models\Products;
use App\Models\Rating;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function __construct(Rating $rating,Products $products)
    {
        $this->Rating = $rating;
        $this->Product = $products;
    }

    public function rating($id) {
        if ( Request()->ajax() ) {
            $arAdd = [
                'rating' => Request()->get('rating'),
                'comment' => Request()->get('content'),
                'id_product' => $id,
                'id_user' => Auth::id()
            ];
            $result = $this->Rating->add($arAdd);
            if ( $result==1 ) {
                $arObject = $this->Rating->getRating($id);
                $totalRating = $this->Rating->totalRating($id);
                $update = $this->Product->updateRating($id,$totalRating);
                $html = view('shoes.page.form_rating',compact('arObject'));
                return $html;
            }else {
                return 0;
            }
        }
    }
}
