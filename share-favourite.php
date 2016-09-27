<?php
/**
 * Created by PhpStorm.
 * User: waqasriaz
 * Date: 17/12/15
 * Time: 4:47 PM
 */

global $post, $prop_images, $houzez_local, $current_page_template, $taxonomy_name;
?>
<ul class="list-unstyled actions pull-right">
    <li>
        <span data-placement="top" data-toggle="tooltip" data-original-title="<?php echo $houzez_local['favorite']; ?>">
            <?php get_template_part( 'template-parts/favorite' ); ?>
        </span>
    </li>
    <!-- <li class="share-btn">
        <?php get_template_part( 'template-parts/share' ); ?>
    </li> -->
    <li>
        <span data-toggle="tooltip" data-placement="top" title="(<?php echo count( $prop_images ); ?>) <?php echo $houzez_local['photos']; ?>">
            <i class="fa fa-camera"></i>
            <!--<span class="count">(<?php /*echo count( $prop_images ); */?>) </span>-->
        </span>
    </li>
    <?php if( $current_page_template == 'template/property-listing-template.php' ||
              $current_page_template == 'template/property-listing-fullwidth.php' ||
              $current_page_template == 'template/template-search.php' ||
              $taxonomy_name == 'property_status' ||
              $taxonomy_name == 'property_type' ||
              $taxonomy_name == 'property_area' ||
              $taxonomy_name == 'property_city' ||
              $taxonomy_name == 'property_feature' ||
              $taxonomy_name == 'property_state'
    ) {?>
    <li>
        <span id="compare-link-<?php esc_attr_e( $post->ID ); ?>" class="compare-property" data-propid="<?php esc_attr_e( $post->ID ); ?>" data-toggle="tooltip" data-placement="top" title="<?php esc_html_e( 'Compare', 'houzez' ); ?>">
            <i class="fa fa-plus"></i>
        </span>
    </li>
    <?php } ?>
</ul>
