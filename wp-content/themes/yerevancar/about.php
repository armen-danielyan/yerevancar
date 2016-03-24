<?php
/**
 * Template Name: about
 */
?>

<?php get_header(); ?>

    <main id="about-page">
        <section>
            <div class="row">
                <div class="col-sm-12">
                    <?php putRevSlider( 'homepage' ); ?>
                </div>
            </div>
        </section>

        <section>
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="text-center"><?php the_title(); ?></h1>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-10 col-sm-offset-1 text-center ubout-txt-cont">
                    <?php the_content(); ?>
                </div>
            </div>
        </section>

        <section id="about-map">
            <div class="row">
                <div class="col-sm-12">
                    <div id="googleMap" style="width:100%;height:380px;">
                        
                    </div>
                </div>
            </div>
        </section>


    </main>

    <script>
    var myCenter=new google.maps.LatLng(40.1922232,44.5043868);

    function initialize()
    {
    var mapProp = {
      center:myCenter,
      zoom:15,
      scrollwheel:  false,
      mapTypeId:google.maps.MapTypeId.ROADMAP
      };

    var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

    var marker=new google.maps.Marker({
      position:myCenter,
      icon:"<?php bloginfo('template_url'); ?>/img/maplogo.png",
    animation:google.maps.Animation.BOUNCE
      });

    marker.setMap(map);
    }

    google.maps.event.addDomListener(window, 'load', initialize);
    </script>

<?php get_footer(); ?>
