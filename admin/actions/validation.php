

<script>
		function post_event(){
			
			var event_title=$("#event_title").val();
			var event_venue=$("#event_venue").val();
			var event_time=$("#event_time").val();
			var date_start=$("#start_date").val();
			var type_id=$("#type_id").val();
			
	
			$.ajax({
				
				url: "actions/validation_actions.php",
				type: "GET",
				data: {	event_title:event_title, 
						event_venue:event_venue, 
						event_time:event_time,
						date_start:date_start,
						type_id:type_id	 },
			
				async: false,
				success: function(data){
					if(data=="successfully posted"){
						
						
						$("#error_event").removeClass("alert-danger").addClass("alert alert-success").text(data);
						document.forms['addpost_event'].submit();
						
					} else {
						$("#error_event").addClass("alert-danger").text(data);
						}
						
						
					$("#error_event").removeClass("hidden");
					
					
					}
				
				
				
			})
	
		}
		
		function post_msg(){
			var msg_content=$("#msg_content").val();
			var type_id=$("#type_id").val();
			
			$.ajax({
				url: "validation_actions.php",
				type: "GET",
				data: {msg_content:msg_content, type_id:type_id},
				async: false,
				success: function(data){
					if(data=="successfully posted"){
						
			
						$("#error_message").removeClass("alert-danger").addClass("alert alert-success").text(data);
	
						$("#addpost_event").submit();
						
					} else {
						$("#error_message").addClass("alert-danger").text(data);
						}
						
						
						$("#error_message").removeClass("hidden");
					
					}
				
				})
			}


		function post_holiday(){
			var holiday_date=$("#holiday_date").val();
			var occasion=$("#occasion").val();
			var type_id=$("#type_id").val();
			
			$.ajax({
				url: "actions/validation_actions.php",
				type: "GET",
				data: {holiday_date:holiday_date, occasion:occasion, type_id:type_id},
				async: false,
				success: function(data){
					if(data=="successfully posted"){
						
			
						$("#error_holiday").removeClass("alert-danger").addClass("alert alert-success").text(data);
	
						$("#addpost_event").submit();
						
					} else {
						$("#error_holiday").addClass("alert-danger").text(data);
						}
						
						
						$("#error_holiday").removeClass("hidden");
					
					}
				
				})
			}
</script>