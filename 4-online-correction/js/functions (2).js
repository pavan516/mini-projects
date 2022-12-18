function like_button(post_id){
	var post_id	=	post_id;
	$.ajax({
           type: "POST",
           url: 'eventslike.php',
           data:{post_id:post_id},
		   dataType:'json',
           success:function(response) {
             if(response.error==0 && response.mesg=='success'){
				 var element_id		=	'total_like_post_'+response.post_id;
				 $('#total_like_post_'+response.post_id).html('');
				 $('#total_like_post_'+response.post_id).html('Unlike '+response.total_like);
				 $('#thumps_icon_'+response.post_id).removeClass('fa fa-thumbs-o-up');
				 $('#thumps_icon_'+response.post_id).addClass('fa fa-thumbs-o-down');
			 }else if(response.error==0 && response.mesg=='delete'){
				 var element_id	=	'total_like_post_'+response.post_id;
				 
				 $('#total_like_post_'+response.post_id).html('');
				 $('#total_like_post_'+response.post_id).html('Like '+response.total_like);
				 $('#thumps_icon_'+response.post_id).removeClass('fa fa-thumbs-o-down');
				 $('#thumps_icon_'+response.post_id).addClass('fa fa-thumbs-o-up');
			 }
           }

    });
}