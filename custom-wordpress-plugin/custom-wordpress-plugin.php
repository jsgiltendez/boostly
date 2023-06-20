<?php
/*
Plugin Name: Custom Listing Plugin
Description: Custom plugin for creating listings with taxonomies.
Version: 1.0
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
