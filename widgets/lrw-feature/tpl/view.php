<?php
$shape_format 	= $instance['icon_settings']['shape_format'];
$shape_color 	= $instance['icon_settings']['shape_color'];
$icon_type 		= $instance['icon_settings']['icon_type'];

$icon 			= $instance['icon_settings']['type_icon_section']['icon'];
$icon_color 	= $instance['icon_settings']['type_icon_section']['icon_color'];
$icon_size 		= $instance['icon_settings']['type_icon_section']['icon_size'];

$image  	   	= $instance['icon_settings']['type_image_section']['image'];
$image_size	   	= $instance['icon_settings']['type_image_section']['image_size'];
$image_padding	= $instance['icon_settings']['type_image_section']['image_padding'];
$image_overflow	= $instance['icon_settings']['type_image_section']['image_overflow'];

$heading_text  	= $instance['heading']['heading_text'];
$heading_type  	= $instance['heading']['heading_type'];

$text 		   	= $instance['content']['text'];

// Class icon wrapper
$icon_wrapper_classes   = array();
$icon_wrapper_classes[] = 'element-' . ( ! empty( $image ) ? 'shape_image' : 'shape_icon' );

// Define icon type
$icon_classes   = array();
$icon_classes[] = ( $shape_format ? 'icon-shape-' . $shape_format : '' );
$icon_classes[] = ( ! empty( $icon_size ) ) ? 'icon-size-' . $icon_size : '';
$icon_classes[] = ( $shape_format == 'outline-circle' or $shape_format == 'outline-square' or $shape_format == 'outline-rounded' ) ? 'icon-element-outline' : 'icon-element-background';
$icon_classes[] = ( $icon_type == 'type_image' && $image_overflow == false ? 'overflow-hidden' : '' );
?>
<div class="lrw-feature">
	<div class="lrw-icon-element <?php echo esc_attr( implode( ' ', $icon_wrapper_classes ) ); ?>">
		<?php if ( $icon_type == 'type_icon' ) : ?>
			<div class="icon-inner <?php echo esc_attr( implode( ' ', $icon_classes ) ); ?>">
				<?php echo siteorigin_widget_get_icon( $icon ); ?>
			</div>
		<?php elseif ( $icon_type == 'type_image' ): ?>
			<div class="image-wrapper <?php echo esc_attr( implode( ' ', $icon_classes ) ); ?>">
				<?php $src = wp_get_attachment_image( $image, $image_size ); ?>
				<?php echo $src; ?>
			</div>
		<?php endif; ?>
	</div>
	<div class="feature-content">
		<?php echo '<' . $heading_type . ' class="feature-heading heading-align">' . wp_kses_post( $heading_text ) . '</' . $heading_type . '>'; ?>
		<div class="feature-text text-align">
			<?php echo wp_kses_post( $text ); ?>
		</div>
	</div>
</div>
