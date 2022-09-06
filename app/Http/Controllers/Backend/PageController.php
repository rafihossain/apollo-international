<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageModel;
use App\Models\Section;
use App\Models\PageSectionModel;
use Illuminate\Support\Str;

class PageController extends Controller
{
    
    protected function pageInfoValidate($request){
        $validated = $request->validate([
            'page_name' => 'required',
            'page_title' => 'required',
            'page_type' => 'required',
            'meta_title' => 'required',
            'meta_key_word'=>'required',
            'meta_description'=>'required',
            // 'country'=>'required',
        ]);

    }

    protected function pageupdateValidate($request){
        $validated = $request->validate([
            'page_name' => 'required',
            'page_title' => 'required',
            'page_url' => 'required|regex:/^[a-z-0-9S*]+$/',
            'meta_title' => 'required',
            'meta_key_word'=>'required',
            'meta_description'=>'required',
            // 'country'=>'required',
        ]);

    }

    protected function pageupdatenewValidate($request){
        $validated = $request->validate([
            'page_name' => 'required',
            'page_title' => 'required',
            'page_url' => 'required|unique:pages,page_url|regex:/^[a-z-0-9S*]+$/',
            'meta_title' => 'required',
            'meta_key_word'=>'required',
            'meta_description'=>'required',
            // 'country'=>'required',
        ]);

    }

    public function addpage()
    {
          $section=Section::all()->toArray();
  
         return view('backend.page.addpage',compact('section'));
    }

    public function savepage(Request $req)
    {
        //for validation---------------
        $this->pageInfoValidate($req);

        if(empty($req->country))
        {
            $country='all';
        }
        else
        {
            $country=implode(',',$req->country);
        }

        $page_url= Str::slug($req->page_title);   
        $slugCheck = PageModel::where('page_url', 'like', '%'.$page_url.'%')->get();

        $slugValue = '';
        if(count($slugCheck) > 0){
              $slugValue = $page_url.'-'.count($slugCheck);
        }else{
            $slugValue = $page_url;
        }

        $page=new PageModel();
        $page->page_name=$req->page_name;
        $page->page_title=$req->page_title;
        $page->page_type=$req->page_type;
        $page->page_url=$slugValue;
        $page->meta_title=$req->meta_title;
        $page->meta_key_word=$req->meta_key_word;
        $page->meta_description=$req->meta_description;
        $page->country=$country;
        $page->save();

        $page_id=$page->id;
        $page_section=$req->page_section;

        if(!empty($page_section))
        {
            foreach ($page_section as $key=>$page_sections) {
                if(!empty($page_section[$key]))
                {
                    PageSectionModel::create([
                        'page_id' => $page_id,
                        'section'=>$page_section[$key],

                    ]);
                }
            }
        }

        // echo '<pre>';
        // print_r($req->column_width);
        // die();
        
        return redirect()->route('backend.allpages')->with('success', 'Successfully Inserted');   

    }

    public function allpages()
    {
        $all_page=PageModel::all()->toArray();
        
        return view('backend.page.page_list', compact('all_page'));

    }

    public function page_delete($id)
    {
        $page=PageModel::where('id', $id)->delete();
        if($page)
        {
            PageSectionModel::where('page_id',$id)->delete();
            return redirect()->route('backend.allpages')->with('delete', 'Successfully Deleted');  
        }
    }


    public function page_edit($id)
    {

       $page=PageModel::with('page_section')->find($id)->toArray();
        $section=Section::all()->toArray();
  
        return view('backend.page.edit_page', compact('page','section'));
    }

    public function page_update(Request $req)
    {
        
       $id=$req->page_id;
       $page_info=PageModel::find($id)->toArray();

       if($page_info['page_url'] == $req->page_url)
       {
            //for validation----------------- 
            $this->pageupdateValidate($req);
       }
       else
       {
            //for validation----------------- 
            $this->pageupdatenewValidate($req);
       }

       

       if(empty($req->country))
        {
            $country='all';
        }
        else
        {
            $country=implode(',',$req->country);
        }

        // $page_url= Str::slug($req->page_title);   
        // $slugCheck = PageModel::where('page_url', 'like', '%'.$page_url.'%')->get();

        // $slugValue = '';
        // if(count($slugCheck) > 0){
        //       $slugValue = $page_url.'-'.count($slugCheck);
        // }else{
        //     $slugValue = $page_url;
        // }
     
     
        $page= PageModel::find($id);

        $page->page_name=$req->page_name;
        $page->page_title=$req->page_title;
        $page->page_url=$req->page_url;
        $page->meta_title=$req->meta_title;
        $page->meta_key_word=$req->meta_key_word;
        $page->meta_description=$req->meta_description;
        $page->country=$country;
        $page->status=$req->status;
       
        $page->save(); 

        PageSectionModel::where('page_id', $id)->delete();

        $page_section=$req->page_section;

        if(!empty($page_section))
        {
            foreach ($page_section as $key=>$page_sections) {
                if(!empty($page_section[$key]))
                {
                    PageSectionModel::create([
                        'page_id' => $id,
                        'section'=>$page_section[$key],

                    ]);
                }
            }
        }


        return redirect()->route('backend.allpages')->with('success', 'Successfully Updated');
    }
}
