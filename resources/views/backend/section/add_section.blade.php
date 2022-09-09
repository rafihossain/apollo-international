@extends('backend.layouts.app')
@section('title', 'Add Section')
@section('content')

<form action="{{route('backend.save-section')}}" id="addsection" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="form-group mb-2">
                        <label>Section Name</label>
                        <input type="text" class="form-control @error('section_name') is-invalid @enderror" name="section_name" value="{{old('section_name')}}">
                        @error('section_name')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label>Section type </label>
                        <select name="section_type" class="form-control selectsections">
                            <option value="">Select type</option>
                            <option value="banner">Banner</option>
                            <option value="occupation_search">Occupation Search</option>
                            <option value="home_aboutus">Home AboutUS</option>
                            <option value="skills">Skills</option>
                            <option value="home_faq">Home FAQ</option>
                            <option value="home_testimonial">Home Testimonial</option>
                            <option value="home_service">Home Service</option>
                            <option value="home_blog">Home Blog</option>
                            <option value="home_partner">Home Partner</option>
                            <option value="home_current_scholarship">Home Current Scholarships</option>
                            <option value="about_the_company">About The Company</option>
                            <option value="about_director_message">About Director Message</option>
                            <option value="about_our_team">About Our Team</option>
                            <option value="about_vision">About Vision</option>
                            <option value="carrer_section">Carrer</option>
                            <option value="franchise_section">Franchise Options</option>
                            <option value="scholarship_section">Scholarship</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- banner start -->
    <div id="banner_home">
        <h3>Add banner</h3>
        <div class="bannercontent">

        </div>
        <div class="addbanner"><i class="mdi mdi-plus"></i> </div>
    </div>

    <!-- content slider start-->
    <div id="home_about_us">
        <h3>Home About Us</h3>
        <div class="contentslider">
            <div class="card">
                <div class="card-body">
                    <div class="form-group mb-2">
                        <label>Title</label> <input type="text" class="form-control" name="about_us_title">
                        @error('about_us_title')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label>Sub Title</label>
                        <textarea class="form-control" name="about_us_sub_title"></textarea>
                        @error('about_us_sub_title')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label>Trusted</label>
                        <input type="number" class="form-control" name="trusted">
                        @error('trusted')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label>Description</label>
                        <textarea id="editor1" class="form-control" name="about_description"></textarea>
                        @error('about_description')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label>Image</label> <input type="file" class="imageupload" name="about_us_image">
                        @error('about_us_image')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Skills Start -->
    <div id="skill_id">
        <h3>Skill Set</h3>
        <div class="contentslider">
            <div class="card">
                <div class="card-body">
                    <div class="form-group mb-2">
                        <label>Student</label>
                        <input type="number" class="form-control" name="student">
                        @error('student')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label>Global Office</label>
                        <input type="number" class="form-control" name="global_office">
                        @error('global_office')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label>Visa</label>
                        <input type="number" class="form-control" name="visa">
                        @error('visa')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label>Scholarship</label>
                        <input type="number" class="form-control" name="scholarship">
                        @error('scholarship')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Skills End -->

    <!-- banner start -->
    <div id="home_faq">
        <h3>Home Faq</h3>
        <div class="card">
            <div class="card-body">
                <div class="form-group mb-2">
                    <label>Faq tagline</label>
                    <input type="text" class="form-control @error('tagline') is-invalid @enderror" name="tagline" value="{{old('tagline')}}">
                    @error('tagline')
                    <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label>Faq title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title">
                    @error('title')
                    <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label>Number Of Faq</label>
                    <input type="number" class="form-control @error('number_of_faq') is-invalid @enderror" name="number_of_faq">
                    @error('number_of_faq')
                    <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label>Image title</label>
                    <input type="text" class="form-control @error('image_title') is-invalid @enderror" name="image_title">
                    @error('image_title')
                    <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label>Image</label>
                    <input type="file" class="imageupload" name="faq_image">
                    @error('faq_image')
                    <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
            </div>
        </div>

        <!-- <div class="addbanner"><i class="mdi mdi-plus"></i> </div> -->
    </div>
    <!-- banner end -->

    <!-- Home testimonial Start -->
    <div id="home_testimonial">
        <h3>Home Testimonial</h3>
        <div class="contentslider">
            <div class="card">
                <div class="card-body">
                    <div class="form-group mb-2">
                        <label>Title</label>
                        <input type="text" class="form-control" name="testimonial_title">
                        @error('testimonial_title')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label>Sub Title</label>
                        <input type="text" class="form-control" name="testimonial_sub_title">
                        @error('testimonial_sub_title')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label>Number of testimonial</label>
                        <input type="number" class="form-control" name="testimonial_no">
                        @error('testimonial_no')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Home testimonial End -->

    <!-- Home Service Start -->
    <div id="home_service">
        <h3>Home Service</h3>
        <div class="contentslider">
            <div class="card">
                <div class="card-body">
                    <div class="form-group mb-2">
                        <label>Title</label>
                        <input type="text" class="form-control" name="service_title">
                        @error('service_title')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label>Sub Title</label>
                        <input type="text" class="form-control" name="service_sub_title">
                        @error('service_sub_title')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label>Number of Service</label>
                        <input type="number" class="form-control" name="no_of_service">
                        @error('no_of_service')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Home Service End -->

    <!-- home blog Start -->
    <div id="home_blog">
        <h3>Home Blog</h3>
        <div class="contentslider">
            <div class="card">
                <div class="card-body">
                    <div class="form-group mb-2">
                        <label>Title</label>
                        <input type="text" class="form-control" name="blog_title">
                        @error('blog_title')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label>Sub Title</label>
                        <input type="text" class="form-control" name="blog_sub_title">
                        @error('blog_sub_title')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label>Number of blog</label>
                        <input type="number" class="form-control" name="no_of_blog">
                        @error('no_of_blog')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- home blog End -->

    <!-- home Partner Start -->
    <div id="home_partner">
        <h3>Home partner</h3>
        <div class="contentslider">
            <div class="card">
                <div class="card-body">
                    <div class="form-group mb-2">
                        <label>Title</label>
                        <input type="text" class="form-control" name="partner_title">
                        @error('partner_title')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                </div>
                <div class="contentsection"></div>
            </div>
         <div class="addpagesection"> <i class="mdi mdi-plus"></i> </div>
        </div>
    </div>
    <!-- home Partner End -->

    <!-- current scholarship Start -->
    <div id="home_current_scholarship">
        <h3>Current scholarship</h3>
        <div class="contentslider">
            <div class="card">
                <div class="card-body">
                    <div class="form-group mb-2">
                        <label>Title</label>
                        <input type="text" class="form-control" name="current_scholarship_title">
                        @error('current_scholarship_title')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label>Image</label> <input type="file" class="imageupload" name="current_scholarship_image[]" multiple>
                        @error('current_scholarship_image')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- current scholarship End -->

    <!-- about_the_company Start -->
    <div id="about_the_company">
        <h3>About Our Company</h3>
        <div class="contentslider">
            <div class="card">
                <div class="card-body">
                    <div class="form-group mb-2">
                        <label>Company Title</label>
                        <input type="text" class="form-control" name="company_title">
                        @error('company_title')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label>Company Description</label>
                        <textarea name="company_description" id="editor2" class="form-control"></textarea>
                        @error('company_description')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label>Image</label>
                        <input type="file" class="imageupload" name="company_image[]" multiple>
                        @error('company_image')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- about_the_company End -->

    <!-- about director message Start -->
    <div id="about_director_message">
        <h3>About Director Message</h3>
        <div class="contentslider">
            <div class="card">
                <div class="card-body">
                    <div class="form-group mb-2">
                        <label>Director Tagline</label>
                        <input type="text" class="form-control" name="director_tagline">
                        @error('director_tagline')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label>Director Name</label>
                        <input type="text" class="form-control" name="director_name">
                        @error('director_name')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label>Director Description</label>
                        <textarea name="director_description" id="editor3" class="form-control"></textarea>
                        @error('director_description')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label>Image</label>
                        <input type="file" class="imageupload" name="director_image">
                        @error('director_image')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- about director message End -->

    <!-- About Our Team Start -->
    <div id="about_our_team">
        <h3>About Our Team</h3>
        <div class="contentslider">
            <div class="card">
                <div class="card-body">
                    <div class="form-group mb-2">
                        <label>Title</label>
                        <input type="text" class="form-control" name="team_title">
                        @error('team_title')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label>Sub Title</label>
                        <input type="text" class="form-control" name="team_sub_title">
                        @error('team_sub_title')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label>Number of Team</label>
                        <input type="number" class="form-control" name="no_of_team">
                        @error('no_of_team')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Our Team End -->

    <!-- About Vision Start -->
    <div id="about_vision">
        <h3>About Vision</h3>
        <div class="contentslider">
            <div class="card">
                <div class="card-body">
                    <div class="form-group mb-2">
                        <label>Vision Description</label>
                        <textarea name="vision_description" id="editor4" class="form-control"></textarea>
                        @error('vision_description')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label>Vision Image</label>
                        <input type="file" class="imageupload" name="vision_image">
                        @error('vision_image')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- About Vision End -->

    <!-- About Vision Start -->
    <div id="carrer_section">
        <h3>Carrer</h3>
        <div class="contentslider">
            <div class="card">
                <div class="card-body">
                    <div class="form-group mb-2">
                        <label>Carrer Description</label>
                        <textarea name="carrer_description" id="editor5" class="form-control"></textarea>
                        @error('carrer_description')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- About Vision End -->
     
    <!-- About Vision Start -->
      <div id="franchise_section">
        <h3>Franchise Options</h3>
        <div class="contentslider">
            <div class="card">
                <div class="card-body">
                    <div class="form-group mb-2">
                        <label>Franchise Description</label>
                        <textarea name="franchise_description" id="editor6" class="form-control"></textarea>
                        @error('franchise_description')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- About Vision End -->
    
    <!-- About Vision Start -->
    <div id="scholarship_section">
        <h3>Scholarship</h3>
        <div class="contentslider">
            <div class="card">
                <div class="card-body">
                    <div class="form-group mb-2">
                        <label>Scholarship Description</label>
                        <textarea name="scholarship_description" id="summernote" class="form-control"></textarea>
                        @error('scholarship_description')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Vision End -->

    <div class="text-center">
        <button class="btn btn-primary" type="submit"> Save Section </button>
    </div>
</form>


<script type="text/javascript">
 
      $('#summernote').summernote({
        placeholder: 'Hello stand alone ui',
        tabsize: 2,
        height:220,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
    
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

    ClassicEditor.create(document.querySelector('#editor5'))
        .then(editor => {
            editor.ui.view.editable.element.style.height = '300px';
        })
        .catch(error => {
            console.error(error);
        });
    ClassicEditor.create(document.querySelector('#editor6'))
        .then(editor => {
            editor.ui.view.editable.element.style.height = '300px';
        })
        .catch(error => {
            console.error(error);
        });
    ClassicEditor.create(document.querySelector('#editor7'))


    //Home
    $('#home_about_us').hide();
    $('#skill_id').hide();
    $('#home_faq').hide();
    $('#home_testimonial').hide();
    $('#home_service').hide();
    $('#home_blog').hide();
    $('#home_partner').hide();
    $('#home_current_scholarship').hide();
    $('#carrer_section').hide();
    $('#franchise_section').hide();
    $('#scholarship_section').hide();
    
    //About Us
    $('#about_the_company').hide();
    $('#about_director_message').hide();
    $('#about_our_team').hide();
    $('#about_vision').hide();

    $('.selectsections').change(function() {
        //Home
        $('#banner_home').hide();
        $('#home_about_us').hide();
        $('#skill_id').hide();
        $('#home_faq').hide();
        $('#home_testimonial').hide();
        $('#home_service').hide();
        $('#home_blog').hide();
        $('#home_partner').hide();
        $('#home_partner').hide();
        $('#franchise_section').hide();
        $('#scholarship_section').hide();
        
        //About Us
        $('#about_the_company').hide();
        $('#about_director_message').hide();
        $('#about_our_team').hide();
        $('#about_vision').hide();

        if ($(this).val() == 'banner') {
            $('#banner_home').show();
        } else if ($(this).val() == 'section_calculator') {
            $('#single_image').show();
        } else if ($(this).val() == 'home_faq') {
            $('#home_faq').show();
        } else if ($(this).val() == 'home_aboutus') {
            $('#home_about_us').show();
        } else if ($(this).val() == 'skills') {
            $('#skill_id').show();
        } else if ($(this).val() == 'home_testimonial') {
            $('#home_testimonial').show();
        } else if ($(this).val() == 'home_service') {
            $('#home_service').show();
        } else if ($(this).val() == 'home_blog') {
            $('#home_blog').show();
        } else if ($(this).val() == 'home_partner') {
            $('#home_partner').show();
        } else if ($(this).val() == 'home_current_scholarship') {
            $('#home_current_scholarship').show();
        } else if ($(this).val() == 'about_the_company') {
            $('#about_the_company').show();
        } else if ($(this).val() == 'about_director_message') {
            $('#about_director_message').show();
        } else if ($(this).val() == 'about_our_team') {
            $('#about_our_team').show();
        } else if ($(this).val() == 'about_vision') {
            $('#about_vision').show();
        } else if ($(this).val() == 'carrer_section') {
            $('#carrer_section').show();
        } else if ($(this).val() == 'franchise_section') {
            $('#franchise_section').show();
        } else if ($(this).val() == 'scholarship_section') {
            $('#scholarship_section').show();
        }
    });


    $(".addcontentslider").click(function() {
        $('.contentslider').append('<h4>Slider 1</h4><div class="card"> <div class="card-body"> <div class="form-group mb-2"> <label>Slider Title</label> <input type="text" class="form-control" name=""> </div> <div class="form-group mb-2"> <label>Slider Description</label> <textarea class="form-control"></textarea> </div> <div class="form-group mb-2"> <label>Slider Image</label> <input type="file" class="imageupload" name=""> </div> </div> </div>');
        $('.imageupload').dropify();
    });

    // $(".addbanner").click(function() {
    //     $('.bannercontent').append('<h4>Banner</h4><div class="card"> <div class="card-body"> <div class="form-group mb-2"> <label>Banner Title</label> <input type="text" class="form-control" name="banner_title[]" required> </div> <div class="form-group mb-2"> <label>Banner Content</label> <textarea class="form-control" name="banner_content[]" placeholder="Description" required></textarea> </div> <div class="form-group mb-2"> <label> Banner Link </label> <input type="text" class="form-control" name="banner_link[]" required> </div> <div class="form-group mb-2"> <label> Banner Image or Video </label> <input type="file" class="imageupload" name="banner_image[]" data-height="200" multiple required/> </div> </div> </div>');
    //     $('.imageupload').dropify();
    // });
    
    $(".addbanner").click(function() {
        $('.bannercontent').append('<h4>Banner</h4><div class="card"> <div class="card-body"> <div class="form-group mb-2"> <label>Banner Title</label> <input type="text" class="form-control" name="banner_title[]" required> </div> <div class="form-group mb-2"> <label>Banner Content</label> <textarea class="form-control" name="banner_content[]" placeholder="Description" required></textarea> </div> <div class="form-group mb-2"> <label> Banner Link </label> <input type="text" class="form-control" name="banner_link[]" required> </div> <div class="form-group mb-2"> <label> Banner Image or Video </label> <input type="file" class="imageupload" name="banner_image[]" data-height="200" multiple required/></div><div class="form-group mb-2"><label>Publish Country</label><select class="form-control" name="country[]"><option value="0">All</option><option value="1">Australia</option><option value="2">Bangladesh</option><option value="3">Nepal</option><option value="4">Malaysia</option><option value="5">India</option><option value="6">SriLanka</option><option value="7">Pakistan</option><option value="8">China</option></select></div></div></div>');
        $('.imageupload').dropify();
    });
    
    $("body").delegate(".removecontentsection", "click", function() {
        $(this).closest('.card').remove();
    });


    $(".addpagesection").click(function() {
        $('.contentsection').append('<div class="card"> <div class="card-body"> <div class="row align-items-end"><div class="col-5"> <div class="form-group"><label>Partner category</label> <select class="form-control" name="partner_category[]" id="" required><option value="">Select Category</option><option value="australia">Australia</option><option value="canada">Canada</option><option value="partner">Professional Year Partners</option><option value="health">Health Insurance</option><option value="accreditation">Professional Accreditation</option><option value="scholarship">PCurrent Scholarships</option></select></div> </div> <div class="col-5"><div class="form-group"><label>Number of partner</label> <input type="number" class="form-control" name="no_of_partner[]" required></div></div><div class="col-2"> <button class="btn btn-danger removecontentsection" type="button"><i class="mdi mdi-trash-can-outline"></i></button> </div> </div> </div> </div>');
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