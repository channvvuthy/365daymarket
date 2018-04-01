<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Category;
use App\Location;
use App\Brand;
use DB;
use Auth;

class HomeController extends Controller
{
    public function getIdex(){
        $lastpost=Post::orderBy('created_at', 'desc')->paginate(8);
        $popular=Post::orderBy('views', 'desc')->paginate(8);
        $categoty=Category::where('parent_id','0')->get();
        $subcategory=Category::where('parent_id','!=','0')->get();
        $location=Location::where('status','Publish')->get();
        return view('khmer24.index')->withLastpost($lastpost)->withCategoty($categoty)->withSubcategory($subcategory)->withLocation($location)->withPopular($popular);
    }
    public function viewdetail(){
        $id=$_GET['id'];
        $categoty=Category::where('parent_id','0')->get();
        $subcategory=Category::where('parent_id','!=','0')->get();
        $location=Location::where('status','Publish')->get();
        $post=Post::where('id',$id)->first();
    	return view('khmer24.detail-view')->withCategoty($categoty)->withSubcategory($subcategory)->withLocation($location)->withPost($post);
    }
    public function storemarket(){
        return view('khmer24.user-store');
    }
    public function postProduct(){
        $categoty=Category::where('parent_id','0')->get();
        $location=Location::where('status','Publish')->get();
        $subcategory=Category::where('parent_id','!=','0')->get();
    	return view('khmer24.post-product')->withCategoty($categoty)->withLocation($location)->withSubcategory($subcategory);
    }
    public function getbrandCategory(Request $request){
        $id=$request->catid;
        $catname=$request->subcatname;
        $brand=Brand::where('sub_category_name',$catname)->where('status','Publish')->get();
        if (count($brand) > 0) {
            ?>
                <label class="col-md-3">Type <span class="red">*</span>:</label>
                <select name="variation_type" class="variationselect" required>
                    <?php foreach ($brand as $key => $brandlist): ?>
                    <option value="<?php echo $brandlist->name; ?>"><?php echo $brandlist->name; ?></option>
                    <?php endforeach ?>
                </select>
            <?php
        }
        return;
    }
    public function searchResult(Request $request){
        $categoty=Category::where('parent_id','0')->get();
        $subcategory=Category::where('parent_id','!=','0')->get();
        $location=Location::where('status','Publish')->get();
        // 
        $categoryName=$_GET['category'];
        $locationName=$_GET['location'];
        $keyword=$_GET['p'];
        if (!empty($categoryName) && !empty($locationName) && !empty($keyword)) {
            if (!empty($_GET['pricefrom']) || !empty($_GET['priceto'])) {
                $post=Post::where('price','>=',$_GET['pricefrom'])->where('price','<=',$_GET['priceto'])->where('sub_category_name',$categoryName)->where('location_name',$locationName)->where('name', 'like', '%' . $keyword . '%')->paginate(8);
            }else{
                $post=Post::where('sub_category_name',$categoryName)->where('location_name',$locationName)->where('name', 'like', '%' . $keyword . '%')->paginate(8);
            }
        }
        if (!empty($categoryName) && !empty($locationName) && empty($keywork)) {
            if (!empty($_GET['pricefrom']) || !empty($_GET['priceto'])) {
                $post=Post::where('price','>=',$_GET['pricefrom'])->where('price','<=',$_GET['priceto'])->where('sub_category_name',$categoryName)->where('location_name',$locationName)->where('name', 'like', '%' . $keyword . '%')->paginate(8);
            }else{
                $post=Post::where('sub_category_name',$categoryName)->where('location_name',$locationName)->where('name', 'like', '%' . $keyword . '%')->paginate(8);
            }
        }
        if (!empty($categoryName) && empty($locationName) && empty($keywork)) {
            if (!empty($_GET['pricefrom']) || !empty($_GET['priceto'])) {
                $post=Post::where('price','>=',$_GET['pricefrom'])->where('price','<=',$_GET['priceto'])->where('sub_category_name',$categoryName)->paginate(8);
            }else{
                $post=Post::where('sub_category_name',$categoryName)->paginate(8);
            }
        }
        if (empty($categoryName) && !empty($locationName) && empty($keywork)) {
            if (!empty($_GET['pricefrom']) || !empty($_GET['priceto'])) {
                $post=Post::where('price','>=',$_GET['pricefrom'])->where('price','<=',$_GET['priceto'])->where('location_name',$locationName)->paginate(8);
            }else{
                $post=Post::where('location_name',$locationName)->paginate(8);
            }
        }
        if (empty($categoryName) && empty($locationName) && !empty($keywork)) {
            if (!empty($_GET['pricefrom']) || !empty($_GET['priceto'])) {
                return $post=Post::where('price','>=',$_GET['pricefrom'])->where('price','<=',$_GET['priceto'])->where('name', 'like', '%' . $keyword . '%')->paginate(8);
            }else{
                return $post=Post::where('name', 'like', '%' . $keyword . '%')->paginate(8);
            }
        }
        if (empty($categoryName) && !empty($locationName) && !empty($keyword)) {
            if (!empty($_GET['pricefrom']) || !empty($_GET['priceto'])) {
                $post=Post::where('price','>=',$_GET['pricefrom'])->where('price','<=',$_GET['priceto'])->where('location_name',$locationName)->where('name', 'like', '%' . $keyword . '%')->paginate(8);
            }else{
                $post=Post::where('location_name',$locationName)->where('name', 'like', '%' . $keyword . '%')->paginate(8);
            }
        }
        if (empty($categoryName) && empty($locationName) && !empty($keyword)) {
            if (!empty($_GET['pricefrom']) || !empty($_GET['priceto'])) {
                $post=Post::where('price','>=',$_GET['pricefrom'])->where('price','<=',$_GET['priceto'])->where('name', 'like', '%' . $keyword . '%')->paginate(8);
            }else{
                $post=Post::where('name', 'like', '%' . $keyword . '%')->paginate(8);
            }
        }
        if (empty($categoryName) && empty($locationName) && empty($keyword)) {
            if (!empty($_GET['pricefrom']) || !empty($_GET['priceto'])) {
                $post=Post::where('price','>=',$_GET['pricefrom'])->where('price','<=',$_GET['priceto'])->where('name', 'like', '%' . $keyword . '%')->paginate(8);
            }else{
                $post=Post::where('name', 'like', '%' . $keyword . '%')->paginate(8);
            }
        }
        if (!empty($_GET['postby'])) {
            if ($_GET['postby']=='last') {
                if (!empty($_GET['pricefrom']) || !empty($_GET['priceto'])) {
                    $post=Post::where('price','>=',$_GET['pricefrom'])->where('price','<=',$_GET['priceto'])->orderBy('created_at', 'desc')->paginate(8);
                }else{
                    $post=Post::orderBy('created_at', 'desc')->paginate(8);
                }
            }
            if ($_GET['postby']=='popular') {
                if (!empty($_GET['pricefrom']) || !empty($_GET['priceto'])) {
                    $post=Post::where('price','>=',$_GET['pricefrom'])->where('price','<=',$_GET['priceto'])->orderBy('views', 'desc')->paginate(8);
                }else{
                    $post=Post::orderBy('views', 'desc')->paginate(8);
                }
            }
        }
    	return view('khmer24.search-result')->withCategoty($categoty)->withSubcategory($subcategory)->withLocation($location)->withPost($post);
    }
    public function savePost(Request $request){
        $url=$request->url;
        $imageFile=$request->photo;
 
        foreach ($imageFile as $file) {//this statement will loop through all files.
            $file_name = $file->getClientOriginalName(); //Get file original name
            $file->move('uploads/' , $file_name); // move files to destination folder
            $imageFile.='"'.$url.'uploads/'.$file_name.'",';
        }
        // foreach ($imageFile as $imgfile) {
        //     if (!empty($imgfile)) {
        //         $file_name = $imgfile->getClientOriginalName();
        //         $imageFile.='"'.$url.'/uploads/'.$imgfile.'",';
        //         $imageFile->move('uploads/', $file_name);
        //     }
        // }
        $arr=['array','Array'];
        $imageFile=rtrim(str_replace($arr, '',$imageFile),',');
        $imageFile='['.$imageFile.']';
        $imageFile=$imageFile;
        $post=new Post();
        $post->user_id=Auth::user()->id;
        $post->name=$request->name;
        $post->brand=$request->variation_type;
        $post->price=$request->price;
        $post->description=$request->description;
        $post->username=$request->username;
        $post->phone=$request->phone;
        $post->email=$request->email;
        $post->location_name=$request->location;
        $post->sub_category_name=$request->subcategoryname;
        $post->category_name=$request->categoryname;
        $post->address=$request->categoryname;
        $post->images=$imageFile;
        $post->Save();
        return redirect()->back()->with('message_save','Your product has been saved!');
    }
}
