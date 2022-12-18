<!-- Services -->
<section id="services">
  <div class="container">
    
    <div class="heading wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
      <div class="row">
        <div class="text-center col-sm-8 col-sm-offset-2">
          <h2>Our Services</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore</p>
        </div>
      </div> 
    </div>
      
    <div class="text-center our-services">
      <div class="row">
        
        @if(count($posts) > 0)
          @foreach($posts as $post)
            @if($post->status == 'services')
          
              <div class="col-sm-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="550ms">
                <img class="img-responsive" src="/storage/images/{{$post->image}}" alt="{{$post->title}}">
                <div class="service-info">
                  <h3>{{$post->title}}</h3>
                  <p>{{$post->Description}}</p>
                </div>
              </div>

            @endif
          @endforeach
        @endif

          
      </div>
    </div>

  </div>    
</section>
<!-- End Of Services -->

<!-- About Us -->
<section id="about-us" class="parallax">
  <div class="container">
      <div class="row">
        
        <div class="col-sm-12">
          <div class="about-info wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
            <h2>About us</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.Ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          </div>
        </div>

      </div>
  </div>
</section>
<!-- End Of About Us -->

<!-- Portfolio -->
<section id="portfolio">
  
  <div class="container">
    <div class="row">
      <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
        <h2>Our Portfolio</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam</p>
      </div>
    </div>
  </div>
    
  <div class="container-fluid">
    <div class="row">

        @if(count($posts) > 0)
          @foreach($posts as $post)
            @if($post->status == 'images')
              
              <div class="col-sm-3">
                <div class="folio-item wow fadeInRightBig" data-wow-duration="1000ms" data-wow-delay="300ms">
                  <div class="folio-image">
                    <img class="img-responsive" src="/storage/images/{{$post->image}}" alt="{{$post->title}}">
                  </div>
                  <div class="overlay">
                    <div class="overlay-content">
                      <div class="overlay-text">
                        <div class="folio-info">
                          <h3>{{$post->title}}</h3>
                        </div>
                        <div class="folio-overview">
                          <span class="folio-expand"><a href="/storage/images/{{$post->image}}" data-lightbox="portfolio"><i class="fa fa-search-plus"></i></a></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            @endif
          @endforeach
        @endif        
        
    </div>
  </div>
  <div id="portfolio-single-wrap">
    <div id="portfolio-single">
    </div>
  </div>
</section>
<!-- End Of Portfolio -->

<!-- Team Section -->
<section id="team">
  <div class="container">
      
      <div class="row">
        <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1200ms" data-wow-delay="300ms">
          <h2>The Team</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam</p>
        </div>
      </div>
      
      <div class="team-members">
        <div class="row">
          
            @if(count($posts) > 0)
              @foreach($posts as $post)
                @if($post->status == 'teams')
                  
                  <div class="col-sm-3">
                    <div class="team-member wow flipInY" data-wow-duration="1000ms" data-wow-delay="300ms">
                      <div class="member-image">
                        <img class="img-responsive" src="/storage/images/{{$post->image}}" alt="{{$post->title}}">
                      </div>
                      <div class="member-info">
                        <h3>{{$post->title}}</h3>
                        <h4>{{$post->Description}}</h4>
                      </div>
                    </div>
                  </div>
                
                @endif
              @endforeach
            @endif

        </div>
      </div>

    </div>
</section>
<!-- End Of Team Section -->

<!-- Features -->
<section id="features" class="parallax">
    <div class="container">
      <div class="row count">
        <div class="col-sm-3 col-xs-6 wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="300ms">
          <i class="fa fa-user"></i>
          <h3 class="timer">10000</h3>
          <p>Happy Customers</p>
        </div>
        <div class="col-sm-3 col-xs-6 wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="500ms">
          <i class="fa fa-desktop"></i>
          <h3 class="timer">500</h3>                    
          <p>Website Images</p>
        </div> 
        <div class="col-sm-3 col-xs-6 wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="700ms">
          <i class="fa fa-trophy"></i>
          <h3>Always</h3>                    
          <p>Best Service</p>
        </div> 
        <div class="col-sm-3 col-xs-6 wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="900ms">
          <i class="fa fa-comment-o"></i>                    
          <h3>24/7</h3>
          <p>Fast Support</p>
        </div>                 
      </div>
    </div>
</section>
<!-- End Of Features -->

<!-- Offers -->
<section id="blog">
  <div class="container">
      
      <div class="row">
        <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1200ms" data-wow-delay="300ms">
          <h2>Today's Special Offers</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam</p>
        </div>
      </div>
      
      <div class="blog-posts">
        <div class="row">
          
            @if(count($posts) > 0)
              @foreach($posts as $post)
                @if(($post->status)=='offers')

                    <div class="col-sm-4 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="400ms">
                      <div class="post-thumb">
                        <a href="#"><img class="img-responsive" src="storage/images/{{$post->image}}" alt="{{$post->title}}"></a>
                      </div>
                      <div class="entry-header">
                        <h3>{{$post->title}}</h3>
                        <span class="date">{{$post->created_at}}</span>
                      </div>
                      <div class="entry-content">
                        <p>{{$post->Description}}</p>
                      </div>
                    </div>
                @endif
              @endforeach
            @endif

        </div>
      </div>

  </div>
</section>
<!-- End Of Offers -->

<!-- Contact Us -->
<section id="contact">
    <div id="google-map" class="wow fadeIn" data-latitude="52.365629" data-longitude="4.871331" data-wow-duration="1000ms" data-wow-delay="400ms"></div>
    <div id="contact-us" class="parallax">
      <div class="container">
        <div class="row">
          <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
            <h2>Contact Us</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam</p>
          </div>
        </div>
        <div class="contact-form wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
          <div class="row">
            <div class="col-sm-6">
              <form id="main-contact-form" name="contact-form" method="post" action="#">
                <div class="row  wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input type="text" name="name" class="form-control" placeholder="Name" required="required">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input type="email" name="email" class="form-control" placeholder="Email Address" required="required">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" name="subject" class="form-control" placeholder="Subject" required="required">
                </div>
                <div class="form-group">
                  <textarea name="message" id="message" class="form-control" rows="4" placeholder="Enter your message" required="required"></textarea>
                </div>                        
                <div class="form-group">
                  <button type="submit" class="btn-submit">Send Now</button>
                </div>
              </form>   
            </div>
            <div class="col-sm-6">
              <div class="contact-info wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                <ul class="address">
                  <li><i class="fa fa-map-marker"></i> <span> Address:</span> 2400 South Avenue A </li>
                  <li><i class="fa fa-phone"></i> <span> Phone:</span> +928 336 2000  </li>
                  <li><i class="fa fa-envelope"></i> <span> Email:</span><a href="mailto:someone@yoursite.com"> support@oxygen.com</a></li>
                  <li><i class="fa fa-globe"></i> <span> Website:</span> <a href="#">www.sitename.com</a></li>
                </ul>
              </div>                            
            </div>
          </div>
        </div>
      </div>
    </div>        
  </section><!--/#contact-->
  