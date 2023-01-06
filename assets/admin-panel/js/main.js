$( function()
{
	// ============================================================== 
    // Menu Slim Scroll List
    //------------------------
    // SlimScroll Documentation: http://rocha.la/jQuery-slimScroll
    // ============================================================== 
    if ($(".menu-list").length) {
        $('.menu-list').slimScroll({
			railVisible: false,
    		alwaysVisible: true,
        	color: '#ffffff',
        	height: '88%',
        	
			/*
			width: '300px',
			size: '10px',
			position: 'left',
			alwaysVisible: true,
			distance: '20px',
			start: $('#child_image_element'),
			railVisible: true,
			railColor: '#222',
			railOpacity: 0.3,
			wheelStep: 10,
			allowPageScroll: false,
			disableFadeOut: false
			*/
        });
    }
    
	// ============================================================== 
    // Notification list
    // ============================================================== 
    if ($(".notification-list").length) {

        $('.notification-list').slimScroll({
            height: '250px'
        });

    }
    
    // ============================================================== 
    // Multi Level Dropdown Menu
    // ============================================================== 
    $( '.dropdown-menu a.dropdown-toggle' ).on( 'click', function( e ) {
		if ( ! $(this).next().hasClass( 'show' ) ) {
    		$(this).parents( '.dropdown-menu' ).first().find( '.show' ).removeClass( 'show' );
  		}
		var $subMenu = $(this).next( '.dropdown-menu' );
		$subMenu.toggleClass( 'show' );
	
	
		$(this).parents( 'li.nav-item.dropdown.show' ).on( 'hidden.bs.dropdown', function( e ) {
			$( '.dropdown-submenu .show' ).removeClass( 'show' );
		});
	
	
		return false;
	});
	
    // ============================================================== 
    // Sidebar scrollnavigation 
    // ============================================================== 
    if ( $( ".sidebar-nav-fixed a" ).length ) {
        $( '.sidebar-nav-fixed a' )
        // Remove links that don't actually link to anything
		.click( function( event ) {
            // On-page links
            if (
                location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') &&
                location.hostname == this.hostname
            ) {
                // Figure out element to scroll to
                var target = $( this.hash );
                target = target.length ? target : $( '[name=' + this.hash.slice(1) + ']' );
                // Does a scroll target exist?
                if ( target.length ) {
                    // Only prevent default if animation is actually gonna happen
                    event.preventDefault();
                    $( 'html, body ').animate({
                        scrollTop: target.offset().top - 90
                    }, 1000, function() {
                        // Callback after animation
                        // Must change focus!
                        var $target = $(target);
                        $target.focus();
                        if ( $target.is( ":focus" ) ) { // Checking if the target was focused
                            return false;
                        } else {
                            $target.attr( 'tabindex', '-1' ); // Adding tabindex for elements not focusable
                            $target.focus(); // Set focus again
                        };
                    });
                }
            };
            $( '.sidebar-nav-fixed a' ).each( function() {
                $( this ).removeClass( 'active' );
            })
            $( this ).addClass( 'active' );
        });
    }

    // ============================================================== 
    // tooltip
    // ============================================================== 
    if ($('[data-bs-toggle="tooltip"]').length) {
            
            $('[data-bs-toggle="tooltip"]').tooltip()

        }

    // ============================================================== 
    // popover
    // ============================================================== 
	if ($('[data-bs-toggle="popover"]').length) {
            $('[data-bs-toggle="popover"]').popover()

    }
    
    // ============================================================== 
    // Chat List Slim Scroll
    // ============================================================== 
    if ( $( '.chat-list' ).length ) {
    	$( '.chat-list' ).slimScroll({
            color: 'false',
            width: '100%'
        });
    }
});
