<?php
/*
Template Name: 隐私政策
*/
?>
<?php get_header(); ?>
<article>
    <?php if (have_posts()) : the_post(); update_post_caches($posts); ?>
        
    <div class="whitebg">
        <h1 class="text-center"><?php the_title(); ?></h1>
        <div class="alert alert-info">
            <strong>版本生效日期：<?php the_time('Y年n月j日') ?></strong>
        </div>

        <?php the_content() ?>
    </div>
        
    <?php else : ?>
        <div class="grid_8">
            没有找到你想要的页面！
        </div>
    <?php endif; ?>

</article>
<?php get_footer(); ?>