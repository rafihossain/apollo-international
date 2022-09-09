<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;
use Image;
use File;

class PartnerController extends Controller
{
    protected function partnerInfoValidateSave($request){
        $request->validate([
            'partner_name' => 'required',
            'partner_category' => 'required',
            'partner_image' => 'required',
        ]);
    }
    protected function partnerInfoValidateUpdate($request){
        $request->validate([
            'partner_name' => 'required',
            'partner_category' => 'required',
        ]);
    }
    protected function partnerImageUpload($request){
        $partnerImage = $request->file('partner_image');

        $image = Image::make($partnerImage);
        $fileType = $partnerImage->getClientOriginalExtension();
        $imageName = 'partner_'.time().'_'.rand(10000, 999999).'.'.$fileType;
        $directory = 'admin/image/partner/';
        $imageUrl = $directory.$imageName;
        $image->save($imageUrl);
        
        $thumbnail = $directory."thumbnail/".$imageName;
        $image->resize(null, 200, function($constraint) {
            $constraint->aspectRatio();
        });
        $image->save($thumbnail);

        return $thumbnail;
    }
    protected function partnerBasicInfoSave($request, $imageUrl){
        $partner = new Partner;
        $partner->partner_name = $request->partner_name;
        $partner->partner_category = $request->partner_category;
        $partner->partner_image = $imageUrl;
        if(isset($request->partner_status)){
            $partner->partner_status = 1;
        }else{
            $partner->partner_status = 2;
        }
        $partner->save();
    }
    protected function partnerBasicInfoUpdate($request, $partner, $imageUrl=null){
        // echo "<pre>"; print_r($_POST); die();
        $partner->partner_name = $request->partner_name;
        $partner->partner_category = $request->partner_category;
        $partner->partner_sorting = $request->partner_sorting;
        if($imageUrl){
            $partner->partner_image = $imageUrl;
        }
        if(isset($request->partner_status)){
            $partner->partner_status = 1;
        }else{
            $partner->partner_status = 2;
        }
        $partner->save();
    }
    
    public function managePartner(){
        $partners = Partner::orderBy('partner_sorting', 'ASC')->get();
        return view('backend.partner.manage_partner', [
            'partners' => $partners
        ]);
    }
    public function addPartner(){
        return view('backend.partner.add_partner');
    }
    public function savePartner(Request $request){
        $this->partnerInfoValidateSave($request);
        $imageUrl = $this->partnerImageUpload($request);
        $this->partnerBasicInfoSave($request, $imageUrl);

        return redirect()->route('backend.manage-partner')->with('success', 'Partner has been added successfully !!');
    }

    public function editPartner($id){
        $partner = Partner::find($id);
        return view('backend.partner.edit_partner',[
            'partner' => $partner
        ]);
    }
    public function updatePartner(Request $request){
        $this->partnerInfoValidateUpdate($request);
        $partnerImage = $request->file('partner_image');
        $partner = Partner::find($request->id);

        if($partnerImage){
            if (File::exists($partner->partner_image)) {
                unlink($partner->partner_image);
            }
            $imageUrl = $this->partnerImageUpload($request);
            $this->partnerBasicInfoUpdate($request, $partner, $imageUrl);
        }else{
            $this->partnerBasicInfoUpdate($request, $partner);
        }
        return redirect()->route('backend.manage-partner')->with('success', 'Partner has been updated successfully !!');
    }

    public function deletePartner($id){
        Partner::where('id', $id)->delete();
        return redirect()->route('backend.manage-partner')->with('success', 'Partner has been deleted successfully !!');
    }
}
