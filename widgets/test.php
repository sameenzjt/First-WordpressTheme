<?php
/** 
 * Add function to widgets_init that'll load our widget. 
 * @since 0.1 
 */
add_action( 'widgets_init', 'example_load_widgets' );
/** 
 * Register our widget. 注册我们的小部件。
 * 'Example_Widget' is the widget class used below. 'Example_Widget'是下面使用的小部件类。
 * 
 * @since 0.1 
 */
function example_load_widgets() {
    register_widget( 'Example_Widget' );
}
/** 
 * Example Widget class. 示例Widget类。
 * This class handles everything that needs to be handled with the widget: 此类处理需要使用小部件处理的所有内容：
 * the settings, form, display, and update.  Nice! 设置，表单，显示和更新。 真好！
 * 
 * @since 0.1 
 */
class Example_Widget extends WP_Widget {
    /** 
     * Widget setup. 小部件设置。
     */
    function Example_Widget() {
        /* Widget settings.小部件设置 */
        $widget_ops = array( 'classname' => 'example', 'description' => __('小工具描述语句', 'sameen') );
        /* Widget control settings.小部件控件设置 */
        $control_ops = array( 'width' => 200, 'height' => 350, 'id_base' => 'example-widget' );
        /* Create the widget.创建小部件。 */
        $this->WP_Widget( 'example-widget', __('小工具标题', 'sameen'), $widget_ops, $control_ops );
    }
    /** 
     * How to display the widget on the screen. 如何在屏幕上显示小部件。
     */
    function widget( $args, $instance ) {
        extract( $args );
        /* Our variables from the widget settings. 小部件设置中的变量*/
        $title = apply_filters('widget_title', $instance['title'] );
        $name = $instance['name'];
        $sex = $instance['sex'];
        $show_sex = isset( $instance['show_sex'] ) ? $instance['show_sex'] : false;
		/* Before widget (defined by themes).在小部件之前（由主题定义）。 */
		printf( '<div class="whitebg">' );
        echo $before_widget;
        /* Display the widget title if one was input (before and after defined by themes). 如果输入了一个（在主题定义之前和之后），则显示小部件标题。*/
        if ( $title )
			echo $before_title . $title . $after_title;
        /* Display name from widget settings if one was input.如果输入了小部件设置，则显示名称 */
        if ( $name )
            printf( '<p>' . __('Hello. My name is %1$s.', 'sameen') . '</p>', $name );
        /* If show sex was selected, display the user's sex.如果选择了显示性别，则显示用户的性别 */
        if ( $show_sex )
            printf( '<p>' . __('I am a %1$s.', 'sameen') . '</p>', $sex );
        /* After widget (defined by themes). 小部件之后（由主题定义）*/
		echo $after_widget;
		printf( '</div>' );
    }
    /** 
     * Update the widget settings. 更新小部件设置。
     */
    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        /* Strip tags for title and name to remove HTML (important for text inputs).去除标题和名称标签以删除HTML（对于文本输入很重要） */
        $instance['title'] = strip_tags( $new_instance['title'] );
        $instance['name'] = strip_tags( $new_instance['name'] );
        /* No need to strip tags for sex and show_sex. */
        $instance['sex'] = $new_instance['sex'];
        $instance['show_sex'] = $new_instance['show_sex'];
        return $instance;
    }
    /** 
     * Displays the widget settings controls on the widget panel. 在小部件面板上显示小部件设置控件。
     * Make use of the get_field_id() and get_field_name() function 利用get_field_id（）和get_field_name（）函数
     * when creating your form elements. This handles the confusing stuff. 创建表单元素时。 这可以处理令人困惑的东西。
     */
    function form( $instance ) {
        /* Set up some default widget settings.设置一些小部件的默认设置 */
        $defaults = array( 'title' => __('Example', 'sameen'), 'name' => __('John Doe', 'sameen'), 'sex' => 'male', 'show_sex' => true );
        $instance = wp_parse_args( (array) $instance, $defaults ); ?>
        <!-- Widget Title: Text Input -->
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('标题:', 'sameen'); ?></label>
            <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
        </p>
        <!-- Your Name: Text Input -->
        <p>
            <label for="<?php echo $this->get_field_id( 'name' ); ?>"><?php _e('你的名字:', 'sameen'); ?></label>
            <input id="<?php echo $this->get_field_id( 'name' ); ?>" name="<?php echo $this->get_field_name( 'name' ); ?>" value="<?php echo $instance['name']; ?>" style="width:100%;" />
        </p>
        <!-- Sex: Select Box -->
        <p>
            <label for="<?php echo $this->get_field_id( 'sex' ); ?>"><?php _e('性别:', 'sameen'); ?></label>
            <select id="<?php echo $this->get_field_id( 'sex' ); ?>" name="<?php echo $this->get_field_name( 'sex' ); ?>" class="widefat" style="width:100%;">
                <option <?php if ( 'male' == $instance['format'] ) echo 'selected="selected"'; ?>>male</option>
                <option <?php if ( 'female' == $instance['format'] ) echo 'selected="selected"'; ?>>female</option>
            </select>
        </p>
        <!-- Show Sex? Checkbox -->
        <p>
            <input class="checkbox" type="checkbox" <?php checked( $instance['show_sex'], true ); ?> id="<?php echo $this->get_field_id( 'show_sex' ); ?>" name="<?php echo $this->get_field_name( 'show_sex' ); ?>" />
            <label for="<?php echo $this->get_field_id( 'show_sex' ); ?>"><?php _e('Display sex publicly?', 'sameen'); ?></label>
        </p>
    <?php
    }
}
?>