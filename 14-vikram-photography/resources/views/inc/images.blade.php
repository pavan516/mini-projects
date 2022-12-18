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