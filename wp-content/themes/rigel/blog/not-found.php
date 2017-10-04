<article id="post-not-found" class="load-element element">

	<?php if ( is_search() ) : ?>
		<header class="article-header">
			<h1><?php esc_html_e( 'Nothing Found!', 'rigel' ); ?></h1>
		</header>

		<section>
			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'rigel' ); ?></p>
		</section>

		<div class="clearfix error-search widget widget_search">
			<p><?php get_search_form(); ?></p>
		</div>

	<?php else : ?>

		<header class="article-header">
		<h1><?php esc_html_e( 'Post Not Found!', 'rigel' ); ?></h1>
	</header>
	<section>
		<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'rigel' ); ?></p>
	</section>

	<div class="clearfix error-search widget widget_search">
		<p><?php get_search_form(); ?></p>
	</div>

	<?php endif; ?>
	
</article>