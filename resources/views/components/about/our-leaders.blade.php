@if(isset($teamSections, $team) && $teamSections != '' && $team != '')
<section class="team-one">
    <div class="container">
        <div class="section-title text-center">
            <span class="section-title__tagline">{{ $team->team_sub_title }}</span>
            <h2 class="section-title__title">{{ $team->team_title }}</h2>
        </div>
        <div class="row">
            @foreach($teamSections as $teamSection)
            <div class="col-xl-3 col-lg-6 col-md-6">
                <!--Team One Single-->
                <div class="team-one__single wow fadeInUp" data-wow-delay="100ms">
                    <div class="team-one__img-box">
                        <div class="team-one__img">
                            <img class="lazy" data-original="{{ asset('admin/image/team/'.$teamSection->member_image) }}" alt=""> 
                        </div>
                        <div class="team-one__social">
                            <a href="{{ $teamSection->twitter }}"><i class="fab fa-twitter"></i></a>
                            <a href="{{ $teamSection->facebook }}" class="clr-fb"><i class="fab fa-facebook"></i></a>
                            <a href="{{ $teamSection->pinterest }}" class="clr-dri"><i class="fab fa-pinterest-p"></i></a>
                            <a href="{{ $teamSection->instagram }}" class="clr-ins"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="team-one__member-info">
                        <h4 class="team-one__member-name">{{ $teamSection->member_name }}</h4>
                        <p class="team-one__member-title">{{ $teamSection->member_position }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif