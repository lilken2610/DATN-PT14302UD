<?php
use App\Model\Admin\Categories;
use Illuminate\Support\Facades\DB;

    function catParent($arObject,$id) {
        $xoa = "'Bạn muốn xóa !'";
        foreach ($arObject as $key => $value) {
                if ($value->parent_id == $id) {
                    echo '<ul class="submenu">';
                    echo '<li>'.$value->name_cat .
                        '<a href="'.route('shoes.categories.edit',$value->id_cat).'"><i class="fa fa-fw" aria-hidden="true" title="Sửa danh mục">&#xf1fb</i></a>'.
                        '<a onclick="return xacnhaxoa('.$xoa.')" href="'.route('shoes.categories.del',$value->id_cat).'"><i class="fa fa-fw" aria-hidden="true" title="Xóa danh mục">&#xf00d</i></a>'
                    .'</li>';
                    catParent($arObject,$value->id_cat);
                    echo '</ul>';
                }
        }
    }
    //submenu select
    function subMenuOption($arObject,$id,$id_active,$str=' | ---- ') {
        foreach ($arObject as $value) {
            if ($value->parent_id == $id) {
                $active = '';
                if( $value->id_cat == $id_active ) {
                    $active ='selected=""';
                }
                echo '<option '.$active.' value="'.$value->id_cat.'">'.$str.$value->name_cat.'</option>';
                subMenuOption($arObject,$value->id_cat,$str.' | ---- ');
            }
        }
    }
    function getMenu($id_cat) {
        $arMenu = DB::table('categories')->where('parent_id',$id_cat)->get();
        if ( $arMenu != null ) {
            echo '<div class="sub-menu">';
            echo '<ul>';
                foreach ($arMenu as $value) {
                    echo '<li>';
                        echo '<a href="'.route('shoes.shoes.categories',$value->id_cat).'">'.$value->name_cat.'</a>';
                        getMenu($value->id_cat);
                    echo '</li>';
                }
            echo '</ul>';
            echo '</div>';
        }
    }

