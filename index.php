<?php get_header(); ?>

<article>
    <div class="lbox">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- 轮播（Carousel）指标 -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>   
            <!-- 轮播（Carousel）项目 -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="<?php echo of_get_option('index-slide-pic-1', 'no entry' ); ?>" alt="幻灯片1" class="images/mg-responsive">
                    <div class="carousel-caption"><?php echo of_get_option('index-slide-title-1', '' ); ?></div>
                </div>
                <div class="carousel-item">
                    <img src="<?php echo of_get_option('index-slide-pic-2', 'no entry' ); ?>" alt="幻灯片2" class="images/img-responsive">
                    <div class="carousel-caption"><?php echo of_get_option('index-slide-title-2', '' ); ?></div>
                </div>
                <div class="carousel-item">
                    <img src="<?php echo of_get_option('index-slide-pic-3', 'no entry' ); ?>" alt="幻灯片3" class="images/img-responsive">
                    <div class="carousel-caption"><?php echo of_get_option('index-slide-title-3', '' ); ?></div>
                </div>
            </div>
            <!-- 轮播（Carousel）导航 -->
            <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>

        <div class="whitebg bloglist">
            <p class="htitle">最新博文</p>
            <div>
                <!--单图-->
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <li>
                    <h3 class="blogtitle">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><span class="badge badge-primary"><?php if ( is_sticky() ) {echo "置顶";}?></span>
                    </h3>
                    <span class="blogpic imgscale">
                        <i>
                            <a href="http://v.bootstrapmb.com/">原创模板</a>
                        </i>
                        <a href="http://v.bootstrapmb.com/" title="">
                            <img src="<?php bloginfo('template_url'); ?>/images/b01.jpg" alt="">
                        </a>
                    </span>
                    <p class="blogtext">
                        <?php if (has_excerpt()) {
                            echo $description = get_the_excerpt(); //文章编辑中的摘要
                        }else {
                            echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 220,"……"); //文章编辑中若无摘要，自定截取文章内容字数做为摘要
                        } ?>
                    </p>
                    <p class="bloginfo">
                        <i class="avatar">
                            <img src="<?php bloginfo('template_url'); ?>/images/avatar.jpg">
                        </i>
                        <span><?php the_author_posts_link(); ?></span>
                        <span><?php the_time('Y-n-j') ?></span>
                        <span><a href="#"><?php the_tags('标签：', ', ', ''); ?></a></span>
                        <span><?php comments_popup_link('0 条评论', '1 条评论', '% 条评论', '', '评论已关闭'); ?></span>
                        <span><?php edit_post_link('编辑', ' • ', ''); ?></span>
                    </p>
                    <a href="<?php the_permalink(); ?>" class="viewmore">阅读全文</a>
                    <?php endwhile; ?>
                    
                    <?php else : ?>
                <h3 class="title"><a href="#" rel="bookmark">未找到</a></h3>
                <p>没有找到任何文章！</p>
                <?php endif; ?>
                
            </div>
            <p class="clearfix"><?php previous_posts_link('<< 查看新文章', 0); ?> <span class="float right"><?php next_posts_link('查看旧文章 >>', 0); ?></span></p>
        </div>
        <!--bloglist end-->
    </div>

    <?php get_sidebar(); ?>

</article>

<?php get_footer(); ?>