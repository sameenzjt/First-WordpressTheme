<?php get_header(); ?>

<article> 
<!--lbox begin-->
<div class="lbox">
    <nav class="breadcrumb">
    <?php if(function_exists('cmp_breadcrumbs')) cmp_breadcrumbs();?>
    </nav>
    <div class="content_box whitebg">
        <h1><?php the_title(); ?></h1> 
        <p class="bloginfo">
            <i class="avatar">
                <img src="images/avatar.jpg">
            </i>
            <span><?php the_author_posts_link(); ?></span>
            <span><?php the_time('Y-n-j') ?></span>
            <span>
                13814人已围观
            </span>
            <span><?php the_tags('标签：', ', ', ''); ?></span>
            <span><?php comments_popup_link('0 条评论', '1 条评论', '% 条评论', '', '评论已关闭'); ?></span>
            <span><?php edit_post_link('编辑', ' • ', ''); ?></span>
        </p>
        <div class="con_text">
        <?php if (have_posts()) : the_post(); update_post_caches($posts); ?>
            <?php the_content(); ?>
        </div>
        <?php else : ?>
	        <div class="errorbox">
		        没有文章！
	        </div>
	    <?php endif; ?>
        <div class="alert alert-dark">
            如未标明出处，所有文章均为本站原创。
            <br>
            如需转载，请附上原文地址：<a href="#">VlogHub » Adobe CC 2019 软件下载及使用方法【终极全解篇】</a>
        </div>
    </div>
    <div class="ad whitebg">
        <a href="https://promotion.aliyun.com/ntms/yunparter/invite.html?userCode=l1qstn8f" target="_blank">
            <img src="<?php bloginfo('template_url'); ?>/images/49acdd088cf7c28b71c7ac0d674a00e2.png" border="0" alt="">
        </a>
    </div>
    <div class="whitebg">
        <h2 class="htitle">相关文章</h2>
        <ul class="otherlink">
            <li><a href="#" title="7年，一个80后女站长与阿里云携手创业的真实故事" target="_blank">7年，一个80后女站长与阿里云携手创业的真实故事</a></li> 
            <li><a href="#" title="个人博客，我为什么要用帝国cms？" target="_blank">个人博客，我为什么要用帝国cms？</a> </li>
            <li><a href="#" title="【告别2018】耕耘才有所得，付出才有收获" target="_blank">【告别2018】耕耘才有所得，付出才有收获</a></li>
            <li><a href="#" title="YzmCMS轻量级开源CMS系统推荐" target="_blank">YzmCMS轻量级开源CMS系统推荐</a></li>
            <li><a href="#" title="网易博客关闭，何不从此开始潇洒行走江湖！" target="_blank">网易博客关闭，何不从此开始潇洒行走江湖！</a></li>
            <li><a href="#" title="个人网站做好了，百度不收录怎么办？来，看看他们怎么做的。" target="_blank">个人网站做好了，百度不收录怎么办？来，看看他们怎么做的。</a></li>
            <li><a href="#" title="我是怎么评价自己的？" target="_blank">我是怎么评价自己的？</a></li>
            <li><a href="#" title="华仔seo 一个专业网站优化的站长展示技能的平台" target="_blank">华仔seo 一个专业网站优化的站长展示技能的平台</a></li>
            <li><a href="#" title="《野蚂蚁》卜野 原创个人博客-撰写互联网人的工作与生活" target="_blank">《野蚂蚁》卜野 原创个人博客-撰写互联网人的工作与生活</a></li>
            <li><a href="#" title="制作个人博客，我是这么收费的？" target="_blank">制作个人博客，我是这么收费的？</a></li>
        </ul>
    </div>
</div>
</article>

<?php get_footer(); ?>