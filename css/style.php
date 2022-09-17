<?php
/**
 * Dynamic Styles
*/

function business_ezone_dynamic_css(){
    
    $color_scheme = get_theme_mod( 'business_ezone_color_scheme', '#386FA7' );

    $typhography_scheme = get_theme_mod( 'business_ezone_typography', 'Oswald' );
    switch ( $typhography_scheme ) {
    	case 'Dancing+Script':
    		$font_family = 'Dancing Script';
            $font_family_fallback = 'Cursive';
    		break;

		case 'Open+Sans':
			$font_family = 'opens Sans';
            $font_family_fallback = 'sans-serif';
		break;
    	
    	default:
    		$font_family = 'Oswald';
            $font_family_fallback = 'Dancing Script';
    		break;
    }

    
    echo "<style type='text/css' media='all'>"; 
    	
		echo 'body, button, input, select, optgroup, textarea , .content-area .post .entry-content table th, .content-area .page .entry-content table th, .widget-area .widget-title{ font-family: "'.  esc_html( $font_family ) .'" , '. esc_html( $font_family_fallback ) .' } ';
    
    echo "</style>";
}
