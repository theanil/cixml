$(document).ready(function(){
	//References
	var pages   = $("#menu li");
	var loading = $("#loading");
	var content = $("#content2");
	
	//show loading bar
	function showLoading(){
		loading
			.css({visibility:"visible"})
			.css({opacity:"1"})
			.css({display:"block"})
		;
	}
	
	//hide loading bar
	function hideLoading()
	{
		loading.fadeTo(1000, 0);
	};
	
	//Manage click events
	pages.click(function()
	{
		//show the loading bar
		showLoading();
		
		//Highlight current page number
		pages.css({'background-color' : ''});
		$(this).css({'background-color' : 'red'});

		//Load content
		var pageNum = this.id;
		
		//alert(this.id);
		//content.load(targetUrl, hideLoading);
		$('#content2').load('news/content/'+ pageNum);
		hideLoading();
	});
	
	//default - 1st page
	$("#1").css({'background-color' : 'red'});
	
	showLoading();
	//content.load(targetUrl, hideLoading);
	$('#content2').load('news/content/1');
	hideLoading();
});