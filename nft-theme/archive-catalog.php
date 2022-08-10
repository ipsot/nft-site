<!---->
<!--Template name: Каталог-->

<?php

get_header();
?>
<div class="container marketing py-3">
    <div class="container marketing py-3">
        <ul class="list-group list-group-horizontal flex-fill">
            <?php $catalog_types = get_terms(array('taxonomy' => 'catalog-type', 'hide_empty' => false));

            foreach ($catalog_types as $catalog) {
                echo '<li><button >' . $catalog->name . '</button></li>';

            }


            $j = 0;
            $active = '';
            foreach ($catalog_types as $category) {
                if ($j == 0) {
                    $active = 'active';
                } else {
                    $active = '';
                }
                $j++;
            }
            ?>

            <!--        <li class="list-group-item flex-fill">Dapibus ac facilisis in</li>-->
            <!--        <li class="list-group-item flex-fill">Morbi leo risus</li>-->
        </ul>
    </div>


    <?php
    $i = 0;
    $current = '';
    foreach ($catalog_types as $category_type) {
        if ($i == 0) {
            $current = 'active';
        } else {
            $current = '';
        }
        ?>

        <div class="tabs__content <?php echo esc_attr($current) ?>">
            <ul class="services__list">
                <?php

                $service = new WP_Query(array(
                    'post_type' => 'catalog',
                    'posts_per_page' => -1,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'catalog-type',
                            'field' => 'slug',
                            'terms' => $category_type->slug
                        )
                    )
                ));
                if ($service->have_posts()):
                    while ($service->have_posts()):
                        $service->the_post();
                        ?>
                        <div class="row featurette">

                            <div class="col-md-7">
                                <h2 class="featurette-heading"><?php the_title(); ?> </h2>
                                <p class="lead"><?php the_content(); ?></p>
                            </div>
                            <div class="col-md-5">

                                <?php echo get_the_post_thumbnail(get_the_ID(), 'catalog-thumb'); ?>
                                <?php the_terms(get_the_ID(), 'catalog-thumb', '', '', ''); ?>

                            </div>
                            <a href="<?php the_permalink() ?>" class="icon-link">
                                Call to action
                                <svg class="bi" width="1em" height="1em">
                                    <use xlink:href="#chevron-right"></use>
                                </svg>
                            </a>
                        </div>
                        <hr class="featurette-divider">

                    <?php endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </ul>
        </div>
</div>

        <?php
        $i++;
    }

    ?>

<!---->
<!--    <div class="container marketing py-3">-->
<!---->
<!--        --><?php
//        if (have_posts()):
//            while (have_posts()):the_post(); ?>
<!--                <div class="row featurette">-->
<!---->
<!--                    <div class="col-md-7">-->
<!--                        <h2 class="featurette-heading">--><?php //the_title(); ?><!-- </h2>-->
<!--                        <p class="lead">--><?php //the_content(); ?><!--</p>-->
<!--                    </div>-->
<!--                    <div class="col-md-5">-->
<!--                        --><?php //echo get_the_post_thumbnail(get_the_ID(), 'catalog-thumb'); ?>
<!---->
<!--                    </div>-->
<!--                    <a href="--><?php //echo home_url("/") . 'catalogs/' . the_title() ?><!--" class="icon-link">-->
<!--                        Call to action-->
<!--                        <svg class="bi" width="1em" height="1em">-->
<!--                            <use xlink:href="#chevron-right"></use>-->
<!--                        </svg>-->
<!--                    </a>-->
<!--                </div>-->
<!---->
<!---->
<!--                <hr class="featurette-divider">-->
<!---->
<!---->
<!--            --><?php //endwhile;
//        else:echo "Нет статей";
//        endif;
//
//        ?>
<!---->
<!---->
<!--    </div>-->


    <?php
    get_footer();
    ?>

