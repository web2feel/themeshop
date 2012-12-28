<?php
/**
 * @package web2feel
 * @since web2feel 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?>>
	
	<div class="product-single-top grid_12 cf">
					<div class="theme-shot cf">
						<?php get_template_part( 'slide' ); ?>
					</div>
	</div>

	<div class="product-entry grid_8">
	
		<header class="entry-header">
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<div class="entry-meta">
			<?php echo get_the_term_list( $post->ID, 'download_category', 'Type: ', ', ', '' ); ?>	
			</div>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'web2feel' ), 'after' => '</div>' ) ); ?>    
		</div><!-- .entry-content -->

	</div>
	
	
	<div class="product-detail grid_4">
			<?php if(function_exists('edd_price')) { ?>
				<div class="theme-buttons">
					<?php //if(!edd_has_variable_prices(get_the_ID())) { ?>
						<?php echo edd_get_purchase_link(get_the_ID(), 'Add to Cart', 'button'); ?>
					<?php// } ?>
				</div><!--end .product-buttons-->
			<?php } ?>
			
			<div class="theme-demo"> <a href="<?php  echo rwmb_meta( 'wtf_demo' ); ?>"> THEME PREVIEW</a> </div>
	
			<div class="theme-buy-box">
				<h3>Theme Details</h3>
		
				<ul class="theme-details">
					<li><b>Designer:</b> <?php  echo rwmb_meta( 'wtf_designer' ); ?></li>
					<li><b>Version:</b> <?php  echo rwmb_meta( 'wtf_version' );?></li>
					<li><b>Released on:</b> <?php  echo rwmb_meta( 'wtf_release' ); ?></li>
					<li><b>Updated on:</b> <?php  echo rwmb_meta( 'wtf_update' ); ?></li>
					<li><b>Requirement:</b> <?php  echo rwmb_meta( 'wtf_require' ); ?></li>
					<li><b>Layout:</b> <?php   echo rwmb_meta( 'wtf_layout' ); ?></li>
					<li><b>Columns:</b> <?php  echo rwmb_meta( 'wtf_columns' ); ?></li>
					<li><b>Browsers:</b> <?php $browsers = rwmb_meta( 'wtf_browser', 'type=checkbox_list' );
    echo implode( ', ', $browsers ); ?></li>
					<li><b>Files included:</b> <?php echo rwmb_meta( 'wtf_files' ); ?></li>
					<li><b>Documentation:</b> <?php  echo rwmb_meta( 'wtf_document' ); ?></li>
					
				</ul>
				
			</div>
			
			<div class="widget themetags">
				<?php wp_tag_cloud( array( 'taxonomy' => 'download_tag' ) ); ?>
			</div>
			
		
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
