<div id="slider">
				<div id="flexislider" class="flexslider">
					<ul class="slides">
					  	<?php	
					  	
					  	$images = rwmb_meta( 'wtf_screens', 'type=plupload_image' );
					  	foreach ( $images as $image )
					    {    echo "<li> <a class=\"fancybox\" href='{$image['full_url']}' title='{$image['title']}' ><img src='{$image['full_url']}'   alt='{$image['alt']}' /></a></li>";
					    }
					  	
					  	?>
					</ul>
				</div>	
</div>	
