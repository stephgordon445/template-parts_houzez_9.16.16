<?php
/**
 * Created by PhpStorm.
 * User: waqasriaz
 * Date: 18/01/16
 * Time: 5:46 PM
 */
global $hide_add_prop_fields, $required_fields;
$rq_propID = $rq_bedrooms = $rq_bathrooms = $rq_area_size = $rq_garage = '';
$year_built_calender = houzez_option('year_built_calender');

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
                        <label for="property_id"><?php esc_html_e('Property ID', 'houzez'); ?></label>
                        <input type="text" <?php echo esc_attr($rq_propID); ?> id="property_id" class="form-control" name="property_id" placeholder="<?php esc_html_e( 'Enter property ID', 'houzez' ); ?>">
                    </div>
                </div>
                <?php } ?>

                <?php if( $hide_add_prop_fields['area_size'] != 1 ) { ?>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="prop_size"><?php esc_html_e('Area Size ( Only digits )', 'houzez'); ?></label>
                        <input type="text" <?php echo esc_attr($rq_area_size); ?> id="prop_size" class="form-control" name="prop_size" placeholder="<?php esc_html_e( 'Enter property area size', 'houzez' ); ?>" value="">
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="prop_size_prefix"><?php esc_html_e('Size Prefix', 'houzez'); ?></label>
                        <input type="text" <?php echo esc_attr($rq_area_size); ?> id="prop_size_prefix" class="form-control" name="prop_size_prefix" value="<?php esc_html_e('Sq Ft', 'houzez');?>">
                    </div>
                </div>
                <?php } ?>

                <?php if( $hide_add_prop_fields['bedrooms'] != 1 ) { ?>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="prop_beds"><?php esc_html_e('Bedrooms', 'houzez'); ?></label>
                        <input type="text" <?php echo esc_attr($rq_bedrooms); ?> id="prop_beds" class="form-control" name="prop_beds" placeholder="<?php esc_html_e( 'Enter number of bedrooms', 'houzez' ); ?>" value="">
                    </div>
                </div>
                <?php } ?>

                <?php if( $hide_add_prop_fields['bathrooms'] != 1 ) { ?>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="prop_baths"><?php esc_html_e('Bathrooms', 'houzez'); ?></label>
                        <input type="text" <?php echo esc_attr($rq_bathrooms); ?> id="prop_baths" class="form-control" name="prop_baths" placeholder="<?php esc_html_e( 'Enter number of bathrooms', 'houzez' ); ?>" value="">
                    </div>
                </div>
                <?php } ?>

                <?php if( $hide_add_prop_fields['garages'] != 1 ) { ?>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="prop_garage"><?php esc_html_e('Garages', 'houzez'); ?></label>
                        <input type="text" <?php echo esc_attr($rq_garage); ?> id="prop_garage" class="form-control" name="prop_garage" placeholder="<?php esc_html_e( 'Enter number of garages', 'houzez' ); ?>" value="">
                    </div>
                </div>
                <?php } ?>

                <?php if( $hide_add_prop_fields['garage_size'] != 1 ) { ?>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="prop_garage_size"><?php esc_html_e('Garages Size', 'houzez'); ?></label>
                        <input type="text" <?php echo esc_attr($rq_garage); ?> id="prop_garage_size" class="form-control" name="prop_garage_size" placeholder="<?php esc_html_e( 'Enter garage size', 'houzez' ); ?>" value="">
                    </div>
                </div>
                <?php } ?>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="prop_year_built"><?php esc_html_e('Year Built', 'houzez'); ?></label>
                        <?php if( $year_built_calender != 'no' ) { ?>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                            <input type="text" id="prop_year_built" class="input_date form-control" name="prop_year_built" placeholder="<?php esc_html_e( 'Enter year built', 'houzez' ); ?>" value="">
                        </div>
                        <?php } else { ?>

                            <input type="text" id="prop_year_built" class="form-control" name="prop_year_built" placeholder="<?php esc_html_e( 'Enter year built', 'houzez' ); ?>" value="">

                        <?php } ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="prop_video_url"><?php esc_html_e( 'Virtual Tour Video URL', 'houzez' ); ?></label>
                        <input class="form-control" name="prop_video_url" id="prop_video_url" placeholder="<?php esc_html_e( 'YouTube, Vimeo, SWF File and MOV File are supported', 'houzez' ); ?>">
                    </div>
                </div>
            </div>
        </div>

        <?php if( $hide_add_prop_fields['additional_details'] != 1 ) { ?>
        <div class="add-tab-row">
            <h4><?php esc_html_e('Additional  details', 'houzez'); ?></h4>
            <table class="additional-block">
                <thead>
                <tr>
                    <td> </td>
                    <td><label><?php esc_html_e( 'Title', 'houzez' ); ?></label></td>
                    <td><label><?php esc_html_e( 'Value', 'houzez' ); ?></label></td>
                    <td> </td>
                </tr>
                </thead>
                <tbody id="houzez_additional_details_main">
                <tr>
                    <td class="action-field">
                        <span class="sort-additional-row"><i class="fa fa-navicon"></i></span>
                    </td>
                    <td class="field-title">
                        <input class="form-control" type="text" name="additional_features[0][fave_additional_feature_title]" id="fave_additional_feature_title_0" value="">
                    </td>
                    <td>
                        <input class="form-control" type="text" name="additional_features[0][fave_additional_feature_value]" id="fave_additional_feature_value_0" value="">
                    </td>
                    <td class="action-field">
                        <span data-remove="0" class="remove-additional-row"><i class="fa fa-remove"></i></span>
                    </td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                    <td></td>
                    <td><button data-increment="0" class="add-additional-row"><i class="fa fa-plus"></i> <?php esc_html_e( 'Add New', 'houzez' ); ?></button></td>
                    <td></td>
                </tr>
                </tfoot>
            </table>

        </div>
        <?php } ?>

    </div>
</div>
