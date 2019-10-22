<?php
 
class My_Widget extends WP_Widget {
 
	//function My_Widget()
	//{
	     //$widget_ops = array('description' => '海宝的一个简单小测试','classname' => 'widget_test');
	     // $control_ops = array('width' => 400, 'height' => 300);
		 //parent::WP_Widget(false,$name='海宝测试小工具',$widget_ops); 
		 
		 function __construct(){
			$widget_ops = array('description' => __('海宝的一个简单小测试','bb10'));
			$control_ops = array('width' => 400, 'height' => 300);
			parent::__construct('My_Widget',__('海宝的一个简单小测试','bb10'), $widget_ops,$control_ops);
		
 
             //parent::直接使用父类中的方法
             //$name 这个小工具的名称,
             //$widget_ops 可以给小工具进行描述等等。
             //$control_ops 可以对小工具进行简单的样式定义等等。一般没有特殊要求的话，不需要设置。
	}
 
	function form($instance) { // 给小工具(widget) 添加表单内容
            $title = esc_attr($instance['title']);
            $content = esc_attr($instance['content']);
	?>
	<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_attr_e('Title:'); ?> <input class="widget_ipt" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
	<p><label for="<?php echo $this->get_field_id('content'); ?>">描述： <input class="widget_ipt" id="<?php echo $this->get_field_id('content'); ?>" name="<?php echo $this->get_field_name('content'); ?>" type="text" value="<?php echo $content; ?>" /></label></p>
	<?php
    }
	function update($new_instance, $old_instance) { // 更新保存
	    return $new_instance;
	}
	function widget($args, $instance) { // 输出显示在前台页面上
	    extract( $args );
            // 标题
            $title = apply_filters('widget_title', empty($instance['title']) ? __('如果没有填写，我就默认显示啦') : $instance['title']);
            // 描述
            $content = apply_filters('widget_title', empty($instance['content']) ? __('如果没有填写，我就默认显示啦') : $instance['content']);
            getContent($title, $content);
    }
}
register_widget('My_Widget');
 
// 自定义DOM结构，可以按照你主题的风格来自定义编写
function getContent($title, $content) {
	echo '
	<div class="whitebg">
		<p class="htitle">'.$title.'</p>
		<p>'.$content.'</p>
	</div>
	';
}
?>