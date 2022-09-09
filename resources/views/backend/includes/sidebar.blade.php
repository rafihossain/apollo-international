<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!-- User box -->
        <div class="user-box text-center">

        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">
                <li>
                    <a href="{{route('backend.dashboard')}}">
                        <i class="fas fa-home"></i>
                        <span> Dashboard </span>
                    </a>
                </li>
                @if((session()->get('user_type') == '1') || (session()->get('user_type') == '2')||(session()->get('user_type') == '3'))   
                <li>
                    <a href="#pages" data-bs-toggle="collapse">
                        <i class="mdi mdi-file-document-multiple-outline mdi-24px"></i>
                        <span>Pages</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="pages">
                          <ul class="nav-second-level">
                            <li>
                                <a href="{{route('backend.allpages')}}">All pages</a>
                            </li>
                            <li>
                                <a href="{{route('backend.addpage')}}">Add page</a>
                            </li>
                            <li>
                                <a href="{{ route('backend.manage-section') }}">All Sections</a>
                            </li>
                            <li>
                                <a href="{{ route('backend.add-section') }}">Add Section</a>
                            </li>
                            
                        </ul>
                    </div>
                </li>
                @endif
                <li>
                    <a href="#service" data-bs-toggle="collapse">
                        <i class="mdi mdi-drag mdi-24px"></i>
                        <span>Our Services</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="service">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('backend.manage-service-category') }}">All Category</a>
                            </li>
                            <li>
                                <a href="{{ route('backend.add-service-category') }}">Add Category</a>
                            </li>
                            <li>
                                <a href="{{ route('backend.manage-service') }}">All Services</a>
                            </li>
                            <li>
                                <a href="{{ route('backend.add-service') }}">Add Service</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#blog" data-bs-toggle="collapse">
                        <i class="mdi mdi-form-select mdi-24px"></i>
                        <span>Blog</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="blog">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('backend.manage-category') }}">All Category</a>
                            </li>
                            <li>
                                <a href="{{ route('backend.add-category') }}">Add Category</a>
                            </li>
                            <li>
                                <a href="{{ route('backend.manage-blog') }}">All Blogs</a>
                            </li>
                            <li>
                                <a href="{{ route('backend.add-blog') }}">Add Blogs</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#studyabroad" data-bs-toggle="collapse">
                        <i class="mdi mdi-form-select mdi-24px"></i>
                        <span>Study Abroad</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="studyabroad">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('backend.manage-studyabroad') }}">All Study Abroad</a>
                            </li>
                            <li>
                                <a href="{{ route('backend.add-studyabroad') }}">Add Study Abroad</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#scholarship" data-bs-toggle="collapse">
                        <i class="mdi mdi-form-select mdi-24px"></i>
                        <span>Scholarships</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="scholarship">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('backend.manage-scholarship') }}">All Scholarship</a>
                            </li>
                            <li>
                                <a href="{{ route('backend.add-scholarship') }}">Add Scholarship</a>
                            </li>
                        </ul>
                    </div>
                </li>
               @if((session()->get('user_type') == '1') || (session()->get('user_type') == '2') || (session()->get('user_type') == '3'))    
                <li>
                    <a href="#partners" data-bs-toggle="collapse">
                        <i class="mdi mdi-account-group-outline mdi-24px"></i>
                        <span>  Partners </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="partners">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('backend.manage-partner') }}">All Partners</a>
                            </li>
                            <li>
                                <a href="{{ route('backend.add-partner') }}">Add Partners</a>
                            </li>
                        </ul>
                    </div>
                </li>
              
                <li>
                    <a href="#testimonial" data-bs-toggle="collapse">
                        <i class="mdi mdi-message-processing-outline mdi-24px"></i>
                        <span>Testimonial </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="testimonial">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('backend.manage-testimonial') }}">All Testimonial </a>
                            </li>
                            <li>
                                <a href="{{ route('backend.add-testimonial') }}">Add Testimonial</a>
                            </li>
                        </ul>
                    </div>
                </li>
             @endif   
                <li>
                    <a href="#settings" data-bs-toggle="collapse">
                        <i class="mdi mdi-cog-outline mdi-24px"></i>
                        <span>Settings</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="settings">
                      <ul class="nav-second-level">
                            @if(session()->get('user_type') == '4')
                            <li>
                                <a href="{{route('backend.social_setting')}}"> Social Setting </a>
                            </li>
                            <li>
                                <a href="{{route('backend.social_link')}}">Social Links</a>
                            </li>
                            <li>
                                <a href="{{route('backend.google_ads') }}">Google Ads</a>
                            </li>
                            <li>
                                <a href="{{ route('backend.facebook_pixel') }}">Facebbok Pixel</a>
                            </li>
                            <li>
                                <a href="{{ route('backend.edit-other') }}">Others</a>
                            </li>
                            @else
                            <li>
                                <a href="{{route('backend.our_team')}}"> Our Teams </a>
                            </li>
                            <li>
                                <a href="{{ route('backend.manage-faq') }}"> Faq </a>
                            </li>
                            <li>
                                <a href="{{ route('backend.edit-wizard') }}">Wizard</a>
                            </li>
                           <li>
                              <a href="{{route('backend.contact_list')}}"> Contact </a>
                            </li>
                            <li>
                              <a href="{{route('backend.contact_email')}}"> Contact Email</a>
                            </li>
                            <li>
                                <a href="{{route('backend.social_setting')}}"> Social Setting </a>
                            </li>
                            <li>
                                <a href="{{route('backend.social_link')}}">Social Links</a>
                            </li>
                            <li>
                                <a href="{{route('backend.google_ads') }}">Google Ads</a>
                            </li>
                            <li>
                                <a href="{{ route('backend.facebook_pixel') }}">Facebbok Pixel</a>
                            </li>
                             <li>
                                <a href="{{ route('backend.global_settings') }}">Global Settings</a>
                            </li>
                            <li>
                                <a href="{{ route('backend.edit-other') }}">Others</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </li>
            @if((session()->get('user_type') == '1') || (session()->get('user_type') == '2') || (session()->get('user_type') == '3'))  
                <li>
                    <a href="{{ route('backend.booking-manage') }}">
                        <i class="mdi mdi-calendar-blank-outline mdi-24px"></i>
                        <span>Booking </span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/subscription') }}">
                        <i class="mdi mdi-book-open-page-variant-outline mdi-24px"></i>
                        <span>Subscription </span>
                    </a>
                </li>
                 <li>
                    <a href="{{ route('backend.user_contact_list') }}">
                        <i class="mdi mdi-contacts-outline mdi-24px"></i>
                        <span>Contact List</span>
                    </a>
                </li>
                <li>
                    <a href="#user" data-bs-toggle="collapse">
                        <i class="mdi mdi-account-outline mdi-24px"></i>
                        <span>User</span>
                        <span class="menu-arrow"></span>
                    </a>
                      <div class="collapse" id="user">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('backend.allusers')}}">All Users</a>
                            </li>
                            <li>
                                <a href="{{ route('backend.create-user')}}">
                                    <span>Add User</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endif    
                <li>
                    <a href="{{ route('logout') }}">
                        <i class="fe-log-out mdi-24px"></i>
                        <span>Logout </span>
                    </a>
                </li>

           
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End