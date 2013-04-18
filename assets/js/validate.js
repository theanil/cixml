$(document).ready(function(){
             
		$("#form1").validate({
			rules: 
			{
				username: "required",
				password: "required"
			},
			messages: 
			{
				username: "<br />The Username field is required.",
				password: "<br />The Password field is required."
			}
		});
		
});