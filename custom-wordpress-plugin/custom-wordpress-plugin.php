<?php
/*
Plugin Name: Custom Listing Plugin
Description: Custom plugin for creating listings with taxonomies.
Version: 2.1
Author: Jason 
*/


// Register Custom Post Type
function custom_listing_post_type() {
    $labels = array(
        'name'                  => 'Listings',
        'singular_name'         => 'Listing',
        'menu_name'             => 'Listings',
        'name_admin_bar'        => 'Listing',
        'archives'              => 'Listing Archives',
        'attributes'            => 'Listing Attributes',
        'parent_item_colon'     => 'Parent Listing:',
        'all_items'             => 'All Listings',
        'add_new_item'          => 'Add New Listing',
        'add_new'               => 'Add New',
        'new_item'              => 'New Listing',
        'edit_item'             => 'Edit Listing',
        'update_item'           => 'Update Listing',
        'view_item'             => 'View Listing',
        'view_items'            => 'View Listings',
        'search_items'          => 'Search Listing',
        'not_found'             => 'No listings found',
        'not_found_in_trash'    => 'No listings found in Trash',
        'featured_image'        => 'Featured Image',
        'set_featured_image'    => 'Set featured image',
        'remove_featured_image' => 'Remove featured image',
        'use_featured_image'    => 'Use as featured image',
        'insert_into_item'      => 'Insert into listing',
        'uploaded_to_this_item' => 'Uploaded to this listing',
        'items_list'            => 'Listings list',
        'items_list_navigation' => 'Listings list navigation',
        'filter_items_list'     => 'Filter listings list',
    );
    $args = array(
        'label'                 => 'Listing',
        'description'           => 'Custom Listing',
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        'taxonomies'            => array( 'city', 'country', 'states' ),
        'public'                => true,
        'hierarchical'          => false,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-list-view',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
    );
    register_post_type( 'listing', $args );
}
add_action( 'init', 'custom_listing_post_type', 0 );


// Add custom columns to the post type table
function custom_listing_columns($columns) {
    $columns['listing_price'] = 'Price';
    $columns['listing_id'] = 'Listing ID';
    return $columns;
}
add_filter('manage_listing_posts_columns', 'custom_listing_columns');

// Populate custom columns with data
function custom_listing_column_data($column, $post_id) {
    switch ($column) {
        case 'listing_price':
            $listing_price = get_post_meta($post_id, 'price', true);
            echo $listing_price;
            break;

        case 'listing_id':
            $listing_id = get_post_meta($post_id, 'listing_id', true);
            echo $listing_id;
            break;
    }
}
add_action('manage_listing_posts_custom_column', 'custom_listing_column_data', 10, 2);




// Register Taxonomy for City
function custom_listing_city_taxonomy() {
    $labels = array(
        'name'                       => 'Cities',
        'singular_name'              => 'City',
        'menu_name'                  => 'Cities',
        'all_items'                  => 'All Cities',
        'parent_item'                => 'Parent City',
        'parent_item_colon'          => 'Parent City:',
        'new_item_name'              => 'New City Name',
        'add_new_item'               => 'Add New City',
        'edit_item'                  => 'Edit City',
        'update_item'                => 'Update City',
        'view_item'                  => 'View City',
        'separate_items_with_commas' => 'Separate cities with commas',
        'add_or_remove_items'        => 'Add or remove cities',
        'choose_from_most_used'      => 'Choose from the most used cities',
        'popular_items'              => 'Popular Cities',
        'search_items'               => 'Search Cities',
        'not_found'                  => 'No cities found',
        'no_terms'                   => 'No cities',
        'items_list'                 => 'Cities list',
        'items_list_navigation'      => 'Cities list navigation',
    );
    $args = array(
        'labels'            => $labels,
        'hierarchical'      => false,
        'public'            => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud'     => true,
    );
    register_taxonomy( 'city', 'listing', $args );
}
add_action( 'init', 'custom_listing_city_taxonomy', 0 );

// Register Taxonomy for Country
function custom_listing_country_taxonomy() {
    $labels = array(
        'name'                       => 'Countries',
        'singular_name'              => 'Country',
        'menu_name'                  => 'Countries',
        'all_items'                  => 'All Countries',
        'parent_item'                => 'Parent Country',
        'parent_item_colon'          => 'Parent Country:',
        'new_item_name'              => 'New Country Name',
        'add_new_item'               => 'Add New Country',
        'edit_item'                  => 'Edit Country',
        'update_item'                => 'Update Country',
        'view_item'                  => 'View Country',
        'separate_items_with_commas' => 'Separate countries with commas',
        'add_or_remove_items'        => 'Add or remove countries',
        'choose_from_most_used'      => 'Choose from the most used countries',
        'popular_items'              => 'Popular Countries',
        'search_items'               => 'Search Countries',
        'not_found'                  => 'No countries found',
        'no_terms'                   => 'No countries',
        'items_list'                 => 'Countries list',
        'items_list_navigation'      => 'Countries list navigation',
    );
    $args = array(
        'labels'            => $labels,
        'hierarchical'      => false,
        'public'            => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud'     => true,
    );
    register_taxonomy( 'country', 'listing', $args );
}
add_action( 'init', 'custom_listing_country_taxonomy', 0 );

// Register Taxonomy for States
function custom_listing_states_taxonomy() {
    $labels = array(
        'name'                       => 'States',
        'singular_name'              => 'State',
        'menu_name'                  => 'States',
        'all_items'                  => 'All States',
        'parent_item'                => 'Parent State',
        'parent_item_colon'          => 'Parent State:',
        'new_item_name'              => 'New State Name',
        'add_new_item'               => 'Add New State',
        'edit_item'                  => 'Edit State',
        'update_item'                => 'Update State',
        'view_item'                  => 'View State',
        'separate_items_with_commas' => 'Separate states with commas',
        'add_or_remove_items'        => 'Add or remove states',
        'choose_from_most_used'      => 'Choose from the most used states',
        'popular_items'              => 'Popular States',
        'search_items'               => 'Search States',
        'not_found'                  => 'No states found',
        'no_terms'                   => 'No states',
        'items_list'                 => 'States list',
        'items_list_navigation'      => 'States list navigation',
    );
    $args = array(
        'labels'            => $labels,
        'hierarchical'      => false,
        'public'            => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud'     => true,
    );
    register_taxonomy( 'states', 'listing', $args );
}
add_action( 'init', 'custom_listing_states_taxonomy', 0 );

// Register Taxonomy for Amenities
function custom_listing_amenities_taxonomy() {
    $labels = array(
        'name'                       => 'Amenities',
        'singular_name'              => 'Amenity',
        'menu_name'                  => 'Amenities',
        'all_items'                  => 'All Amenities',
        'edit_item'                  => 'Edit Amenity',
        'view_item'                  => 'View Amenity',
        'update_item'                => 'Update Amenity',
        'add_new_item'               => 'Add New Amenity',
        'new_item_name'              => 'New Amenity Name',
        'parent_item'                => 'Parent Amenity',
        'parent_item_colon'          => 'Parent Amenity:',
        'search_items'               => 'Search Amenities',
        'popular_items'              => 'Popular Amenities',
        'separate_items_with_commas' => 'Separate amenities with commas',
        'add_or_remove_items'        => 'Add or remove amenities',
        'choose_from_most_used'      => 'Choose from the most used amenities',
        'not_found'                  => 'No amenities found',
        'no_terms'                   => 'No amenities',
        'items_list'                 => 'Amenities list',
        'items_list_navigation'      => 'Amenities list navigation',
    );
    $args = array(
        'labels'            => $labels,
        'hierarchical'      => false,
        'public'            => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud'     => true,
    );
    register_taxonomy( 'amenities', 'listing', $args );
}
add_action( 'init', 'custom_listing_amenities_taxonomy', 0 );

// Register Taxonomy for Listing Type
function custom_listing_type_taxonomy() {
    $labels = array(
        'name'                       => 'Listing Types',
        'singular_name'              => 'Listing Type',
        'menu_name'                  => 'Listing Types',
        'all_items'                  => 'All Listing Types',
        'parent_item'                => 'Parent Listing Type',
        'parent_item_colon'          => 'Parent Listing Type:',
        'new_item_name'              => 'New Listing Type Name',
        'add_new_item'               => 'Add New Listing Type',
        'edit_item'                  => 'Edit Listing Type',
        'update_item'                => 'Update Listing Type',
        'view_item'                  => 'View Listing Type',
        'separate_items_with_commas' => 'Separate listing types with commas',
        'add_or_remove_items'        => 'Add or remove listing types',
        'choose_from_most_used'      => 'Choose from the most used listing types',
        'popular_items'              => 'Popular Listing Types',
        'search_items'               => 'Search Listing Types',
        'not_found'                  => 'No listing types found',
        'no_terms'                   => 'No listing types',
        'items_list'                 => 'Listing Types list',
        'items_list_navigation'      => 'Listing Types list navigation',
    );
    $args = array(
        'labels'            => $labels,
        'hierarchical'      => false,
        'public'            => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud'     => true,
    );
    register_taxonomy( 'listing_type', 'listing', $args );
}
add_action( 'init', 'custom_listing_type_taxonomy', 0 );


function import_listings_from_csv() {
    // Check if the form is submitted
    if ( isset( $_POST['import_listings'] ) ) {
        $skipHeader = true;

        // Retrieve the uploaded CSV file
        $file = $_FILES['csv_file']['tmp_name'];

        // Check if a file is uploaded
        if ( ! empty( $file ) ) {
            // Read the CSV file
            if ( ( $handle = fopen( $file, 'r' ) ) !== false ) {
                // Loop through each row in the CSV file
                while ( ( $data = fgetcsv( $handle ) ) !== false ) {
                    if($skipHeader) {
                        $skipHeader = false;
                        continue; 
                    }

                    // Extract the data from the CSV row
                    $listing_id = $data[0];
                    $title = $data[1];
                    $type = $data[2];

                    $description = $data[3];

                    $guest =  $data[4];
                    $no_of_rooms=  $data[5];
                    $no_of_beds =  $data[6];
                    $no_of_baths =  $data[7];

                    $address=  $data[8];
                    $city = $data[9];
                    $country = $data[10];
                    $amenities = $data[11];
                    $price = $data[12];
                    $currency = $data[13];
                    $featured_image_url = $data[14];
                    $latitude = $data[16];
                    $longitude = $data[17];


                    


                   
                    // $state = 

                    // Create the listing post
                    $post_data = array(
                        'post_title'   => $title,
                        'post_content'   => $description,
                        'post_status'  => 'publish',
                        'post_type'    => 'listing',
                    );

                    // Insert the listing post
                    $post_id = wp_insert_post( $post_data );

                    // Set the listing taxonomies
                    if ( $post_id ) {
                        wp_set_post_terms( $post_id, $city, 'city', true );
                        wp_set_post_terms( $post_id, $country, 'country', true );
                        wp_set_post_terms( $post_id, $type, 'listing_type', true );
                        // wp_set_post_terms( $post_id, $state, 'states', true );

                        // Process amenities and create terms
                        $amenities_arr = explode(',', $amenities);

                        foreach ($amenities_arr as $amenity) {
                            $amenity = trim($amenity); // Remove leading/trailing spaces
                            if(str_starts_with($amenity, "and"))  $amenity = substr_replace($amenity, '',  0, 3);

                            if (!empty($amenity)) {
                                // Create a new term or get the existing term
                                $term = term_exists($amenity, 'amenities');

                                if (!$term) {
                                    $term = wp_insert_term($amenity, 'amenities');
                                }

                                if (!is_wp_error($term) && isset($term['term_id'])) {
                                    // Assign the term to the listing
                                    wp_set_object_terms($post_id, (int) $term['term_id'], 'amenities', true);
                                }
                            }
                        }


                            // Set custom fields as post meta
                            update_post_meta($post_id, 'listing_id', $listing_id);
                            update_post_meta($post_id, 'price', $price);
                            update_post_meta($post_id, 'currency', $currency);
                            update_post_meta($post_id, 'latitude', $latitude);
                            update_post_meta($post_id, 'longitude', $longitude);
                            update_post_meta($post_id, 'address', $address);

                            update_post_meta($post_id, 'guest', $guest);
                            update_post_meta($post_id, 'no_of_rooms', $no_of_rooms);
                            update_post_meta($post_id, 'no_of_beds', $no_of_beds);
                            update_post_meta($post_id, 'no_of_baths', $no_of_baths);
                            update_post_meta($post_id, 'featured_image_url', $featured_image_url);

                            // Import the featured image
                            if ( ! empty( $featured_image_url ) ) {
                                //media_sideload_image returns 2 types of data, you need to change it to id
                                $image_id = media_sideload_image( $featured_image_url, $post_id, '', 'id'); 
                                if ( ! is_wp_error( $image_id ) ) {
                                    // Set the featured image   
                                    set_post_thumbnail( $post_id, $image_id );
                                }
                            }

                    }



                }

                // Close the CSV file
                fclose( $handle );

                // show_message("Import Successful");
                // Redirect to a success page
                wp_redirect( "edit.php?post_type=listing" );
                exit;
            } else {
                // Error opening the CSV file
                wp_die( 'Error opening the CSV file.' );
            }
        } else {
            // No file uploaded
            wp_die( 'Please upload a CSV file.' );
        }
    }
}
add_action( 'admin_post_import_listings', 'import_listings_from_csv' );

function custom_listing_import_csv_page() {
    ?>
    <div class="wrap">
        <h1>Import Listings</h1>
        <form method="POST" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" enctype="multipart/form-data">
            <input type="hidden" name="action" value="import_listings">
            <table class="form-table">
                <tr>
                    <th scope="row">
                        <label for="csv_file">CSV File:</label>
                    </th>
                    <td>
                        <input type="file" name="csv_file" id="csv_file" accept=".csv">
                    </td>
                </tr>
            </table>
            <p class="submit">
                <input type="submit" name="import_listings" class="button button-primary" value="Import Listings">
            </p>
        </form>
    </div>
    <?php
}

function custom_listing_import_csv() {
    add_submenu_page(
        'edit.php?post_type=listing',
        'Import Listings',
        'Import Listings',
        'manage_options',
        'custom_listing_import_csv',
        'custom_listing_import_csv_page'
    );
}
add_action('admin_menu', 'custom_listing_import_csv');

