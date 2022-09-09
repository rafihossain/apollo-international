<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogCategory;
use Image;
use File;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    //blog category
    public function manageCategory(){
        $blogCategories = BlogCategory::all();
        return view('backend.blog.category.manage_category', [
            'blogCategories' => $blogCategories
        ]);
    }
    public function addCategory(){
        return view('backend.blog.category.add_category');
    }

    protected function categoryInfoValidate($request){
        $request->validate([
            'meta_title' => 'required',
            'meta_keywords' => 'required',
            'meta_description' => 'required',
            'category_name' => 'required',
        ]);
    }

    protected function categoryInfoValidateUpdate($request){
        $request->validate([
            'meta_title' => 'required',
            'meta_keywords' => 'required',
            'meta_description' => 'required',
            'category_name' => 'required',
            'category_slug' => 'required|regex:/^[a-z-0-9S*]+$/',
        ]);
    }

    protected function categoryNewInfoValidateUpdate($request){
        $request->validate([
            'meta_title' => 'required',
            'meta_keywords' => 'required',
            'meta_description' => 'required',
            'category_name' => 'required',
            'category_slug' => 'required|unique:blog_categories,category_slug|regex:/^[a-z-0-9S*]+$/',
        ]);
    }

    public function saveCategory(Request $request){
        $this->categoryInfoValidate($request);
        $categorySlug = Str::slug($request->category_name);

        $slugCheck = BlogCategory::where('category_slug', 'like', '%'.$categorySlug.'%')->get();
        // echo "<pre>"; print_r($slugCheck); die();
        
        $slugValue = '';
        if(count($slugCheck) > 0){
              $slugValue = $categorySlug.'-'.count($slugCheck);
        }else{
            $slugValue = $categorySlug;
        }

        $blogCategory = new BlogCategory;
        $blogCategory->meta_title = $request->meta_title;
        $blogCategory->meta_keywords = $request->meta_keywords;
        $blogCategory->meta_description = $request->meta_description;
        $blogCategory->category_name = $request->category_name;
        $blogCategory->category_slug = $slugValue;
        $blogCategory->category_description = $request->category_description;
        $blogCategory->save();
        return redirect()->route('backend.manage-category')->with('success', 'Category has been added successfully !!');
    }
    public function editCategory($id){
        $editCategory = BlogCategory::find($id);
        // dd($editCategory);
        return view('backend.blog.category.edit_category',[
            'editCategory' => $editCategory
        ]);
    }
    public function updateCategory(Request $request){

        $blogCategory = BlogCategory::find($request->id);
        if($blogCategory->category_slug == $request->category_slug){
            $this->categoryInfoValidateUpdate($request);
        }else{
            $this->categoryNewInfoValidateUpdate($request);
        }

        $blogCategory = BlogCategory::find($request->id);
        $blogCategory->meta_title = $request->meta_title;
        $blogCategory->meta_keywords = $request->meta_keywords;
        $blogCategory->meta_description = $request->meta_description;
        $blogCategory->category_name = $request->category_name;
        $blogCategory->category_slug = $request->category_slug;
        $blogCategory->category_description = $request->category_description;
        $blogCategory->save();

        return redirect()->route('backend.manage-category')->with('success', 'Category has been update successfully !!');
    }
    public function deleteCategory($id){
        BlogCategory::where('id', $id)->delete();
        return redirect()->route('backend.manage-category')->with('success', 'Category has been deleted successfully !!');
    }



    //Blog section
    protected function blogInfoValidate($request){
        $request->validate([
            'blog_title' => 'required',
            'meta_title' => 'required',
            'meta_keywords' => 'required',
            'meta_description' => 'required',
            'blog_category_id' => 'required',
            //'blog_image' => 'required|dimensions:width=1070,height=723'
        ]);
    }
    protected function blogInfoValidateUpdate($request){
        $request->validate([
            'blog_title' => 'required',
            'blog_slug' => 'required|regex:/^[a-z-0-9S*]+$/',
            'meta_title' => 'required',
            'meta_keywords' => 'required',
            'meta_description' => 'required',
            'blog_category_id' => 'required',
            //'blog_image' => 'required|dimensions:width=1070,height=723'
        ]);
    }
    protected function blogInfoNewValidateUpdate($request){
        $request->validate([
            'blog_title' => 'required',
            'blog_slug' => 'required|unique:blogs,blog_slug|regex:/^[a-z-0-9S*]+$/',
            'meta_title' => 'required',
            'meta_keywords' => 'required',
            'meta_description' => 'required',
            'blog_category_id' => 'required',
            //'blog_image' => 'required|dimensions:width=1070,height=723'
        ]);
    }

    protected function blogImageUpload($request){
        $blogImage = $request->file('blog_image');

        $image = Image::make($blogImage);
        $fileType = $blogImage->getClientOriginalExtension();
        $imageName = 'blog_'.time().'_'.rand(10000, 999999).'.'.$fileType;
        $directory = 'admin/image/blog/';
        $imageUrl = $directory.$imageName;
        $image->save($imageUrl);
        
        $thumbnail = $directory."thumbnail/".$imageName;
        // $image->resize(null, 200, function($constraint) {
        //     $constraint->aspectRatio();
        // });
        $image->resize(370,250);
        $image->save($thumbnail);

        return $thumbnail;
    }

    protected function blogBasicInfoSave($request, $imageUrl=null){
        $blogSlug = Str::slug($request->blog_title);
        
        $slugCheck = Blog::where('blog_slug', 'like', '%'.$blogSlug.'%')->get();
        $slugValue = '';
        if(count($slugCheck) > 0){
              $slugValue = $blogSlug.'_'.count($slugCheck);
        }else{
            $slugValue = $blogSlug;
        }
        
        
        $blog = new Blog;
        $blog->meta_title = $request->meta_title;
        $blog->meta_keywords = $request->meta_keywords;
        $blog->meta_description = $request->meta_description;
        $blog->blog_title = $request->blog_title;
        
        if(isset($request->related_post) && $request->related_post != ''){
            $relatedPost = implode(',', $request->related_post);
            $blog->related_post = $relatedPost;
        }
        
        $blog->blog_category_id = $request->blog_category_id;
        $blog->blog_description = $request->blog_description;
        $blog->blog_slug = $slugValue;
        $blog->blog_image = $imageUrl;
        if(isset($request->blog_status)){
            $blog->blog_status = 1;
        }else{
            $blog->blog_status = 2;
        }
        $blog->save();
    }

    protected function blogBasicInfoUpdate($request, $blog, $imageUrl=null){
        
        $blog->blog_title = $request->blog_title;
        if(isset($request->related_post) && $request->related_post != ''){
            $relatedPost = implode(',', $request->related_post);
            $blog->related_post = $relatedPost;
        }
        $blog->meta_title = $request->meta_title;
        $blog->meta_keywords = $request->meta_keywords;
        $blog->meta_description = $request->meta_description;
        $blog->blog_category_id = $request->blog_category_id;
        $blog->blog_description = $request->blog_description;
        $blog->blog_slug = $request->blog_slug;
        if($imageUrl){
            $blog->blog_image = $imageUrl;
        }
        if(isset($request->blog_status)){
            $blog->blog_status = 1;
        }else{
            $blog->blog_status = 2;
        }
        $blog->save();
    }

    public function manageBlog(){
        $blogs = Blog::with('category')->get();
        $blogCategories = BlogCategory::get();

        return view('backend.blog.manage_blog',[
            'blogs' => $blogs,
            'blogCategories' => $blogCategories,
        ]);
    }
    public function addBlog(){
        $blogCategories = BlogCategory::all();
        $blogs = Blog::get();
        return view('backend.blog.add_blog',[
            'blogCategories' => $blogCategories,
            'blogs' => $blogs
        ]);
    }
    public function saveBlog(Request $request){
        $this->blogInfoValidate($request);
        $imageUrl = $this->blogImageUpload($request);
        $this->blogBasicInfoSave($request, $imageUrl);
        return redirect()->route('backend.manage-blog')->with('success', 'Blog has been added successfully !!');
    }
    public function viewBlog($id){
        $blog = Blog::with('category')->find($id);
        return view('backend.blog.view_blog',[
            'blog' => $blog,
        ]);
    }
    public function editBlog($id){
        $blog = Blog::with('category')->find($id);
        //dd($blog);
        $postId = explode(',',$blog->related_post);
        
        $relatedPost = [];
        if($blog->related_post != ''){
            for($i=0; $i < count($postId); $i++){
                $relatedPost[] = Blog::select('id','blog_title')->where('id', $postId[$i])->get()->first();
            }
        }
        
        
        $blogs = Blog::get();
        $blogCategories = BlogCategory::all();

        return view('backend.blog.edit_blog',[
            'blog' => $blog,
            'blogs' => $blogs,
            'relatedPost' => $relatedPost,
            'blogCategories' => $blogCategories
        ]);
    }
    public function updateBlog(Request $request){

        $blog = Blog::find($request->id);
        if($blog->blog_slug == $request->blog_slug){
            $this->blogInfoValidateUpdate($request);
        }else{
            $this->blogInfoNewValidateUpdate($request);
        }

        $blogImage = $request->file('blog_image');
        $blog = Blog::find($request->id);
        $blog_image_new=explode('/',$blog->blog_image);
        
        if($blogImage){
            if (File::exists($blog->blog_image)) {
                unlink($blog->blog_image);
            }
            if (File::exists('admin/image/blog/'.$blog_image_new[4]))
            {
                unlink('admin/image/blog/'.$blog_image_new[4]);
            }
            $imageUrl = $this->blogImageUpload($request);
            $this->blogBasicInfoUpdate($request, $blog, $imageUrl);
        }else{
            $this->blogBasicInfoUpdate($request, $blog);
        }
        return redirect()->route('backend.manage-blog')->with('success', 'Blog has been updated successfully !!');
    }
    public function deleteBlog($id){
        Blog::where('id', $id)->delete();
        return redirect()->route('backend.manage-blog')->with('success', 'Blog has been deleted successfully !!');
    }

    public function unpublishedBlog($id){
        $blog = Blog::find($id);
        $blog->blog_status = 2;
        $blog->save();

        return redirect()->route('backend.manage-blog')->with('success', 'Blog has been successfully unpublished !!');
    }
    public function publishedBlog($id){
        $blog = Blog::find($id);
        $blog->blog_status = 1;
        $blog->save();

        return redirect()->route('backend.manage-blog')->with('success', 'Blog has been successfully published !!');
    }

}
