<!doctype html>
<html lang="en">

<head>
  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css'>
  <link rel='stylesheet ' href=' https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css'>
  <title>Prashrin Portfolio</title>
  @include('Clients.Parts.meta')
</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">



  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

      @include('Clients.Parts.nav')

    </header>

    @foreach($introduction as $intro)
    <div class="site-blocks-cover overlay bg-light" id="home-section">

      <div class="container">
        <div class="row justify-content-center">

          <div class="col-md-12 mt-lg-5 text-left align-self-center text-intro">
            <div class="row">
              <div class="col-lg-6">
                <h1 class="text-white">{{$intro->name}}</h1>
                <p class="text-secondary">{{$intro->designation}}</p>
                <p class="lead">{!!$intro->description!!}</p>
                <p><a href="#contact-section" class="btn smoothscroll btn-primary">Contact Me</a></p>
              </div>
            </div>
          </div>

        </div>
      </div>

      <img src="{{url('portfolio/img/'.$intro->image)}}" alt="Image" class="img-face">

    </div>
    @endforeach
    <div class="site-section" id="about-section">
      <div class="container">
        <div class="row ">
          <div class="col-12 mb-4 position-relative">
            <h2 class="section-title">About Me</h2>
          </div>
          @foreach($about as $about)
          <div class="col-lg-6 order-2 order-lg-1">
            <img class="img-fluid mb-4" src="{{url('portfolio/img/'.$about->image)}}" alt="Image">
            <p>{!!$about->description!!}</p>
          </div>
          <div class="col-lg-6 order-3 pl-lg-5 order-lg-2">
            <div class="mb-5">
              <strong class="text-black">Photographer</strong>
              <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 89%;">
                  <span>{{$about->photographer}}%</span>
                </div>
              </div>
            </div>
            <div class="mb-5">
              <strong class="text-black">Wedding</strong>
              <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 75%;">
                  <span>{{$about->wedding}}%</span>
                </div>
              </div>
            </div>
            <div class="mb-5">
              <strong class="text-black">Events</strong>
              <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 94%;">
                  <span>{{$about->event}}%</span>
                </div>
              </div>
            </div>
            <div class="mb-5">
              <strong class="text-black">Conferences</strong>
              <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 94%;">
                  <span>{{$about->conference}}%</span>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>

    <div class="site-section bg-light" id="services-section">
      <div class="container">
        <div class="row ">
          <div class="col-12 mb-5 position-relative">
            <h2 class="section-title text-center mb-5">Services</h2>
          </div>
          @foreach($service as $ser)
          <div class="col-md-6 mb-4">
            <div class="service d-flex h-100">
              <div class="service-number mr-4"><i class="{{$ser->logo}}"></i></div>
              <div class="service-about">
                <h3>{{$ser->title}}</h3>
                <p>{!!$ser->description!!}</p>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>

    <section class="site-section block__62272" id="portfolio-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 position-relative">
            <h2 class="section-title text-center mb-5">My Photography</h2>
          </div>
        </div>
        <div class="row">
          <?php $mainLoopCount = 1; ?>
          @foreach($photos as $pic)
          @if($mainLoopCount<=3) <div class="col-md-6 col-lg-4 item">
            <?php $count = 1; ?>
            @foreach (json_decode($pic->image) as $singleImage)
            @if($count<=4) <a href="{{url('portfolio/img/'.$singleImage)}}" class="item-wrap fancybox mb-4">
              <span class="icon-search2"></span>
              <img class="img-fluid" src="{{url('portfolio/img/'.$singleImage)}}">
              </a>
              @endif
              <?php $count++; ?>
              @endforeach
              @endif
              <?php $mainLoopCount++; ?>
        </div>
        @endforeach
        <ul class="pagination justify-content-end">
          <li style="color: #000;">{!! $photos->links(); !!}</li>
        </ul>

        <!-- <div class="col-md-6 col-lg-4 item">
            <a href="{{url('portfolio/images/img_4.jpg')}}" class="item-wrap fancybox mb-4">
              <span class="icon-search2"></span>
              <img class="img-fluid" src="{{url('portfolio/images/img_4.jpg')}}">
            </a>
            <a href="{{url('portfolio/images/img_5.jpg')}}" class="item-wrap fancybox mb-4">
              <span class="icon-search2"></span>
              <img class="img-fluid" src="{{url('portfolio/images/img_5.jpg')}}">
            </a>
            <a href="{{url('portfolio/images/img_8.jpg')}}" class="item-wrap fancybox mb-4">
              <span class="icon-search2"></span>
              <img class="img-fluid" src="{{url('portfolio/images/img_8.jpg')}}">
            </a>
          </div>
          <div class="col-md-6 col-lg-4 item">
            <a href="{{url('portfolio/images/img_6.jpg')}}" class="item-wrap fancybox mb-4">
              <span class="icon-search2"></span>
              <img class="img-fluid" src="{{url('portfolio/images/img_6.jpg')}}">
            </a>
            <a href="{{url('portfolio/images/img_7.jpg')}}" class="item-wrap fancybox mb-4">
              <span class="icon-search2"></span>
              <img class="img-fluid" src="{{url('portfolio/images/img_7.jpg')}}">
            </a>
            <a href="{{url('portfolio/images/img_9.jpg')}}" class="item-wrap fancybox mb-4">
              <span class="icon-search2"></span>
              <img class="img-fluid" src="{{url('portfolio/images/img_9.jpg')}}">
            </a>
          </div> -->
      </div>
  </div>
  </section>

  <section class="testimonial text-center mb-5">
    <div class="container">

      <div class="heading white-heading">
        Testimonial
      </div>
      <div id="testimonial4" class="carousel slide testimonial4_indicators testimonial4_control_button thumb_scroll_x swipe_x" data-ride="carousel" data-pause="hover" data-interval="5000" data-duration="2000">

        <div class="carousel-inner" role="listbox">
          <?php $testCount = 0; ?>
          @foreach($testimonial as $test)
          @if($testCount == 0)
          <?php $count = 0; ?>
          @if ($count == 0)
          <div class="carousel-item active">
            <div class="testimonial4_slide">
             
              <p>{!!strip_tags(substr($test->description,0,250))!!}
                {{strlen($test->description)>250 ? "..." : ""}}</p>
              <h4>{{$test->name}}</h4>
            </div>
          </div>

          <?php $count++; ?>

          @endif
          <?php $testCount++; ?>
          @else
          <?php $count = 0; ?>
          @if ($count == 0)
          <div class="carousel-item">
            <div class="testimonial4_slide">
            
              <p>{!!strip_tags(substr($test->description,0,250))!!}
                {{strlen($test->description)>250 ? "..." : ""}} </p>
              <h4>{{$test->name}}</h4>
            </div>
          </div>
          <?php $count++; ?>
          @endif
          @endif
          @endforeach
        </div>
        <a class="carousel-control-prev" href="#testimonial4" data-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#testimonial4" data-slide="next">
          <span class="carousel-control-next-icon"></span>
        </a>
      </div>
    </div>
  </section>
  <section class="site-section " style="background-color:#000000" id="contact-section">
    <div class="container">
      <div class="row">
        <div class="col-12 mb-5 position-relative">
          <h2 class="section-title text-center text-white mb-5">Contact Me</h2>
        </div>
      </div>
      <form action="send" method="get" class="form">

        <div class="row mb-4">
          <div class="form-group col-6">
            <input type="text" class="form-control" placeholder="First name" name="first_name">
          </div>
          <div class="form-group col-6">
            <input type="text" class="form-control" placeholder="Last name" name="last_name">
          </div>
        </div>

        <div class="row mb-4">
          <div class="form-group col-12">
            <input type="email" class="form-control" placeholder="Email address" name="email_address">
          </div>
        </div>

        <div class="row mb-4">
          <div class="form-group col-12">
            <input type="text" class="form-control" placeholder="Subject of the message" name="subject_message">
          </div>
        </div>

        <div class="row mb-4">
          <div class="form-group col-12">
            <textarea id="" cols="30" rows="10" class="form-control" placeholder="Type your message here.." name="body_message"></textarea>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <input type="submit" class="btn btn-dark" value="Send Message">
          </div>
        </div>

      </form>
    </div>
  </>

  @include('Clients.Parts.footer')
  

</body>

</html>