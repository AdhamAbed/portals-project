@extends('layout.siteLayout')

@section('title')
@endsection

@section('css')
@endsection

@section('content')


    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-blog set-bg" data-setbg="{{ url('sitefolder/img/parallax10.jpg') }}">
        <div class="overlay">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Contact</h2>
                </div>
                <div class="col-lg-12">
                    <p class="blog-sequence"><a href="{{ route('homePage') }}">Home</a>  <span>></span> <span>   Contact</span></p>
                </div>
            </div>
        </div>
    </div>
    <div title="WhatsApp us" class="WhatsApp" style="display:flex;justify-content:right;align-items:center;flex-direction:row-reverse; ">
           
        <p class="ht-ctc-cta " style="padding: 0px 16px; line-height: 1.6; ; background-color: #25d366; color: #ffffff; border-radius:10px; margin:0 10px; display: none;">WhatsApp us</p>
        <a href="">
        <svg style="pointer-events:none; display:block; height:50px; width:50px;" width="50px" height="50px" viewBox="0 0 1219.547 1225.016">
    
            <path fill="#E0E0E0" d="M1041.858 178.02C927.206 63.289 774.753.07 612.325 0 277.617 0 5.232 272.298 5.098 606.991c-.039 106.986 27.915 211.42 81.048 303.476L0 1225.016l321.898-84.406c88.689 48.368 188.547 73.855 290.166 73.896h.258.003c334.654 0 607.08-272.346 607.222-607.023.056-162.208-63.052-314.724-177.689-429.463zm-429.533 933.963h-.197c-90.578-.048-179.402-24.366-256.878-70.339l-18.438-10.93-191.021 50.083 51-186.176-12.013-19.087c-50.525-80.336-77.198-173.175-77.16-268.504.111-278.186 226.507-504.503 504.898-504.503 134.812.056 261.519 52.604 356.814 147.965 95.289 95.36 147.728 222.128 147.688 356.948-.118 278.195-226.522 504.543-504.693 504.543z"></path>
    
            <linearGradient id="htwaicona-chat" gradientUnits="userSpaceOnUse" x1="609.77" y1="1190.114" x2="609.77" y2="21.084">
    
                <stop offset="0" stop-color="#20b038"></stop>
    
                <stop offset="1" stop-color="#60d66a"></stop>
    
            </linearGradient>
    
            <path fill="url(#htwaicona-chat)" d="M27.875 1190.114l82.211-300.18c-50.719-87.852-77.391-187.523-77.359-289.602.133-319.398 260.078-579.25 579.469-579.25 155.016.07 300.508 60.398 409.898 169.891 109.414 109.492 169.633 255.031 169.57 409.812-.133 319.406-260.094 579.281-579.445 579.281-.023 0 .016 0 0 0h-.258c-96.977-.031-192.266-24.375-276.898-70.5l-307.188 80.548z"></path>
    
            <image overflow="visible" opacity=".08" width="682" height="639" transform="translate(270.984 291.372)"></image>
    
            <path fill-rule="evenodd" clip-rule="evenodd" fill="#FFF" d="M462.273 349.294c-11.234-24.977-23.062-25.477-33.75-25.914-8.742-.375-18.75-.352-28.742-.352-10 0-26.25 3.758-39.992 18.766-13.75 15.008-52.5 51.289-52.5 125.078 0 73.797 53.75 145.102 61.242 155.117 7.5 10 103.758 166.266 256.203 226.383 126.695 49.961 152.477 40.023 179.977 37.523s88.734-36.273 101.234-71.297c12.5-35.016 12.5-65.031 8.75-71.305-3.75-6.25-13.75-10-28.75-17.5s-88.734-43.789-102.484-48.789-23.75-7.5-33.75 7.516c-10 15-38.727 48.773-47.477 58.773-8.75 10.023-17.5 11.273-32.5 3.773-15-7.523-63.305-23.344-120.609-74.438-44.586-39.75-74.688-88.844-83.438-103.859-8.75-15-.938-23.125 6.586-30.602 6.734-6.719 15-17.508 22.5-26.266 7.484-8.758 9.984-15.008 14.984-25.008 5-10.016 2.5-18.773-1.25-26.273s-32.898-81.67-46.234-111.326z"></path>
    
            <path fill="#FFF" d="M1036.898 176.091C923.562 62.677 772.859.185 612.297.114 281.43.114 12.172 269.286 12.039 600.137 12 705.896 39.633 809.13 92.156 900.13L7 1211.067l318.203-83.438c87.672 47.812 186.383 73.008 286.836 73.047h.255.003c330.812 0 600.109-269.219 600.25-600.055.055-160.343-62.328-311.108-175.649-424.53zm-424.601 923.242h-.195c-89.539-.047-177.344-24.086-253.93-69.531l-18.227-10.805-188.828 49.508 50.414-184.039-11.875-18.867c-49.945-79.414-76.312-171.188-76.273-265.422.109-274.992 223.906-498.711 499.102-498.711 133.266.055 258.516 52 352.719 146.266 94.195 94.266 146.031 219.578 145.992 352.852-.118 274.999-223.923 498.749-498.899 498.749z"></path>
    
        </svg>
    </a>
    </div>

    <div onclick="openForm()" title="chat" class="chat" style="display:flex;justify-content:right;align-items:center;flex-direction:row-reverse; ">
       
        <p class="ht-ctc-cta " style="padding: 0px 16px; line-height: 1.6; ; background-color: black; color: #ffffff; border-radius:10px; margin:0 10px; display: none;">Chat</p>
    <span>
<!-- Generator: Adobe Illustrator 18.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
<svg style="pointer-events:none; display:block; height:50px; width:50px;" width="50px" height="50px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
 viewBox="0 0 60 60" style="enable-background:new 0 0 60 60;" xml:space="preserve">
<path d="M30,1.5c-16.542,0-30,12.112-30,27c0,5.205,1.647,10.246,4.768,14.604c-0.591,6.537-2.175,11.39-4.475,13.689
c-0.304,0.304-0.38,0.769-0.188,1.153C0.276,58.289,0.625,58.5,1,58.5c0.046,0,0.093-0.003,0.14-0.01
c0.405-0.057,9.813-1.412,16.617-5.338C21.622,54.711,25.738,55.5,30,55.5c16.542,0,30-12.112,30-27S46.542,1.5,30,1.5z"/>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
</svg>

</span>
    </div>

  

<div class="chat-popup" id="myForm">
<form action="/action_page.php" class="form-container">
<h1>Chat</h1>

<label for="msg"><b>Message</b></label>
<textarea placeholder="Type message.." name="msg" required></textarea>

<button type="submit" class="btn">Send</button>
<button type="button" class="btn cancel" onclick="closeForm()">Close</button>
</form>
</div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Contact Section Begin -->
    <section class="contact spad"style="padding-top: 78px;">
        <div class="first"style=" " >
            <div class="container">
                <div class="row">
                <div class="col-md-4 col-sm-6 col-lg-4 text-center contact-statge">
                    <div class="contact-info-box mb-40 w-100">
                        <i class="fa fa-map-marker rounded-circle contact-icons-design"></i>
                        <h4 class="mb-0">Location</h4>
                        <p class="mb-0">
                            <span class="d-block">
                                {{ $settings->address }}
                            </span>
                            <span class="d-block"> </span>
                        </p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-lg-4 text-center contact-statge">
                    <div class="contact-info-box mb-40 w-100">
                        <i class="fa fa-volume-control-phone rounded-circle contact-icons-design"></i>
                        <h4 class="mb-0">Call Now</h4>
                        <p class="mb-0"><span class="d-block">Phone: {{ $settings->mobile }} </span><span class="d-block"> </span></p>
                    </div>
                
                </div>
                <div class="col-md-4 col-sm-6 col-lg-4 text-center contact-statge">
                    <div class="contact-info-box mb-40 w-100">
                        <i class="fa fa-envelope-open rounded-circle contact-icons-design"></i>
                        <h4 class="mb-0">Mail Info</h4>
                        <p class="mb-0"><span class="d-block"> {{ $settings->info_email }} </span><span class="d-block"> </span></p>
                    </div>
                
                </div>
                </div>
                </div>
        </div>
     
        <div class="container">
            
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    
    <!-- Map Begin -->

    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d111551.9926412813!2d-90.27317134641879!3d38.606612219170856!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited%20States!5e0!3m2!1sen!2sbd!4v1597926938024!5m2!1sen!2sbd" height="500" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
    <!-- Map End -->
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="contact__form">
                        <form action="#">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" placeholder="First Name">
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Last Name">
                                </div>
                                <div class="col-lg-12">
                                    <input type="text" placeholder="Email Address">
                                </div>
                                <div class="col-lg-12">
                                    <input type="text" placeholder="Phone No">
                                </div>
                                
                                <div class="col-lg-12">
                                    <textarea placeholder="Message"></textarea>
                                    <button type="submit" class="site-btn hvr-pulse-grow">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->


@endsection
  