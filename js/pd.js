$(document).ready(function(){
	$('.notify').click(function(){
		if($('.lostit').slideDown())
		{
			$('.lostit').slideUp();
		}
		$('.notifications').slideDown();
		$('#move_up').click(function(){
			$('.notifications').slideUp();
		});
	});

	$('#dlost').click(function(){
		
		if($('.notifications').slideDown())
		{
			$('.notifications').slideUp();
		}
		$('.lostit').slideDown();
		
		$('#move').click(function(){
			$('.lostit').slideUp();
		});
		
	});
	
});