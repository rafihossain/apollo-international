<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudyabroadModel;
use Illuminate\Support\Str;
use Image;
use File;

class StudyabroadController extends Controller
{

    protected function addStudyInfoValidate($request)
    {
        $request->validate([
            'country_name' => 'required',
            'subtitle' => 'required',
            'title' => 'required',
            'meta_title' => 'required',
            'meta_keyword' => 'required',
            'meta_description' => 'required',
            'studyabroad_description' => 'required',
            'studyabroad_image'=>'required',
            'header_image'=>'required',
        ]);
    }

    protected function studyInfoValidateUpdate($request)
    {
        $request->validate([
            'country_name' => 'required',
            'subtitle' => 'required',
            'title' => 'required',
            'studyabroad_slug' => 'required|regex:/^[a-z-0-9S*]+$/',
            'meta_title' => 'required',
            'meta_keyword' => 'required',
            'meta_description' => 'required',
            'studyabroad_description' => 'required',
        ]);
    }
    protected function studyNewInfoValidateUpdate($request)
    {
        $request->validate([
            'country_name' => 'required',
            'subtitle' => 'required',
            'title' => 'required',
            'studyabroad_slug' => 'required|unique:services,service_slug|regex:/^[a-z-0-9S*]+$/',
            'meta_title' => 'required',
            'meta_keyword' => 'required',
            'meta_description' => 'required',
            'studyabroad_description' => 'required',
        ]);
    }

    public function manageStudyabroad()
    {
        $studyabroads = StudyabroadModel::get();
        // dd($studyabroads);

        return view('backend.study-abroad.manage_studyabroad', [
            'studyabroads' => $studyabroads,
        ]);
    }

    public function addStudyabroad()
    {
        // echo 11; die();
        // $testimonials = Testimonial::get();
        return view('backend.study-abroad.add_studyabroad', [
            // 'testimonials' => $testimonials
        ]);
    }

    protected function studyabroadImageUpload($request)
    {
        $studyabroadImage = $request->file('studyabroad_image');

        $image = Image::make($studyabroadImage);
        $fileType = $studyabroadImage->getClientOriginalExtension();
        $imageName = 'study-abroad_' . time() . '_' . rand(10000, 999999) . '.' . $fileType;
        $directory = 'admin/image/study-abroad/';
        $imageUrl = $directory . $imageName;
        $image->save($imageUrl);

        $thumbnail = $directory . "thumbnail/" . $imageName;
        $image->resize(370, 250);
        $image->save($thumbnail);

        return $thumbnail;
    }

    protected function studyabroadImageUploadHeader($request){

        $headerImage = $request->file('header_image');

        $image = Image::make($headerImage);
        $fileType = $headerImage->getClientOriginalExtension();
        $imageName = 'header_logo_'.time().'_'.rand(10000, 999999).'.'.$fileType;
        $directory = 'admin/image/study-abroad/';
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

    public function saveStudyabroad(Request $request)
    {
        $this->addStudyInfoValidate($request);

        $studyabroadSlug = Str::slug($request->title);

        $studyabroadCheck = StudyabroadModel::where('studyabroad_slug', 'like', '%'.$studyabroadSlug.'%')->get();
        
        $slugValue = '';
        if(count($studyabroadCheck) > 0){
              $slugValue = $studyabroadSlug.'-'.count($studyabroadCheck);
        }else{
            $slugValue = $studyabroadSlug;
        }

        $imageUrl = $this->studyabroadImageUpload($request);
        $headerImageUrl = $this->studyabroadImageUploadHeader($request);

        $studyabroad = new StudyabroadModel;
        $studyabroad->country_name = $request->country_name;
        $studyabroad->subtitle = $request->subtitle;
        $studyabroad->title = $request->title;
        $studyabroad->related_partner = $request->related_partner;
        $studyabroad->studyabroad_slug = $slugValue;
        $studyabroad->meta_title = $request->meta_title;
        $studyabroad->meta_keyword = $request->meta_keyword;
        $studyabroad->meta_description = $request->meta_description;
        $studyabroad->studyabroad_description = $request->studyabroad_description;
        $studyabroad->studyabroad_image = $imageUrl;
        $studyabroad->header_image = $headerImageUrl;
        $studyabroad->studyabroad_status = $request->studyabroad_status;
        $studyabroad->save();

        return redirect()->back()->with('success', 'Studyabroad has been added successfully !!');
    }
    protected function studyabroadBasicInfoUpdate($request, $studyabroad, $imageUrl = null, $headerImageUrl = null)
    { 
        // echo $headerImageUrl; die();

        $studyabroad->country_name = $request->country_name;
        $studyabroad->subtitle = $request->subtitle;
        $studyabroad->title = $request->title;
        $studyabroad->related_partner = $request->related_partner;
        $studyabroad->studyabroad_slug = $request->studyabroad_slug;
        $studyabroad->meta_title = $request->meta_title;
        $studyabroad->meta_keyword = $request->meta_keyword;
        $studyabroad->meta_description = $request->meta_description;
        $studyabroad->studyabroad_description = $request->studyabroad_description;

        if($imageUrl){
            $studyabroad->studyabroad_image = $imageUrl;
        }
        if($headerImageUrl){
            $studyabroad->header_image = $headerImageUrl;
        }
        
        $studyabroad->studyabroad_status = $request->studyabroad_status;
        // echo "<pre>"; print_r($studyabroad); die();

        $studyabroad->save();
    }

    public function editStudyabroad($id)
    {
        $studyabroad = StudyabroadModel::find($id);
        // dd($studyabroad);
        return view('backend.study-abroad.edit_studyabroad', [
            'studyabroad' => $studyabroad
        ]);
    }

    public function updateStudyabroad(Request $request)
    {
        $studyabroad = StudyabroadModel::find($request->id);
        if($studyabroad->studyabroad_slug == $request->studyabroad_slug){
            $this->studyInfoValidateUpdate($request);
        }else{
            $this->studyNewInfoValidateUpdate($request);
        }

        $this->studyInfoValidateUpdate($request);
        $studyabroadImage = $request->file('studyabroad_image');
        $headerImage = $request->file('header_image');
        $studyabroad = StudyabroadModel::find($request->id);

        // echo 11; die();

        if ($studyabroadImage) {
            // echo 12; die();
            if (File::exists($studyabroad->studyabroad_image)) {
                unlink($studyabroad->studyabroad_image);
            }
            $imageUrl = $this->studyabroadImageUpload($request);
            $this->studyabroadBasicInfoUpdate($request, $studyabroad, $imageUrl, $headerImageUrl = '');
        }
        if($headerImage){
            // echo 13; die();
            if (File::exists($studyabroad->header_image)) {
                unlink($studyabroad->header_image);
            }
            $headerImageUrl = $this->studyabroadImageUploadHeader($request);
            // echo $headerImageUrl; die();
            $this->studyabroadBasicInfoUpdate($request, $studyabroad, $imageUrl = '', $headerImageUrl);
        }else {
            // echo 14; die();
            $this->studyabroadBasicInfoUpdate($request, $studyabroad);
        }
        return redirect()->back()->with('success', 'Studyabroad has been updated successfully !!');
    }

    public function deleteStudyabroad($id){
        StudyabroadModel::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Studyabroad has been deleted successfully !!');
    }
}
