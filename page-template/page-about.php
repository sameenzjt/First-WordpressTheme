<?php
/*
Template Name: 关于
*/
?>
<?php get_header(); ?>
<article>
    <?php if (have_posts()) : the_post(); update_post_caches($posts); ?>
        <h2 class="text-center"><?php the_title(); ?></h2>
        <div class="whitebg">
            <?php the_content() ?>
        </div>
        
    <?php else : ?>
        <div class="grid_8">
            没有找到你想要的页面！
        </div>
    <?php endif; ?>

</article>
<?php get_footer(); ?>