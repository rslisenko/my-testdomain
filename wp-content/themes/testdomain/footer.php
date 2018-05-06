<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>

		</div><!-- #content -->

		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="wrap">
				<?php
				get_template_part( 'template-parts/footer/footer', 'widgets' );

				if ( has_nav_menu( 'social' ) ) : ?>
					<nav class="social-navigation" role="navigation" aria-label="<?php _e( 'Footer Social Links Menu', 'twentyseventeen' ); ?>">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'social',
								'menu_class'     => 'social-links-menu',
								'depth'          => 1,
								'link_before'    => '<span class="screen-reader-text">',
								'link_after'     => '</span>' . twentyseventeen_get_svg( array( 'icon' => 'chain' ) ),
							) );
						?>
					</nav><!-- .social-navigation -->
				<?php endif;
				?>
				<!-- в реальному проекті це будуть ACF поля і інформація буде братися з адмінки -->
				<!-- begin contact info mobile version -->
				<div class="contact-info show-for-mobile">
					<a href="tel:+380987654321" class="phone site-btn"><?php _e('Call Us', 'sitename'); ?></a>
					<a href="mailto:testdomain@mail.to" class="email site-btn"><?php _e('Email Us', 'sitename'); ?> </a>
					<button class="contact-us-btn site-btn" ><?php _e('Contact Us', 'sitename'); ?></button>
				</div>
				<!-- end contact info mobile version -->

				<!-- begin site info -->
				<?php
				get_template_part( 'template-parts/footer/site', 'info' );
				?>
				<!-- end site info -->

				<!-- begin contact info desctop version -->
				<div class="contact-info show-for-desctop">
					<div class="inner">
						<p class="phone"><?php _e('Call Us:', 'sitename'); ?> 0987654321 </p>
						<a href="mailto:testdomain@mail.to" class="email"><?php _e('Email:', 'sitename'); ?> testdomain@mail.to</a>
						<button class="contact-us-btn site-btn" ><?php _e('Contact Us', 'sitename'); ?></button>
					</div>
				</div>
				<!-- end contact info desctop version -->
			</div><!-- .wrap -->
		</footer><!-- #colophon -->
	</div><!-- .site-content-contain -->
</div><!-- #page -->
<?php wp_footer(); ?>

</body>
</html>
