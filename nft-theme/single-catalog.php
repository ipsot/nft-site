<?php get_header();
?>

<div class="container marketing py-3">
    <?php
    if (have_posts()):
        while (have_posts()):the_post(); ?>

            <div class="row featurette">
                <?php $image_data=nft_get_attachment(get_post_thumbnail_id(get_the_ID())) ?>
                <div class="col-md-7">
                    <h2 class="featurette-heading"><?php the_title();?> </h2>
                    <p class="blog-post-meta">January 1, 2021 by <a href="#">Mark</a></p>
                    <p class="lead"><?php the_content();?></p>
                </div>
                <div class="col-md-5">
                    <?php echo get_the_post_thumbnail(get_the_ID(),'catalog-thumb');?>

                </div>
            </div>


            <hr class="featurette-divider">



        <?php endwhile;
    else:echo "Нет продукции";
    endif;

    ?>



</div>

<?php
get_footer();
?>
