<?php get_header(); ?>

    <main id="single-car-page">
        <section>
            <div class="row">
                <div class="single-car-sidebar col-md-2">
                    <?php include( 'custom-sidebar.php' ); ?>
                </div>

                <div class="col-sm-4 col-md-4">
                    <div id="car-gallery">
                        <?php $postID = get_the_ID();
                        $galleryIds = get_post_meta($postID, '_YC_product_gallery_ids', true);
                        if($galleryIds) {
                            $galleryIdsArr = explode( ',', $galleryIds);
                            foreach($galleryIdsArr as $galleryId) { ?>
                                <a class="fancybox" href="<?php echo wp_get_attachment_image_src( $galleryId, 'extra-large-thumb' )[0]; ?>" style="display:none" rel="gallery0">
                                    <?php echo wp_get_attachment_image( $galleryId, 'large-thumb', false, array( 'class' => 'img-responsive' ) ); ?>
                                </a>
                            <?php }
                        }
                        $thumbSrc = wp_get_attachment_image_src( get_post_thumbnail_id( $postID ), 'extra-large-thumb' ); ?>
                        <a class="fancybox" href="<?php echo $thumbSrc[0]; ?>" rel="gallery0">
                            <?php the_post_thumbnail( 'large-thumb', array( 'class' => 'img-responsive' ) ); ?>
                        </a>
                    </div>
                </div>

                <div class="col-sm-8 col-md-6">
                    <h1><?php the_title(); ?></h1>
                    <?php
                    $car = [];

                    $weddingPrice = [];
                    $driverWithPrice = [];
                    $driverWithoutPrice = [];

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
                    if($driverWithout) {$lendType['Without Driver'] = $driverWithoutPrice;}
                    ?>
                    <table class="table table-bordered table-car-info table-car-info-extra" data-productid="<?php echo $postID; ?>">
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
                            <tr style="border-bottom: 2px solid #867070;">
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
                    <div class="row">
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
                                        <th colspan="2"><input class="lentTypeForm" type="radio" name="lent-type" value="<?php echo $lendKey; ?>" <?php if($checkIndex == 0) echo 'checked'; ?>> <?php echo $lendTypeLabel; if($lendKey == 'Without Driver' || $lendKey == 'With Driver') echo '<br>(' . __( '24 hours', 'yerevancar' ) . ')'; ?></th>
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

                    <div id="orderForm" style="display:none">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered table-car-info">
                                    <tbody>
                                        <tr>
                                            <th><?php _e( 'Additional Services', 'yerevancar' ); ?></th>
                                            <th><?php _e( 'Daily Price', 'yerevancar' ); ?></th>
                                        </tr>
                                        <?php
                                        $excludeServiceIdPhoto = icl_object_id(225, 'cars', true);
                                        $argsServices = array(
                                            'post_type'     => 'services',
                                            'post__not_in'  => array( $excludeServiceIdPhoto )
                                        );
                                        $servicesQuery = new WP_Query($argsServices);
                                        if($servicesQuery->have_posts()): while($servicesQuery->have_posts()): $servicesQuery->the_post();
                                            $serviceID = get_the_ID();
                                            $servicePrice = get_post_meta($serviceID, '_YC_services_price', true);
                                            $serviceIcon = get_post_meta($serviceID, '_YC_services_icon', true); ?>
                                            <tr>
                                                <th><i class="fa <?php if($serviceIcon) echo $serviceIcon; ?>" style="opacity:0.5"> </i><?php the_title(); ?></th>
                                                <td><label><input type="checkbox" data-service="<?php echo $serviceID; ?>" class="otherServicesForm"> <?php echo $servicePrice; ?></label></td>
                                            </tr>
                                        <?php endwhile; endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered table-car-info">
                                    <tbody>
                                        <tr class="warning">
                                            <th><?php _e( 'Pick Up', 'yerevancar' ); ?><span style="color:red">*</span></th>
                                            <td><input id="dateFrom" type="text" class="form-control"></td>
                                        </tr>
                                        <tr class="warning">
                                            <th><?php _e( 'Return', 'yerevancar' ); ?><span style="color:red">*</span></th>
                                            <td><input id="dateTo" type="text" class="form-control"></td>
                                        </tr>
                                        <tr class="success" id="otherServices" style="display: none">
                                            <th><?php _e( 'Other Services', 'yerevancar' ); ?></th>
                                            <td id="otherServicesValue"></td>
                                        </tr>
                                        <tr class="success" id="dailyPrice" style="display: none">
                                            <th><?php _e( 'Daily Price', 'yerevancar' ); ?></th>
                                            <td id="dailyPriceValue"></td>
                                        </tr>
                                        <tr class="success" id="totalPrice" style="display: none">
                                            <th><?php _e( 'Total Price', 'yerevancar' ); ?></th>
                                            <td id="totalPriceValue"></td>
                                        </tr>
                                        <tr>
                                            <th colspan="2" class="alert alert-danger" id="calculatorErrorMsg" style="display:none"></th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered table-car-info">
                                    <tbody>
                                        <tr>
                                            <th colspan="2"><?php _e( 'Please, fill in this form to proceed your otder', 'yerevancar' ); ?></th>
                                        </tr>
                                        <tr>
                                            <th><?php _e( 'Full Name', 'yerevancar' ); ?><span style="color:red">*</span></th>
                                            <td><input id="userName" type="text" class="form-control user-info"></td>
                                        </tr>
                                        <tr>
                                            <th><?php _e( 'Address', 'yerevancar' ); ?><span style="color:red">*</span></th>
                                            <td><input id="userAddress" type="text" class="form-control user-info"></td>
                                        </tr>
                                        <tr>
                                            <th><?php _e( 'City', 'yerevancar' ); ?><span style="color:red">*</span></th>
                                            <td><input id="userCity" type="text" class="form-control user-info"></td>
                                        </tr>
                                        <tr>
                                            <th><?php _e( 'Phone', 'yerevancar' ); ?><span style="color:red">*</span></th>
                                            <td><input id="userPhone" type="text" class="form-control user-info"></td>
                                        </tr>
                                        <tr>
                                            <th><?php _e( 'E-Mail', 'yerevancar' ); ?><span style="color:red">*</span></th>
                                            <td><input id="userEmail" type="text" class="form-control user-info"></td>
                                        </tr>
                                        <tr>
                                            <th><?php _e( 'Notes', 'yerevancar' ); ?></th>
                                            <td><textarea id="userNotes" class="form-control user-info" cols="50" rows="4"></textarea></td>
                                        </tr>
                                        <tr id="userLicenseAgreementForm" style="display:none">
                                            <th><a href="<?php echo get_the_permalink( 62 ); ?>" target="_blank"><?php _e( 'Terms', 'yerevancar' ); ?></a><span style="color:red">*</span></th>
                                            <td><label><input id="userLicenseAgreement" type="checkbox"> <?php _e( 'I have read and agree with this terms', 'yerevancar' ); ?></label></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div style="display:none" class="col-sm-12" id="status-error">
                            <div class="panel panel-danger">
                                <div class="panel-body" id="status-msg-error">

                                </div>
                            </div>
                        </div>

                        <div style="display:none" class="col-sm-12" id="status-success">
                            <div class="panel panel-success">
                                <div class="panel-body" id="status-msg-success">

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <button class="btn btn-danger" type="button" id="btnOrder" ><?php _e( 'Order', 'yerevancar' ); ?></button>
                            <button class="btn btn-danger" type="button" id="btnSend" style="display:none"><?php _e( 'Send', 'yerevancar' ); ?></button>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>
    <script>
        jQuery(function($){
            $( "#dateFrom" ).datepicker({
                defaultDate: "+1w",
                changeMonth: true,
                numberOfMonths: 2,
                onClose: function( selectedDate ) {
                    $("#dateTo").datepicker( "option", "minDate", selectedDate );
                },
                dateFormat: "dd-mm-yy"
            });
            $( "#dateTo" ).datepicker({
                defaultDate: "+1w",
                changeMonth: true,
                numberOfMonths: 2,
                onClose: function( selectedDate ) {
                    $("#dateFrom").datepicker( "option", "maxDate", selectedDate );
                },
                dateFormat: "dd-mm-yy"
            });
        });

        jQuery(function($){

            var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
            var otherServices = [];
            var productid = "<?php echo $postID; ?>";
            var lentType = $('input[name="lent-type"]:checked').val();
            var dateFrom = $("#dateFrom").val();
            var dateTo = $("#dateTo").val();

            if(lentType == "Without Driver") {
                $("#userLicenseAgreementForm").fadeIn("slow");
            }

            $("#btnOrder").on("click", function(){
                $("#orderForm").fadeIn("slow");
                $(this).css("display", "none");
                $("#btnSend").fadeIn("slow");
            });

            $(".lentTypeForm").change(function(){
                lentType = $('input[name="lent-type"]:checked').val();

                if(lentType == "Without Driver") {
                    $("#userLicenseAgreementForm").fadeIn("slow");
                } else {
                    $("#userLicenseAgreementForm").fadeOut("slow");
                }
                orderResult();
            });

            $(".otherServicesForm").change(function(){
                otherServices = [];
                $(".otherServicesForm").each(function(){
                    if($(this).is(":checked")){
                        otherServices.push(parseInt($(this).attr("data-service")));
                    }
                });
                orderResult();
            });

            $("#dateFrom").change(function(){
                orderResult();
            });
            $("#dateTo").change(function(){
                orderResult();
            });

            function orderResult() {
                var action = "order_calculator";

                dateFrom = $("#dateFrom").val();
                dateTo = $("#dateTo").val();

                var dataCalc = {
                    "action": action,
                    "lentType": lentType,
                    "productID": productid,
                    "dateFrom": dateFrom,
                    "dateTo": dateTo,
                    "otherServices": otherServices.join(", ")
                };

                $.ajax({
                    type: "POST",
                    url: ajaxurl,
                    data: dataCalc,
                    success: function(data){
                        var resultOBJ = jQuery.parseJSON(data);

                        if(resultOBJ.dailyPrice > 1) {
                            $("#calculatorErrorMsg").fadeOut("slow");

                            $("#dailyPriceValue").text(resultOBJ.dailyPrice);
                            $("#dailyPrice").fadeIn("slow");

                            if(resultOBJ.servicesPrice){
                                $("#otherServicesValue").text(resultOBJ.servicesPrice);
                                $("#otherServices").fadeIn("slow");
                            } else {
                                $("#otherServices").fadeOut("slow");
                            }

                            if(resultOBJ.totalPrice){
                                $("#totalPriceValue").text(resultOBJ.totalPrice);
                                $("#totalPrice").fadeIn("slow");
                            } else {
                                $("#totalPrice").fadeOut("slow");
                            }
                        } else if(resultOBJ.dailyPrice == 1) {
                            $("#calculatorErrorMsg").text("<?php _e( 'Contact Us', 'yerevancar' ); ?>");
                            $("#calculatorErrorMsg").fadeIn("slow");

                            $("#otherServices").fadeOut("slow");
                            $("#dailyPrice").fadeOut("slow");
                            $("#totalPrice").fadeOut("slow");
                        }
                    }
                });
            }

            $("#btnSend").on("click", function(){

                if(lentType == "Without Driver") {
                    if(!$("#userLicenseAgreement").is(":checked")) {
                        $("#status-success").fadeOut("slow");

                        $("#status-msg-error").text("<?php _e( 'Please, read and agree with this terms', 'yerevancar' ); ?>");
                        $("#status-error").fadeIn("slow");
                        return;
                    }
                }

                var action = "order_send";

                dateFrom = $("#dateFrom").val();
                dateTo = $("#dateTo").val();

                var dataMail = {
                    "action": action,
                    "productID": productid,
                    "lentType": lentType,
                    "dateFrom": dateFrom,
                    "dateTo": dateTo,
                    "otherServices": otherServices.join(", "),

                    "userName": $("#userName").val(),
                    "userAddress": $("#userAddress").val(),
                    "userCity": $("#userCity").val(),
                    "userPhone": $("#userPhone").val(),
                    "userEmail": $("#userEmail").val(),
                    "userNotes": $("#userNotes").val()
                };

                $.ajax({
                    type: "POST",
                    url: ajaxurl,
                    data: dataMail,
                    success: function(data){
                        var resultOBJ = jQuery.parseJSON(data);
                        if(resultOBJ.status == "error") {
                            $("#status-success").fadeOut("slow");

                            $("#status-msg-error").text(resultOBJ.statusText);
                            $("#status-error").fadeIn("slow");
                        } else if(resultOBJ.status == "success") {
                            $("#status-error").fadeOut("slow");

                            $("#status-msg-success").text(resultOBJ.statusText);
                            $("#status-success").fadeIn("slow");

                            $(".user-info").each(function(){
                                $(this).val("");
                            });
                        }
                    }
                });
            });

        });
    </script>

    <script>
        jQuery(document).ready(function ($) {
            $(".fancybox").fancybox({
                openEffect: 'none',
                closeEffect: 'none'
            });
        });
    </script>

<?php get_footer(); ?>