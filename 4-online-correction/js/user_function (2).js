$(document).ready(function(){
	$('[id*=comment_]').keypress(function (e) {
		
	  if (e.which == 13) {
		  var post_id	=	$(this).attr('rel');
		  var element_id	=	$(this).attr('id');
		  var comment	=	$(this).val();
		$.ajax({
           type: "POST",
           url: 'comment.php',
           data:{post_id:post_id,comment:comment},
		   dataType:'json',
           success:function(response) {
			   if(response.error==0 && response.mesg=="success"){
					$("#"+element_id).val('');	
					$("#total_comment_post_"+response.post_id).html('');	
					$("#total_comment_post_"+response.post_id).html(response.total_comment);
					$("#table_comment_"+response.post_id).html('');	
					$("#table_comment_"+response.post_id).html(response.html);	
					//$("#see_more_button_"+response.post_id).html('');	
					//$("#see_more_button_"+response.post_id).html(' Comments'+response.total_comment);	
			   }else{
				    $("#"+element_id).val('');	
					$("#total_comment_post_"+response.post_id).html('');	
					$("#total_comment_post_"+response.post_id).html(response.total_comment);
					$("#table_comment_"+response.post_id).html('');	
					$("#table_comment_"+response.post_id).html(response.html);	
			   }
				
           }

		});
	  }
	});
});
function like_button(post_id){
	var post_id	=	post_id;
	$.ajax({
           type: "POST",
           url: 'like.php',
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


function more_comments(post_id){
	var post_id	=	post_id;
	$.ajax({
           type: "POST",
           url: 'more_comment.php',
           data:{post_id:post_id},
		   dataType:'json',
           success:function(response) {
				$("#table_comment_"+response.post_id).html('');	
				$("#table_comment_"+response.post_id).html(response.html);
				//$("#see_more_button_"+response.post_id).remove();
				$("#comment_"+response.post_id).focus();
           }

    });
}

function close_comments(post_id){
	var post_id	=	post_id;
	$.ajax({
           type: "POST",
           url: 'close_comment.php',
           data:{post_id:post_id},
		   dataType:'json',
           success:function(response) {
				$("#table_comment_"+response.post_id).html('');	
				$("#table_comment_"+response.post_id).html(response.html);
				$("#close_comment_button_"+response.post_id).css('display','none;');
           }

    });
}