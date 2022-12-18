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

              <div class="col-sm-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="550ms">
                <div class="video-container"> 
                  <iframe src="http://www.youtube.com/embed/{{$post->youtubeurl}}"
                  width="400" height="280" frameborder="0" allowfullscreen></iframe>
                </div>
                <div class="service-info">
                  <h3>{{$post->title}}</h3>
                </div>
              </div>
  
            @endforeach
          @endif
  
            
        </div>
      </div>
  
    </div>    
  </section>
  <!-- End Of Services -->