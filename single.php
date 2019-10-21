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
        
<!--文章内容-->
        <div class="con_text">
        <?php if (have_posts()) : the_post(); update_post_caches($posts); ?>
            <?php the_content(); ?>
        </div>
        <?php else : ?>
	        <div class="errorbox">
		        没有文章！
	        </div>
	    <?php endif; ?>
<!--下载-->
        <div class="row">
            <?php

                if (is_single()) {

                    // 自定义字段名称为 _file_name_value
                    $file_name = get_post_meta($post->ID, "_file_name_value", true);

                    // 自定义字段名称为 _file_size_value
                    $file_size = get_post_meta($post->ID, "_file_size_value", true);

                    // 自定义字段名称为 _file_version
                    $file_version = get_post_meta($post->ID, "_file_version_value", true);

                    // 自定义字段名称为 _file_system
                    $file_system = get_post_meta($post->ID, "_file_system_value", true);

                    // 自定义字段名称为 _baidupan_link
                    $baidupan_link = get_post_meta($post->ID, "_baidupan_link_value", true);

                    // 自定义字段名称为 _baidupan_password
                    $baidupan_password = get_post_meta($post->ID, "_baidupan_password_value", true);

                    // 自定义字段名称为 _otherpan_link
                    $otherpan_link = get_post_meta($post->ID, "_otherpan_link_value", true);

                    // 自定义字段名称为 _otherpan_password
                    $otherpan_password = get_post_meta($post->ID, "_otherpan_password_value", true);

                    // 自定义字段名称为 _rar_password
                    $rar_password = get_post_meta($post->ID, "_rar_password_value", true);

                    // 去除不必要的空格和HTML标签
                    $file_name = trim(strip_tags($file_name));
                    $file_size = trim(strip_tags($file_size));
                    $file_version = trim(strip_tags($file_version));
                    $file_system = trim(strip_tags($file_system));
                    $baidupan_link = trim(strip_tags($baidupan_link));
                    $baidupan_password = trim(strip_tags($baidupan_password));
                    $file_otherpan_link = trim(strip_tags($otherpan_link));
                    $otherpan_password = trim(strip_tags($otherpan_password));
                    $rar_password = trim(strip_tags($rar_password));
                   

                    echo '
                    
                    <div class="col-sm-12 col-md-6">
                        <p name="file_name">文件名：'.$file_name.'</p>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <p name="file_size">文件大小：'.$file_size.'</p>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <p name="file_version">版本：'.$file_version.'</p>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <p name="file_system">适用平台：'.$file_system.'</p>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <p name="baidupan_link">百度网盘：'.$baidupan_link.'</p>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <p name="baidupan_password">百度网盘提取码：'.$baidupan_password.'</p>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <p name="onterpan_link">其他网盘：'.$otherpan_link.'</p>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <p name="otherpan_password">其他网盘提取码：'.$otherpan_password.'</p>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <p name="rar_password">压缩包解压密码：'.$rar_password.'</p>
                    </div>
                ';}
            ?>
        </div>
<!--版权-->
        <div class="alert alert-dark">
            如未标明出处，所有文章均为本站原创。
            <br>
            如需转载，请附上原文地址：<a href="<?php the_permalink(); ?>"><?php bloginfo('name'); ?> » <?php the_title(); ?></a>
        </div>
    </div>
<!--广告-->
    <div class="ad">
    <?php echo of_get_option('ad-single-bottom', ''); ?>
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