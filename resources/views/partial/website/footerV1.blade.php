<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="footerList">
                    <h5>{{ __('cp.links') }}</h5>
                    <ul class="footerLinks c-list">
                        <li class='c-list__item'>
                            <a href="{{ route('home') }}">{{ __('cp.home') }}</a>
                        </li>
                        <li class='c-list__item'>
                            <a href="{{ route('about') }}">{{ __('cp.about-us') }}</a>
                        </li>
                        <li class='c-list__item'>
                            <a href="{{ route('onlineCourses') }}">{{ __('cp.courses') }}</a>
                        </li>
                        <li class='c-list__item'>
                            <a href="{{ route('careers') }}">{{ __('cp.careers') }}</a>
                        </li>
                        <li class='c-list__item'>
                            <a href="{{ route('consultations') }}">{{ __('cp.consulting') }}</a>
                        </li>
                        <li class='c-list__item'>
                            <a href="{{ route('customers') }}">{{ __('cp.customers') }}</a>
                        </li>
                        <li class='c-list__item'>
                            <a href="{{ route('projects') }}">{{ __('cp.manage_projects') }}</a>
                        </li>
                        <li class='c-list__item'>
                            <a href="{{ route('partners') }}">{{ __('cp.partners') }}</a>
                        </li>
                        <li class='c-list__item'>
                            <a href="{{ route('contact') }}">{{ __('cp.contact-us') }}</a>
                        </li>
                        <li class='c-list__item'>
                            <a href="{{ route('privacy') }}">{{ __('cp.privacy_policy') }}</a>
                        </li>

                    </ul>
                </div>

            </div>
            <div class="col-lg-4 col-md-6">
                <div class="footerList">
                    <h5>{{ __('cp.branches') }}</h5>
                    <ul class="footerLinks">
                        <li>
                            <a>{{ __('cp.Riyadh') }}</a>
                        </li>
                        <li class="st-address">
                            <a>
                                {{ __('cp.Othman Bin Affan Road, 4202') }}
                                <br>
                                {{ __('cp.Al-Waha, 8528, Riyadh 12443') }}
                            </a>
                        </li>
                        <li>
                            <a>{{ __('cp.Gada') }}</a>
                        </li>
                        <li>
                            <a>{{ __('cp.Al-Khaber') }}</a>
                        </li>

                    </ul>
                </div>

            </div>
            <div class="col-lg-4 col-md-6">
                <div class="footerList">
                    <h5>{{ __('cp.contact-us') }}</h5>
                    <ul class="footerLinks">
                        @isset($settings->mobile)
                        <li>
                            <a href="#"><i class="fa fa-mobile"></i> {{ $settings->mobile }}</a>
{{--                            <a href="#"> {{ __('cp.+m') }} {{ $settings->mobile }}</a>--}}
                        </li>
                        @endisset
                        @isset($settings->whatsapp)
                        <li>
                            <a href="#"><i class="fa fa-whatsapp"></i> {{ $settings->whatsapp }}</a>
{{--                            <a href="#"> {{ __('cp.+w') }} {{ $settings->whatsapp }}</a>--}}
                        </li>
                        @endisset
                        @isset($settings->phone)
                        <li>
                            <a href="#"><i class="fa fa-phone"></i> {{ $settings->phone }}</a>
{{--                            <a href="#">{{ __('cp.+f') }} {{ $settings->phone }}</a>--}}
                        </li>
                        @endisset
                        @isset($settings->info_email)
                        <li>
                            <a href="mailto:{{ @$settings->info_email }}"><i class="fa fa-mail-bulk"></i> {{ $settings->info_email }}</a>
{{--                            <a href="mailto:{{ @$settings->info_email }}"> {{ $settings->info_email }}</a>--}}
                        </li>
                        @endisset
                    </ul>
                </div>

            </div>
        </div>
    </div>
    <div class="copyRights">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <p style="font-size: 14px">
                        {{ __('cp.All rights reserved to Life Industry Institute for Training and Consultation © 2022') }}
                        <br>
                        <span> <a href="http://smeportals.com/" target="_blank"> {{ __('cp.Developed by Portals') }} </a></span>
                    </p>
                </div>
                <div class="col-6">

                    <ul class="footerSocial">
                        @foreach($social as $one)
                            <li>
                                <a href="{{ $one->url }}"><i class="{{ $one->icon }}"></i></a>
                            </li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>
        <div class="justify-content-end">
        <a href="#" class="up">
            <i class="fas fa-chevron-up"></i>
        </a>
        </div>
    </div>

</footer>
