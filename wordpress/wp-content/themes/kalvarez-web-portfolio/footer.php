<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package K.Alvarez Web Portfolio
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">
			<div class="content contact">
				<h1>Contact</h1>
				<div class="map">
					<p>My current location</p>
					 <div id="map"></div>										
				</div>
				<div class="form">
					<p>Want to get in contact? Just drop me a line below.</p>

					<!-- <form action="">
						<textarea name="" id="" cols="30" rows="10" placeholder="Leave a message"></textarea>
						<input type="text" placeholder="Your email address">
						<input class="button" type="submit">
					</form> -->
					<?php echo do_shortcode('[contact-form-7 id="45" title="Contact Form Footer"]'); ?>					
				</div>
			</div>
		</div>
		<div class="site-info">
			<div class="container">
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'kalvarez-web-portfolio' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'kalvarez-web-portfolio' ), 'WordPress' ); ?></a>
				<span class="sep"> | </span>
				<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'kalvarez-web-portfolio' ), 'kalvarez-web-portfolio', '<a href="http://kennyalvarez.com" rel="designer">Kenny Alvarez</a>' ); ?>
			</div>
		</div>
	</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
