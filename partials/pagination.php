<?php
                   global $wp_query;
                  /* $big = 999999999; // need an unlikely integer
                   $translated = __( 'Page', 'virgo14' ); // Supply translatable string
                   echo paginate_links( array(
                       'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                       'format' => '?paged=%#%',
                       'current' => max( 1, get_query_var('paged') ),
                       'total' => $wp_query->max_num_pages,?
                     //  'before_page_number' => '<span class="screen-reader-text">'.$translated.' </span>'
                       'prev_text'          =>'«',
                      	'next_text'          => '»'
                   ) );*/

//function wpbeginner_numeric_posts_nav() {
//	    if( is_singular() )
//	        return;
//	    global $wp_query;
//	    /*
//	    * Stop execution if there's only 1 page
//	     * */
//	    if( $wp_query->max_num_pages <= 1 )
//	        return;
//	    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
//	    $max   = intval( $wp_query->max_num_pages );
//	    /*
//	    * Add current page to the array
//	     * */
//	    if ( $paged >= 1 )
//	        $links[] = $paged;
//	    /*
//	    * Add the pages around the current page to the array
//	     *  */
//	    if ( $paged >= 3 ) {
//	        $links[] = $paged - 1;
//	        $links[] = $paged - 2;
//	    }
//	    if ( ( $paged + 2 ) <= $max ) {
//	        $links[] = $paged + 2;
//	        $links[] = $paged + 1;
//	    }
//	    echo '<div class="navigation"><ul>' . "\n";
//	    /*
//	    * Previous Post Link
//	     * */
//	    if ( get_previous_posts_link() )
//	        printf( '<li>%s</li>' . "\n", get_previous_posts_link() );
//	    /*
//	    * Link to first page, plus ellipses if necessary
//	     *  */
//	    if ( ! in_array( 1, $links ) ) {
//	        $class = 1 == $paged ? ' class="active"' : '';
//	        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
//	        if ( ! in_array( 2, $links ) )
//	            echo '<li>…</li>';
//	    }
//	    /*
//	     *  Link to current page, plus 2 pages in either direction if necessary
//	     *  */
//	    sort( $links );
//	    foreach ( (array) $links as $link ) {
//	        $class = $paged == $link ? ' class="active"' : '';
//	        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
//	    }
//	    /*
//	    * Link to last page, plus ellipses if necessary
//	     *  */
//	    if ( ! in_array( $max, $links ) ) {
//	        if ( ! in_array( $max - 1, $links ) )
//	            echo '<li>…</li>' . "\n";
//	        $class = $paged == $max ? ' class="active"' : '';
//	        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
//	    }
//	    /*
//	    * Next Post Link
//	     *  */
//	    if ( get_next_posts_link() )
//	        printf( '<li>%s</li>' . "\n", get_next_posts_link() );
//	    echo '</ul></div>' . "\n";
//	}



function wpbeginner_numeric_posts_nav() {
	$o = '';
	    if( is_singular() )
	        return;
	    global $wp_query;
	    /*
	    * Stop execution if there's only 1 page
	     * */
	    if( $wp_query->max_num_pages <= 1 )
	        return;
	    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	    $max   = intval( $wp_query->max_num_pages );
	    /*
	    * Add current page to the array
	    **/
	    if ( $paged >= 1 )
	        $links[] = $paged;
	    /*
	    * Add the pages around the current page to the array
	    **/
	    if ( $paged >= 3 ) {
	        $links[] = $paged - 1;
	        $links[] = $paged - 2;
	    }
	    if ( ( $paged + 2 ) <= $max ) {
	        $links[] = $paged + 2;
	        $links[] = $paged + 1;
	    }
	$o .= '<div class="navigation"><ul>' . "\n";
	    /*
	    * Previous Post Link
	     * */
	    if ( get_previous_posts_link() )
			$o .= sprintf( '<li>%s</li>' . "\n", get_previous_posts_link("«") );
	    /*
	    * Link to first page, plus ellipses if necessary
	     *  */
	    if ( ! in_array( 1, $links ) ) {
	        $class = 1 == $paged ? ' class="active"' : '';
			$o .= sprintf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
	        if ( ! in_array( 2, $links ) )
				$o.= '<li>…</li>';
	    }
	    /*
	     *  Link to current page, plus 2 pages in either direction if necessary
	     *  */
	    sort( $links );
	    foreach ( (array) $links as $link ) {
	        $class = $paged == $link ? ' class="active pagination_li"' : ' class="pagination_li"';
			$o.= sprintf( '<li%s data-numpage="'.$link.'" data-maxnum="'.$max.'"><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	    }
	    /*
	    * Link to last page, plus ellipses if necessary
	     *  */
	    if ( ! in_array( $max, $links ) ) {
	        if ( ! in_array( $max - 1, $links ) )
				$o.= '<li>…</li>' . "\n";
	        $class = $paged == $max ? ' class="active pagination_li"' : ' class="pagination_li"';
			$o.= sprintf( '<li%s data-numpage="'.$max.'" data-maxnum="'.$max.'"><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	    }
	    /*
	    * Next Post Link
	     *  */
	    if ( get_next_posts_link() )
			$o.= sprintf( '<li class="next_pagination_li">%s</li>' . "\n", get_next_posts_link("»") );
	$o.= '</ul></div>' . "\n";
	echo $o;
	}



wpbeginner_numeric_posts_nav();

?>
