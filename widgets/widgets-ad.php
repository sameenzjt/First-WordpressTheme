<?php
//广告小工具
add_action( 'widgets_init', 'Widget_ad' );
/** 
 * Register our widget. 注册我们的小部件。
 */
function Widget_ad() {
    register_widget( 'Widget_ad' );
}


class Widget_ad extends WP_Widget {
   
    function __construct(){
        $widget_ops = array('classname' => 'Widget_ad','description' => __('广告(主题风格)','sameen'));
        parent::__construct('Widget_ad' ,__('广告(主题)', 'sameen'), $widget_ops);
    }
    function form($instance) {
        $instance = wp_parse_args ( ( array ) $instance, array (
                'title' =>    '广告',
        ) );
        $title = $instance ['title'];
?>


    <p>请到“外观--主题选项--广告位--侧边栏小工具广告位”填写广告代码</p>

<?php
    }
    function widget($args, $instance) {
        /**定义下面输出语句的变量 */
        $ad = of_get_option('ad-sidebar-widgets', '');

        
    /** 输出到界面 */
    if ($ad == null) echo '';
    if ($ad != null) echo '
        <div class="ad whitebg">
                    '. $ad .'
        </div>
            ';

    }
}

?>