<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					/*
					 * Include the post format-specific template for the content. If you want to
					 * use this in a child theme, then include a file called called content-___.php
					 * (where ___ is the post format) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );

			?>
			
			<script>
				// $(document).ready(function(){
				$.get("http://www.city.osaka.lg.jp/contents/wdu090/opendata/mapnavoskdat_csv/mapnavoskdat_gakkou.csv",function(data)){
					var csv = $.scv()(data);
					$(csv).each(function(){
						if(this[0] && this[1] && this[2] && this[3]){
							$("#csv").append("<tr><td>"+this[0]+"</td><td>"+this[1]+"</td><td>"+this[2]+"</td><td>"+this[3]+"</td></tr>");
						}
					})
				}
				// })
			</script>

			<table id="csv"></table>

			<?php



					// Previous/next post navigation.
					twentyfourteen_post_nav();

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
				endwhile;
			?>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php
get_sidebar( 'content' );
get_sidebar();
get_footer();
