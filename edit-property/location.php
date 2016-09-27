<?php
/**
 * Created by PhpStorm.
 * User: waqasriaz
 * Date: 18/01/16
 * Time: 5:45 PM
 */
global $prop_meta_data, $prop_data;
$prop_location = $prop_meta_data['fave_property_location'][0];
$prop_location = explode(",", $prop_location);
$location_dropdowns = 'no';//houzez_option('location_dropdowns');
?>
<div class="account-block">

    <script>
        jQuery(function($){
            $("#geocomplete").geocomplete({
                map: ".map_canvas",
                details: "form",
                types: ["geocode", "establishment"],
            });

            $("#find").click(function(e){
                e.preventDefault();
                $("#geocomplete").trigger("geocode");
            });

            $(window).load(function() {
                $("#geocomplete").trigger("geocode");
            })
        });
    </script>

    <div class="add-title-tab">
        <h3><?php esc_html_e( 'Property location', 'houzez' ); ?></h3>
        <div class="add-expand"></div>
    </div>
    <div class="add-tab-content">
        <div class="add-tab-row  push-padding-bottom">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="address"><?php esc_html_e( 'Address', 'houzez' ); ?></label>
                        <input class="form-control" name="property_map_address" value="<?php echo sanitize_text_field( $prop_meta_data['fave_property_map_address'][0] ); ?>" id="geocomplete" placeholder="<?php esc_html_e( 'Enter your property address', 'houzez' ); ?>">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="neighborhood"><?php esc_html_e( 'Neighborhood', 'houzez' ); ?></label>
                        <?php if( $location_dropdowns == 'yes' ) { ?>
                            <select name="neighborhood" id="neighborhood" class="selectpicker" data-live-search="false" data-live-search-style="begins">
                                <?php houzez_edit_form_hierarchichal_options( $prop_data->ID, 'property_area'); ?>
                            </select>
                        <?php } else { ?>
                            <input class="form-control" name="neighborhood" value="<?php echo houzez_taxonomy_by_postID( $prop_data->ID, 'property_area' ); ?>" id="neighborhood" placeholder="<?php esc_html_e( 'Enter your property neighborhood', 'houzez' ); ?>">
                        <?php } ?>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="city"><?php esc_html_e( 'City', 'houzez' ); ?></label>
                        <?php if( $location_dropdowns == 'yes' ) { ?>
                            <select name="locality" id="locality" class="selectpicker" data-live-search="false" data-live-search-style="begins">
                                <?php houzez_edit_form_hierarchichal_options( $prop_data->ID, 'property_city'); ?>
                            </select>
                        <?php } else { ?>
                            <input class="form-control" value="<?php echo houzez_taxonomy_by_postID( $prop_data->ID, 'property_city' ); ?>" name="locality" id="city" placeholder="<?php esc_html_e( 'Enter your property city', 'houzez' ); ?>">
                        <?php } ?>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="zip"><?php esc_html_e( 'Postal Code / Zip', 'houzez' ); ?></label>
                        <input class="form-control" name="postal_code" value="<?php echo sanitize_text_field( $prop_meta_data['fave_property_zip'][0] ); ?>" id="zip" placeholder="<?php esc_html_e( 'Enter your property zip code', 'houzez' ); ?>">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="countyState"><?php esc_html_e( 'County / State', 'houzez' ); ?></label>
                        <?php if( $location_dropdowns == 'yes' ) { ?>
                            <select name="administrative_area_level_1" id="countyState" class="selectpicker" data-live-search="false" data-live-search-style="begins">
                                <?php houzez_edit_form_hierarchichal_options( $prop_data->ID, 'property_state'); ?>
                            </select>
                        <?php } else { ?>
                            <input class="form-control" value="<?php echo houzez_taxonomy_by_postID( $prop_data->ID, 'property_state' ); ?>" name="administrative_area_level_1" id="countyState" placeholder="<?php esc_html_e( 'Enter your property county/state', 'houzez' ); ?>">
                        <?php } ?>
                    </div>
                </div>
                <div class="col-sm-6 submit_country_field">
                    <div class="form-group">
                        <label for="country"><?php esc_html_e( 'Country', 'houzez' ); ?></label>
                        <input class="form-control" name="country" value="<?php echo houzez_country_code_to_country($prop_meta_data['fave_property_country'][0]); ?>" id="country" placeholder="<?php esc_html_e( 'Enter your property country', 'houzez' ); ?>">
                        <input name="country_short" type="hidden" value="<?php echo sanitize_text_field( $prop_meta_data['fave_property_country'][0] ); ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="add-tab-row">
            <div class="row">
                <div class="col-sm-6">
                    <div class="map_canvas" id="map">
                    </div>
                    <button id="find" class="btn btn-primary btn-block"><?php esc_html_e( 'Place the pin the address above', 'houzez' ); ?></button>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="latitude"><?php esc_html_e( 'Google Maps latitude', 'houzez' ); ?></label>
                        <input class="form-control" value="<?php echo sanitize_text_field( $prop_location[0] ); ?>" name="lat" id="latitude" placeholder="<?php esc_html_e( 'Enter google maps latitude', 'houzez' ); ?>">
                    </div>
                    <div class="form-group">
                        <label for="longitude"><?php esc_html_e( 'Google Maps longitude', 'houzez' ); ?></label>
                        <input class="form-control" value="<?php echo sanitize_text_field( $prop_location[1] ); ?>" name="lng" id="longitude" placeholder="<?php esc_html_e( 'Enter google maps longitude', 'houzez' ); ?>">
                    </div>
                    <div class="form-group">
                        <label for="prop_google_street_view"><?php esc_html_e('Google Map Street View', 'houzez'); ?></label>
                        <select name="prop_google_street_view" id="prop_google_street_view" class="selectpicker" data-live-search="false" data-live-search-style="begins">
                            <option <?php selected( $prop_meta_data['fave_property_map_street_view'][0], 'hide' ); ?> value="hide"><?php esc_html_e('Hide', 'houzez'); ?></option>
                            <option <?php selected( $prop_meta_data['fave_property_map_street_view'][0], 'show' ); ?> value="show"><?php esc_html_e('Show', 'houzez'); ?></option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>