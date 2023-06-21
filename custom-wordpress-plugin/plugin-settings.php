<?php
// Callback function to display the settings page content
function custom_listing_plugin_settings_callback() {
    // Handle the import listings form submission
    if (isset($_POST['import_listings'])) {
        // Process the CSV file and import listings
        import_listings_from_csv();
    }
    ?>
    <div class="wrap">
        <h1>Custom Listing Plugin Settings</h1>
        <form method="post" enctype="multipart/form-data">
            <h2>Import Listings</h2>
            <p>Select a CSV file to import listings:</p>
            <input type="file" name="csv_file" accept=".csv" required>
            <p><em>Please make sure the CSV file is formatted correctly.</em></p>
            <input type="submit" name="import_listings" value="Import Listings" class="button button-primary">
        </form>
    </div>
    <?php
}
add_action('admin_menu', 'custom_listing_plugin_settings_page');

// Add the plugin settings page
function custom_listing_plugin_settings_page() {
    add_submenu_page(
        'options-general.php',
        'Custom Listing Plugin Settings',
        'Custom Listing Plugin',
        'manage_options',
        'custom-listing-plugin-settings',
        'custom_listing_plugin_settings_callback'
    );
}