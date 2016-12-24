<html>
    <head>
    	<link type="text/css" rel="stylesheet" href="<?php echo get_bloginfo( 'stylesheet_url' ); ?>" media="all" />
    	<?php
    		$wp_head = get_option( 'dkpdf_print_wp_head', '' );
    		if( $wp_head == 'on' ) {
    			wp_head();
    		}
    	?>
      	<style type="text/css">
      		body {
      			background:#FFF;
      			font-size: 100%;
      		}
			<?php
				$css = get_option( 'dkpdf_pdf_custom_css', '' );
				echo $css;
			?>
		</style>
   	</head>

    <body>
	    <?php
	    global $post;
	    $pdf  = get_query_var( 'pdf' );
	    $post_type = get_post_type( $pdf );
      $args = array(
        'p' => $pdf,
        'post_type' => $post_type,
        'post_status' => 'publish'
      );
      $the_query = new WP_Query( apply_filters( 'dkpdf_query_args', $args ) );
        if ( $the_query->have_posts() ) {
          while ( $the_query->have_posts() ) {
              $the_query->the_post();
              global $post; ?>

              <?php
                // add your stuff here
                the_content();
              ?>

          <?php }
        }
        wp_reset_postdata();
      ?>
    </body>
</html>
