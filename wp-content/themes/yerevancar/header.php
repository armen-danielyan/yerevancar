<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php $description = 'Երևանի լավագույն էլիտար ավտովարձույթ Yerevan Cars, Ձեր բոլոր նախասիրությունների համար։ Հարսանեկան, ներկայացուցչական և օրավարձով բարձրակարգ մեքենաներ։';
    if(!is_single()) {
        $keywords = 'Rentcar, Rent, car, wedding, weding, csr, wedinh, rrnt, Yerevan, Rental, erevan, Avtovardzuyt, Avtoprokat, Avtoprakat , Avto, erevanum, vardzov, meqena, Varcov, meqena, avtomeqena, Prokat, Prakat, mekena, Ejan, How, Kak, orendavat, mashinu, erevane, vzat, nayti, uzum, em, lav, harsaniqiavto, harsaniqi, avto, tuyn, matcheli, orvarcov, oravardzov, nerkayacuchakan, nerkayacchakan, pristaviteknie, mashini, pristovitelniy, Ավտովարձույթ, երևանում, Ավտո, պռոկատ,  պռակատ, պրոկատ, մի, օրով, հարսանիքի, համար, Օրավարձով, մեքենա, մեկ, Հարսանեկան, Հարսանեկան, Էժան, Երևանում, Երեվանում, մասշնա, մաշնա, ուզւուուուուուուոմ, Երևան, ավտօ, կառք, Կարք, հարսանիքի, համառ, ավտե, Կսռք, ավտե, ռենտացառ, ռենտաքառ, Ավտոների, վարձույթ, քար, ցառ, քառ, Երևանքար, Մեքենաների, վարձույթ, ավտոպռակատ, ռենտաքար, ավտոմատ, մեխանիկական, ամենագնաց, էլիտար, ընտանեկան, ավտօվառդզւըտ, ավտովառդզույտ, ավտոմեքենա, ներկայացուցչական, մեքենաներ, ներկայացչական, Авто прокат, Автопракат, Машина, прокат, пракат, на, ереване, автомобилей, автамабилей, Как, найти, мошину, аренда, машин, Армении, оренда, пристовительные, пристажителние, пристажительние, приставительние, приставителние, приставительные, машины';
    } else {
        $keywords = post_keywords();
    } ?>
    <meta name="keywords" content="<?php echo $keywords; ?>">
    <meta name="description" content="<?php echo $description; ?>">

    <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>">
    <title><?php wp_title( '|', true, 'right' ); bloginfo(); ?></title>

    <link rel="icon" href="<?php bloginfo( 'url' ); ?>/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="<?php bloginfo( 'url' ); ?>/favicon.ico" type="image/x-icon">

    <?php wp_head(); ?>
</head>
<body>
    <?php include_once('incl/analyticstracking.php'); ?>
    <div class="container header-section">
        <header>
            <div class="row" id="header-top-menu">
                <div class="col-sm-3 social-icons">
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-odnoklassniki"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>

                <div class="col-sm-6 mobile-numbers text-center">
                    <div><i class="fa fa-phone"></i> +374 91 177979, +374 98 077979</div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4" id="header-logo">
                    <a href="<?php bloginfo( 'url' ); ?>">
                        <img class="img-responsive" src="<?php bloginfo( 'template_url' ); ?>/img/logo.png" alt="Yerevan Car">
                    </a>
                </div>

                <div class="col-sm-3" id="header-search-box">
                    <?php if(ICL_LANGUAGE_CODE == 'en') {
                        $currLang = 'en';
                    } elseif(ICL_LANGUAGE_CODE == 'ru') {
                        $currLang = 'ru';
                    } else {
                        $currLang = 'hy';
                    } ?>
                    <form method="get" class="form-inline" action="<?php echo get_option('home') ?>/">
                        <div class="form-group  search-section">
                            <div class="input-group">
                                <section id="search">
                                    <label for="search-input"><i class="fa fa-search"></i></label>
                                    <input type="text" class="search form-control" value="<?php echo get_search_query(); ?>" name="s" placeholder="<?php _e( 'Search', 'yerevancar' ); ?>">
                                    <input type="hidden" name="lang" value="<?php echo $currLang; ?>">
                                </section>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-sm-3">

                </div>

                <div class="col-sm-2" id="header-lang-box">
                    <?php do_action('wpml_add_language_selector'); ?>
                </div>
            </div>

            <nav class="navbar navbar-default car-navbar no-border" role="navigation">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <?php
                    wp_nav_menu( array(
                        'menu'              => 'header-main-menu',
                        'theme_location'    => 'yerevancar',
                        'depth'             => 2,
                        'container'         => 'div',
                        'container_class'   => 'collapse navbar-collapse',
                        'container_id'      => 'bs-example-navbar-collapse-1',
                        'menu_class'        => 'nav navbar-nav navbar-right',
                        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                        'walker'            => new wp_bootstrap_navwalker())
                    );
                    ?>
                </div>
            </nav>
        </header>