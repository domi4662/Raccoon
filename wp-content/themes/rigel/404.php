<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package Rigel
 */

get_header(); ?>

	<div id="primary" class="content-area">		
		<main id="main" class="site-main container" role="main">
			<div class="row">

				<div class="col-md-12">

					<header class="article-header align-center text-center">

						<img src="<?php echo get_template_directory_uri().'/_img/404.png' ?>" alt="">

						<h1 class="main-title title"><?php esc_html_e( 'THE PAGE YOU ARE LOOKING FOR IS NOT FOUND', 'rigel' ); ?></h1>

					</header>

					<section class="entry-content text-center">

						<p><?php esc_html_e( 'The page you are looking for does not exist. It may have been moved, or removed altogether. Perhaps you can return back to the site homepage and see if you can find what you are looking for.', 'rigel' ); ?></p>

					</section>

					<section class="error-search widget widget_search">

							<p><?php get_search_form(); ?></p>

					</section>
				</div>
			</div>
			

		</main> <!-- #main -->
	</div> <!-- #primary -->

<?php get_footer(); ?>
