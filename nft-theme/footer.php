<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package NFT_Theme
 */

?>

<?php global $nft_option; ?>

<footer class="d-flex  justify-content-around  py-3  border-top">


        <p class="text-info"><?php echo $nft_option['footer-copyright']?></p>

        <?php
        wp_nav_menu(array(
            'theme_location' => 'menu-footer',
            'menu_id' => 'nav_menu',
            'menu_class' => 'nav col-md-3 pb-3 mb-3',
            'container' => ''
        ))
        ?>

    <div>
        <a href="tel:<?php echo $nft_option['footer_phone_label']?>"></a>
        <p class="text-info"><?php echo $nft_option['footer_address']?></p>
        <p class="text-info"><?php echo $nft_option['footer_phone_label']?></p>
        <p class="text-info"><?php echo $nft_option['footer-email']?></p>
    </div>

        <ul class="nav col-md-2  list-unstyled d-flex">
            <?php
            $social_links = $nft_option['social_links'];
            foreach ($social_links as $social => $link) {
                $svg = '';
                if ($social == 'Facebook Link')
                    $svg = '#facebook';
                elseif ($social == 'Twitter')
                    $svg = '#twitter';
                elseif ($social == 'Instagram')
                    $svg = '#instagram';
                ?>
                <li class="ms-3">
                    <a class="text-info" target="_blank" href="<?php echo $link; ?>">
                        <svg class="bi" width="24" height="24">
                            <use xlink:href="<?php echo $svg; ?>"></use>
                        </svg>
                    </a>
                </li>
                <?php
            }
            ?>

        </ul>


</footer>

<?php wp_footer(); ?>

</body>
</html>
