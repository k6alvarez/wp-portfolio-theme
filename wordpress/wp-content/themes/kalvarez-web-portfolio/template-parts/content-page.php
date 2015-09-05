<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package K.Alvarez Web Portfolio
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<div class="entry-content">
		<div class="content"><?php the_content(); ?></div>		
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'kalvarez-web-portfolio' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php if(is_front_page()):?>
		<div class="content feature-work">
			<div class="container">
				<h1>Featured Work</h1>
				<p>Here you can read about some of the projects I have worked on. I'm always looking to take on short fun projects in my free time.</p>
				<div class="thumbnail">
					<a href="#"><img src="http://localhost:8888/wp-content/uploads/2015/09/penguins.jpg" alt=""></a>
					<div class="more-info">
						<p class="title">Penguin Naming Contest - <span class="category">Facebook App</span></p>
						<p class="description">This project was a Facebook campaign for the Georgia Aquarium that created a voting contest to pick the names of two new baby penguins. This project was built using HTML, CSS, JQuery and was implemented using ShortStack. The project won an  AMY award for Web & Interactive Marketing.</p>						
					</div>					
				</div>
				<div class="thumbnail">
					<a href="#"><img src="http://localhost:8888/wp-content/uploads/2015/09/black-21.jpg" alt=""></a>					
					<div class="more-info">
						<p class="title">21 Black Series - <span class="category">Website</span></p>
						<p class="description">I did the front end work on this micro-site for the Georgia Lottery. The site is built using HTML, CSS, JQuery.</p>						
					</div>
				</div>
				<div class="thumbnail last">
					<a href="#"><img src="http://localhost:8888/wp-content/uploads/2015/09/makeup-artist.jpg" alt=""></a>
					<div class="more-info">
						<p class="title">Makeup Artist Theme - <span class="category">Wordpress</span></p>
						<p class="description">Simple wordpress theme for a makeup artist or any artist that wants show of some their work. I designed and developed this theme.</p>
					</div>
				</div>
				<div class="thumbnail">
					<a href="#"><img src="http://localhost:8888/wp-content/uploads/2015/09/cherrybomb.jpg" alt=""></a>
					<div class="more-info">
						<p class="title">Cherry Bomb Dance - <span class="category">Wordpress</span></p>
						<p class="description">If you have a wordpress theme that you like and need it set up, I can do that for you too. I installed and set up this wordpress theme for the Cherry Bomb Dance group.</p>						
					</div>
				</div>		
				<div class="thumbnail ">
					<a href="#"><img src="http://localhost:8888/wp-content/uploads/2015/09/trane-mobile.jpg" alt=""></a>
					<div class="more-info">
						<p class="title">Trane Commercial - <span class="category">Website</span></p>
						<p class="description">Created front end prototype and worked with client's in house back end team to implement the new site.</p>						
					</div>
				</div>				
						
				<div class="thumbnail last">
					<a href="#"><img src="http://localhost:8888/wp-content/uploads/2015/09/truckerapp.jpg" alt=""></a>
					<div class="more-info">
						<p class="title">Trucker App - <span class="category">Cordova Android App</span></p>
						<p class="description">My job on this app was to integrated the google maps api to allows users to plan their route. This was one of my first projects.</p>						
					</div>
				</div>				
			</div>
		</div>
	<?php endif; ?>

	<!-- <footer class="entry-footer">
		<?php edit_post_link( esc_html__( 'Edit', 'kalvarez-web-portfolio' ), '<span class="edit-link">', '</span>' ); ?>
	</footer> --><!-- .entry-footer -->
</article><!-- #post-## -->

