@if(isset($skill) && $skill != '')
<!--Counter One Start-->
<section class="counters-one">
    <div class="container">
        <ul class="counters-one__box list-unstyled">
            <li class="counter-one__single wow fadeInUp" data-wow-delay="100ms">
                <div class="counter-one__icon">
                    <img class="lazy" data-original="{{ asset('frontend/assets/images/icon/students.png') }}" alt="" height="50">
                </div>
                <h3 class="odometer" data-count="{{ $skill->student }}">00</h3>
                <p class="counter-one__text">Students</p>
            </li>
            <li class="counter-one__single wow fadeInUp" data-wow-delay="200ms">
                <div class="counter-one__icon">
                    <img class="lazy" data-original="{{ asset('frontend/assets/images/icon/globaloffice.png') }}" alt="" height="50">

                </div>
                <h3 class="odometer" data-count="{{ $skill->global_office }}">00</h3>
                <p class="counter-one__text">Global Offices</p>
            </li>
            <li class="counter-one__single wow fadeInUp" data-wow-delay="300ms">
                <div class="counter-one__icon">
                    <img class="lazy" data-original="{{ asset('frontend/assets/images/icon/visa.png') }}" alt="" height="50">
                </div>
                <h3 class="odometer" data-count="{{ $skill->visa }}">00</h3>
                <p class="counter-one__text">Visas</p>
            </li>
            <li class="counter-one__single wow fadeInUp" data-wow-delay="400ms">
                <div class="counter-one__icon">
                    <img class="lazy" data-original="{{ asset('frontend/assets/images/icon/scholarship.png') }}" height="50">
                </div>
                <h3 class="odometer" data-count="{{ $skill->scholarship }}">00</h3>
                <p class="counter-one__text">Scholarships</p>
            </li>
            <li class="counter-one__shape wow fadeInUp" data-wow-delay="500ms"></li>
        </ul>
    </div>
</section>
<!--Counter One End-->
@endif