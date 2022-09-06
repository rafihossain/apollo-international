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
            'category_image' => 'required',
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
    protected function serviceCategoryImageUpload($request){
        $categoryImage = $request->file('category_image');

        $image = Image::make($categoryImage);
        $fileType = $categoryImage->getClientOriginalExtension();
        $imageName = 'service_category_'.time().'_'.rand(10000, 999999).'.'.$fileType;
        $directory = 'admin/image/service/category/';
        $imageUrl = $directory.$imageName;
        $image->save($imageUrl);
        
        $thumbnail = $directory."thumbnail/".$imageName;
        $image->resize(null, 200, function($constraint) {
            $constraint->aspectRatio();
        });
        $image->save($thumbnail);

        return $thumbnail;
    }
    protected function categoryBasicInfoUpdate($request, $serviceCategory, $imageUrl=null){
        $serviceCategory->meta_title = $request->meta_title;
        $serviceCategory->meta_keywords = $request->meta_keywords;
        $serviceCategory->meta_description = $request->meta_description;
        $serviceCategory->category_name = $request->category_name;
        $serviceCategory->category_slug = $request->category_slug;
        $serviceCategory->category_description = $request->category_description;
        if($serviceCategory){
            $serviceCategory->category_image = $imageUrl;
        }
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
    public function saveCategory(Request $request){
        $this->categoryInfoValidate($request);
        $categorySlug = Str::slug($request->category_name);

        $slugCheck = ServiceCategory::where('category_slug', 'like', '%'.$categorySlug.'%')->get();
        // echo "<pre>"; print_r($slugCheck); die();
        
        $slugValue = '';
        if(count($slugCheck) > 0){
              $slugValue = $categorySlug.'-'.count($slugCheck);
        }else{
            $slugValue = $categorySlug;
        }
        $imageUrl = $this->serviceCategoryImageUpload($request);

        $serviceCategory = new ServiceCategory;
        $serviceCategory->meta_title = $request->meta_title;
        $serviceCategory->meta_keywords = $request->meta_keywords;
        $serviceCategory->meta_description = $request->meta_description;
        $serviceCategory->category_name = $request->category_name;
        $serviceCategory->category_slug = $slugValue;
        $serviceCategory->category_image = $imageUrl;
        $serviceCategory->category_description = $request->category_description;
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

        $categoryImage = $request->file('category_image');
        $serviceCategory = ServiceCategory::find($request->id);

        if($serviceCategory->category_slug == $request->category_slug){
            $this->categoryInfoValidateUpdate($request);
        }else{
            $this->categoryNewInfoValidateUpdate($request);
        }
        
        if($categoryImage){
            if (File::exists($serviceCategory->category_image)) {
                unlink($serviceCategory->category_image);
            }
            $imageUrl = $this->serviceCategoryImageUpload($request);
            $this->categoryBasicInfoUpdate($request, $serviceCategory, $imageUrl);
        }else{
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
        ]);
    }
    protected function serviceInfoValidateUpdate($request){
        $request->validate([
            'service_title' => 'required',
            'service_slug' => 'required|regex:/^[a-z-0-9S*]+$/',
            'meta_title' => 'required',
            'meta_keyword' => 'required',
            'meta_description' => 'required',
            'service_description' => 'required'
        ]);
    }
    protected function serviceNewInfoValidateUpdate($request){
        $request->validate([
            'service_title' => 'required',
            'service_slug' => 'required|unique:services,service_slug|regex:/^[a-z-0-9S*]+$/',
            'meta_title' => 'required',
            'meta_keyword' => 'required',
            'meta_description' => 'required',
            'service_description' => 'required'
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
        $image->resize(null, 200, function($constraint) {
            $constraint->aspectRatio();
        });
        $image->save($thumbnail);

        return $thumbnail;
    }
    protected function serviceBasicInfoSave($request, $imageUrl){
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
        if(isset($request->service_status)){
            $service->service_status = 1;
        }else{
            $service->service_status = 2;
        }
        $service->save();
    }
    protected function serviceBasicInfoUpdate($request, $service, $imageUrl=null){
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
        return view('backend.service.add_service');
    }
    public function saveService(Request $request){
        $this->serviceInfoValidateSave($request);
        $imageUrl = $this->serviceImageUpload($request);
        $this->serviceBasicInfoSave($request, $imageUrl);

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
        $service = Service::find($request->id);

        if($serviceImage){
            if (File::exists($service->service_image)) {
                unlink($service->service_image);
            }
            $imageUrl = $this->serviceImageUpload($request);
            $this->serviceBasicInfoUpdate($request, $service, $imageUrl);
        }else{
            $this->serviceBasicInfoUpdate($request, $service);
        }
        return redirect()->route('backend.manage-service')->with('success', 'Service has been updated successfully !!');
    }
    public function deleteService($id){
        Service::where('id', $id)->delete();
        return redirect()->route('backend.manage-service')->with('success', 'Service has been deleted successfully !!');
    }
}
