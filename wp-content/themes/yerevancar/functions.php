<?php

/**
 * Load Scripts and Styles
 */

add_action( 'wp_enqueue_scripts', 'LoadScriptsStyles' );
function LoadScriptsStyles() {
    wp_register_style( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css' );
    wp_enqueue_style( 'bootstrap' );
    wp_register_style( 'fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css' );
    wp_enqueue_style( 'fontawesome' );
    wp_register_script( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js', array( 'jquery' ) );
    wp_enqueue_script( 'bootstrap' );
    wp_enqueue_script( 'jquery' );
    wp_register_script( 'jqueryUI', 'https://code.jquery.com/ui/1.11.4/jquery-ui.js', array( 'jquery' ) );
    wp_enqueue_script( 'jqueryUI' );
    wp_register_style( 'jqueryUIstyle', 'https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css' );
    wp_enqueue_style( 'jqueryUIstyle' );
    wp_register_script( 'googlemapapi', 'https://maps.googleapis.com/maps/api/js' );
    wp_enqueue_script( 'googlemapapi' );
    wp_register_script( 'fancyboxjspack', get_template_directory_uri() . '/incl/fancybox/source/jquery.fancybox.pack.js', array( 'jquery' ) );
    wp_enqueue_script( 'fancyboxjspack' );
    wp_register_style( 'fancyboxcsspack', get_template_directory_uri() . '/incl/fancybox/source/jquery.fancybox.css' );
    wp_enqueue_style( 'fancyboxcsspack' );
}


/**
 * Admin Load Scripts and Styles
 */

add_action( 'admin_enqueue_scripts', 'adminLoadScriptsStyles' );
function adminLoadScriptsStyles() {
    wp_register_script( 'metabox_gallery', get_template_directory_uri() . '/js/metabox-gallery.js', array( 'jquery' ) );
    wp_enqueue_script( 'metabox_gallery' );
    wp_enqueue_script( 'jquery' );
}


/**
 * Limit Excerpt
 */

function my_custom_excerpt_length( $default ) {
    return 10;
}
add_filter( 'excerpt_length', 'my_custom_excerpt_length' );


/**
 * Register Thumbnails
 */

if (function_exists( 'add_theme_support' )) {
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'medium-thumb', 400, 300, true );
    add_image_size( 'large-thumb', 800, 600, true );
    add_image_size( 'extra-large-thumb', 1024, 768, true );
}


/**
 * Register Menus
 */

add_action( 'init', 'RegisterMenus' );
function RegisterMenus() {
    register_nav_menus( array(
        'header-main-menu'  => 'Main Menu',
        'footer-menu'       => 'Footer Menu',
        'sidebar-menu'      => 'Sidebar Menu'
    ));
}


/**
 * Register Drivers Custom Post Type
 */

add_action( 'init', 'Create_Drivers_CPT', 0 );
function Create_Drivers_CPT() {
    $labels = array(
        'name'                  => 'Drivers',
        'singular_name'         => 'Driver',
        'menu_name'             => 'Drivers',
        'parent_item_colon'     => 'Parent Driver',
        'all_items'             => 'All Drivers',
        'view_item'             => 'View Driver',
        'add_new_item'          => 'Add New Driver',
        'add_new'               => 'Add New',
        'edit_item'             => 'Edit Driver',
        'update_item'           => 'Update Driver',
        'search_items'          => 'Search Driver',
        'not_found'             => 'Not Found',
        'not_found_in_trash'    => 'Not found in Trash'
    );
    $args = array(
        'label'                 => 'drivers',
        'description'           => 'Drivers list',
        'menu_icon'             => 'dashicons-groups',
        'menu_position'         => 30,
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions' ),
        'taxonomies'            => array( 'post_tag' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'show_in_nav_menus'     => true,
        'show_in_admin_bar'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => true,
        'publicly_queryable'    => true,
        'capability_type'       => 'page'
    );
    register_post_type( 'drivers', $args );
}


/**
 * Register Services Custom Post Type
 */

add_action( 'init', 'Create_Services_CPT', 0 );
function Create_Services_CPT() {
    $labels = array(
        'name'                  => 'Services',
        'singular_name'         => 'Service',
        'menu_name'             => 'Services',
        'parent_item_colon'     => 'Parent Service',
        'all_items'             => 'All Services',
        'view_item'             => 'View Service',
        'add_new_item'          => 'Add New Service',
        'add_new'               => 'Add Service',
        'edit_item'             => 'Edit Service',
        'update_item'           => 'Update Service',
        'search_items'          => 'Search Service',
        'not_found'             => 'Not Found',
        'not_found_in_trash'    => 'Not found in Trash'
    );
    $args = array(
        'label'                 => 'services',
        'description'           => 'Services list',
        'menu_icon'             => 'dashicons-admin-generic',
        'menu_position'         => 29,
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions' ),
        'taxonomies'            => array( 'post_tag' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'show_in_nav_menus'     => true,
        'show_in_admin_bar'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => true,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
        'register_meta_box_cb'  => 'AddServicesMetaboxes'
    );
    register_post_type( 'services', $args );
}


/**
 * Register Services Metaboxes
 */

function AddServicesMetaboxes() {
    add_meta_box( 'YC_Service_Price', 'Price', 'YCServicesPrice', 'services', 'side', 'high' );
    add_meta_box( 'YC_Service_Icon', 'Icon', 'YCServicesIcon', 'services', 'side', 'high' );
}

// Create Price Metabox
function YCServicesPrice() {
    global $post;
    echo '<input type="hidden" name="serviceprice_noncename" id="serviceprice_noncename" value="' . wp_create_nonce(plugin_basename(__FILE__)) . '" />';

    $servicesPrice = get_post_meta($post->ID, '_YC_services_price', true);
    echo '<label for="_YC_services_price">Price</label>';
    echo '<input id="_YC_services_price" type="number" name="_YC_services_price" value="' . $servicesPrice . '" class="widefat" />';
}

// Create Price Metabox
function YCServicesIcon() {
    global $post;
    echo '<input type="hidden" name="serviceicon_noncename" id="serviceicon_noncename" value="' . wp_create_nonce(plugin_basename(__FILE__)) . '" />';

    $servicesIcon = get_post_meta($post->ID, '_YC_services_icon', true);
    echo '<label for="_YC_services_icon">FontAwesome Icon</label>';
    echo '<input id="_YC_services_icon" type="text" name="_YC_services_icon" value="' . $servicesIcon . '" class="widefat" />';
}

// Save Services Metaboxes
add_action( 'save_post', 'SaveServicesMetaboxes', 1, 2 );
function SaveServicesMetaboxes($post_id, $post) {
    if ( !wp_verify_nonce($_POST['serviceprice_noncename'], plugin_basename(__FILE__)) ) {
        return $post->ID;
    }
    if ( !current_user_can( 'edit_post', $post->ID )) {
        return $post->ID;
    }

    $servicesMeta['_YC_services_price'] = $_POST['_YC_services_price'];
    $servicesMeta['_YC_services_icon'] = $_POST['_YC_services_icon'];

    foreach ($servicesMeta as $key => $value) {
        if( $post->post_type == 'revision' ) return;
        $value = implode(',', (array)$value);
        if(get_post_meta($post->ID, $key, FALSE)) {
            update_post_meta($post->ID, $key, $value);
        } else {
            add_post_meta($post->ID, $key, $value);
        }
        if(!$value) delete_post_meta($post->ID, $key);
    }
}


/**
 * Register Cars Custom Post Type
 */

add_action( 'init', 'Create_Cars_CPT', 0 );
function Create_Cars_CPT() {
    $labels = array(
        'name'                  => 'Cars',
        'singular_name'         => 'Car',
        'menu_name'             => 'Cars',
        'parent_item_colon'     => 'Parent Car',
        'all_items'             => 'All Cars',
        'view_item'             => 'View Car',
        'add_new_item'          => 'Add New Car',
        'add_new'               => 'Add New',
        'edit_item'             => 'Edit Car',
        'update_item'           => 'Update Car',
        'search_items'          => 'Search Car',
        'not_found'             => 'Not Found',
        'not_found_in_trash'    => 'Not found in Trash'
    );
    $args = array(
        'label'                 => 'cars',
        'description'           => 'Cars list',
        'menu_icon'             => 'dashicons-admin-network',
        'menu_position'         => 28,
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions' ),
        'taxonomies'            => array( 'types', 'post_tag' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'show_in_nav_menus'     => true,
        'show_in_admin_bar'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
        'register_meta_box_cb'  => 'AddCarsMetaboxes'
    );
    register_post_type( 'cars', $args );
}


/**
 * Register Type Taxonomy For Cars Custom Post Type
 */

add_action('init', 'Create_Types_Taxonomies', 0);
function Create_Types_Taxonomies() {
    $labels = array(
        'name'              => 'Types',
        'singular_name'     => 'Type',
        'search_items'      => 'Search Types',
        'all_items'         => 'All Types',
        'parent_item'       => 'Parent Type',
        'parent_item_colon' => 'Parent Type:',
        'edit_item'         => 'Edit Type',
        'update_item'       => 'Update Type',
        'add_new_item'      => 'Add New Type',
        'new_item_name'     => 'New Genre Name',
        'menu_name'         => 'Types'
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'types' ),
    );

    register_taxonomy('types', 'cars', $args);
}


/**
 * Register Cars Metaboxes
 */

function AddCarsMetaboxes() {
    add_meta_box( 'YC_Description', 'Car Description', 'YCDescription', 'cars', 'side', 'high' );
    add_meta_box( 'YC_Specification', 'Car Specification', 'YCSpecification', 'cars', 'side', 'high' );
    add_meta_box( 'YC_Driver', 'Price', 'YCDriver', 'cars', 'normal', 'high' );
    add_meta_box( 'YC_Gallery', 'Gallery', 'YCGallery', 'cars', 'normal', 'high' );
    add_meta_box( 'YC_Gallery_Full', 'Full Gallery', 'YCGalleryFull', 'cars', 'normal', 'high' );
}

// Create Description Metabox
function YCDescription() {
    global $post;
    echo '<input type="hidden" name="description_noncename" id="description_noncename" value="' . wp_create_nonce( plugin_basename(__FILE__) ) . '" />';

    $color = get_post_meta($post->ID, '_YC_color', true);
    echo '<label for="_YC_color">Color</label>';
    echo '<input id="_YC_color" type="text" name="_YC_color" value="' . $color  . '" class="widefat" />';

    $year = get_post_meta($post->ID, '_YC_year', true);
    echo '<label for="_YC_year">Year</label>';
    echo '<input id="_YC_year" type="number" name="_YC_year" value="' . $year  . '" class="widefat" />';

    $doors = get_post_meta($post->ID, '_YC_doors', true);
    echo '<label for="_YC_doors">Doors</label>';
    echo '<input id="_YC_doors" type="number" name="_YC_doors" value="' . $doors  . '" class="widefat" />';

    $seats = get_post_meta($post->ID, '_YC_seats', true);
    echo '<label for="_YC_seats">Seats</label>';
    echo '<input id="_YC_seats" type="number" name="_YC_seats" value="' . $seats  . '" class="widefat" />';

    $fuel = get_post_meta($post->ID, '_YC_fuel', true);
    echo '<label for="_YC_fuel">Fuel</label>';
    echo '<input id="_YC_fuel" type="text" name="_YC_fuel" value="' . $fuel  . '" class="widefat" />';

    $transmission = get_post_meta($post->ID, '_YC_transmission', true);
    echo '<label for="_YC_transmission">Transmission</label>';
    echo '<input id="_YC_transmission" type="text" name="_YC_transmission" value="' . $transmission  . '" class="widefat" />';
}

// Create Specification Metabox
function YCSpecification() {
    global $post;
    echo '<input type="hidden" name="specification_noncename" id="specification_noncename" value="' . wp_create_nonce( plugin_basename(__FILE__) ) . '" />';

    $motorPower = get_post_meta($post->ID, '_YC_motor_power', true);
    echo '<label for="_YC_motor_power">Motor Power (hp)</label>';
    echo '<input id="_YC_motor_power" type="number" name="_YC_motor_power" value="' . $motorPower  . '" class="widefat" />';

    $maxSpeed = get_post_meta($post->ID, '_YC_max_speed', true);
    echo '<label for="_YC_max_speed">Max Speed (km/h)</label>';
    echo '<input id="_YC_max_speed" type="number" name="_YC_max_speed" value="' . $maxSpeed  . '" class="widefat" />';

    $motorVolume = get_post_meta($post->ID, '_YC_motor_volume', true);
    echo '<label for="_YC_motor_volume">Motor Volume (m3)</label>';
    echo '<input id="_YC_motor_volume" type="text" name="_YC_motor_volume" value="' . $motorVolume  . '" class="widefat" />';

    $fuelTankVolume = get_post_meta($post->ID, '_YC_fuel_tank_volume', true);
    echo '<label for="_YC_fuel_tank_volume">Fuel Tank Volume (l)</label>';
    echo '<input id="_YC_fuel_tank_volume" type="number" name="_YC_fuel_tank_volume" value="' . $fuelTankVolume  . '" class="widefat" />';

    $body = get_post_meta($post->ID, '_YC_body', true);
    echo '<label for="_YC_body">Body</label>';
    echo '<input id="_YC_body" type="text" name="_YC_body" value="' . $body  . '" class="widefat" />';

    $cylinders = get_post_meta($post->ID, '_YC_cylinders', true);
    echo '<label for="_YC_cylinders">Cylinders</label>';
    echo '<input id="_YC_cylinders" type="text" name="_YC_cylinders" value="' . $cylinders  . '" class="widefat" />';

    $trailer = get_post_meta($post->ID, '_YC_trailer', true);
    echo '<label for="_YC_trailer">Drive Unit</label>';
    echo '<input id="_YC_trailer" type="text" name="_YC_trailer" value="' . $trailer  . '" class="widefat" />';
}

function YCDriver() {
    global $post;
    $weddingPrice = [];
    $driverWithPrice = [];
    $driverWithoutPrice = [];
    echo '<input type="hidden" name="driver_noncename" id="driver_noncename" value="' . wp_create_nonce( plugin_basename(__FILE__) ) . '" />';

    $wedding = get_post_meta($post->ID, '_YC_wedding', true);
    $driverWith = get_post_meta($post->ID, '_YC_with_driver', true);
    $driverWithout = get_post_meta($post->ID, '_YC_without_driver', true);
    $transfer = get_post_meta($post->ID, '_YC_transfer', true);

    $weddingPrice['1-2'] = get_post_meta($post->ID, '_YC_wedding_1-2', true);
    $weddingPrice['3-4'] = get_post_meta($post->ID, '_YC_wedding_3-4', true);
    $weddingPrice['5-7'] = get_post_meta($post->ID, '_YC_wedding_5-7', true);
    $weddingPrice['8-12'] = get_post_meta($post->ID, '_YC_wedding_8-12', true);
    $weddingPrice['13-30'] = get_post_meta($post->ID, '_YC_wedding_13-30', true);
    $weddingPrice['outofcity'] = get_post_meta($post->ID, '_YC_wedding_outofcity', true);

    $driverWithPrice['1-2'] = get_post_meta($post->ID, '_YC_driverwith_1-2', true);
    $driverWithPrice['3-4'] = get_post_meta($post->ID, '_YC_driverwith_3-4', true);
    $driverWithPrice['5-7'] = get_post_meta($post->ID, '_YC_driverwith_5-7', true);
    $driverWithPrice['8-12'] = get_post_meta($post->ID, '_YC_driverwith_8-12', true);
    $driverWithPrice['13-30'] = get_post_meta($post->ID, '_YC_driverwith_13-30', true);
    $driverWithPrice['outofcity'] = get_post_meta($post->ID, '_YC_driverwith_outofcity', true);

    $driverWithoutPrice['1-2'] = get_post_meta($post->ID, '_YC_driverwithout_1-2', true);
    $driverWithoutPrice['3-4'] = get_post_meta($post->ID, '_YC_driverwithout_3-4', true);
    $driverWithoutPrice['5-7'] = get_post_meta($post->ID, '_YC_driverwithout_5-7', true);
    $driverWithoutPrice['8-12'] = get_post_meta($post->ID, '_YC_driverwithout_8-12', true);
    $driverWithoutPrice['13-30'] = get_post_meta($post->ID, '_YC_driverwithout_13-30', true);
    $driverWithoutPrice['outofcity'] = get_post_meta($post->ID, '_YC_driverwithout_outofcity', true);

    $transferPrice = get_post_meta($post->ID, '_YC_transfer_price', true);
    ?>

    <table style="width: 100%; border: 1px solid #dddddd;">
        <tbody>
            <tr style="background-color: #cccccc;">
                <th colspan="2" style="padding: 10px;">
                    <input type="checkbox" name="_YC_wedding" value="wedding" <?php checked( $wedding, 'wedding' ); ?> /> Wedding
                </th>
                <th colspan="2" style="padding: 10px;">
                    <input type="checkbox" name="_YC_with_driver" value="with_driver" <?php checked( $driverWith, 'with_driver' ); ?> /> With Driver
                </th>
                <th colspan="2" style="padding: 10px;">
                    <input type="checkbox" name="_YC_without_driver" value="without_driver" <?php checked( $driverWithout, 'without_driver' ); ?> /> Without Driver
                </th>
                <th style="padding: 10px;">
                    <input type="checkbox" name="_YC_transfer" value="transfer" <?php checked( $transfer, 'transfer' ); ?> /> Transfer
                </th>
            </tr>
            <tr style="background-color: #dddddd;">
                <th>Days</th>
                <th>Price</th>
                <th>Days</th>
                <th>Price</th>
                <th>Days</th>
                <th>Price</th>
                <th>Price</th>
            </tr>
            <tr>
                <th>1 - 2</th>
                <td><input type="text" name="_YC_wedding_1-2" value="<?php echo $weddingPrice['1-2']; ?>" class="widefat"></td>
                <th>1 - 2</th>
                <td><input type="text" name="_YC_driverwith_1-2" value="<?php echo $driverWithPrice['1-2']; ?>" class="widefat"></td>
                <th>1 - 2</th>
                <td><input type="text" name="_YC_driverwithout_1-2" value="<?php echo $driverWithoutPrice['1-2']; ?>" class="widefat"></td>
                <td><input type="text" name="_YC_transfer_price" value="<?php echo $transferPrice; ?>" class="widefat"></td>
            </tr>
            <tr>
                <th>3 - 4</th>
                <td><input type="text" name="_YC_wedding_3-4" value="<?php echo $weddingPrice['3-4']; ?>" class="widefat"></td>
                <th>3 - 4</th>
                <td><input type="text" name="_YC_driverwith_3-4" value="<?php echo $driverWithPrice['3-4']; ?>" class="widefat"></td>
                <th>3 - 4</th>
                <td><input type="text" name="_YC_driverwithout_3-4" value="<?php echo $driverWithoutPrice['3-4']; ?>" class="widefat"></td>
            </tr>
            <tr>
                <th>5 - 7</th>
                <td><input type="text" name="_YC_wedding_5-7" value="<?php echo $weddingPrice['5-7']; ?>" class="widefat"></td>
                <th>5 - 7</th>
                <td><input type="text" name="_YC_driverwith_5-7" value="<?php echo $driverWithPrice['5-7']; ?>" class="widefat"></td>
                <th>5 - 7</th>
                <td><input type="text" name="_YC_driverwithout_5-7" value="<?php echo $driverWithoutPrice['5-7']; ?>" class="widefat"></td>
            </tr>
            <tr>
                <th>8 - 12</th>
                <td><input type="text" name="_YC_wedding_8-12" value="<?php echo $weddingPrice['8-12']; ?>" class="widefat"></td>
                <th>8 - 12</th>
                <td><input type="text" name="_YC_driverwith_8-12" value="<?php echo $driverWithPrice['8-12']; ?>" class="widefat"></td>
                <th>8 - 12</th>
                <td><input type="text" name="_YC_driverwithout_8-12" value="<?php echo $driverWithoutPrice['8-12']; ?>" class="widefat"></td>
            </tr>
            <tr>
                <th>13 - 30</th>
                <td><input type="text" name="_YC_wedding_13-30" value="<?php echo $weddingPrice['13-30']; ?>" class="widefat"></td>
                <th>13 - 30</th>
                <td><input type="text" name="_YC_driverwith_13-30" value="<?php echo $driverWithPrice['13-30']; ?>" class="widefat"></td>
                <th>13 - 30</th>
                <td><input type="text" name="_YC_driverwithout_13-30" value="<?php echo $driverWithoutPrice['13-30']; ?>" class="widefat"></td>
            </tr>
            <tr>
                <th>Per 100km</th>
                <td><input type="text" name="_YC_wedding_outofcity" value="<?php echo $weddingPrice['outofcity']; ?>" class="widefat"></td>
                <th>Per 100km</th>
                <td><input type="text" name="_YC_driverwith_outofcity" value="<?php echo $driverWithPrice['outofcity']; ?>" class="widefat"></td>
                <th>Per 100km</th>
                <td><input type="text" name="_YC_driverwithout_outofcity" value="<?php echo $driverWithoutPrice['outofcity']; ?>" class="widefat"></td>
            </tr>
        </tbody>
    </table>

<?php }

// Create Gallery Metabox
function YCGallery() {
    global $post;
    echo '<input type="hidden" name="gallery_noncename" id="gallery_noncename" value="' . wp_create_nonce(plugin_basename(__FILE__)) . '" />';

    $carGallery = get_post_meta($post->ID, '_YC_product_gallery_ids', true);
    if($carGallery) {
        echo do_shortcode( '[gallery ids="' . $carGallery .  '"]' );
    }

    echo '<input id="product_gallery_ids" type="text" name="_YC_product_gallery_ids" value="' . $carGallery . '" />';
    echo '<input id="manage_gallery" title="Manage gallery" type="button" value="Manage Gallery" />';
}

// Create Full Gallery Metabox
function YCGalleryFull() {
    global $post;
    echo '<input type="hidden" name="galleryfull_noncename" id="galleryfull_noncename" value="' . wp_create_nonce(plugin_basename(__FILE__)) . '" />';

    $carGalleryFull = get_post_meta($post->ID, '_YC_product_galleryfull_ids', true);
    if($carGalleryFull) {
        echo do_shortcode( '[gallery ids="' . $carGalleryFull .  '"]' );
    }
    echo '<input id="product_galleryfull_ids" type="text" name="_YC_product_galleryfull_ids" value="' . $carGalleryFull . '" />';
    echo '<input id="manage_galleryfull" title="Manage full gallery" type="button" value="Manage Full Gallery" />';
}

// Save Cars Metaboxes
add_action( 'save_post', 'SaveCarsMetaboxes', 1, 2 );
function SaveCarsMetaboxes($post_id, $post) {
    if ( !wp_verify_nonce($_POST['description_noncename'], plugin_basename(__FILE__)) ) {
        return $post->ID;
    }
    if ( !current_user_can( 'edit_post', $post->ID )) {
        return $post->ID;
    }

    $carsMeta['_YC_color'] = $_POST['_YC_color'];
    $carsMeta['_YC_year'] = $_POST['_YC_year'];
    $carsMeta['_YC_doors'] = $_POST['_YC_doors'];
    $carsMeta['_YC_seats'] = $_POST['_YC_seats'];
    $carsMeta['_YC_fuel'] = $_POST['_YC_fuel'];
    $carsMeta['_YC_transmission'] = $_POST['_YC_transmission'];

    $carsMeta['_YC_wedding'] = $_POST['_YC_wedding'];
    $carsMeta['_YC_with_driver'] = $_POST['_YC_with_driver'];
    $carsMeta['_YC_without_driver'] = $_POST['_YC_without_driver'];
    $carsMeta['_YC_transfer'] = $_POST['_YC_transfer'];

    $carsMeta['_YC_wedding_1-2'] = $_POST['_YC_wedding_1-2'];
    $carsMeta['_YC_wedding_3-4'] = $_POST['_YC_wedding_3-4'];
    $carsMeta['_YC_wedding_5-7'] = $_POST['_YC_wedding_5-7'];
    $carsMeta['_YC_wedding_8-12'] = $_POST['_YC_wedding_8-12'];
    $carsMeta['_YC_wedding_13-30'] = $_POST['_YC_wedding_13-30'];
    $carsMeta['_YC_wedding_outofcity'] = $_POST['_YC_wedding_outofcity'];

    $carsMeta['_YC_driverwith_1-2'] = $_POST['_YC_driverwith_1-2'];
    $carsMeta['_YC_driverwith_3-4'] = $_POST['_YC_driverwith_3-4'];
    $carsMeta['_YC_driverwith_5-7'] = $_POST['_YC_driverwith_5-7'];
    $carsMeta['_YC_driverwith_8-12'] = $_POST['_YC_driverwith_8-12'];
    $carsMeta['_YC_driverwith_13-30'] = $_POST['_YC_driverwith_13-30'];
    $carsMeta['_YC_driverwith_outofcity'] = $_POST['_YC_driverwith_outofcity'];

    $carsMeta['_YC_driverwithout_1-2'] = $_POST['_YC_driverwithout_1-2'];
    $carsMeta['_YC_driverwithout_3-4'] = $_POST['_YC_driverwithout_3-4'];
    $carsMeta['_YC_driverwithout_5-7'] = $_POST['_YC_driverwithout_5-7'];
    $carsMeta['_YC_driverwithout_8-12'] = $_POST['_YC_driverwithout_8-12'];
    $carsMeta['_YC_driverwithout_13-30'] = $_POST['_YC_driverwithout_13-30'];
    $carsMeta['_YC_driverwithout_outofcity'] = $_POST['_YC_driverwithout_outofcity'];

    $carsMeta['_YC_transfer_price'] = $_POST['_YC_transfer_price'];

    $carsMeta['_YC_motor_power'] = $_POST['_YC_motor_power'];
    $carsMeta['_YC_max_speed'] = $_POST['_YC_max_speed'];
    $carsMeta['_YC_motor_volume'] = $_POST['_YC_motor_volume'];
    $carsMeta['_YC_fuel_tank_volume'] = $_POST['_YC_fuel_tank_volume'];
    $carsMeta['_YC_body'] = $_POST['_YC_body'];
    $carsMeta['_YC_cylinders'] = $_POST['_YC_cylinders'];
    $carsMeta['_YC_trailer'] = $_POST['_YC_trailer'];

    $carsMeta['_YC_product_gallery_ids'] = $_POST['_YC_product_gallery_ids'];
    $carsMeta['_YC_product_galleryfull_ids'] = $_POST['_YC_product_galleryfull_ids'];

    foreach ($carsMeta as $key => $value) {
        if( $post->post_type == 'revision' ) return;
        $value = implode(',', (array)$value);
        if(get_post_meta($post->ID, $key, FALSE)) {
            update_post_meta($post->ID, $key, $value);
        } else {
            add_post_meta($post->ID, $key, $value);
        }
        if(!$value) delete_post_meta($post->ID, $key);
    }
}


/**
 * Include Bootstrap NavWalker
 */

require_once('incl/wp-bootstrap-navwalker-master/wp_bootstrap_navwalker.php');


/**
 * Order Calculator AJAX
 */

add_action( 'wp_ajax_order_calculator', 'orderCalculator' );
add_action( 'wp_ajax_nopriv_order_calculator', 'orderCalculator' );

function orderCalculator() {
    $lentType = (isset($_POST['lentType'])) ? $_POST['lentType'] : '';
    $dateFrom = (isset($_POST['dateFrom'])) ? $_POST['dateFrom'] : '';
    $dateTo = (isset($_POST['dateTo'])) ? $_POST['dateTo'] : '';
    $productID = (isset($_POST['productID'])) ? $_POST['productID'] : '';
    $otherServices = (isset($_POST['otherServices'])) ? $_POST['otherServices'] : '';

    $otherServicePrice = 0;
    if($otherServices) {
        $otherServicesArr = explode(', ', $otherServices);
        foreach($otherServicesArr as $otherService) {
            $otherServicePrice += get_post_meta($otherService, '_YC_services_price', true);
        }
    }

    if($lentType) {
        if($dateFrom && $dateTo) {
            $dateF = strtotime($dateFrom);
            $dateT = strtotime($dateTo);

            $difDate = $dateT - $dateF;
            $dif = floor($difDate/(60*60*24));
            if(!$dif) $dif = 1;

            $otherServicePrice *= $dif;

            if($dif <= 30) {
                $priceByDays = (int)getPriceByDays($lentType, $dif, $productID);
                $totalPrice = $otherServicePrice + ($priceByDays * $dif);
            } else {
                $priceByDays = 1;
                $totalPrice = $otherServicePrice;
            }
        } else {
            $totalPrice = 0;
            $priceByDays = 0;
        }
    }

    echo json_encode(array(
        'totalPrice'    => $totalPrice,
        'dailyPrice'    => $priceByDays,
        'servicesPrice' => $otherServicePrice
    ));

    exit;
}

function getPriceByDays( $l, $d, $i ) {
    if($l == 'Wedding') {
        if($d >= 1 && $d <= 2) { $res = get_post_meta($i, '_YC_wedding_1-2', true); }
        elseif($d >= 3 && $d <= 4) { $res = get_post_meta($i, '_YC_wedding_3-4', true); }
        elseif($d >= 5 && $d <= 7) { $res = get_post_meta($i, '_YC_wedding_5-7', true); }
        elseif($d >= 8 && $d <= 12) { $res = get_post_meta($i, '_YC_wedding_8-12', true); }
        elseif($d >= 13 && $d <= 30) { $res = get_post_meta($i, '_YC_wedding_13-30', true); }
    } elseif($l == 'With Driver') {
        if($d >= 1 && $d <= 2) { $res = get_post_meta($i, '_YC_driverwith_1-2', true); }
        elseif($d >= 3 && $d <= 4) { $res = get_post_meta($i, '_YC_driverwith_3-4', true); }
        elseif($d >= 5 && $d <= 7) { $res = get_post_meta($i, '_YC_driverwith_5-7', true); }
        elseif($d >= 8 && $d <= 12) { $res = get_post_meta($i, '_YC_driverwith_8-12', true); }
        elseif($d >= 13 && $d <= 30) { $res = get_post_meta($i, '_YC_driverwith_13-30', true); }
    } elseif($l == 'Without Driver') {
        if($d >= 1 && $d <= 2) { $res = get_post_meta($i, '_YC_driverwithout_1-2', true); }
        elseif($d >= 3 && $d <= 4) { $res = get_post_meta($i, '_YC_driverwithout_3-4', true); }
        elseif($d >= 5 && $d <= 7) { $res = get_post_meta($i, '_YC_driverwithout_5-7', true); }
        elseif($d >= 8 && $d <= 12) { $res = get_post_meta($i, '_YC_driverwithout_8-12', true); }
        elseif($d >= 13 && $d <= 30) { $res = get_post_meta($i, '_YC_driverwithout_13-30', true); }
    } elseif($l == 'Transfer'){
        $res = get_post_meta($i, '_YC_transfer_price', true);
    }

    if(!$res) {
        return 1;
    } else {
        return $res;
    }
}

/**
 * Order Send AJAX
 */

add_action( 'wp_ajax_order_send', 'orderSend' );
add_action( 'wp_ajax_nopriv_order_send', 'orderSend' );

function orderSend() {
    $lentType = (isset($_POST['lentType'])) ? $_POST['lentType'] : '';
    $dateFrom = (isset($_POST['dateFrom'])) ? $_POST['dateFrom'] : '';
    $dateTo = (isset($_POST['dateTo'])) ? $_POST['dateTo'] : '';
    $productID = (isset($_POST['productID'])) ? $_POST['productID'] : '';
    $otherServices = (isset($_POST['otherServices'])) ? $_POST['otherServices'] : '';

    $userName = (isset($_POST['userName'])) ? $_POST['userName'] : '';
    $userAddress = (isset($_POST['userAddress'])) ? $_POST['userAddress'] : '';
    $userCity = (isset($_POST['userCity'])) ? $_POST['userCity'] : '';
    $userPhone = (isset($_POST['userPhone'])) ? $_POST['userPhone'] : '';
    $userEmail = (isset($_POST['userEmail'])) ? $_POST['userEmail'] : '';
    $userNotes = (isset($_POST['userNotes'])) ? $_POST['userNotes'] : '';

    $adminEmail = get_option('admin_email');
    $productName = get_the_title($productID);

    $otherServiceNamesArr = [];
    if($otherServices) {
        $otherServicesArr = explode(', ', $otherServices);
        foreach($otherServicesArr as $otherService) {
            array_push($otherServiceNamesArr, get_the_title($otherService));
        }
        $otherServiceNames = implode( ', <br>', $otherServiceNamesArr );
    }

    if(!$userName || !$userAddress || !$userCity || !$userPhone || !$userEmail || !$dateFrom || !$dateTo) {
        echo json_encode( array( 'status' => 'error', 'statusText' => __( 'Fill all the required fields', 'yerevancar' ) ) );
        exit;
    } else {
        if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
            echo json_encode( array( 'status' => 'error', 'statusText' => __( 'Email address is not correct', 'yerevancar' ) ) );
            exit;
        }
        if (!preg_match('/^[0-9\(\)\+]+$/', $userPhone)){
            echo json_encode( array( 'status' => 'error', 'statusText' => __( 'Phone number is not correct', 'yerevancar' ) ) );
            exit;
        }
    }

    date_default_timezone_set( 'Asia/Yerevan' );
    $today = date( 'd.m.Y, H:i' );

    $message = '
    <!DOCTYPE html><html><head><meta charset="utf-8"><title>' . __( 'Order', 'yerevancar' ) . '</title></head>
    <body>
    <table style="width:50%">
        <tr><th colspan="2"><h2>' . $productName . '</h2></td></tr>
        <tr><th>' . __( 'Pick Up', 'yerevancar' ) . '</th><td>' . $dateFrom . '</td></tr>
        <tr><th>' . __( 'Return', 'yerevancar' ) . '</th><td>' . $dateTo . '</td></tr>
        <tr><th>' . __( 'Rent Type', 'yerevancar' ) . '</th><td>' . $lentType . '</td></tr>
        <tr><th>' . __( 'Full Name', 'yerevancar' ) . '</th><td>' . $userName . '</td></tr>
        <tr><th>' . __( 'Address', 'yerevancar' ) . '</th><td>' . $userAddress . '</td></tr>
        <tr><th>' . __( 'City', 'yerevancar' ) . '</th><td>' . $userCity . '</td></tr>
        <tr><th>' . __( 'Phone', 'yerevancar' ) . '</th><td>' . $userPhone . '</td></tr>
        <tr><th>' . __( 'E-Mail', 'yerevancar' ) . '</th><td>' . $userEmail . '</td></tr>
        <tr><th>' . __( 'Notes', 'yerevancar' ) . '</th><td>' . $userNotes . '</td></tr>
        <tr><th>' . __( 'Other Services', 'yerevancar' ) . '</th><td>' . $otherServiceNames . '</td></tr>
    </table>
    </body>
    </html>
    ';

    $from = $adminEmail;
    $to = $adminEmail;
    $subject = __( 'Order', 'yerevancar' ) . ' - ' . $today;
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; utf-8' . "\r\n";
    $headers .= 'From: Yerevan Car <' . $from . '>' . "\r\n";

    if(mail($to, $subject, $message, $headers)) {
        echo json_encode( array( 'status' => 'success', 'statusText' => __( 'Order is sent successfully', 'yerevancar' ) ) );
        exit;
    } else {
        echo json_encode( array( 'status' => 'error', 'statusText' => __( 'Order is not sent successfully', 'yerevancar' ) ) );
        exit;
    }

}


/**
 * Create Keywords
 */

function post_keywords() {
    $posttags = get_the_tags();
    $post_keywords = [];
    foreach((array)$posttags as $tag) {
        array_push($post_keywords, $tag->name);
        $keywords = implode(', ', $post_keywords);
    }
    return $keywords;
}


/**
 * Pagination
 */

function pagination($pages = '', $range = 3) {
    $showitems = ($range * 2) + 1;
    global $paged;
    if (empty($paged)) $paged = 1;
    if ($pages == '') {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if (!$pages) {
            $pages = 1;
        }
    }
    if (1 != $pages) {
        echo '<div class="paged">';
        if ($paged > 2 && $paged > $range + 1 && $showitems < $pages) echo '<a href="' . get_pagenum_link(1) . '">&laquo;</a>';
        if ($paged > 1 && $showitems < $pages) echo "<a href='" . get_pagenum_link($paged - 1) . "'>&lsaquo;</a>";
        for ($i = 1; $i <= $pages; $i++) {
            if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)) {
                echo ($paged == $i) ? '<span>' . $i . '</span>' : '<a href="' . get_pagenum_link($i) . '" >' . $i . '</a>';
            }
        }
        if ($paged < $pages && $showitems < $pages) echo '<a href="' . get_pagenum_link($paged + 1) . '">&rsaquo;</a>';
        if ($paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages) echo '<a href="' . get_pagenum_link($pages) . '">&raquo;</a>';
        echo '</div>';
    }
}


/**
 * Include Tags Into Search Result
 */

add_filter( 'posts_search', 'my_smart_search', 500, 2 );
function my_smart_search( $search, &$wp_query ) {
    global $wpdb;

    if ( empty( $search )) return $search;

    $terms = $wp_query->query_vars[ 's' ];
    $exploded = explode( ' ', $terms );
    if( $exploded === FALSE || count( $exploded ) == 0 )
        $exploded = array( 0 => $terms );

    $search = '';
    foreach( $exploded as $tag ) {
        $search .= " AND (
            (wp_posts.post_title LIKE '%$tag%')
            OR (wp_posts.post_content LIKE '%$tag%')
            OR EXISTS
            (
                SELECT * FROM wp_terms
                INNER JOIN wp_term_taxonomy
                    ON wp_term_taxonomy.term_id = wp_terms.term_id
                INNER JOIN wp_term_relationships
                    ON wp_term_relationships.term_taxonomy_id = wp_term_taxonomy.term_taxonomy_id
                WHERE taxonomy = 'post_tag'
                    AND object_id = wp_posts.ID
                    AND wp_terms.name LIKE '%$tag%'
            )
        )";
    }
    return $search;
}