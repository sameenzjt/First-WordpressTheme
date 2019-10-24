<?php
//搜索小工具
add_action( 'widgets_init', 'Widget_siteinfo' );
/** 
 * Register our widget. 注册我们的小部件。
 */
function Widget_siteinfo() {
    register_widget( 'Widget_siteinfo' );
}


class Widget_siteinfo extends WP_Widget {
   
    function __construct(){
        $widget_ops = array('classname' => 'Widget_siteinfo','description' => __('站点信息(主题风格)','sameen'));
        parent::__construct('Widget_siteinfo' ,__('站点信息(主题)', 'sameen'), $widget_ops);
    }
    function form($instance) {
        $instance = wp_parse_args ( ( array ) $instance, array (
                'title' =>    '站点信息',
                'time' => 'yyyy-mm-dd',
        ) );
        $title = $instance ['title'];
        $time = $instance ['time'];
?>
<p>
    <label for="<?php echo $this->get_field_id('title'); ?>">
        标题：<input type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" />
    </label>
</p>
<p>
    <label for="<?php echo $this->get_field_id('time'); ?>">
        建站时间：<input type="text" id="<?php echo $this->get_field_id('time'); ?>" name="<?php echo $this->get_field_name('time'); ?>" value="<?php echo $time; ?>" />
    </label>
</p>
<p></p>
<?php
    }
    function widget($args, $instance) {
        /**定义下面输出语句的变量 */
        $title = $instance ['title'];
        $time = $instance ['time'];
        $version = get_bloginfo('version');
        $themename = wp_get_theme() -> get( 'Name' );
        $themeversion = wp_get_theme() -> get( 'Version' );
        $published_posts = wp_count_posts()->publish;
        $qr_weixin_gzh = of_get_option('qr_weixin_gzh', '');

    /** 输出到界面 */
    if ($title == null) echo '
        <div class="whitebg tongji">
    ';
    if ($title != null) echo '
        <div class="whitebg tongji">
            <p class="">'. $instance['title'] .'</p>
    ';

    echo '
            <ul>
                <li>
                    <b>建站时间</b>： '.$time.' 
                </li>
                <li>
                    <b>网站程序</b>：WordPress '.$version.' 
                </li>
                <li>
                    <b>主题模板</b>：<a href="https://www.sameen.art" target="_blank">《'.$themename.'》 '.$themeversion.' </a>
                </li>
                <li>
                    <b>文章统计</b>： '.$published_posts.' 篇
                </li>
                <li>
                    <b>微信公众号</b>：扫描二维码，关注我们
                </li>
                <img src="'. $qr_weixin_gzh .'" class="tongji_gzh">
            </ul>
        
    </div>';

    }
}

?>