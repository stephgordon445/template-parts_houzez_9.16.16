<?php
/**
 * Invoices - template/user_dashboard_invoices
 * Created by PhpStorm.
 * User: waqasriaz
 * Date: 07/04/16
 * Time: 11:34 PM
 */
$fave_meta = houzez_get_invoice_meta( get_the_ID() );
$user_info = get_userdata($fave_meta['invoice_buyer_id']);
?>
<tr>
    <td>#<?php echo get_the_ID(); ?></td>
    <td><?php echo get_the_date(); ?></td>
    <td>
        <?php
        $invoice_status = get_post_meta(  get_the_ID(), 'invoice_payment_status', true );
        if( $invoice_status == 0 ) {
            echo esc_html__('Not Paid','houzez');
        } else {
            echo esc_html__('Paid','houzez');
        }
        ?>
    </td>
    <td><?php echo houzez_get_invoice_price( $fave_meta['invoice_item_price'] );?></td>
    <td><button class="btn btn-invoice" data-toggle="modal" data-target="#invoiceModal-<?php echo get_the_ID(); ?>"><?php esc_html_e( 'View Details', 'houzez' ); ?></button></td>
</tr>

<div id="invoiceModal-<?php echo get_the_ID(); ?>" class="modal fade invoiceModal" tabindex="-1" role="dialog" aria-labelledby="invoiceModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><?php esc_html_e( 'Payment details', 'houzez' ); ?></h4>
            </div>
            <div class="modal-body">
                <div class="payment-details">
                    <div class="payment-details-product">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="text-left">
                                    <p>
                                        <strong>
                                            <?php
                                            if( $fave_meta['invoice_billion_for'] != 'package' && $fave_meta['invoice_billion_for'] != 'Package' ) {
                                                esc_html_e( 'Property Title', 'houzez' );
                                            } else {
                                                esc_html_e( 'Package', 'houzez' );
                                            }
                                            ?>
                                        </strong>
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="text-right">
                                    <p> <?php echo get_the_title( $fave_meta['invoice_item_id'] ); ?> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="payment-details-product">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="text-left">
                                    <p><strong><?php esc_html_e( 'Payment Method', 'houzez' ); ?></strong></p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="text-right">
                                    <p><?php if( $fave_meta['invoice_payment_method'] == 'Direct Bank Transfer' ) {
                                            esc_html_e( 'Direct Bank Transfer', 'houzez' );
                                        } else {
                                            echo $fave_meta['invoice_payment_method'];
                                        } ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="payment-details-product">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="text-left">
                                    <p><strong><?php esc_html_e( 'Billing Type', 'houzez' ); ?></strong></p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="text-right">
                                    <p><?php echo esc_html( $fave_meta['invoice_billing_type'] ); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="payment-details-total">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="text-left">
                                    <p><strong><?php esc_html_e( 'Price:', 'houzez' ); ?></strong></p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="text-right">
                                    <p><?php echo houzez_get_invoice_price( $fave_meta['invoice_item_price'] );?></p>
                                </div>
                            </div>
                        </div>
                    </div><!-- payment-details-total -->
                </div><!-- payment-details -->

                <h4><?php esc_html_e( 'Customer details:', 'houzez' ); ?></h4>

                <div class="customer-details">
                    <div class="customer-details-name">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="text-left">
                                    <p><strong><?php esc_html_e( 'Name:', 'houzez' ); ?></strong></p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="text-right">
                                    <p><?php echo esc_attr($user_info->display_name); ?></p>
                                </div>
                            </div>
                        </div>
                    </div><!-- customer-details-name -->
                    <div class="customer-details-email">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="text-left">
                                    <p><strong><?php esc_html_e( 'Email:', 'houzez' ); ?></strong></p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="text-right">
                                    <p><?php esc_attr_e( $user_info->user_email ); ?></p>
                                </div>
                            </div>
                        </div>
                    </div><!-- customer-details-email-->
                </div><!-- customer-details -->

                <!--<h4><?php /*esc_html_e( 'Billing address', 'houzez' ); */?></h4>

                <div class="billing-address">
                    <address>
                        7601 East Treasure Dr. #2498<br>
                        Miami Beach, 33141 FL
                    </address>
                </div>--><!-- billing-address -->
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->