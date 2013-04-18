$(document).ready(function()
{


 $("input").focus(function()
 {
	var elm = $(this);
	var hint = elm.attr('hint');

	if (!hint)
		   return;

	var existingHints = $('.hint');
	if (existingHints.length > 0)
		   return;			

	var hintElm = $('<span class="hint">' + hint + '</span>');

	hintElm.insertAfter(elm);
	elm.blur(function()
	{
		hintElm.remove();
	});                  
 })
 
 $("select").focus(function()
 {
	var elm = $(this);
	var hint = elm.attr('hint');

	if (!hint)
		   return;

	var existingHints = $('.hint');
	if (existingHints.length > 0)
		   return;			

	var hintElm = $('<span class="hint">' + hint + '</span>');

	hintElm.insertAfter(elm);
	elm.blur(function()
	{
		hintElm.remove();
	});                  
 })   	

 $("textarea").focus(function()
 {
	var elm = $(this);
	var hint = elm.attr('hint');

	if (!hint)
		   return;

	var existingHints = $('.hint');
	if (existingHints.length > 0)
		   return;			

	var hintElm = $('<span class="hint">' + hint + '</span>');

	hintElm.insertAfter(elm);
	elm.blur(function()
	{
		hintElm.remove();
	});                  
 }) 		 

 $("#submit").click(function()
 {
	  // validate and process form
	  // first hide any error messages
	  //alert('form submitted');
	  //return false;
 })       
 
});
