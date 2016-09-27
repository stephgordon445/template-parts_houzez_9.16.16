<?php
/**
 * Created by PhpStorm.
 * User: waqasriaz
 * Date: 18/01/16
 * Time: 5:46 PM
 */
global $prop_data, $prop_meta_data, $hide_add_prop_fields, $required_fields;
$additional_features = get_post_meta( $prop_data->ID, 'additional_features', true );
$fave_additional_features_enable = get_post_meta( $prop_data->ID, 'fave_additional_features_enable', true );
$year_built_calender = houzez_option('year_built_calender');

$rq_propID = $rq_bedrooms = $rq_bathrooms = $rq_area_size = $rq_garage = '';

if( $required_fields['prop_id'] != 0 ) { $rq_propID = 'required'; }
if( $required_fields['bedrooms'] != 0 ) { $rq_bedrooms = 'required'; }
if( $required_fields['bathrooms'] != 0 ) { $rq_bathrooms = 'required'; }
if( $required_fields['area_size'] != 0 ) { $rq_area_size = 'required'; }
if( $required_fields['garages'] != 0 ) { $rq_garage = 'required'; }
?>
<div class="account-block">
    <div class="add-title-tab">
        <h3><?php esc_html_e('Property Details', 'houzez'); ?></h3>
        <div class="add-expand"></div>
    </div>
    <div class="add-tab-content">
        <div class="add-tab-row push-padding-bottom">
            <div class="row">
                <?php if( $hide_add_prop_fields['prop_id'] != 1 ) { ?>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for=""><?php esc_html_e('Property ID', 'houzez'); ?></label>
                        <input type="text" <?php echo esc_attr($rq_propID); ?> id="property_id" class="form-control" name="property_id" value="<?php if( isset( $prop_meta_data['fave_property_id'] ) ) { echo sanitize_text_field( $prop_meta_data['fave_property_id'][0] ); } ?>" placeholder="<?php esc_html_e( 'Enter property ID', 'houzez' ); ?>">
                    </div>
                </div>
                <?php } ?>

                <?php if( $hide_add_prop_fields['area_size'] != 1 ) { ?>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for=""><?php esc_html_e('Area Size ( Only digits )', 'houzez'); ?></label>
                        <input type="text" <?php echo esc_attr($rq_area_size); ?> id="prop_size" class="form-control" name="prop_size" placeholder="<?php esc_html_e( 'Enter property area size', 'houzez' ); ?>" value="<?php if( isset( $prop_meta_data['fave_property_size'] ) ) { echo sanitize_text_field( $prop_meta_data['fave_property_size'][0] ); } ?>">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for=""><?php esc_html_e('Size Prefix', 'houzez'); ?></label>
                        <input type="text" <?php echo esc_attr($rq_area_size); ?> id="prop_size_prefix" class="form-control" name="prop_size_prefix" value="<?php if( isset( $prop_meta_data['fave_property_size_prefix'] ) ) { echo sanitize_text_field( $prop_meta_data['fave_property_size_prefix'][0] ); } ?>">
                    </div>
                </div>
                <?php } ?>

                <?php if( $hide_add_prop_fields['bedrooms'] != 1 ) { ?>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for=""><?php esc_html_e('Bedrooms', 'houzez'); ?></label>
                        <input type="text" <?php echo esc_attr($rq_bedrooms); ?> id="prop_beds" class="form-control" name="prop_beds" placeholder="<?php esc_html_e( 'Enter number of bedrooms', 'houzez' ); ?>" value="<?php if( isset( $prop_meta_data['fave_property_bedrooms'] ) ) { echo sanitize_text_field( $prop_meta_data['fave_property_bedrooms'][0] ); } ?>">
                    </div>
                </div>
                <?php } ?>

                <?php if( $hide_add_prop_fields['bathrooms'] != 1 ) { ?>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for=""><?php esc_html_e('Bathrooms', 'houzez'); ?></label>
                        <input type="text" <?php echo esc_attr($rq_bathrooms); ?> id="prop_baths" class="form-control" name="prop_baths" placeholder="<?php esc_html_e( 'Enter number of bathrooms', 'houzez' ); ?>" value="<?php if( isset( $prop_meta_data['fave_property_bathrooms'] ) ) { echo sanitize_text_field( $prop_meta_data['fave_property_bathrooms'][0] ); } ?>">
                    </div>
                </div>
                <?php } ?>

                <?php if( $hide_add_prop_fields['garages'] != 1 ) { ?>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for=""><?php esc_html_e('Garages', 'houzez'); ?></label>
                        <input type="text" <?php echo esc_attr($rq_garage); ?> id="prop_garage" class="form-control" name="prop_garage" placeholder="<?php esc_html_e( 'Enter number of garages', 'houzez' ); ?>" value="<?php if( isset( $prop_meta_data['fave_property_garage'] ) ) { echo sanitize_text_field( $prop_meta_data['fave_property_garage'][0] ); } ?>">
                    </div>
                </div>
                <?php } ?>

                <?php if( $hide_add_prop_fields['garage_size'] != 1 ) { ?>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for=""><?php esc_html_e('Garages Size', 'houzez'); ?></label>
                        <input type="text" <?php echo esc_attr($rq_garage); ?> id="prop_garage_size" class="form-control" name="prop_garage_size" placeholder="<?php esc_html_e( 'Enter garage size', 'houzez' ); ?>" value="<?php if( isset( $prop_meta_data['fave_property_garage_size'] ) ) { echo sanitize_text_field( $prop_meta_data['fave_property_garage_size'][0] ); } ?>">
                    </div>
                </div>
                <?php } ?>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label for=""><?php esc_html_e('Year Built', 'houzez'); ?></label>
                        <?php if( $year_built_calender != 'no' ) { ?>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                <input type="text" id="prop_year_built" class="input_date form-control" name="prop_year_built" placeholder="<?php esc_html_e( 'Enter year built', 'houzez' ); ?>" value="<?php if( isset( $prop_meta_data['fave_property_year'] ) ) { echo sanitize_text_field( $prop_meta_data['fave_property_year'][0] ); } ?>">
                            </div>
                        <?php } else { ?>
                            <input type="text" id="prop_year_built" class="form-control" name="prop_year_built" placeholder="<?php esc_html_e( 'Enter year built', 'houzez' ); ?>" value="<?php if( isset( $prop_meta_data['fave_property_year'] ) ) { echo sanitize_text_field( $prop_meta_data['fave_property_year'][0] ); } ?>">
                        <?php } ?>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="prop_video_url"><?php esc_html_e( 'Virtual Tour Video URL', 'houzez' ); ?></label>
                        <input class="form-control" id="prop_video_url" name="prop_video_url" value="<?php if( isset( $prop_meta_data['fave_video_url'] ) ) { echo sanitize_text_field( $prop_meta_data['fave_video_url'][0] ); } ?>" placeholder="<?php esc_html_e( 'YouTube, Vimeo, SWF File and MOV File are supported', 'houzez' ); ?>">
                    </div>
                </div>

            </div>
        </div>

        <!-- Additional Features -->
        <?php if( $fave_additional_features_enable != 'disable' ) { ?>
        <div class="add-tab-row">
            <h4><?php esc_html_e('Additional  details', 'houzez'); ?></h4>
            <table class="additional-block">
                <thead>
                <tr>
                    <td>&nbsp</td>
                    <td><label><?php esc_html_e( 'Title', 'houzez' ); ?></label></td>
                    <td><label><?php esc_html_e( 'Value', 'houzez' ); ?></label></td>
                    <td>&nbsp</td>
                </tr>
                </thead>
                <tbody id="houzez_additional_details_main">

                <?php $count = 0; ?>
                <?php
                if( !empty($additional_features) ) {
                    foreach ($additional_features as $add_feature): ?>
                        <tr>
                            <td class="action-field">
                                <span class="sort-additional-row"><i class="fa fa-navicon"></i></span>
                            </td>
                            <td class="field-title">
                                <input class="form-control" type="text"
                                       name="additional_features[<?php echo esc_attr( $count ); ?>][fave_additional_feature_title]"
                                       id="fave_additional_feature_title_<?php echo esc_attr( $count ); ?>"
                                       value="<?php echo esc_attr( $add_feature['fave_additional_feature_title'] ); ?>">
                            </td>
                            <td>
                                <input class="form-control" type="text"
                                       name="additional_features[<?php echo esc_attr( $count ); ?>][fave_additional_feature_value]"
                                       id="fave_additional_feature_value_<?php echo esc_attr( $count ); ?>"
                                       value="<?php echo esc_attr( $add_feature['fave_additional_feature_value'] ); ?>">
                            </td>
                            <td class="action-field">
                                <span data-remove="<?php echo esc_attr( $count ); ?>" class="remove-additional-row"><i
                                        class="fa fa-remove"></i></span>
                            </td>
                        </tr>
                        <?php $count++; ?>
                    <?php endforeach;
                }?>

                </tbody>
                <tfoot>
                <tr>
                    <td></td>
                    <td><button data-increment="<?php echo esc_attr( $count-1 ); ?>" class="add-additional-row"><i class="fa fa-plus"></i> <?php esc_html_e( 'Add New', 'houzez' ); ?></button></td>
                    <td></td>
                </tr>
                </tfoot>
            </table>
        </div>
        <?php } ?>
    </div>
</div>
