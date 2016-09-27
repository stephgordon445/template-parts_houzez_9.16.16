<?php
/**
 * Created by PhpStorm.
 * User: waqasriaz
 * Date: 13/07/16
 * Time: 11:28 AM
 */
global $houzez_local;
$search_template = houzez_get_template_link('template/template-search.php');
$measurement_unit_adv_search = houzez_option('measurement_unit_adv_search');
if( $measurement_unit_adv_search == 'sqft' ) {
    $measurement_unit_adv_search = houzez_option('measurement_unit_sqft_text');
} elseif( $measurement_unit_adv_search == 'sq_meter' ) {
    $measurement_unit_adv_search = houzez_option('measurement_unit_square_meter_text');
}

$enable_advanced_search_over_headers = houzez_option('enable_advanced_search_over_headers');
$keep_adv_search_live = houzez_option('keep_adv_search_live');
$adv_search_price_slider = houzez_option('adv_search_price_slider');
$adv_show_hide = houzez_option('adv_show_hide');
$features_limit = houzez_option('features_limit');
$hide_advanced = false;

$keyword_field = houzez_option('keyword_field');

if( $keyword_field == 'prop_title' ) {
    $keyword_field_placeholder = $houzez_local['keyword_text'];

} else if( $keyword_field == 'prop_city_state_county' ) {
    $keyword_field_placeholder = $houzez_local['city_state_area'];

} else if( $keyword_field == 'prop_address' ) {
    $keyword_field_placeholder = $houzez_local['search_address'];

} else {
    $keyword_field_placeholder = $houzez_local['enter_location'];
}

$status = $type = $location = $area = '';

if( isset( $_GET['status'] ) ) {
    $status = $_GET['status'];
}
if( isset( $_GET['type'] ) ) {
    $type = $_GET['type'];
}
if( isset( $_GET['location'] ) ) {
    $location = $_GET['location'];
}
if( isset( $_GET['area'] ) ) {
    $area = $_GET['area'];
}

if( $keep_adv_search_live != 1 ) {
    $active_icon = '';
    $adv_hidden = 'advanced-search-hidden';
} else {
    $active_icon = 'active';
    $adv_hidden = '';
}

if( $adv_show_hide['status']         != 0 &&
    $adv_show_hide['type']           != 0 &&
    $adv_show_hide['beds']           != 0 &&
    $adv_show_hide['baths']          != 0 &&
    $adv_show_hide['min_area']       != 0 &&
    $adv_show_hide['max_area']       != 0 &&
    $adv_show_hide['min_price']      != 0 &&
    $adv_show_hide['max_price']      != 0 &&
    $adv_show_hide['price_slider']   != 0 &&
    $adv_show_hide['area_slider']    != 0 &&
    $adv_show_hide['other_features'] != 0  ) {

    $hide_advanced = true;
}

if( $enable_advanced_search_over_headers != 0 ) {
?>
<div class="search-expandable">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <div class="search-inner-wrap">
                    <div class="search-expand-btn <?php echo esc_attr($active_icon);?>"><?php echo $houzez_local['advanced_search']; ?></div>
                    <div class="advanced-search <?php echo esc_attr($adv_hidden);?> houzez-adv-price-range">
                        <form method="get" action="<?php echo esc_url( $search_template ); ?>">
                            <div class="row">
                                <div class="col-sm-9 col-xs-12 search-expandable-left">
                                    <div class="row">

                                        <?php if( $adv_show_hide['status'] != 1 ) { ?>
                                            <div class="col-sm-3 col-xs-6">
                                                <div class="form-group">
                                                    <select class="selectpicker" id="selected_status" name="status" data-live-search="false" data-live-search-style="begins">
                                                        <?php
                                                        // All Option
                                                        echo '<option value="">'.$houzez_local['all_status'].'</option>';

                                                        $prop_status = get_terms (
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
                                                        houzez_hirarchical_options('property_status', $prop_status, $status );
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        <?php } ?>

                                        <?php if( $adv_show_hide['type'] != 1 ) { ?>
                                            <div class="col-sm-3 col-xs-6">
                                                <div class="form-group">
                                                    <select class="selectpicker" name="type" data-live-search="false" data-live-search-style="begins">
                                                        <?php
                                                        // All Option
                                                        echo '<option value="">'.$houzez_local['all_types'].'</option>';

                                                        $prop_type = get_terms (
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
                                                        houzez_hirarchical_options('property_type', $prop_type, $type );
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        <?php } ?>

                                        <?php if( $adv_show_hide['cities'] != 1 ) { ?>
                                        <div class="col-sm-3 col-xs-6">
                                            <div class="form-group no-margin">
                                                <select name="location" class="selectpicker" data-live-search="false" data-live-search-style="begins">
                                                    <?php
                                                    // All Option
                                                    echo '<option value="">'.$houzez_local['all_cities'].'</option>';

                                                    $prop_city = get_terms (
                                                        array(
                                                            "property_city"
                                                        ),
                                                        array(
                                                            'orderby' => 'name',
                                                            'order' => 'ASC',
                                                            'hide_empty' => true,
                                                            'parent' => 0
                                                        )
                                                    );
                                                    houzez_hirarchical_options('property_city', $prop_city, $location );
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <?php } ?>

                                        <?php if( $adv_show_hide['areas'] != 1 ) { ?>
                                        <div class="col-sm-3 col-xs-6">
                                            <div class="form-group">
                                                <select name="area" class="selectpicker" data-live-search="false" data-live-search-style="begins">
                                                    <?php
                                                    // All Option
                                                    echo '<option value="">'.$houzez_local['all_areas'].'</option>';

                                                    $prop_area = get_terms (
                                                        array(
                                                            "property_area"
                                                        ),
                                                        array(
                                                            'orderby' => 'name',
                                                            'order' => 'ASC',
                                                            'hide_empty' => true,
                                                            'parent' => 0
                                                        )
                                                    );
                                                    houzez_hirarchical_options('property_area', $prop_area, $area );
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <?php } ?>

                                        <?php if( $adv_show_hide['beds'] != 1 ) { ?>
                                            <div class="col-sm-3 col-xs-6">
                                                <div class="form-group">
                                                    <select name="bedrooms" class="selectpicker" data-live-search="false" data-live-search-style="begins" title="">
                                                        <option value=""><?php echo $houzez_local['min_bedrooms']; ?></option>
                                                        <?php houzez_number_list('bedrooms'); ?>
                                                    </select>
                                                </div>
                                            </div>
                                        <?php } ?>

                                        <?php if( $adv_show_hide['min_area'] != 1 ) { ?>
                                            <div class="col-sm-3 col-xs-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" value="<?php echo isset ( $_GET['min-area'] ) ? $_GET['min-area'] : ''; ?>" name="min-area" placeholder="<?php echo $houzez_local['min_area']; echo " ($measurement_unit_adv_search)";?>">
                                                </div>
                                            </div>
                                        <?php } ?>

                                        <!--<div class="col-sm-3 col-xs-6">
                                        <div class="form-group">
                                            <div class="input-calendar input-icon input-icon-right">
                                                <input type="text" name="publish_date" class="form-control search-date" placeholder="<?php /*echo esc_html_e('Available from','houzez');*/?>">
                                            </div>
                                        </div>
                                    </div>-->
                                        <?php if( $adv_search_price_slider != 0 ) { ?>
                                            <?php if( $adv_show_hide['price_slider'] != 1 ) { ?>
                                                <div class="col-sm-6 col-xs-12">
                                                    <div class="range-advanced-main">
                                                        <div class="range-text">
                                                            <input type="hidden" name="min-price" class="min-price-range-hidden range-input">
                                                            <input type="hidden" name="max-price" class="max-price-range-hidden range-input">
                                                            <p><span class="range-title"><?php echo $houzez_local['price_range'];?></span> <?php echo $houzez_local['from'];?> <span class="min-price-range"></span> <?php echo $houzez_local['to'];?> <span class="max-price-range"></span></p>
                                                        </div>
                                                        <div class="range-wrap">
                                                            <div class="price-range-advanced"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        <?php } else { ?>

                                            <?php if( $adv_show_hide['min_price'] != 1 ) { ?>
                                                <div class="col-sm-3 col-xs-6">
                                                    <div class="form-group prices-for-all">
                                                        <select name="min-price" class="selectpicker" data-live-search="false" data-live-search-style="begins" title="">
                                                            <option value=""><?php echo $houzez_local['min_price']; ?></option>
                                                            <?php houzez_min_price_list(); ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group hide prices-only-for-rent">
                                                        <select name="min-price" class="selectpicker" data-live-search="false" data-live-search-style="begins" title="">
                                                            <option value=""><?php echo $houzez_local['min_price']; ?></option>
                                                            <?php houzez_min_price_list_for_rent(); ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            <?php } ?>

                                            <?php if( $adv_show_hide['max_price'] != 1 ) { ?>
                                                <div class="col-sm-3 col-xs-6">
                                                    <div class="form-group prices-for-all">
                                                        <select name="max-price" class="selectpicker" data-live-search="false" data-live-search-style="begins" title="">
                                                            <option value=""><?php echo $houzez_local['max_price']; ?></option>
                                                            <?php houzez_max_price_list() ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group hide prices-only-for-rent">
                                                        <select name="max-price" class="selectpicker" data-live-search="false" data-live-search-style="begins" title="">
                                                            <option value=""><?php echo $houzez_local['max_price']; ?></option>
                                                            <?php houzez_max_price_list_for_rent() ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            <?php } ?>

                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-xs-12 search-expandable-right">
                                    <div class="row">
                                        <div class="col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-orange btn-block"><?php echo $houzez_local['search'];?></button>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <button class="advance-btn btn" type="button"><i class="fa fa-gear"></i> <?php echo $houzez_local['more_options'];?></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php if( $adv_show_hide['other_features'] != 1 ) { ?>
                                <div class="advance-fields">
                                    <div class="row">
                                        <div class="col-sm-12 col-xs-12 features-list">

                                            <label class="text-uppercase title"><?php echo $houzez_local['other_feature']; ?></label>
                                            <div class="clearfix"></div>
                                            <?php

                                            if( taxonomy_exists('property_feature') ) {
                                                $prop_features = get_terms(
                                                    array(
                                                        "property_feature"
                                                    ),
                                                    array(
                                                        'orderby' => 'name',
                                                        'order' => 'ASC',
                                                        'hide_empty' => false,
                                                        'parent' => 0
                                                    )
                                                );
                                                $count = 0;
                                                if (!empty($prop_features)) {
                                                    foreach ($prop_features as $feature):
                                                        if( $features_limit != -1 ) {
                                                            if ( $count == $features_limit ) break;
                                                        }
                                                        echo '<label class="checkbox-inline">';
                                                        echo '<input name="feature[]" id="feature-' . esc_attr( $feature->slug ) . '" type="checkbox" value="' . esc_attr( $feature->slug ) . '">';
                                                        echo esc_attr( $feature->name );
                                                        echo '</label>';
                                                    $count++;
                                                    endforeach;
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } // End $enable_advanced_search_over_headers if statement ?>
