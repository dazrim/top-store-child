<?php
function enqueue_parent_theme_styles() {
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'enqueue_parent_theme_styles');


function save_phone_number_to_database($user_id) {
    if (isset($_POST['account_phone_number'])) {
        // Sanitize the phone number before saving it to the database
        $phone_number = sanitize_text_field($_POST['account_phone_number']);

        // Update the user meta with the phone number
        update_user_meta($user_id, 'user_phone_number', $phone_number);
    }
}

add_action('woocommerce_save_account_details', 'save_phone_number_to_database');
