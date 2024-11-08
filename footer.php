<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */
$options = get_option('sample_theme_options');
?>
<footer class="footer-section">
    <div class="copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 text-center text-lg-left">
                    <div class="copyright-text">
                        <p>Copyright &copy; 2024, All Right Reserved <a href="#/">Mehdi Ali</a></p>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 d-none d-lg-block text-right">
                    <div class="footer-menu">
                        <?php
                        $defaults = array(
                            'theme_location' => '',
                            'menu' => 'main_menu',
                            'container' => '',
                            'container_class' => '',
                            'container_id' => '',
                            'menu_class' => '',
                            'menu_id' => '',
                            'echo' => true,
                            'fallback_cb' => '',
                            'before' => '',
                            'after' => '',
                            'link_before' => '',
                            'link_after' => '',
                            'items_wrap' => '<ul>%3$s</ul>',
                            'depth' => 5,
                            'walker' => ''
                        );
                        wp_nav_menu($defaults);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>


<script src="<?php echo get_template_directory_uri(); ?>/assets/js/xJquery.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/script.js"></script>

</body>

</html>