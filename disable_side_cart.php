add_action('wp_footer', 'disable_side_cart_popup');

function disable_side_cart_popup() {
    ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Disable default AJAX behavior for the side cart if the theme/plugin uses it
            jQuery('body').on('adding_to_cart', function(e) {
                e.preventDefault(); // Prevent the side cart from popping up
            });
            
            // Redirect the basket button to the cart page directly
            let menuCartLink = document.querySelector('#elementor-menu-cart__toggle_button');
            let cartPageUrl = '<?php echo esc_url(wc_get_cart_url()); ?>';

            if (menuCartLink) {
                menuCartLink.addEventListener('click', function(event) {
                    window.location.href = cartPageUrl;
                });
            }
        });
    </script>
    <?php
}
