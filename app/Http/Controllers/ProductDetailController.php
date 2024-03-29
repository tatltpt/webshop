<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Rating;
use Illuminate\Http\Request;

class ProductDetailController extends FrontendController
{
   public function __construct()
{
    parent::__construct();
}

    public function productDetail(Request $request)
    {
        $url = $request->segment(2);
        $url = preg_split('/(-)/i',$url);
        if($id = array_pop($url))
        {
            $productDetail = Product::where('pro_active',Product::STATUS_PUBLIC)->find($id);
            $cateProduct = Category::find($productDetail->pro_category_id);

            $rating = Rating::where('ra_product_id',$id)->orderBy('id','DESC')->paginate(10);

            $viewData = [
                'productDetail' => $productDetail,
                'cateProduct' => $cateProduct
            ];
            return view('product.detail',$viewData);
        }
    }
}
