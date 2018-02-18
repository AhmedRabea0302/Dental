<section class="contact">
    <div class="container">
        <div class="contact-info">
            <div class="row">
                @foreach($contacts as $contact)
                    <div class="col-md-4">
                        <div class="icon-box">
                            <div class="icon-box-head">
                                <i class="fa {{ $contact->icon }}"></i>
                            </div><!-- End Icon-Box-Head -->
                            <div class="icon-box-body">
                                <h3 class="title"> {!! $contact->getDetails()->where(['contact_id' => $contact->id, 'lang' => app()->getLocale()])->first()->title  !!}</h3>
                                <p>
                                    {!! $contact->getDetails()->where(['contact_id' => $contact->id, 'lang' => app()->getLocale()])->first()->description  !!}
                                </p>
                            </div><!-- Wnd Icon-Box-Body -->
                        </div><!-- End Icon-Box -->
                    </div><!-- End col -->
                @endforeach
            </div><!-- End row -->
        </div><!-- End Contact-Info -->
    </div><!-- End container -->
</section><!-- End Section -->
<footer class="footer">
    <div class="container">
        <div class="col-md-4">
            <div class="footer-widget">
                <div class="widget-head">
                    <img src="{{ asset('assets/site/images/icons8-Tooth-104.png ')}}" alt="icon">
                    <h3 class="title">عن العيادة</h3>
                </div><!-- End Widget-Head -->
                <div class="widget-content">
                    <p>
                        @if(app()->getLocale() == 'ar')
                            {!!  $static->where('flag', 'clinic_service_ar')->first()->content !!}
                        @else
                            {!!  $static->where('flag', 'clinic_service_en')->first()->content !!}
                        @endif
                    </p>
                    <img src="{{ url('storage/uploads/settings' . '/' . $settings->image_name) }}" alt="logo">
                </div><!-- End Widget-Content -->
            </div><!-- End footer-Widget -->
        </div><!-- End col -->
        <div class="col-md-4">
            <div class="footer-widget">
                <div class="widget-head">
                    <img src="{{ asset('assets/site/images/icons8-Tooth-104.png') }}" alt="icon">
                    <h3 class="title">خدمات العيادة</h3>
                </div><!-- End Widget-Head -->
                <div class="widget-content">
                    <ul class="important-links list-second ">
                        @foreach($services as $service)
                            <li>
                                <a href="{{ route('site.single_service', ['slug' => $service->slug]) }}">{{ $service->getDetails()->where(['service_id' => $service->id, 'lang' => app()->getLocale()])->first()->name }}</a>
                            </li>
                        @endforeach

                    </ul><!-- End Important-links -->
                </div><!-- End Widget-Content -->
            </div><!-- End footer-Widget -->
        </div><!-- End col -->
        <div class="col-md-4">
            <div id="warna"></div>
            <div class="footer-widget">
                <div class="widget-head">
                    <img src="{{ asset('assets/site/images/icons8-Tooth-104.png')}}" alt="icon">
                    <h3 class="title">اشترك معنا</h3>
                </div><!-- End Widget-Head -->
                <div class="widget-content">
                    <p>
                        @if(app()->getLocale() == 'ar')
                            {!!  $static->where('flag', 'subscribe_ar')->first()->content !!}
                        @else
                            {!!  $static->where('flag', 'subscribe_en')->first()->content !!}
                        @endif
                    </p>
                    <form class="subscribe-form AddForm" action="{{ route('site.subscribe') }}" method="post">
                        {{ csrf_field() }}
                        <input type="email" name="email" class="form-control" placeholder="ادخل بريدك الالكتروني">
                        <button class="custom-btn">اشترك</button>
                    </form><!--End subscribe-form-->
                </div><!-- End Widget-Content -->
            </div><!-- End footer-Widget -->
        </div><!-- End col -->
    </div><!-- End container -->
</footer><!-- End Footer -->
