@if(isset($aboutVision) && $aboutVision != '')
<!--Reasons End-->
<section class="about-two">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-6">
                <div class="about-two__image"> 
                    <img class="lazy  img-fluid" data-original="{{ asset('admin/image/section/vision_image/'.$aboutVision->vision_image) }}" alt="" > 
                </div><!-- /.about-two__image -->
            </div><!-- /.col-md-12 -->
            <div class="col-md-12 col-lg-6">
                <div class="about-two__content"> 
                    
                    {!! $aboutVision->vision_description !!}
                   
                </div><!-- /.about-two__content -->
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.about-two -->
@endif