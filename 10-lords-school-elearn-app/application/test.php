<?php 
    $a= array();
    $i=0;
    
	

    while( $row =mysqli_fetch_array($sql)){
      $b=array();

      $b[]=$row["city"];
      $b[]=$row["Lat"];
      $b[]=$row["Lan"];
      $b[]=$row["location_id"];
      $b[]=$row["location_name"];        
         $a[$i]=$b;
         $i++;
     }
  ?>

  <?php

    $z = array();
    $n=0;
    $sql2= mysqli_query($con,"SELECT * FROM locations");

    while( $row2 =mysqli_fetch_array($sql2)){
      $y=array(); 
      $y[]=$row2["city"];
      $y[]=$row2["Lat"];
      $y[]=$row2["Lan"];
      $y[]=$row2["location_id"];
      $y[]=$row2["location_name"];    
      $z[$n]=$y;
      $n++;
     }

   ?>

<script type="text/javascript">
   var locations = <?php echo json_encode($a);?>;
   var locationsb = <?php echo json_encode($z);?>;
   var map = new google.maps.Map(document.getElementById('map'), {
       zoom: 6,
       center: new google.maps.LatLng(22.00, 96.00),
       mapTypeId: google.maps.MapTypeId.ROADMAP
   });

   var infowindow = new google.maps.InfoWindow();
   var image = '/marker/map.png';
   var image2 = '/marker/Map1.png';

   var marker, i;

   for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
      position: new google.maps.LatLng(locations[i][1], locations[i][2]),
      offset: '0',
      icon: image,
      title: locations[i][4],
      map: map
   });

   google.maps.event.addListener(marker, 'click', (function(marker, i) {
      return function() {
        infowindow.setContent(locations[i][0]);
        infowindow.open(map, marker);
        }
      })(marker, i));
   } 

   var marker1, n;
      for (n = 0; n < locationsb.length; n++) {  
         marker1 = new google.maps.Marker({
           position: new google.maps.LatLng(locationsb[n][1], locationsb[n][2]),
           offset: '0',
           icon: image2,
           title: locationsb[n][4],
           map: map       
        });


     google.maps.event.addListener(marker1, 'click', (function(marker1, n)
     {
       return function() {
          infowindow.setContent(locationsb[n][0]);
          infowindow.open(map, marker1);
       }
     })(marker1, n));
   }

  </script> 
 </body>
</html> 