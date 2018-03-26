<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Category;
use App\Brand;

class HomeController extends Controller
{
    public function getIdex(){
        $lastpost=Post::orderBy('created_at', 'desc')->paginate(8);
        $categoty=Category::where('parent_id','0')->get();
        return view('khmer24.index')->withLastpost($lastpost)->withCategoty($categoty);
    }
    public function viewdetail(){
        $categoty=Category::where('parent_id','0')->get();
    	return view('khmer24.detail-view')->withCategoty($categoty);
    }
    public function postProduct(){
        $categoty=Category::where('parent_id','0')->get();
    	return view('khmer24.post-product')->withCategoty($categoty);
    }
    public function getbrandCategory(Request $request){
        $id=$request->catid;
        $catname=$request->catname;
        $brand=Brand::where('sub_category_name',$catname)->get();
        if (count($brand) > 0) {
            ?>
                <label class="col-md-3">Type:</label>
                <select name="variation_type" class="variationselect">
                    <?php foreach ($brand as $key => $brandlist): ?>
                    <option value="<?php echo $brandlist->name; ?>"><?php echo $brandlist->name; ?></option>
                    <?php endforeach ?>
                </select>
            <?php
        }
        return;
    }
    public function searchResult(){
        $categoty=Category::where('parent_id','0')->get();
    	return view('khmer24.search-result')->withCategoty($categoty);
    }
}
