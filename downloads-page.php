<?php
/*
   Template name: Shop
*/

get_header(); ?>

		<div id="primary" class="content-area cf">
			<div id="content" class="site-content" role="main">
				<div class="article-list cf">
				<?php
				if ( get_query_var('paged') )
				    $paged = get_query_var('paged');
				elseif ( get_query_var('page') )
				    $paged = get_query_var('page');
				else
				    $paged = 1;
				$wp_query = new WP_Query(array('post_type' => 'download', 'paged' => $paged ));
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
				<?php //web2feel_content_nav( 'nav-below' ); ?>
				<div class="grid_12">
				<?php kriesi_pagination("$wp_query->max_num_pages"); ?>
				</div>
			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->

<?php get_footer(); ?>