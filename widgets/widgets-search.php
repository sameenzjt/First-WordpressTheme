<?php
//搜索小工具
add_action( 'widgets_init', 'Widget_Search' );
/** 
 * Register our widget. 注册我们的小部件。
 */
function Widget_Search() {
    register_widget( 'Widget_Search' );
}


class Widget_Search extends WP_Widget {
   
    function __construct(){
        $widget_ops = array('classname' => 'Widget_Search','description' => __('搜索(主题风格)','sameen'));
        parent::__construct('Widget_Search' ,__('(主题)搜索', 'sameen'), $widget_ops);
    }
    function form($instance) {
        $instance = wp_parse_args ( ( array ) $instance, array (
                'title' =>    '搜索',
        ) );
        $title = $instance ['title'];
?>
<p>
    <label for="<?php echo $this->get_field_id('title'); ?>">
        标题：<input type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" />
    </label>
</p>
<?php
    }
    function widget($args, $instance) {
        /**定义下面输出语句的变量 */
        $blog_url = get_bloginfo('url');
        $title = $instance ['title'];
        $form = '
            <form class="s-form" action="'. $blog_url .'/?s=">
                <div class="input-group mb-3">
                    <input name="s" id="s" type="text" class="form-control" />
                    <div class="input-group-append">
                        <input type="submit" value="搜一搜" class="input-group-text" title="搜索" />
                    </div>
                </div>
            </form>';
    /** 输出到界面 */
    if ($title == null) echo '
        <div class="whitebg">
            <div class="">
                <p class="">'. $instance['title'] .'</p>
                <div class="">
                    '.$form.'
                </div>
            </div>
        </div>
    ';
    if ($title != null) echo '
        <div class="whitebg">
            <div class="widget jv-search">
                <p class="widget-title htitle">'. $instance['title'] .'</p>
                <div class="jv-custom inlo-search">
                    '.$form.'
                </div>
            </div></div>
            ';

    }
}

?>