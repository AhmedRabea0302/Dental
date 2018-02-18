<div class="header">
    <div class="top-header">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-xs-5">
                    <div class="right-side">
                        <button class="btn btn-responsive-nav" data-toggle="collapse" data-target=".contact-list">
                            <i class="fa fa-bars"></i>
                        </button>
                        <ul class="contact-list collapse">
                            <li>
                                <i class="fa fa-phone"></i>
                                <span>{{ $settings->phone_number }}</span>
                            </li>
                            <li>
                                <i class="fa fa-envelope"></i>
                                <span>{{ $settings->site_email }}</span>
                            </li>
                            <li>
                                <i class="fa fa-map-marker"></i>
                                <span>{{ $settings->address }}</span>
                            </li>
                        </ul><!-- End Contact-List -->
                    </div><!-- End Right-Side -->
                </div><!-- End col -->
                <div class="col-md-4 col-xs-7">
                    <div class="left-side">
                        <ul class="social-list">
                            @foreach($social_links as $social)
                                <li>
                                    <a href="{{ $social->link }}" target="_blank">
                                        <i class="fa {{ $social->icon }}"></i>
                                    </a>
                                </li>
                            @endforeach
                        </ul><!-- End Social-List -->
                    </div><!-- End Left-Side -->
                </div><!-- End col -->
            </div><!-- End row -->
        </div><!-- End container -->
    </div><!-- End Top-Header -->
    <div class="container">
        <a href="{{ route('site.home') }}" class="logo">
            <img src="{{ url('storage/uploads/settings' . '/' . $settings->image_name) }}" alt="logo-img">
        </a>
        <button class="btn btn-responsive-nav" data-toggle="collapse" data-target=".navbar-collapse">
            <i class="fa fa-bars"></i>
        </button>
        <a href="{{ route('site.reserve') }}" class="custom-btn">ابدأ الحجز </a>
    </div><!-- End container -->
    <div class="navbar-collapse collapse">
        <div class="container">
            <nav class="nav-main">
                <ul class="nav navbar-nav">
                    <li @if(Request::route()->getName() == 'site.home') class="active" @endif><a href="{{ route('site.home') }}">الرئيسية</a></li>
                    <li @if(Request::route()->getName() == 'site.services') class="active" @endif><a href="{{ route('site.services') }}"> خدماتنا</a></li>
                    <li @if(Request::route()->getName() == 'site.doctors') class="active" @endif><a href="{{ route('site.doctors') }}">أطباؤنا</a></li>
                    <li @if(Request::route()->getName() == 'site.blogs') class="active" @endif><a href="{{ route('site.blogs') }}">الأخبار</a></li>
                    <li @if(Request::route()->getName() == 'site.about') class="active" @endif><a href="{{ route('site.about') }}"> عن العيادة</a></li>
                    <li @if(Request::route()->getName() == 'site.gallery') class="active" @endif><a href="{{ route('site.gallery') }}">معرض الصور</a></li>
                    <li @if(Request::route()->getName() == 'site.contact') class="active" @endif><a href="{{ route('site.contact') }}">تواصل معنا</a></li>
                </ul>
            </nav><!-- End nav-main -->
        </div><!-- End container -->
    </div><!-- End navbar-collapse -->
</div><!-- End Header -->
