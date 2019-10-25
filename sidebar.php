<div class="rbox">
    <div class="card">
        <?php if ( !function_exists('dynamic_sidebar') 
                    || !dynamic_sidebar('First_sidebar') ) : ?>
            <h2>我的名片</h2>
            <p>网名：DanceSmile | 即步非烟</p>
            <p>职业：Web前端设计师、网页设计</p>
            <p>现居：四川省-成都市</p>
            <p>Email：<?php echo of_get_option('your-email', '请到主题选项--基本设置中填写'); ?></p>
        <?php endif; ?>
    </div>
    <div>
        <?php 
            if(is_home() || is_front_page()) { //首页显示“首页侧栏”
                if (function_exists('dynamic_sidebar') && dynamic_sidebar('sidebar-index')){} 
            }
        ?>
        <?php 
            if ( is_single() ) {//文章页显示 “文章页侧栏”
                if (function_exists('dynamic_sidebar') && dynamic_sidebar('sidebar-single')){}
            }
        ?> 
    </div>
           
</div>

