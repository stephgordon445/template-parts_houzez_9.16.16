<?php
/**
 * Created by PhpStorm.
 * User: waqasriaz
 * Date: 20/01/16
 * Time: 6:31 PM
 */
global $status,
       $search_template,
       $type, $location,
       $measurement_unit_adv_search,
       $area,
       $adv_search_price_slider,
       $hide_advanced,
       $keyword_field_placeholder,
       $adv_show_hide,
       $houzez_local;

$mobile_menu_sticky = houzez_option('mobile-menu-sticky');

if( $mobile_menu_sticky != 1 ) {
    $mobile_search_sticky = houzez_option('mobile-search-sticky');
} else {
    $mobile_search_sticky = '0';
}
?>
<div class="advanced-search-mobile houzez-adv-price-range" data-sticky='<?php echo esc_attr( $mobile_search_sticky ); ?>'>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <form method="get" action="<?php echo esc_url( $search_template ); ?>">
                    <div class="single-search-wrap">
                        <div class="single-search-inner advance-btn">
                            <button class="table-cell text-left" type="button"><i class="fa fa-gear"></i></button>
                        </div>
                        <div class="single-search-inner single-search">
                            <input type="text" class="form-control" value="<?php echo isset ( $_GET['keyword'] ) ? $_GET['keyword'] : ''; ?>" name="keyword" placeholder="<?php echo $keyword_field_placeholder; ?>">
                        </div>
                        <div class="single-search-inner single-seach-btn">
                            <button class="table-cell text-right" type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </div>

                    <div class="advance-fields">
                        <div class="row">
                            <?php if( $adv_show_hide['cities'] != 1 ) { ?>
                            <div class="col-sm-3 col-xs-6">
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
                                    <select class="selectpicker" id="selected_status_mobile" name="status" data-live-search="false" data-live-search-style="begins">
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
                                        <option value=""><?php echo $houzez_local['beds'];; ?></option>
                                        <?php houzez_number_list('bedrooms'); ?>
                                    </select>
                                </div>
                            </div>
                            <?php } ?>

                            <?php if( $adv_show_hide['baths'] != 1 ) { ?>
                            <div class="col-sm-3 col-xs-6">
                                <div class="form-group">
                                    <select name="bathrooms" class="selectpicker" data-live-search="false" data-live-search-style="begins" title="">
                                        <option value=""><?php echo $houzez_local['baths']; ?></option>
                                        <?php houzez_number_list('bathrooms'); ?>
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

                            <?php if( $adv_show_hide['max_area'] != 1 ) { ?>
                            <div class="col-sm-3 col-xs-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="<?php echo isset ( $_GET['max-area'] ) ? $_GET['max-area'] : ''; ?>" name="max-area" placeholder="<?php echo $houzez_local['max_area']; echo " ($measurement_unit_adv_search)"; ?>">
                                </div>
                            </div>
                            <?php } ?>

                            <?php if( $adv_search_price_slider != 0 ) { ?>
                                <?php if( $adv_show_hide['price_slider'] != 1 ) { ?>
                                    <div class="col-sm-12 col-xs-12">
                                        <div class="range-advanced-main">
                                            <div class="range-text">
                                                <input type="hidden" name="min-price" class="min-price-range-hidden range-input">
                                                <input type="hidden" name="max-price" class="max-price-range-hidden range-input">
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
                            <div class="col-sm-12 col-xs-12">
                                <button type="submit" class="btn btn-orange btn-block houzez-theme-button"><i class="fa fa-search pull-left"></i> <?php echo $houzez_local['search']; ?></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>