<?php
/**
 * Created by PhpStorm.
 * User: waqasriaz
 * Date: 11/06/16
 * Time: 11:08 PM
 */
global $measurement_unit_adv_search, $houzez_local;

if( $measurement_unit_adv_search == 'sqft' ) {
    $measurement_unit_adv_search = houzez_option('measurement_unit_sqft_text');
} elseif( $measurement_unit_adv_search == 'sq_meter' ) {
    $measurement_unit_adv_search = houzez_option('measurement_unit_square_meter_text');
}

$adv_search_price_slider = houzez_option('adv_search_price_slider');
$status = $type = $location = $area = '';
$adv_show_hide = houzez_option('adv_show_hide');

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
?>
<div class="advanced-search houzez-adv-price-range">

    <form method="get" action="#">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group table-list search-long">
                    <div class="input-search input-icon">
                        <input type="text" class="form-control" value="<?php echo isset ( $_GET['keyword'] ) ? $_GET['keyword'] : ''; ?>" name="keyword" placeholder="<?php echo $keyword_field_placeholder; ?>">
                    </div>
                </div>
            </div>

            <?php if( $adv_show_hide['cities'] != 1 ) { ?>
            <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="form-group">
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


            <?php if( $adv_show_hide['status'] != 1 ) { ?>
            <div class="col-sm-3 col-xs-6">
                <div class="form-group">
                    <select class="selectpicker" name="status" data-live-search="false" data-live-search-style="begins">
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

            <?php if( $adv_show_hide['beds'] != 1 ) { ?>
            <div class="col-sm-3 col-xs-6">
                <div class="form-group">
                    <select name="bedrooms" class="selectpicker" data-live-search="false" data-live-search-style="begins" title="">
                        <option value=""><?php echo $houzez_local['bedrooms']; ?></option>
                        <?php houzez_number_list('bedrooms'); ?>
                    </select>
                </div>
            </div>
            <?php } ?>

            <?php if( $adv_show_hide['baths'] != 1 ) { ?>
            <div class="col-sm-3 col-xs-6">
                <div class="form-group">
                    <select name="bathrooms" class="selectpicker" data-live-search="false" data-live-search-style="begins" title="">
                        <option value=""><?php echo $houzez_local['bathrooms']; ?></option>
                        <?php houzez_number_list('bathrooms'); ?>
                    </select>
                </div>
            </div>
            <?php } ?>


            <?php if( $adv_show_hide['min_area'] != 1 ) { ?>
            <div class="col-sm-3 col-xs-6">
                <div class="form-group">
                    <input type="text" class="form-control" value="<?php echo isset ( $_GET['min-area'] ) ? $_GET['min-area'] : ''; ?>" name="min-area" placeholder="<?php echo $houzez_local['min_area']; ?>">
                </div>
            </div>
            <?php } ?>

            <?php if( $adv_show_hide['max_area'] != 1 ) { ?>
            <div class="col-sm-3 col-xs-6">
                <div class="form-group">
                    <input type="text" class="form-control" value="<?php echo isset ( $_GET['max-area'] ) ? $_GET['max-area'] : ''; ?>" name="max-area" placeholder="<?php echo $houzez_local['max_area']; ?>">
                </div>
            </div>
            <?php } ?>

            <div class="col-sm-3 col-xs-6 sech_avl_date">
                <div class="form-group">
                    <div class="input-calendar input-icon input-icon-right">
                        <input name="publish_date" class="form-control search-date" placeholder="<?php echo $houzez_local['available_from']; ?>" type="text">
                    </div>
                </div>
            </div>

            <?php if( $adv_search_price_slider != 0 ) { ?>
                <?php if( $adv_show_hide['price_slider'] != 1 ) { ?>
                    <div class="col-sm-12 col-xs-12">
                        <div class="range-advanced-main">
                            <div class="range-text">
                                <input type="hidden" name="min-price" class="min-price-range-hidden range-input" readonly >
                                <input type="hidden" name="max-price" class="max-price-range-hidden range-input" readonly >
                                <p><span class="range-title"><?php echo $houzez_local['price_range'];?></span> <?php echo $houzez_local['from']; ?> <span class="min-price-range"></span> <?php echo $houzez_local['to']; ?> <span class="max-price-range"></span></p>
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

    </form>
</div>