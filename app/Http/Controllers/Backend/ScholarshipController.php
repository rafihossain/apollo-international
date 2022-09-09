<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ScholarshipModel;
use Image;
use File;

class ScholarshipController extends Controller
{
    protected function partnerInfoValidateSave($request){
        $request->validate([
            'category_name' => 'required',
            'category_image' => 'required',
        ]);
    }
    protected function partnerInfoValidateUpdate($request){
        $request->validate([
            'category_name' => 'required',
        ]);
    }
    protected function scholarshipImageUpload($request){
        $categoryImage = $request->file('category_image');

        $image = Image::make($categoryImage);
        $fileType = $categoryImage->getClientOriginalExtension();
        $imageName = 'scholarship_'.time().'_'.rand(10000, 999999).'.'.$fileType;
        $directory = 'admin/image/scholarship/';
        $imageUrl = $directory.$imageName;
        $image->save($imageUrl);
        
        $thumbnail = $directory."thumbnail/".$imageName;
        $image->resize(260, 130, function($constraint) {
            $constraint->aspectRatio();
        });
        $image->save($thumbnail);

        return $thumbnail;
    }
    protected function partnerBasicInfoSave($request, $imageUrl){
        $scholarship = new ScholarshipModel;
        $scholarship->category_name = $request->category_name;
        $scholarship->category_image = $imageUrl;
        if(isset($request->category_status)){
            $scholarship->category_status = 1;
        }else{
            $scholarship->category_status = 2;
        }
        $scholarship->save();
    }
    protected function scholarshipBasicInfoUpdate($request, $scholarship, $imageUrl=null){
        $scholarship->category_name = $request->category_name;
        if($imageUrl){
            $scholarship->category_image = $imageUrl;
        }
        if(isset($request->category_status)){
            $scholarship->category_status = 1;
        }else{
            $scholarship->category_status = 2;
        }
        // echo "<pre>"; print_r($scholarship); die();
        $scholarship->save();
    }
    
    public function manageScholarship(){
        $scholarships = ScholarshipModel::get();
        return view('backend.scholarship.manage_scholarship', [
            'scholarships' => $scholarships
        ]);
    }
    public function addScholarship(){
        return view('backend.scholarship.add_scholarship');
    }
    public function saveScholarship(Request $request){
        // echo "<pre>"; print_r($_POST); die();

        $this->partnerInfoValidateSave($request);
        $imageUrl = $this->scholarshipImageUpload($request);
        $this->partnerBasicInfoSave($request, $imageUrl);

        return redirect()->back()->with('success', 'Scholarship has been added successfully !!');
    }

    public function editScholarship($id){
        $scholarship = ScholarshipModel::find($id);
        return view('backend.scholarship.edit_scholarship',[
            'scholarship' => $scholarship
        ]);
    }
    public function updateScholarship(Request $request){
        // echo 11; die();

        $this->partnerInfoValidateUpdate($request);
        $categoryImage = $request->file('category_image');
        $scholarship = ScholarshipModel::find($request->id);

        if($categoryImage){
            if (File::exists($scholarship->category_image)) {
                unlink($scholarship->category_image);
            }
            $imageUrl = $this->scholarshipImageUpload($request);
            $this->scholarshipBasicInfoUpdate($request, $scholarship, $imageUrl);
        }else{
            $this->scholarshipBasicInfoUpdate($request, $scholarship);
        }
        return redirect()->back()->with('success', 'Scholarship has been updated successfully !!');
    }

    public function deleteScholarship($id){
        ScholarshipModel::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Scholarship has been deleted successfully !!');
    }
}
