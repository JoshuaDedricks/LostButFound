$(document).ready(function(){

	$('.menu-icon').click(function(){
		$('#menu').slideDown();
			window.setTimeout(back_again, 3000);
		});
	
	
	function back_again()
	{
		$('#menu').slideUp();
			
		return true;
	};
	
	if($('#menu').stop() == true)
	{
			window.setTimeout(back_again, 3000).stop();
	}
	
	else
	{
		window.setTimeout(back_again, 3000);
	}
	
	
	
});