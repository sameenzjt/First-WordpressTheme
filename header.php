<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php if ( is_home() ) {
                bloginfo('name'); echo " - "; bloginfo('description');
            } elseif ( is_category() ) {
                single_cat_title(); echo " - "; bloginfo('name');
            } elseif (is_single() || is_page() ) {
                single_post_title();
            } elseif (is_search() ) {
                echo "搜索结果"; echo " - "; bloginfo('name');
            } elseif (is_404() ) {
                echo '页面未找到!';
            } else {
                wp_title('',true);
            } ?>
    </title>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
    <link href="<?php bloginfo('template_url'); ?>/res/css/m.css" rel="stylesheet">
    <link href="<?php bloginfo('template_url'); ?>/res/css/bootstrap.min.css" rel="stylesheet">
    <script src="<?php bloginfo('template_url'); ?>/res/js/comm.js"></script>
    <link rel="alternate" type="application/rss+xml" title="RSS 2.0 - 所有文章" href="<?php echo get_bloginfo('rss2_url'); ?>" />
    <link rel="alternate" type="application/rss+xml" title="RSS 2.0 - 所有评论" href="<?php bloginfo('comments_rss2_url'); ?>" />
    <style type="text/css">
    body{
        background-color: #f2f2f2;
    }
    </style>
    <?php wp_head(); ?>
</head>
<?php flush(); ?>
<body>
<nav class="navbar navbar-expand-md bg-dark navbar-dark <?php echo of_get_option('navbar-fixed-select', 'fixed-top'); ?>">
    <a class="navbar-brand" href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a><!--页眉网站标题-->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <?php 
        if(function_exists('wp_nav_menu')) {
            wp_nav_menu(array(
                'theme_location' => 'top-menu',
                'container_id'=> 'collapsibleNavbar',
                'container_class'=> 'collapse navbar-collapse justify-content-end',
                'menu_class' => 'navbar-nav',
                'menu_id' => 'navbar-nav',
            ));
        }?>

 
</nav>