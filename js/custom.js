jQuery(document).ready(function($){

	/** navigation menu */
	var menuItems1 = document.querySelectorAll('.main-navigation li.menu-item-has-children');
	var menuItems2 = document.querySelectorAll('.main-navigation li.page_item_has_children');

	if( $('.page_item_has_children').length > 0 ){ 
		var menuItems = menuItems2;

		Array.prototype.forEach.call(menuItems, function(el, i){
			var activatingA = el.querySelector('a');
			var btn = '<button class="btn-submenu" aria-expanded="false"></button>';
			activatingA.insertAdjacentHTML('afterend', btn);
			el.querySelector('button').parentNode.querySelector('a').setAttribute('aria-expanded', "false");
			el.querySelector('button').addEventListener("click",  function(event){
				
				if ( !( this.parentNode.classList.contains( "open" ) ) ) {
					//this.parentNode.className = "menu-item-has-children open";
					this.parentNode.classList.add('open');
					this.parentNode.querySelector('a').setAttribute('aria-expanded', "true");
					this.parentNode.querySelector('button').setAttribute('aria-expanded', "true");
				} else {
					this.parentNode.classList.remove('open');
					//this.parentNode.className = "menu-item-has-children";
					this.parentNode.querySelector('a').setAttribute('aria-expanded', "false");
					this.parentNode.querySelector('button').setAttribute('aria-expanded', "false");
				}
				event.preventDefault();
			});
		});

	}else if(  $('.menu-item-has-children').length > 0  ){
		var menuItems = menuItems1;
			Array.prototype.forEach.call(menuItems, function(el, i){
			var activatingA = el.querySelector('a');
			var btn = '<button class="btn-submenu" aria-expanded="false"></button>';
			activatingA.insertAdjacentHTML('afterend', btn);
			el.querySelector('button').parentNode.querySelector('a').setAttribute('aria-expanded', "false");
			el.querySelector('button').addEventListener("click",  function(event){
				
				if ( !( this.parentNode.classList.contains( "open" ) ) ) {
					//this.parentNode.className = "menu-item-has-children open";
					this.parentNode.classList.add('open');
					this.parentNode.querySelector('a').setAttribute('aria-expanded', "true");
					this.parentNode.querySelector('button').setAttribute('aria-expanded', "true");
				} else {
					this.parentNode.classList.remove('open');
					//this.parentNode.className = "menu-item-has-children";
					this.parentNode.querySelector('a').setAttribute('aria-expanded', "false");
					this.parentNode.querySelector('button').setAttribute('aria-expanded', "false");
				}
				event.preventDefault();
			});
		});
	}

	/** Variables from Customizer for Slider settings */
    if( business_ezone_data.auto == '1' ){
        var slider_auto = true;
    }else{
        slider_auto = false;
    }
    
    if( business_ezone_data.loop == '1' ){
        var slider_loop = true;
    }else{
        var slider_loop = false;
    }
    
    if( business_ezone_data.pager == '1' ){
        var slider_control = true;
    }else{
        slider_control = false;
    }


    if( business_ezone_data.animation == 'fade' ){
        var slider_animation = 'fade';
    }else{
        slider_animation = '';
    }
    
   
    /** Home Page  Banner Slider */
   
	$('.fadeout').owlCarousel({
		items: 1,
		animateOut: slider_animation,// animation
		loop: slider_loop, // loop
		margin: 10,
		nav: true,
		navText:["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
		autoplay: slider_auto, //auto play
		dots:  slider_control, //slider control
		slideSpeed       : business_ezone_data.speed,
		autoplayTimeout: business_ezone_data.pause
	});


	$('.testimonial-slider').owlCarousel({
		items: 1,
		loop: true,
		margin: 10,
		nav: true,
		navText:["<i class='fa fa-chevron-circle-left'></i>","<i class='fa fa-chevron-circle-right'></i>"],
		autoplay: true,

	});

	//scrollup 	button
	$(window).scroll(function(){
		if ($(this).scrollTop() > 100) {
			$('.scrollup').fadeIn();
		} else {
			$('.scrollup').fadeOut();
		}
	});

	//scrollup javascript
    $('.scrollup').click(function () {
        $("html, body").animate({
            scrollTop: 0
        }, 800);
        return false;
    });
	
	// responsive menu

	$('#responsive-menu-button').sidr({
		name: 'sidr-main',
		source: '#site-navigation',
		side: 'right'
	});


	$('#responsive-menu-button-top').sidr({
		name: 'sidr-main-top',
		source: '#top-site-navigation',
		side: 'right'
	});

	$('body').on( 'click', '.btn-closed', function(){
        $.sidr('close', 'sidr-main-primary');
        $.sidr('close', 'sidr-main');
    });
    
    $('#sidr-main-primary li').click(function(){        
        $.sidr('close', 'sidr-main-primary');
        $.sidr('close', 'sidr-main');
    });
	
	
	//equl height
    $('.row.latest-activities .col-4.activity-items .activity-text .entry-content').matchHeight();
    $('.skill-items .skill-item .skill-text').matchHeight();

	

});