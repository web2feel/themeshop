<?php
/**

Template Name: Homepage
 */

get_header(); ?>
	<div id="spotlight" class="grid_12 cf">	</div>
	<div class="clear"></div>

	<div class="intro grid_12 cf">
		<h1>Welcome to wordpress theme site</h1>
		<p>This is a demo for a theme store. No themes can be purchased here. </p>
	</div>

	<div id="primary" class="content-area container_12">
	<div id="article-area" class="cf ">
		
	<div class="latest-head grid_12">
		<h3>Latest Themes</h3>
	</div>
		
	<div class="article-list cf">
		<?php
		$wp_query = new WP_Query(array('post_type' => 'download','posts_per_page'=> '12' ));
		?>
		<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
		
			<div class="product-box grid_4">
				<div class="prod-thumb">
					<?php
						$thumb = get_post_thumbnail_id();
						$img_url = wp_get_attachment_url( $thumb,'full' ); //get full URL to image (use "large" or "medium" if the images too big)
						$image = aq_resize( $img_url, 280, 180, true ); //resize & crop the image
					?>
					<?php if($image) : ?> <a href="<?php the_permalink(); ?>"><img class="prod-screen" src="<?php echo $image ?>"/></a> <?php endif; ?>
					<a href="<?php the_permalink(); ?>"><span class="overlay"></span></a>
				</div>
				
				<div class="prod-info cf">
					<div class="pricebar cf"> 
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<?php if(function_exists('edd_price')) { ?>
						<span class="pricetag">
							<?php edd_price(get_the_ID()); ?>
						</span>
						<?php } ?>
					</div>
					
					<p><?php  echo rwmb_meta( 'wtf_description' ); ?>	</p>	
					
				</div>
					
			</div>
		<?php endwhile; ?>

	</div>
	</div>
		
	</div><!-- #primary .content-area -->


<?php get_footer(); ?>