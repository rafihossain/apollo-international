@if(isset($teamSections, $team) && $teamSections != '' && $team != '')
<section class="team-one">
    <div class="container">
        <!--<div class="section-title text-center">-->
        <!--    <span class="section-title__tagline">{{ $team->team_sub_title }}</span>-->
        <!--    <h2 class="section-title__title">{{ $team->team_title }}</h2>-->
        <!--</div>-->
         
            @foreach($teamSections as $teamSection)
            <div class="row mb-4">
                <div class="col-md-12 col-lg-5">
                    <div class="about-two__image"> 
                        <img class="lazy  img-fluid" data-original="{{ asset('admin/image/team/'.$teamSection->member_image) }}" alt=""> 
                    </div><!-- /.about-two__image -->
                </div><!-- /.col-md-12 -->
                <div class="col-md-12 col-lg-7">
                    <div class="about-two__content">
                        <div class="section-title text-left">
                            <span class="section-title__tagline">{{ $teamSection->member_name }}</span>
                            <h2 class="section-title__title">{{ $teamSection->member_position }}</h2>
                        </div>
                       {!!$teamSection->member_description!!}
                    </div><!-- /.about-two__content -->
                </div><!-- /.col-md-12 -->
            </div><!-- /.row --> 
            @endforeach
        
    </div>
</section>
@endif