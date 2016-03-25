<?php
/**
 * Template Name: Archive Cars
 */
?>

<?php get_header(); ?>

<main id="archive-cars-page">
    <section>
        <div class="row">
            <div class="arch-car-sidebar col-md-2">
                <?php include( 'custom-sidebar.php' ); ?>
            </div>

            <div class="col-sm-12 col-md-10">
                <?php $iter = 0;
                $carTermId = (isset($_GET['cartype'])) ? (int)$_GET['cartype'] : icl_object_id(9, 'category', true);
                $carsArchiveArgs = array(
                    'post_type'         => 'cars',
                    'posts_per_page'    => -1,
                    'tax_query'         => array(
                        array(
                            'taxonomy'  => 'types',
                            'field'     => 'id',
                            'terms'     => $carTermId
                        )
                    )
                );
                $carsQuery = new WP_Query( $carsArchiveArgs );
                if($carsQuery->have_posts()): while($carsQuery->have_posts()): $carsQuery->the_post(); ?>
                    <div class="row arch-car-rows">
                        <div class="col-sm-5" id="cars-col-5">
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'large-thumb', array( 'class' => 'img-responsive' ) ); ?></a>
                        </div>

                        <div class="col-sm-7">
                            <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
                            <?php
                            $car = [];
                            $postID = get_the_ID();

                            $car['color']            = get_post_meta($postID, '_YC_color', true);
                            $car['year']             = get_post_meta($postID, '_YC_year', true);
                            $car['doors']            = get_post_meta($postID, '_YC_doors', true);
                            $car['seats']            = get_post_meta($postID, '_YC_seats', true);
                            $car['fuel']             = get_post_meta($postID, '_YC_fuel', true);
                            $car['transmission']     = get_post_meta($postID, '_YC_transmission', true);

                            $car['motorPower']       = get_post_meta($postID, '_YC_motor_power', true);
                            $car['maxSpeed']         = get_post_meta($postID, '_YC_max_speed', true);
                            $car['motorVolume']      = get_post_meta($postID, '_YC_motor_volume', true);
                            $car['fuelTankVolume']   = get_post_meta($postID, '_YC_fuel_tank_volume', true);
                            $car['body']             = get_post_meta($postID, '_YC_body', true);
                            $car['cylinders']        = get_post_meta($postID, '_YC_cylinders', true);
                            $car['trailer']          = get_post_meta($postID, '_YC_trailer', true);
                            ?>
                            <table class="table table-bordered table-car-info table-car-info-extra">
                                <tbody>
                                <tr>
                                    <th colspan="4"><?php _e( 'Description', 'yerevancar' ); if($driverWith && !$driverWithout && !$wedding) echo ' (' . __( 'This vehicle is provided only with driver', 'yerevancar' ) . ')'; ?></th>
                                </tr>
                                <tr>
                                    <th><?php _e( 'Year', 'yerevancar' ); ?></th>
                                    <td><?php if( $car['year'] ) { echo $car['year']; } ?></td>
                                    <th><?php _e( 'Color', 'yerevancar' ); ?></th>
                                    <td><?php if( $car['color'] ) { echo $car['color']; } ?></td>
                                </tr>
                                <tr>
                                    <th><?php _e( 'Doors', 'yerevancar' ); ?></th>
                                    <td><?php if( $car['doors'] ) { echo $car['doors']; } ?></td>
                                    <th><?php _e( 'Transmission', 'yerevancar' ); ?></th>
                                    <td><?php if( $car['transmission'] ) { echo $car['transmission']; } ?></td>
                                </tr>
                                <tr style="border-bottom:2px solid #867070;">
                                    <th><?php _e( 'Seats', 'yerevancar' ); ?></th>
                                    <td><?php if( $car['seats'] ) { echo $car['seats']; } ?></td>
                                    <th><?php _e( 'Fuel', 'yerevancar' ); ?></th>
                                    <td><?php if( $car['fuel'] ) { echo $car['fuel']; } ?></td>
                                </tr>
                                <tr>
                                    <th><?php _e( 'Motor Power', 'yerevancar' ); ?></th>
                                    <td><?php if( $car['motorPower'] ) { echo $car['motorPower']; } ?></td>
                                    <th><?php _e( 'Max Speed', 'yerevancar' ); ?></th>
                                    <td><?php if( $car['maxSpeed'] ) { echo $car['maxSpeed']; } ?></td>
                                </tr>
                                <tr>
                                    <th><?php _e( 'Motor Volume', 'yerevancar' ); ?></th>
                                    <td><?php if( $car['motorVolume'] ) { echo $car['motorVolume']; } ?></td>
                                    <th><?php _e( 'Fuel Tank Volume', 'yerevancar' ); ?></th>
                                    <td><?php if( $car['fuelTankVolume'] ) { echo $car['fuelTankVolume']; } ?></td>
                                </tr>
                                <tr>
                                    <th><?php _e( 'Body', 'yerevancar' ); ?></th>
                                    <td><?php if( $car['body'] ) { echo $car['body']; } ?></td>
                                    <th><?php _e( 'Cylinders', 'yerevancar' ); ?></th>
                                    <td><?php if( $car['cylinders'] ) { echo $car['cylinders']; } ?></td>
                                </tr>
                                <tr>
                                    <th><?php _e( 'Drive Unit', 'yerevancar' ); ?></th>
                                    <td><?php if( $car['trailer'] ) { echo $car['trailer']; } ?></td>
                                    <th colspan="2"></th>
                                </tr>
                                </tbody>
                            </table>

                            <?php
                            $wedding = get_post_meta($postID, '_YC_wedding', true);
                            $driverWith = get_post_meta($postID, '_YC_with_driver', true);
                            $driverWithout = get_post_meta($postID, '_YC_without_driver', true);

                            $weddingPrice['1-2'] = get_post_meta($postID, '_YC_wedding_1-2', true);
                            $weddingPrice['3-4'] = get_post_meta($postID, '_YC_wedding_3-4', true);
                            $weddingPrice['5-7'] = get_post_meta($postID, '_YC_wedding_5-7', true);
                            $weddingPrice['8-12'] = get_post_meta($postID, '_YC_wedding_8-12', true);
                            $weddingPrice['13-30'] = get_post_meta($postID, '_YC_wedding_13-30', true);
                            $weddingPrice['outofcity'] = get_post_meta($postID, '_YC_wedding_outofcity', true);

                            $driverWithPrice['1-2'] = get_post_meta($postID, '_YC_driverwith_1-2', true);
                            $driverWithPrice['3-4'] = get_post_meta($postID, '_YC_driverwith_3-4', true);
                            $driverWithPrice['5-7'] = get_post_meta($postID, '_YC_driverwith_5-7', true);
                            $driverWithPrice['8-12'] = get_post_meta($postID, '_YC_driverwith_8-12', true);
                            $driverWithPrice['13-30'] = get_post_meta($postID, '_YC_driverwith_13-30', true);
                            $driverWithPrice['outofcity'] = get_post_meta($postID, '_YC_driverwith_outofcity', true);

                            $driverWithoutPrice['1-2'] = get_post_meta($postID, '_YC_driverwithout_1-2', true);
                            $driverWithoutPrice['3-4'] = get_post_meta($postID, '_YC_driverwithout_3-4', true);
                            $driverWithoutPrice['5-7'] = get_post_meta($postID, '_YC_driverwithout_5-7', true);
                            $driverWithoutPrice['8-12'] = get_post_meta($postID, '_YC_driverwithout_8-12', true);
                            $driverWithoutPrice['13-30'] = get_post_meta($postID, '_YC_driverwithout_13-30', true);
                            $driverWithoutPrice['outofcity'] = get_post_meta($postID, '_YC_driverwithout_outofcity', true);

                            $lendType = [];
                            if($wedding) {$lendType['Wedding'] = $weddingPrice;}
                            if($driverWith) {$lendType['With Driver'] = $driverWithPrice;}
                            if($driverWithout) {$lendType['Without Driver'] = $driverWithoutPrice;} ?>
                            <div class="row test" id="<?php echo 'product-more-details-' . $iter; ?>" style="display:none">
                                <?php $checkIndex = 0;
                                foreach($lendType as $lendKey => $lendValue) { ?>
                                    <div class="col-sm-4">
                                        <table class="table table-bordered table-car-info table-car-info-extra">
                                            <tbody>
                                            <tr>
                                                <?php
                                                $lendTypeLabelWedding = __( 'Wedding', 'yerevancar' );
                                                $lendTypeLabelWithoutDriver = __( 'Without Driver', 'yerevancar' );
                                                $lendTypeLabelWithDriver = __( 'With Driver', 'yerevancar' );

                                                if($lendKey == 'Wedding') {
                                                    $lendTypeLabel = $lendTypeLabelWedding;
                                                } elseif($lendKey == 'Without Driver') {
                                                    $lendTypeLabel = $lendTypeLabelWithoutDriver;
                                                } elseif($lendKey == 'With Driver') {
                                                    $lendTypeLabel = $lendTypeLabelWithDriver;
                                                } else {
                                                    $lendTypeLabel = '';
                                                } ?>
                                                <th colspan="2"><?php echo $lendTypeLabel; if($lendKey == 'Without Driver' || $lendKey == 'With Driver') echo '<br>(' . __( '24 hours', 'yerevancar' ) . ')'; ?></th>
                                            </tr>
                                            <tr>
                                                <th><?php _e( 'Days', 'yerevancar' ); ?></th>
                                                <th><?php _e( 'Price', 'yerevancar' ); ?></th>
                                            </tr>
                                            <?php if($lendValue['1-2']): ?>
                                                <tr>
                                                    <th>1 - 2</th>
                                                    <td><?php echo $lendValue['1-2']; ?></td>
                                                </tr>
                                            <?php endif; ?>
                                            <?php if($lendValue['3-4']): ?>
                                                <tr>
                                                    <th>3 - 4</th>
                                                    <td><?php echo $lendValue['3-4']; ?></td>
                                                </tr>
                                            <?php endif; ?>
                                            <?php if($lendValue['5-7']): ?>
                                                <tr>
                                                    <th>5 - 7</th>
                                                    <td><?php echo $lendValue['5-7']; ?></td>
                                                </tr>
                                            <?php endif; ?>
                                            <?php if($lendValue['8-12']): ?>
                                                <tr>
                                                    <th>8 - 12</th>
                                                    <td><?php echo $lendValue['8-12']; ?></td>
                                                </tr>
                                            <?php endif; ?>
                                            <?php if($lendValue['13-30']): ?>
                                                <tr>
                                                    <th>13 - 30</th>
                                                    <td><?php echo $lendValue['13-30']; ?></td>
                                                </tr>
                                            <?php endif; ?>
                                            <?php if($lendValue['outofcity']): ?>
                                                <tr>
                                                    <th><?php _e( 'Out of city, per 100km', 'yerevancar' ); ?></th>
                                                    <td><?php echo $lendValue['outofcity']; ?></td>
                                                </tr>
                                            <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <?php $checkIndex++;
                                } ?>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <a class="btn arch-cars-ord-b" href="<?php the_permalink(); ?>"><?php _e( 'Order', 'yerevancar' ) ?></a>
                                </div>

                                <div class="col-sm-6">
                                    <a class="btn arch-cars-ord-b product-more-details" id="<?php echo 'product-more-details-btn-' . $iter; ?>" data-id="<?php echo $iter; ?>"><?php _e( 'Price List', 'yerevancar' ); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $iter++;
                endwhile; endif; ?>
            </div>
        </div>
    </section>
</main>

<script>
    jQuery(function($){
        $(".product-more-details").on('click', function(){
            var productID = $(this).data("id");

            $(".test").slideUp("fast");
            $("#product-more-details-" + productID).slideDown("fast");
        })
    })
</script>

<?php get_footer(); ?>
