<div class="lrw-cta">
	<div class="lrw-cta-wrapper">
		<div class="lrw-cta-texts">
			<h3><?php echo wp_kses_post( $instance['text']['title'] ); ?></h3>
			<p><?php echo wp_kses_post( $instance['text']['sub_title'] ); ?></p>
		</div>
		<div class="lrw-cta-button">
			<?php $this->sub_widget( 'SiteOrigin_Widget_Button_Widget', $args, $instance['button'] ); ?>
		</div>
	</div><!-- .lrw-cta-wrapper -->
</div><!-- .lrw-cta -->
