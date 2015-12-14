$(document).ready(function(){
	$('.tab_content:eq(0)').css('display','block');
	$('.tabMenu ul li a').click(function(){
		var tracker = 0;
		tracker = $('.tabMenu ul li a').index($(this));
		$('.tabMenu ul li').removeClass('selected');
		$(this).parent().addClass('selected');
		$('.tab_content').css('display','none');
		$('.tab_content:eq('+tracker+')').css('display','block');
		return false;
	});
	
	
	// Function For Pop-up In
	$('.loginPanel').click(function(){
		$('.login-pannel').fadeIn('slow');
	});
	
	// Function For Pop-up Out
	$('#popup-close').click(function(){
		$('.login-pannel').fadeOut('slow');
		return false;
	});
        
        /**
         * when clicking on login button it will block
         * both login and cancel button, so we need to bring
         * that button enable when user click on back button
         */
        $('#login').removeAttr('disabled');
        $('#popup-close').removeAttr('disabled');

        $(document).bind('keydown',function(e){
            if(e.type == "keydown"){
                if(e.which == '27'){
                    $(".login-pannel").fadeOut('slow');
                }
            }
        });
});