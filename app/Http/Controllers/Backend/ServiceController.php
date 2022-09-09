<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Str;
use App\Models\ServiceCategory;
use Image;
use File;

class ServiceController extends Controller
{
    //Service Category
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
    protected function categoryBasicInfoUpdate($request, $serviceCategory,$imageurl=""){
        if($imageurl)
        {
          $serviceCategory->category_image=$imageurl; 
        }

        $serviceCategory->meta_title = $request->meta_title;
        $serviceCategory->meta_keywords = $request->meta_keywords;
        $serviceCategory->meta_description = $request->meta_description;
        $serviceCategory->category_name = $request->category_name;
        $serviceCategory->category_slug = $request->category_slug;
        $serviceCategory->category_description = $request->category_description;
        $serviceCategory->save();
    }
    public function manageCategory(){
        $serviceCategories = ServiceCategory::all();
        return view('backend.service.category.manage_category', [
            'serviceCategories' => $serviceCategories
        ]);
    }
    public function addCategory(){
        return view('backend.service.category.add_category');
    }
    
      protected function category_image_upload($request)
    {
        $categoryImage = $request->file('category_header_image');

        $image = Image::make($categoryImage);
        $fileType = $categoryImage->getClientOriginalExtension();
        $imageName = 'category_header_logo_'.time().'_'.rand(10000, 999999).'.'.$fileType;
        $directory = 'admin/image/category_image/';
        $imageUrl = $directory.$imageName;
        $image->save($imageUrl);

        return $imageUrl;
    }
    
    public function saveCategory(Request $request){
        $this->categoryInfoValidate($request);
        $categorySlug = Str::slug($request->category_name);

        $slugCheck = ServiceCategory::where('category_slug', 'like', '%'.$categorySlug.'%')->get();
        
        $slugValue = '';
        if(count($slugCheck) > 0){
              $slugValue = $categorySlug.'-'.count($slugCheck);
        }else{
            $slugValue = $categorySlug;
        }

        $serviceCategory = new ServiceCategory;
        $serviceCategory->meta_title = $request->meta_title;
        $serviceCategory->meta_keywords = $request->meta_keywords;
        $serviceCategory->meta_description = $request->meta_description;
        $serviceCategory->category_name = $request->category_name;
        $serviceCategory->category_slug = $slugValue;
        $serviceCategory->category_description = $request->category_description;
        $serviceCategory->category_image=$this->category_image_upload($request);
        $serviceCategory->save();
        return redirect()->route('backend.manage-service-category')->with('success', 'Category has been added successfully !!');
    }
    public function editCategory($id){
        $editCategory = ServiceCategory::find($id);
        // dd($editCategory);
        return view('backend.service.category.edit_category',[
            'editCategory' => $editCategory
        ]);
    }
    public function updateCategory(Request $request){

        $categoryImage = $request->file('category_header_image');

        $serviceCategory = ServiceCategory::find($request->id);

        if($serviceCategory->category_slug == $request->category_slug){
            $this->categoryInfoValidateUpdate($request);
        }else{
            $this->categoryNewInfoValidateUpdate($request);
        }
        
        if($categoryImage)
        {
            if (File::exists($serviceCategory->category_image)) {
                unlink($serviceCategory->category_image);
            }
            $imageurl=$this->category_image_upload($request);
            $this->categoryBasicInfoUpdate($request, $serviceCategory,$imageurl);
         }
         else
         {
            $this->categoryBasicInfoUpdate($request, $serviceCategory); 
         }

        return redirect()->route('backend.manage-service-category')->with('success', 'Category has been update successfully !!');
    }
    public function deleteCategory($id){
        ServiceCategory::where('id', $id)->delete();
        return redirect()->route('backend.manage-service-category')->with('success', 'Category has been deleted successfully !!');
    }


    //Service
    protected function serviceInfoValidateSave($request){
        $request->validate([
            'service_title' => 'required',
            'meta_title' => 'required',
            'meta_keyword' => 'required',
            'meta_description' => 'required',
            'service_description' => 'required',
            'service_image' => 'required',
            'service_category_id' => 'required',
            //'service_image' => 'required|dimensions:width=1536,min_height=1024'
        ]);
    }
    protected function serviceInfoValidateUpdate($request){
        $request->validate([
            'service_title' => 'required',
            'service_slug' => 'required|regex:/^[a-z-0-9S*]+$/',
            'meta_title' => 'required',
            'meta_keyword' => 'required',
            'meta_description' => 'required',
            'service_description' => 'required',
            'service_category_id' => 'required',
            //'service_image' => 'required|dimensions:width=1536,min_height=1024'
        ]);
    }
    protected function serviceNewInfoValidateUpdate($request){
        $request->validate([
            'service_title' => 'required',
            'service_slug' => 'required|unique:services,service_slug|regex:/^[a-z-0-9S*]+$/',
            'meta_title' => 'required',
            'meta_keyword' => 'required',
            'meta_description' => 'required',
            'service_description' => 'required',
            'service_category_id' => 'required',
            //'service_image' => 'required|dimensions:width=1536,min_height=1024'
        ]);
    }
    protected function serviceImageUpload($request){
        $serviceImage = $request->file('service_image');

        $image = Image::make($serviceImage);
        $fileType = $serviceImage->getClientOriginalExtension();
        $imageName = 'service_'.time().'_'.rand(10000, 999999).'.'.$fileType;
        $directory = 'admin/image/service/';
        $imageUrl = $directory.$imageName;
        $image->save($imageUrl);
        
        $thumbnail = $directory."thumbnail/".$imageName;
        // $image->resize(null, 200, function($constraint) {
        //     $constraint->aspectRatio();
        // });
        $image->resize(370, 426);
        $image->save($thumbnail);

        return $thumbnail;
    }
    
    protected function serviceImageUpload_new($request){

        $serviceImage = $request->file('service_header_image');

        $image = Image::make($serviceImage);
        $fileType = $serviceImage->getClientOriginalExtension();
        $imageName = 'service_header_logo_'.time().'_'.rand(10000, 999999).'.'.$fileType;
        $directory = 'admin/image/service/';
        $imageUrl = $directory.$imageName;
        $image->save($imageUrl);
        
        $thumbnail = $directory."thumbnail/".$imageName;
        // $image->resize(null, 200, function($constraint) {
        //     $constraint->aspectRatio();
        // });
        $image->resize(370, 426);
        $image->save($thumbnail);

        return $thumbnail;
    }
    
    protected function serviceBasicInfoSave($request, $imageUrl,$header_imageUrl){
        $serviceSlug = Str::slug($request->service_title);

        $slugCheck = Service::where('service_slug', 'like', '%'.$serviceSlug.'%')->get();
        
        $slugValue = '';
        if(count($slugCheck) > 0){
              $slugValue = $serviceSlug.'-'.count($slugCheck);
        }else{
            $slugValue = $serviceSlug;
        }

        $service = new Service;
        $service->service_title = $request->service_title;
        $service->service_slug = $slugValue;
        $service->service_category_id = $request->service_category_id;
        $service->meta_title = $request->meta_title;
        $service->meta_keyword = $request->meta_keyword;
        $service->meta_description = $request->meta_description;
        $service->service_description = $request->service_description;
        $service->service_image = $imageUrl;
        $service->service_header_image = $header_imageUrl;
        if(isset($request->service_status)){
            $service->service_status = 1;
        }else{
            $service->service_status = 2;
        }
        $service->save();
    }
    protected function serviceBasicInfoUpdate($request, $service, $imageUrl=null, $header_imageUrl=""){

        $service->service_title = $request->service_title;
        $service->service_slug = $request->service_slug;
        $service->service_category_id = $request->service_category_id;
        $service->meta_title = $request->meta_title;
        $service->meta_keyword = $request->meta_keyword;
        $service->meta_description = $request->meta_description;
        $service->service_description = $request->service_description;
        if($imageUrl){
            $service->service_image = $imageUrl;
        }
        if($header_imageUrl){
            $service->service_header_image = $header_imageUrl;
        }
        if(isset($request->service_status)){
            $service->service_status = 1;
        }else{
            $service->service_status = 2;
        }
        
        $service->save();
    }
    public function manageService(){
        $services = Service::with('category')->get();
        return view('backend.service.manage_service',[
            'services' => $services
        ]);
    }
    public function addService(){
        $serviceCategories = ServiceCategory::all();
        return view('backend.service.add_service', [
            'serviceCategories'=>$serviceCategories
        ]);
    }
    public function saveService(Request $request){
        $this->serviceInfoValidateSave($request);
        $imageUrl = $this->serviceImageUpload($request);
        $header_imageUrl = $this->serviceImageUpload_new($request);
        $this->serviceBasicInfoSave($request,$imageUrl,$header_imageUrl);

        return redirect()->route('backend.manage-service')->with('success', 'Service has been added successfully !!');
    }
    public function viewService($id){
        $service = Service::find($id);
        return view('backend.service.view_service',[
            'service' => $service,
        ]);
    }
    public function editService($id){
        $service = Service::with('category')->find($id);
        // dd($service);

        $serviceCategories = ServiceCategory::all();
        return view('backend.service.edit_service',[
            'service' => $service,
            'serviceCategories' => $serviceCategories
        ]);
    }
    public function updateService(Request $request){

        $service = Service::find($request->id);
        if($service->service_slug == $request->service_slug){
            $this->serviceInfoValidateUpdate($request);
        }else{
            $this->serviceNewInfoValidateUpdate($request);
        }

        $serviceImage = $request->file('service_image');
        $service_header_image = $request->file('service_header_image');
        $service = Service::find($request->id);
        $service_new_image=explode('/',$service->service_image);
        $service_header_image_new=explode('/',$service->service_header_image);
        
    
        if($serviceImage){
            if (File::exists($service->service_image)) {
                unlink($service->service_image);
            }
            if (File::exists('admin/image/section/service/' . $service_new_image[4])) {
                unlink('admin/image/section/service/' . $service_new_image[4]);
            }
            $imageUrl = $this->serviceImageUpload($request);
            $this->serviceBasicInfoUpdate($request, $service, $imageUrl, $header_imageUrl="");
        }
        if($service_header_image)
        {
            if(!empty($service_header_image_new[0]))
            {
                if (File::exists($service->service_header_image)) {
                    unlink($service->service_header_image);
                }
                if (File::exists('admin/image/section/service/'.$service_header_image_new[4])) {
                    unlink('admin/image/section/service/'.$service_header_image_new[4]);
                }
            }
            $header_imageUrl = $this->serviceImageUpload_new($request);
            $this->serviceBasicInfoUpdate($request, $service,$imageUrl="",$header_imageUrl);
        }
        else
        {
            $this->serviceBasicInfoUpdate($request, $service);
        }
        return redirect()->route('backend.manage-service')->with('success', 'Service has been updated successfully !!');
    }
    public function deleteService($id){
        Service::where('id', $id)->delete();
        return redirect()->route('backend.manage-service')->with('success', 'Service has been deleted successfully !!');
    }
}
