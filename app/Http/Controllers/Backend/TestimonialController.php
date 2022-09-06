<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use Image;
use File;

class TestimonialController extends Controller
{
    protected function testimonialInfoValidateSave($request){
        $request->validate([
            'user_name' => 'required',
            'user_comment' => 'required',
            'user_image' => 'required',
            'user_rating' => 'required',
        ]);
    }
    protected function testimonialInfoValidateUpdate($request){
        $request->validate([
            'user_name' => 'required',
            'user_comment' => 'required',
            'user_rating' => 'required',
        ]);
    }
    protected function testimonialImageUpload($request){
        $userImage = $request->file('user_image');

        $image = Image::make($userImage);
        $fileType = $userImage->getClientOriginalExtension();
        $imageName = 'testimonial_'.time().'_'.rand(10000, 999999).'.'.$fileType;
        $directory = 'admin/image/testimonial/';
        $imageUrl = $directory.$imageName;
        $image->save($imageUrl);
        
        $thumbnail = $directory."thumbnail/".$imageName;
        $image->resize(null, 200, function($constraint) {
            $constraint->aspectRatio();
        });
        $image->save($thumbnail);

        return $thumbnail;
    }
    protected function testimonialBasicInfoSave($request, $imageUrl){
        $testimonial = new Testimonial;
        $testimonial->user_name = $request->user_name;
        $testimonial->user_comment = $request->user_comment;
        $testimonial->user_image = $imageUrl;
        $testimonial->user_rating = $request->user_rating;
        if(isset($request->user_status)){
            $testimonial->user_status = 1;
        }else{
            $testimonial->user_status = 2;
        }
        $testimonial->save();
    }
    protected function testimonialBasicInfoUpdate($request, $testimonial, $imageUrl=null){
        $testimonial->user_name = $request->user_name;
        $testimonial->user_comment = $request->user_comment;
        if($imageUrl){
            $testimonial->user_image = $imageUrl;
        }
        $testimonial->user_rating = $request->user_rating;
        if(isset($request->user_status)){
            $testimonial->user_status = 1;
        }else{
            $testimonial->user_status = 2;
        }
        $testimonial->save();
    }
    public function manageTestimonial(){
        $testimonials = Testimonial::get();
        return view('backend.testimonial.manage_testimonial',[
            'testimonials' => $testimonials
        ]);
    }
    public function addTestimonial(){
        return view('backend.testimonial.add_testimonial');
    }
    public function saveTestimonial(Request $request){
        $this->testimonialInfoValidateSave($request);
        $imageUrl = $this->testimonialImageUpload($request);
        $this->testimonialBasicInfoSave($request, $imageUrl);

        return redirect()->route('backend.manage-testimonial')->with('success', 'Testimonial has been added successfully !!');
    }
    public function editTestimonial($id){
        $testimonial = Testimonial::find($id);
        return view('backend.testimonial.edit_testimonial',[
            'testimonial' => $testimonial
        ]);
    }
    public function updateTestimonial(Request $request){
        $this->testimonialInfoValidateUpdate($request);
        $userImage = $request->file('user_image');
        $testimonial = Testimonial::find($request->id);

        if($userImage){
            if (File::exists($testimonial->user_image)) {
                unlink($testimonial->user_image);
            }
            $imageUrl = $this->testimonialImageUpload($request);
            $this->testimonialBasicInfoUpdate($request, $testimonial, $imageUrl);
        }else{
            $this->testimonialBasicInfoUpdate($request, $testimonial);
        }
        return redirect()->route('backend.manage-testimonial')->with('success', 'Testimonial has been updated successfully !!');
    }
    public function deleteTestimonial($id){
        Testimonial::where('id', $id)->delete();
        return redirect()->route('backend.manage-testimonial')->with('success', 'Testimonial has been deleted successfully !!');
    }
}
