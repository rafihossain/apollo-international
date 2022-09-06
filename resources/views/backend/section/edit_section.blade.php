@extends('backend.layouts.app')
@section('title', 'Edit Section')
@section('content')

<form action="{{route('backend.update_section')}}" id="addsection" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="section_id" value="{{$one_section['id']}}">
    <input type="hidden"  name="section_type" value="{{$one_section['section_type']}}">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="form-group mb-2">
                        <label>Section Name</label>
                        <input type="text" class="form-control @error('section_name') is-invalid @enderror" name="section_name" value="{{$one_section['section_name']}}">
                        @error('section_name')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label>Section type </label>
                        <select name="section_type" class="form-control selectsections" disabled>
                            <option value="">Select type</option>
                            <option value="banner" @if($one_section['section_type'] == 'banner') selected @endif>Banner</option>
                            <option value="section_calculator"  @if($one_section['section_type'] == 'section_calculator') selected @endif>Section calculator</option>
                            <option value="home_aboutus"  @if($one_section['section_type'] == 'home_aboutus') selected @endif>Home AboutUS</option>
                            <option value="skills"  @if($one_section['section_type'] == 'skills') selected @endif>Skills</option>
                            <option value="home_faq"  @if($one_section['section_type'] == 'home_faq') selected @endif>Home FAQ</option>
                            <option value="home_testimonial"  @if($one_section['section_type'] == 'home_testimonial') selected @endif>Home Testimonial</option>
                            <option value="home_service"  @if($one_section['section_type'] == 'home_service') selected @endif>Home Service</option>
                            <option value="home_blog"  @if($one_section['section_type'] == 'home_blog') selected @endif>Home Blog</option>
                            <option value="home_partner"  @if($one_section['section_type'] == 'home_partner') selected @endif>Home Partner</option>
                            <option value="home_current_scholarship"  @if($one_section['section_type'] == 'home_current_scholarship') selected @endif>Home Current Scholarships</option>
                            <option value="about_the_company"  @if($one_section['section_type'] == 'about_the_company') selected @endif>About The Company</option>
                            <option value="about_director_message"  @if($one_section['section_type'] == 'about_director_message') selected @endif>About Director Message</option>
                            <option value="about_our_team" @if($one_section['section_type'] == 'about_our_team') selected @endif>About Our Team</option>
                            <option value="about_vision" @if($one_section['section_type'] == 'about_vision') selected @endif>About Vision</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Section Edit View Start -->
<div id="new_banner">    
@if($one_section['section_type'] == 'banner')
        <?php $banner=json_decode($one_section['section_value'],true); //echo '<pre>'; print_r($banner);die();?>
    @if(count($banner)>0)
        <h4>Banner</h4>
    <?php 
   
    if(!empty($banner))
    {
        foreach ($banner as $key=>$sections) {
            //  echo "<pre>";
            // print_r($sections);
            // die();
    ?>      
        <div class="card"> 
            <div class="card-body"> 
                <div class="form-group mb-2"> 
                    <label>Banner Title</label> 
                    <input type="text" class="form-control" name="banner_title[]" value="{{$sections['banner_title']}}"> 
                </div> 
                <div class="form-group mb-2"> 
                    <label>Banner Content</label> 
                    <textarea class="form-control" name="banner_content[]" placeholder="Description">{{$sections['banner_content']}}</textarea> 
                </div> 
                <div class="form-group mb-2"> 
                    <label> Banner Link </label> 
                    <input type="text" class="form-control" name="banner_link[]" value="{{$sections['banner_link']}}"> 
                </div> 
                <div class="form-group mb-2"> 
                    <label> Banner Image or Video </label> 
                    <input type="file" class="imageupload" data-height="200" name="banner_image[]" data-default-file="{{asset($sections['banner_image'])}}"/> 
                    <input type="hidden" name="old_banner_image[]" value="{{$sections['banner_image']}}">
                </div> 
            </div> 
        </div>
      <?php } } ?>      
        <div id="">
                <h3>Add banner</h3>
                <div class="bannercontent">

                </div>
                <div class="addbanner"><i class="mdi mdi-plus"></i> </div>
        </div>
        @else
        <div id="">
                <h3>Add banner</h3>
                <div class="bannercontent">

                </div>
                <div class="addbanner"><i class="mdi mdi-plus"></i> </div>
        </div>   
        @endif
@endif
</div>
@if($one_section['section_type'] == 'home_aboutus')
<div id="new_about_us_news">
            <?php  $about_us=json_decode($one_section['section_value'],true); //echo '<pre>'; print_r($about_us);die();?>
                <h3>Home About Us</h3>
                <div class="contentslider">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group mb-2">
                                <label>Title</label> 
                                <input type="text" class="form-control" name="about_us_title" value="{{$about_us['title']}}">
                                @error('about_us_title')
                                <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label>Sub Title</label>
                                <textarea class="form-control" name="about_us_sub_title">{{$about_us['sub_title']}}</textarea>
                                @error('about_us_sub_title')
                                <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label>Trusted</label>
                                <input type="number" class="form-control" name="trusted" value="{{$about_us['trusted']}}">
                                @error('trusted')
                                <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label>Description</label>
                                <textarea id="editor1" class="form-control" name="about_description">{{$about_us['description']}}</textarea>
                                @error('about_description')
                                <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label>Image</label> 
                                <input type="file" class="imageupload" name="about_us_image" data-default-file="{{ asset('admin/image/section/home_about/thumbnail')}}/{{$about_us['about_image']}}">
                                <input type="hidden" value="{{$about_us['about_image']}}" name="old_about_image">
                                @error('about_us_image')
                                <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>     

</div>
@endif

@if($one_section['section_type'] == 'skills')
<?php $skills=json_decode($one_section['section_value'],true);?>
<div id="">
        <h3>Skill Set</h3>
        <div class="contentslider">
            <div class="card">
                <div class="card-body">
                    <div class="form-group mb-2">
                        <label>Student</label>
                        <input type="number" class="form-control" name="student" value="{{$skills['student']}}">
                        @error('student')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label>Global Office</label>
                        <input type="number" class="form-control" name="global_office" value="{{$skills['global_office']}}">
                        @error('global_office')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label>Visa</label>
                        <input type="number" class="form-control" name="visa" value="{{$skills['visa']}}">
                        @error('visa')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label>Scholarship</label>
                        <input type="number" class="form-control" name="scholarship" value="{{$skills['scholarship']}}">
                        @error('scholarship')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>

                </div>
            </div>
        </div>
    </div>
@endif

@if($one_section['section_type'] == 'home_testimonial')
  <?php $testimonial=json_decode($one_section['section_value'],true); //echo '<pre>'; print_r($testimonial);die();?> 
 <div id="">
        <h3>Home Testimonial</h3>
        <div class="contentslider">
            <div class="card">
                <div class="card-body">
                    <div class="form-group mb-2">
                        <label>Title</label>
                        <input type="text" class="form-control" name="testimonial_title" value="{{$testimonial['testimonial_title']}}">
                        @error('testimonial_title')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label>Sub Title</label>
                        <input type="text" class="form-control" name="testimonial_sub_title" value="{{$testimonial['testimonial_sub_title']}}">
                        @error('testimonial_sub_title')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label>Number of testimonial</label>
                        <input type="number" class="form-control" name="testimonial_no" value="{{$testimonial['testimonial_no']}}">
                        @error('testimonial_no')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>

                </div>
            </div>
        </div>
    </div>          

@endif

@if($one_section['section_type'] == 'home_faq')
<?php $home_faq=json_decode($one_section['section_value'],true); //echo '<pre>'; print_r($home_faq);die();?>
<div id="">
        <h3>Home Faq</h3>
        <div class="card">
            <div class="card-body">
                <div class="form-group mb-2">
                    <label>Faq tagline</label>
                    <input type="text" class="form-control @error('tagline') is-invalid @enderror" name="tagline" value="{{$home_faq['tagline']}}">
                    @error('tagline')
                    <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label>Faq title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{$home_faq['title']}}">
                    @error('title')
                    <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label>Number Of Faq</label>
                    <input type="number" class="form-control @error('number_of_faq') is-invalid @enderror" name="number_of_faq" value="{{$home_faq['number_of_faq']}}">
                    @error('number_of_faq')
                    <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label>Image title</label>
                    <input type="text" class="form-control @error('image_title') is-invalid @enderror" name="image_title" value="{{$home_faq['image_title']}}">
                    @error('image_title')
                    <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label>Image</label>
                    <input type="file" class="imageupload" name="faq_image" data-default-file="{{asset($home_faq['faq_image'])}}">
                    <input type="hidden" name="old_faq_image" id="" value="{{$home_faq['faq_image']}}">
                    @error('faq_image')
                    <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
            </div>
        </div>

        <!-- <div class="addbanner"><i class="mdi mdi-plus"></i> </div> -->
    </div>         
@endif

@if($one_section['section_type'] == 'home_service')
<?php $home_service=json_decode($one_section['section_value'],true);?>
 <div id="">
        <h3>Home Service</h3>
        <div class="contentslider">
            <div class="card">
                <div class="card-body">
                    <div class="form-group mb-2">
                        <label>Title</label>
                        <input type="text" class="form-control" name="service_title" value="{{$home_service['service_title']}}">
                        @error('service_title')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label>Sub Title</label>
                        <input type="text" class="form-control" name="service_sub_title" value="{{$home_service['service_sub_title']}}">
                        @error('service_sub_title')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label>Number of Service</label>
                        <input type="number" class="form-control" name="no_of_service" value="{{$home_service['no_of_service']}}">
                        @error('no_of_service')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>

                </div>
            </div>
        </div>
    </div>

@endif

@if($one_section['section_type'] == 'home_blog')
<?php $home_blog=json_decode($one_section['section_value'],true);?>
<div id="">
        <h3>Home Blog</h3>
        <div class="contentslider">
            <div class="card">
                <div class="card-body">
                    <div class="form-group mb-2">
                        <label>Title</label>
                        <input type="text" class="form-control" name="blog_title" value="{{$home_blog['blog_title']}}">
                        @error('blog_title')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label>Sub Title</label>
                        <input type="text" class="form-control" name="blog_sub_title" value="{{$home_blog['blog_sub_title']}}">
                        @error('blog_sub_title')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label>Number of blog</label>
                        <input type="number" class="form-control" name="no_of_blog" value="{{$home_blog['no_of_blog']}}">
                        @error('no_of_blog')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>

                </div>
            </div>
        </div>
    </div>
@endif

@if($one_section['section_type'] == 'home_partner')
<?php $home_blog=json_decode($one_section['section_value'],true); ?>
<div id="">
        <h3>Home partner</h3>
        <div class="contentslider">
            <div class="card">
                <div class="card-body">
                    <div class="form-group mb-2">
                        <label>Title</label>
                        <input type="text" class="form-control" name="partner_title" value="{{$home_blog['partner_title']}}">
                        @error('partner_title')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>

                    @foreach($home_blog['partner_category'] as $key=>$partner_categories)
                    <div class="card">
                    <div class="card-body">
                    <div class="row align-items-end">
                        <div class="col-5"> 
                            <div class="form-group">
                                <label>Partner category</label> 
                                <select class="form-control" name="partner_category[]" id="">
                                    <option value="">Select Category</option>
                                    <option value="australia" @if($partner_categories == 'australia') selected @endif>Australia</option>
                                    <option value="canada" @if($partner_categories == 'canada') selected @endif>Canada</option>
                                    <option value="partner" @if($partner_categories == 'partner') selected @endif>Professional Year Partners</option>
                                    <option value="health" @if($partner_categories == 'health') selected @endif>Health Insurance</option>
                                    <option value="accreditation" @if($partner_categories == 'accreditation') selected @endif>Professional Accreditation</option>
                                    <option value="scholarship" @if($partner_categories == 'scholarship') selected @endif>PCurrent Scholarships</option>
                                </select></div> 
                            </div> 
                            <div class="col-5">
                                <div class="form-group">
                                    <label>Number of partner</label> 
                                    <input type="number" class="form-control" name="no_of_partner[]" value="{{$home_blog['no_of_partner'][$key]}}">
                                </div>
                            </div>
                            <div class="col-2"> 
                                <button class="btn btn-danger removecontentsection" type="button"><i class="mdi mdi-trash-can-outline"></i>
                            </button> 
                        </div> 
                    </div>
                    </div> 
                    </div>
                    @endforeach
       
                </div>
                <div class="contentsection"></div>
                <div class="addpagesection"> <i class="mdi mdi-plus"></i> </div>
            </div>
        </div>
</div>
@endif

@if($one_section['section_type'] == 'home_current_scholarship')
<?php $current_scholarship=json_decode($one_section['section_value'],true); ?>
<div id="">
        <h3>Current scholarship</h3>
        <div class="contentslider">
            <div class="card">
                <div class="card-body">
                    <div class="form-group mb-2">
                        <label>Title</label>
                        <input type="text" class="form-control" name="current_scholarship_title" value="{{$current_scholarship['current_scholarship_title']}}">
                        @error('current_scholarship_title')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label>Image</label> <input type="file" class="imageupload" name="current_scholarship_image[]" multiple>
                        <input type="hidden" name="old_current_scholarship_image" value="{{json_encode($current_scholarship['current_scholarship_image'])}}">
                        @error('current_scholarship_image')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                </div>

            </div>
        </div>
    </div>
@endif

@if($one_section['section_type'] == 'about_the_company')
<?php $about_the_company=json_decode($one_section['section_value'],true); //echo '<pre>'; print_r($about_the_company);die();?>         
   <div id="">
        <h3>About Our Company</h3>
        <div class="contentslider">
            <div class="card">
                <div class="card-body">
                    <div class="form-group mb-2">
                        <label>Company Title</label>
                        <input type="text" class="form-control" name="company_title" value="{{$about_the_company['company_title']}}">
                        @error('company_title')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label>Company Description</label>
                        <textarea name="company_description" id="editor2" class="form-control">{{$about_the_company['company_description']}}</textarea>
                        @error('company_description')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label>Image</label>
                        <input type="file" class="imageupload" name="company_image[]" multiple>
                        <input type="hidden" name="old_company_image" value="{{json_encode($about_the_company['company_image'])}}">
                        @error('company_image')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                </div>

            </div>
        </div>
    </div>

@endif

@if($one_section['section_type'] == 'about_director_message')
<?php $about_director_message=json_decode($one_section['section_value'],true); //echo '<pre>'; print_r($about_director_message);die();?> 
  <div id="">
        <h3>About Director Message</h3>
        <div class="contentslider">
            <div class="card">
                <div class="card-body">
                    <div class="form-group mb-2">
                        <label>Director Tagline</label>
                        <input type="text" class="form-control" name="director_tagline" value="{{$about_director_message['director_tagline']}}">
                        @error('director_tagline')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label>Director Name</label>
                        <input type="text" class="form-control" name="director_name" value="{{$about_director_message['director_name']}}">
                        @error('director_name')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label>Director Description</label>
                        <textarea name="director_description" id="editor3" class="form-control">{{$about_director_message['director_description']}}</textarea>
                        @error('director_description')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label>Image</label>
                        <input type="file" class="imageupload" name="director_image" data-default-file="{{ asset('admin/image/section/director_image/thumbnail')}}/{{$about_director_message['director_image']}}">
                        <input type="hidden" value="{{$about_director_message['director_image']}}" name="old_director_image">
                        @error('director_image')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                </div>

            </div>
        </div>
    </div>
@endif

@if($one_section['section_type'] == 'about_our_team')
<?php $about_our_team=json_decode($one_section['section_value'],true); //echo '<pre>'; print_r($about_our_team);die();?>
<div id="">
        <h3>About Our Team</h3>
        <div class="contentslider">
            <div class="card">
                <div class="card-body">
                    <div class="form-group mb-2">
                        <label>Title</label>
                        <input type="text" class="form-control" name="team_title" value="{{$about_our_team['team_title']}}">
                        @error('team_title')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label>Sub Title</label>
                        <input type="text" class="form-control" name="team_sub_title" value="{{$about_our_team['team_sub_title']}}">
                        @error('team_sub_title')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label>Number of Team</label>
                        <input type="number" class="form-control" name="no_of_team" value="{{$about_our_team['no_of_team']}}">
                        @error('no_of_team')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

@if($one_section['section_type'] == 'about_vision')
<?php $about_vision=json_decode($one_section['section_value'],true); //echo '<pre>'; print_r($about_vision);die();?>
<div id="">
        <h3>About Vision</h3>
        <div class="contentslider">
            <div class="card">
                <div class="card-body">
                    <div class="form-group mb-2">
                        <label>Vision Description</label>
                        <textarea name="vision_description" id="editor4" class="form-control">{{$about_vision['vision_description']}}</textarea>
                        @error('vision_description')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label>Vision Image</label>
                        <input type="file" class="imageupload" name="vision_image" data-default-file="{{ asset('admin/image/section/vision_image/thumbnail')}}/{{$about_vision['vision_image']}}">
                        <input type="hidden" name="old_vision_image" id="" value="{{$about_vision['vision_image']}}">
                        @error('vision_image')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                </div>

            </div>
        </div>
</div>
@endif
    <div class="text-center">
        <button class="btn btn-primary" type="submit"> Save Section </button>
    </div>
</form>


<script type="text/javascript">
    ClassicEditor.create(document.querySelector('#editor1'))
        .then(editor => {
            editor.ui.view.editable.element.style.height = '300px';
        })
        .catch(error => {
            console.error(error);
        });
        ClassicEditor.create(document.querySelector('#editor2'))
        .then(editor => {
            editor.ui.view.editable.element.style.height = '300px';
        })
        .catch(error => {
            console.error(error);
        });

    ClassicEditor.create(document.querySelector('#editor3'))
        .then(editor => {
            editor.ui.view.editable.element.style.height = '300px';
        })
        .catch(error => {
            console.error(error);
        });
    ClassicEditor.create(document.querySelector('#editor4'))
        .then(editor => {
            editor.ui.view.editable.element.style.height = '300px';
        })
        .catch(error => {
            console.error(error);
        });     

    $('#home_about_us').hide();
    $('#skill_id').hide();
    $('#home_faq').hide();
    $('#home_testimonial').hide();
    $('#home_service').hide();
    $('#home_blog').hide();
    $('#home_partner').hide();
    $('#home_current_scholarship').hide();

    $('.selectsections').change(function() {
        $('#banner_home').hide();
        $('#home_about_us').hide();
        $('#skill_id').hide();
        $('#home_faq').hide();
        $('#home_testimonial').hide();
        $('#home_service').hide();
        $('#home_blog').hide();
        $('#home_partner').hide();
  
        if ($(this).val() == 'banner') {
            $('#new_about_us_news').css('display','none');
            $('#new_banner').show();
        } else if ($(this).val() == 'section_calculator') {
            $('#new_about_us_news').css('display','none');
            $('#new_banner').hide();
            $('#single_image').show();
        } else if ($(this).val() == 'home_faq') {
            $('#new_about_us_news').css('display','none');
            $('#new_banner').hide();
            $('#home_faq').show();
        } 
        else if ($(this).val() == 'home_aboutus') {

            $('#new_about_us_news').css('display','block');
            $('#new_banner').hide();

        } else if ($(this).val() == 'skills') {

            $('#new_about_us_news').css('display','none');
            $('#new_banner').hide();
            $('#skill_id').show();

        } else if ($(this).val() == 'home_testimonial') {

            $('#new_about_us_news').css('display','none');
            $('#new_banner').hide();
            $('#home_testimonial').show();
        } else if ($(this).val() == 'home_service') {
            $('#new_about_us_news').css('display','none');
            $('#new_banner').hide();
            $('#home_service').show();
        } else if ($(this).val() == 'home_blog') {
            $('#new_about_us_news').css('display','none');
            $('#new_banner').hide();
            $('#home_blog').show();
        } else if ($(this).val() == 'home_partner') {
            $('#new_about_us_news').css('display','none');
            $('#new_banner').hide();
            $('#home_partner').show();
        } else if ($(this).val() == 'home_current_scholarship') {
            $('#new_about_us_news').css('display','none');
            $('#new_banner').hide();
            $('#home_current_scholarship').show();
        }
    });


    $(".addcontentslider").click(function() {
        $('.contentslider').append('<h4>Slider 1</h4><div class="card"> <div class="card-body"> <div class="form-group mb-2"> <label>Slider Title</label> <input type="text" class="form-control" name=""> </div> <div class="form-group mb-2"> <label>Slider Description</label> <textarea class="form-control"></textarea> </div> <div class="form-group mb-2"> <label>Slider Image</label> <input type="file" class="imageupload" name=""> </div> </div> </div>');
        $('.imageupload').dropify();
    });

    $(".addbanner").click(function() {
        $('.bannercontent').append('<h4>Banner</h4><div class="card"> <div class="card-body"> <div class="form-group mb-2"> <label>Banner Title</label> <input type="text" class="form-control" name="banner_title[]"> </div> <div class="form-group mb-2"> <label>Banner Content</label> <textarea class="form-control" name="banner_content[]" placeholder="Description"></textarea> </div> <div class="form-group mb-2"> <label> Banner Link </label> <input type="text" class="form-control" name="banner_link[]"> </div> <div class="form-group mb-2"> <label> Banner Image or Video </label> <input type="file" class="imageupload" name="banner_image[]" data-height="200" multiple required/> </div> </div> </div>');
        $('.imageupload').dropify();
    });
    $("body").delegate(".removecontentsection", "click", function() {
        $(this).closest('.card').remove();
    });


    $(".addpagesection").click(function() {
        $('.contentsection').append('<div class="card"> <div class="card-body"> <div class="row align-items-end"><div class="col-5"> <div class="form-group"><label>Partner category</label> <select class="form-control" name="partner_category[]" id=""><option value="">Select Category</option><option value="australia">Australia</option><option value="canada">Canada</option><option value="partner">Professional Year Partners</option><option value="health">Health Insurance</option><option value="accreditation">Professional Accreditation</option><option value="scholarship">PCurrent Scholarships</option></select></div> </div> <div class="col-5"><div class="form-group"><label>Number of partner</label> <input type="number" class="form-control" name="no_of_partner[]"></div></div><div class="col-2"> <button class="btn btn-danger removecontentsection" type="button"><i class="mdi mdi-trash-can-outline"></i></button> </div> </div> </div> </div>');
    });
    $("body").delegate(".removecontentsection", "click", function() {
        $(this).closest('.card').remove();
    });

    var quill = new Quill("#editor", {
        theme: "snow",
        modules: {
            toolbar: [
                [{
                    font: []
                }, {
                    size: []
                }],
                ["bold", "italic", "underline", "strike"],
                [{
                    color: []
                }, {
                    background: []
                }],
                [{
                    script: "super"
                }, {
                    script: "sub"
                }],
                [{
                    header: [!1, 1, 2, 3, 4, 5, 6]
                }, "blockquote", "code-block"],
                [{
                    list: "ordered"
                }, {
                    list: "bullet"
                }, {
                    indent: "-1"
                }, {
                    indent: "+1"
                }],
                ["direction", {
                    align: []
                }],
                ["link", "image", "video"],
                ["clean"]
            ]
        }
    })
</script>
@endsection