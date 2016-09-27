<?php
/**
 * Created by PhpStorm.
 * User: waqasriaz
 * Date: 18/01/16
 * Time: 5:31 PM
 */
global $hide_add_prop_fields, $required_fields;
$rq_sale_rent_price = $rq_price_label = '';

if( $required_fields['sale_rent_price'] != 0 ) { $rq_sale_rent_price = 'required'; }
if( $required_fields['price_label'] != 0 ) { $rq_price_label = 'required'; }
?>

<div class="account-block">
    <div class="add-title-tab">
        <h3><?php esc_html_e( 'Property description and price', 'houzez'); ?></h3>
        <div class="add-expand"></div>
    </div>
    <div class="add-tab-content">
        <div class="add-tab-row push-padding-bottom">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="prop_title"><?php esc_html_e('Timeshare Name*', 'houzez'); ?> </label>
                        <input type="text" id="prop_title" class="form-control" name="prop_title" placeholder="<?php esc_html_e( 'Enter your property title', 'houzez' ); ?>"/>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label><?php esc_html_e('Description: Please include the following below: 
Resort name and location, Yearly allotted weeks/points, Details on allotted weeks/points, Maintenance fee information(amount paid, yearly or monthly)', 'houzez'); ?></label>
                        <!-- <textarea id="prop_des" class="form-control" tabindex="3" name="prop_des" rows="6"></textarea> -->
                        <?php 
                        // default settings - Kv_front_editor.php
                        $content = '';
                        $editor_id = 'prop_des';
                        $settings =   array(
                            'wpautop' => true, // use wpautop?
                            'media_buttons' => true, // show insert/upload button(s)
                            'textarea_name' => $editor_id, // set the textarea name to something different, square brackets [] can be used here
                            'textarea_rows' => get_option('default_post_edit_rows', 5), // rows="..."
                            'tabindex' => '',
                            'editor_css' => '', //  extra styles for both visual and HTML editors buttons, 
                            'editor_class' => '', // add extra class(es) to the editor textarea
                            'teeny' => false, // output the minimal editor config used in Press This
                            'dfw' => false, // replace the default fullscreen with DFW (supported on the front-end in WordPress 3.4)
                            'tinymce' => true, // load TinyMCE, can be used to pass settings directly to TinyMCE using an array()
                            'quicktags' => true // load Quicktags, can be used to pass settings directly to Quicktags using an array()
                        );
                        wp_editor( $content, $editor_id, $settings = array() ); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="add-tab-row push-padding-bottom">
            <div class="row">
                <?php if( $hide_add_prop_fields['prop_type'] != 1 ) { ?>
                <div class="col-sm-4">
                    <div class="form-group">

                        <label for="prop_type"><?php esc_html_e('Resort Name', 'houzez'); ?></label>
                        <select name="prop_type" id="prop_type" class="selectpicker" data-live-search="false" data-live-search-style="begins">
                            <option selected="selected" value="-1"><?php esc_html_e('None', 'houzez'); ?></option>
                            <?php
                            /* Property Type */
                            $property_types_terms = get_terms (
                                array(
                                    "property_type"
                                ),
                                array(
                                    'orderby' => 'name',
                                    'order' => 'ASC',
                                    'hide_empty' => false,
                                    'parent' => 0
                                )
                            );

                            houzez_id_based_hirarchical_options( 'property_type', $property_types_terms, -1);

                            ?>
                        </select>

                    </div>
                </div>
                <?php } ?>

                <?php if( $hide_add_prop_fields['prop_status'] != 1 ) { ?>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="prop_status"><?php esc_html_e( 'Are you renting or selling?', 'houzez'); ?></label>
                        <select name="prop_status" id="prop_status" class="selectpicker" data-live-search="false" data-live-search-style="begins">
                            <option selected="selected" value="-1"><?php esc_html_e('None', 'houzez'); ?></option>
                            <?php
                            /* Property Status */
                            $property_status = get_terms (
                                array(
                                    "property_status"
                                ),
                                array(
                                    'orderby' => 'name',
                                    'order' => 'ASC',
                                    'hide_empty' => false,
                                    'parent' => 0
                                )
                            );

                            houzez_id_based_hirarchical_options( 'property_status', $property_status, -1);

                            ?>
                        </select>
                    </div>
                </div>
                <?php } ?>

                <?php if( $hide_add_prop_fields['prop_label'] != 1 ) { ?>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="prop_labels"><?php esc_html_e( 'Ownership Type', 'houzez'); ?></label>
                            <select name="prop_labels" id="prop_labels" class="selectpicker" data-live-search="false" data-live-search-style="begins">
                                <option selected="selected" value="-1"><?php esc_html_e('None', 'houzez'); ?></option>
                                <?php
                                /* Property Label */
                                $property_label = get_terms (
                                    array(
                                        "property_label"
                                    ),
                                    array(
                                        'orderby' => 'name',
                                        'order' => 'ASC',
                                        'hide_empty' => false,
                                        'parent' => 0
                                    )
                                );

                                houzez_id_based_hirarchical_options( 'property_label', $property_label, -1);

                                ?>
                            </select>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>
        <div class="add-tab-row push-padding-bottom">
            <div class="row">

                <?php if( $hide_add_prop_fields['sale_rent_price'] != 1 ) { ?>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="prop_price"> <?php esc_html_e('Sale or Rent Price ', 'houzez');
                            print esc_html(get_option('houzez_currency_symbol', '')) . ' ';?>  </label>
                        <input type="text" <?php echo esc_attr($rq_sale_rent_price); ?> id="prop_price" class="form-control" name="prop_price" value="" placeholder="<?php esc_html_e( 'Enter Sale or Rent Price', 'houzez' ); ?>">
                    </div>
                </div>
                <?php } ?>

                <?php if( $hide_add_prop_fields['second_price'] != 1 ) { ?>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="prop_sec_price"><?php esc_html_e('Second Price (Optional)', 'houzez'); ?></label>
                        <input type="text" id="prop_sec_price" class="form-control" name="prop_sec_price" placeholder="<?php esc_html_e( 'Yearly allotted weeks/points (if applicable)', 'houzez' ); ?>">
                    </div>
                </div>
                <?php } ?>

                <?php if( $hide_add_prop_fields['price_postfix'] != 1 ) { ?>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="prop_label"><?php esc_html_e('After Price Label (ex: total or nightly)', 'houzez'); ?></label>
                        <input type="text" <?php echo esc_attr($rq_price_label); ?> id="prop_label" class="form-control" name="prop_label" placeholder="<?php esc_html_e( 'specify weeks or points', 'houzez' ); ?>" >
                    </div>
                </div>
                <?php } ?>

            </div>
        </div>
    </div>
</div>
