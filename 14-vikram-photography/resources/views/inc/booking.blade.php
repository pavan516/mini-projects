<!-- Booking -->
<section id="pricing">
  <div class="container">
    
    <div class="row">
      <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1200ms" data-wow-delay="300ms">
        
        @include('inc.messages')
        <h2>Book Your Orders</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam</p>
      </div>
    </div>

    <div class="pricing-table">
      <div class="row">
        
        <!-- Outdoor Booking -->
        <div class="col-sm-3">
          <div class="single-table featured wow flipInY" data-wow-duration="1000ms" data-wow-delay="800ms">
            <h3>Outdoor Services Booking</h3>
              <!-- Form -->
              {!! Form::open(['action' => 'BookingController@store', 'method' => 'POST']) !!}
                        
                        <div class="form-group">
                            {{ Form::label('name', 'Name') }}
                            {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Enter Your Name', 'style' => 'background-color:white']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('email', 'E-Mail') }}
                            {{ Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Enter Your Valid Email', 'style' => 'background-color:white']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('contactno', 'Your Contact') }}
                            {{ Form::number('contactno', '', ['class' => 'form-control', 'placeholder' => 'Enter Your Valid Contact', 'style' => 'background-color:white']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('message', 'Enter Your Requirements') }}
                            {{ Form::textarea('message', '', ['class' => 'form-control', 'placeholder' => 'Provide Complete Requirements', 'cols' => '3', 'rows' => '3', 'style' => 'background-color:white']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('ordertype', 'Select Your Order') }}
                            {{ Form::select('ordertype', ['Live Programs' => 'Live Programs','LED Walls' => 'LED Walls', 'Drone & Jimmy' => 'Drone & Jimmy', 'Pre Wedding' => 'Pre Wedding', 'Post Wedding' => 'Post Wedding', 'Candy Shoot' => 'Candy Shoot', 'Album Design' => 'Album Design', 'Wedding Photography' => 'Wedding Photography', 'Whatsapp Teaser' => 'Whatsapp Teaser', 'Invitations' => 'Invitations', 'Live Events' => 'Live Events', 'Promo Songs' => 'Promo Songs',], 'Live Programs', ['style' => 'background-color:#028fcc']) }}
                        </div>
                        {{ csrf_field() }}
                        <div class="form-group" style="text-align:center;">
                            {{ Form::submit('submit', ['class' => 'btn btn-primary']) }}
                        </div>

              {!! Form::close() !!}
              <!-- End Of Form -->
          </div>
        </div>
        <!-- End Of OutDoor Booking -->

        <!-- Indoor Booking -->
        <div class="col-sm-3">
          <div class="single-table featured wow flipInY" data-wow-duration="1000ms" data-wow-delay="800ms">
            <h3>InDoor Services Booking</h3>
              <!-- Form -->
              {!! Form::open(['action' => 'BookingController@store', 'method' => 'POST']) !!}
                        
                        <div class="form-group">
                            {{ Form::label('name', 'Name') }}
                            {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Enter Your Name', 'style' => 'background-color:white']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('email', 'E-Mail') }}
                            {{ Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Enter Your Valid Email', 'style' => 'background-color:white']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('contactno', 'Your Contact') }}
                            {{ Form::number('contactno', '', ['class' => 'form-control', 'placeholder' => 'Enter Your Valid Contact', 'style' => 'background-color:white']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('message', 'Enter Your Requirements') }}
                            {{ Form::textarea('message', '', ['class' => 'form-control', 'placeholder' => 'Provide Complete Requirements', 'cols' => '3', 'rows' => '3', 'style' => 'background-color:white']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('ordertype', 'Select Your Order') }}
                            {{ Form::select('ordertype', ['Passport Size Photos' => 'Passport Size Photos', 'Color Xerox' => 'Color Xerox', 'B/W Xerox' => 'B/W Xerox', 'Certificate Lamination' => 'Certificate Lamination', 'Photo Shoot' => 'Photo Shoot'], 'Photo Shoot', ['style' => 'background-color:#028fcc']) }}
                        </div>
                        {{ csrf_field() }}
                        <div class="form-group" style="text-align:center;">
                            {{ Form::submit('submit', ['class' => 'btn btn-primary']) }}
                        </div>

              {!! Form::close() !!}
              <!-- End Of Form -->
          </div>
        </div>
        <!-- End Of Indoor Booking -->

        <!-- All Types Of Booking -->
        <div class="col-sm-3">
          <div class="single-table featured wow flipInY" data-wow-duration="1000ms" data-wow-delay="800ms">
            <h3>All Types Of Bookings</h3>
            <!-- Form -->
              {!! Form::open(['action' => 'BookingController@store', 'method' => 'POST']) !!}
                        
                        <div class="form-group">
                            {{ Form::label('name', 'Name') }}
                            {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Enter Your Name', 'style' => 'background-color:white']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('email', 'E-Mail') }}
                            {{ Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Enter Your Valid Email', 'style' => 'background-color:white']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('contactno', 'Your Contact') }}
                            {{ Form::number('contactno', '', ['class' => 'form-control', 'placeholder' => 'Enter Your Valid Contact', 'style' => 'background-color:white']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('message', 'Enter Your Requirements') }}
                            {{ Form::textarea('message', '', ['class' => 'form-control', 'placeholder' => 'Provide Complete Requirements', 'cols' => '3', 'rows' => '3', 'style' => 'background-color:white']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('ordertype', 'Select Your Order') }}
                            {{ Form::select('ordertype', ['Mug Printing' => 'Mug Printing', 'Key Chain Printing' => 'Key Chain Printing', 'T-Shirt Printing' => 'T-Shirt Printing', 'Mobile Pouch/3D Printing' => 'Mobile Pouch/3D Printing', 'Pillow Printing' => 'Pillow Printing', 'Wood Printing' => 'Wood Printing', 'Magic Pillow' => 'Magic Pillow', 'Glass Printing' => 'Glass Printing', 'Printing On Bags' => 'Printing On Bags', 'Printing On Box,Bottle,Caps' => 'Printing On Box,Bottle,Caps'], 'Photo Shoot', ['style' => 'background-color:#028fcc']) }}
                        </div>
                        {{ csrf_field() }}
                        <div class="form-group" style="text-align:center;">
                            {{ Form::submit('submit', ['class' => 'btn btn-primary']) }}
                        </div>

              {!! Form::close() !!}
              <!-- End Of Form -->
          </div>
        </div>
        <!-- End Of Other Booking -->


        
        
        
        
        
      </div>
    </div>

  </div>
</section>
<!-- End Of Booking -->