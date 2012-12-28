<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package web2feel
 * @since web2feel 1.0
 */

get_header(); ?>

		<section id="primary" class="content-area cf">
			<div id="content" class="site-content" role="main">

			<?php if ( have_posts() ) : ?>

				<header class="page-header grid_12">
					<h1 class="page-title">
						Themes with  <?php  $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );  $term_title = $term->name;   echo "$term_title "; ?> feature
					</h1>
				</header><!-- .page-header -->

				<div class="article-list cf">
					<?php while ( have_posts() ) : the_post(); ?>

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
							<p> <?php  echo rwmb_meta( 'wtf_description' ); ?>	</p>	
								
							</div>
					</div>
			
				   <?php endwhile; ?>
				</div>
				
				<?php kriesi_pagination(); ?>

			<?php else : ?>

				<?php get_template_part( 'no-results', 'archive' ); ?>

			<?php endif; ?>

			</div><!-- #content .site-content -->
		</section><!-- #primary .content-area -->

<?php get_footer(); ?>