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
                if( get_field('post_name') ) { ?>
                  <p><?php echo get_field('post_name');?></p>
                <?php }

                $image = get_field('post_image');
                if( !empty($image) ): ?>
                  <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                <?php endif; ?>

                <?php
                $location = get_field('post_map');
                if( !empty($location) ): ?>
                  <img style="margin-top:25px;" width="1500" height="250" src="http://maps.googleapis.com/maps/api/staticmap?center=<?php echo $location['lat'];?>,<?php echo $location['lng'];?>&zoom=15&size=1500x250&sensor=false&markers=color:red%7Clabel:%7C<?php echo $location['lat'];?>,<?php echo $location['lng'];?>">        
                <?php endif; ?>

          <?php }
        }
        wp_reset_postdata();
      ?>
    </body>
</html>
