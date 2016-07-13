<?php get_header(); ?>

    <main id="single-services-page">
        <section>
            <div class="row">
                <div class="col-sm-2 col-md-2">
                    <?php include( 'custom-sidebar.php' ); ?>
                </div>

                <div class="col-sm-4 col-md-4">
                    <div id="car-gallery">
                        <?php the_post_thumbnail( 'large-thumb', array( 'class' => 'img-responsive' ) ); ?>
                    </div>
                </div>

                <div class="col-sm-8 col-md-6">
                    <h2><?php the_title(); ?></h2>
                    <div><?php the_content(); ?></div>
                    <?php
                    $postID = get_the_ID();
                    $servicePriceSingle = get_post_meta($postID, '_YC_services_price', true);
                    if($servicePriceSingle) { ?>
                        <h3><?php echo __( 'Price:', 'yerevancar' ) . ' ' . $servicePriceSingle; ?></h3>
                    <?php } ?>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="paged" id="paged">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script>
        jQuery(document).ready(function ($) {
            $(".gallery-icon a").addClass("fancybox-thumb").attr("rel", "fancybox-thumb");
            $(".fancybox-thumb").fancybox({
                openEffect: 'none',
                closeEffect: 'none'
            });



            var pageItems = 6;
            var galItems = $("#gallery-1 dl");
            var galItemsCount = galItems.length;
            var pages = Math.ceil(galItemsCount / pageItems);

            $("#gallery-1 br").remove();

            var paginationHtml = "";
            var active = "";
            for(var i = 1; i <= pages; i++){
                if(i == 1) {
                    active = "active";
                } else {
                    active = "";
                }
                paginationHtml += '<span class="gal-page ' + active + '" data-page="' + i + '">' + i + '</span>';
            }
            $("#paged").html(paginationHtml);
            showItems(1, pageItems);
            $(".gal-page").on("click", function(){

                $(".gal-page").each(function(){
                    $(this).removeClass("active");
                });
                $(this).addClass("active");

                var selectedPage = $(this).data("page");
                showItems(selectedPage, pageItems);
            });

            //console.log(paginationHtml);




            function showItems(page, count){
                var fromId = (page - 1) * (count - 1);
                var toId = page * (count - 1);



                $.each(galItems, function(galItemKey, galItem){
                    if(galItemKey < fromId || galItemKey > toId){
                        $(galItem).hide();
                    } else {
                        $(galItem).show();
                    }
                    //console.log(galItem);
                })
            }
        });
    </script>

<?php get_footer(); ?>