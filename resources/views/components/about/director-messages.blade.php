@if(isset($directorMessage) && $directorMessage != '')
<section class="about-two">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-5">
                <div class="about-two__image"> 
                    <img class="lazy  img-fluid" data-original="{{ asset('admin/image/section/director_image/'.$directorMessage->director_image) }}" alt=""> 
                </div><!-- /.about-two__image -->
            </div><!-- /.col-md-12 -->
            <div class="col-md-12 col-lg-7">
                <div class="about-two__content">
                    <div class="section-title text-left">
                        <span class="section-title__tagline">{{ $directorMessage->director_tagline }}</span>
                        <h2 class="section-title__title">{{ $directorMessage->director_name }}</h2>
                    </div>
                    {!! $directorMessage->director_description !!}
                </div><!-- /.about-two__content -->
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.about-two -->
@endif