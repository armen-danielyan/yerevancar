<?php
/**
 * Template Name: contact
 */
?>

<?php get_header(); ?>

    <?php if(ICL_LANGUAGE_CODE == 'hy') {
        $currLang = 'hy_AM';
    } elseif(ICL_LANGUAGE_CODE == 'ru') {
        $currLang = 'ru_RU';
    } else {
        $currLang = 'en_US';
    } ?>
    <div id="fb-root"></div>
    <script>
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/<?php echo $currLang; ?>/sdk.js#xfbml=1&version=v2.5&appId=1131540440211178";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

    <main id="contact-page">
        <section id="cont-numbers">
            <div class="row">
                <div class="col-sm-3 text-center">
                    <p class="fa fa-map-marker">&nbsp;<?php _e( 'address: Baghramyan 44', 'yerevancar'); ?></p>
                </div>

                <div class="col-sm-3 text-center">
                    <p class="fa fa-phone">&nbsp;+374 91 177 979</p>
                </div>

                <div class="col-sm-3 text-center">
                    <p class="fa fa-phone">&nbsp;+374 98 077 979</p>
                </div>

                <div class="col-sm-3 text-center">
                    <p class="fa fa-envelope">&nbsp;info@yerevancar.am</p>
                </div>
            </div>
        </section>

        <section id="contact-form-face">
            <div class="row ">
                <div class="col-sm-6 text-center">
                    <?php
                    if(ICL_LANGUAGE_CODE == 'hy') {
                        echo do_shortcode( '[contact-form-7 id="242" title="Form-am"]' );
                    } elseif(ICL_LANGUAGE_CODE == 'ru') {
                        echo do_shortcode( '[contact-form-7 id="243" title="Form-ru"]' );
                    } elseif(ICL_LANGUAGE_CODE == 'en') {
                        echo do_shortcode( '[contact-form-7 id="244" title="Form-en"]' );
                    }
                    ?>
                </div>

                <div class="col-sm-6 text-center">
                    <div class="fb-page" data-href="https://www.facebook.com/YerevanCar" data-tabs="timeline" data-width="300" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/YerevanCar"><a href="https://www.facebook.com/YerevanCar">Yerevan Car</a></blockquote></div></div>
                </div>
            </div>
        </section>

        <section id="about-map">
            <div class="row">
                <div class="col-md-12">
                    <div id="ContactPageMap" style="width:100%;height:380px;">
                        
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script>
        var myCenter = new google.maps.LatLng(40.192390, 44.504019);

        function initialize() {
            var mapProp = {
                center: myCenter,
                zoom: 17,
                scrollwheel: false,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };

            var map = new google.maps.Map(document.getElementById("ContactPageMap"), mapProp);

            var marker = new google.maps.Marker({
                position: myCenter,
                icon: "<?php bloginfo('template_url'); ?>/img/maplogo.png",
                animation: google.maps.Animation.BOUNCE
            });

            marker.setMap(map);
        }

        google.maps.event.addDomListener(window, 'load', initialize);
    </script>

<?php get_footer(); ?>