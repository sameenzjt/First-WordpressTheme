<?php
add_action('admin_menu', 'orbit_page');
function orbit_page (){
	if ( count($_POST) > 0 && isset($_POST['orbit_settings']) ){
		$options = array (
			'slide1img','slide1url','slide1title','slide2img','slide2url','slide2title','slide3img','slide3url','slide3title','slide4img','slide4url','slide4title'
			);
		foreach ( $options as $opt ){
			delete_option ( 'orbit_'.$opt, $_POST[$opt] );
			add_option ( 'orbit_'.$opt, $_POST[$opt] );	
		}
	}
	add_menu_page(__('幻灯片选项'), __('幻灯片选项'), 'manage_options', basename(__FILE__), 'orbit_settings');
}
function orbit_settings(){?>
<style type="text/css">
	input{width:60%}.button-primary{width: 10%}
</style>
<div class="wrap">
<h2>幻灯片选项</h2>
<form method="post" action="">
		<table class="form-table">
			<tr><td>
				幻灯片一图片：<input type="text" name="slide1img" id="slide1img"  value="<?php echo get_option('orbit_slide1img'); ?>">
			</td></tr>
			<tr><td>
				幻灯片一链接：<input type="text" name="slide1url" id="slide1url" value="<?php echo get_option('orbit_slide1url'); ?>">
			</td></tr>
			<tr><td>
				幻灯片一标题：<input type="text" name="slide1title" id="slide1title" value="<?php echo get_option('orbit_slide1title'); ?>">
			</td></tr>
			<tr><td>
				幻灯片二图片：<input type="text" name="slide2img" id="slide2img"  value="<?php echo get_option('orbit_slide2img'); ?>">
			</td></tr>
			<tr><td>
				幻灯片二链接：<input type="text" name="slide2url" id="slide2url" value="<?php echo get_option('orbit_slide2url'); ?>">
			</td></tr>
			<tr><td>
				幻灯片二标题：<input type="text" name="slide2title" id="slide2title" value="<?php echo get_option('orbit_slide2title'); ?>">
			</td></tr>
			<tr><td>
				幻灯片三图片：<input type="text" name="slide3img" id="slide3img"  value="<?php echo get_option('orbit_slide3img'); ?>">
			</td></tr>
			<tr><td>
				幻灯片三链接：<input type="text" name="slide3url" id="slide3url" value="<?php echo get_option('orbit_slide3url'); ?>">
			</td></tr>
			<tr><td>
				幻灯片三标题：<input type="text" name="slide3title" id="slide3title" value="<?php echo get_option('orbit_slide3title'); ?>">
			</td></tr>
			<tr><td>
				幻灯片四图片：<input type="text" name="slide4img" id="slide4img"  value="<?php echo get_option('orbit_slide4img'); ?>">
			</td></tr>
			<tr><td>
				幻灯片四链接：<input type="text" name="slide4url" id="slide4url" value="<?php echo get_option('orbit_slide4url'); ?>">
			</td></tr>
			<tr><td>
				幻灯片四标题：<input type="text" name="slide4title" id="slide4title" value="<?php echo get_option('orbit_slide4title'); ?>">
			</td></tr>
		</table>
	<p class="submit">
		<input type="submit" name="Submit" class="button-primary" value="保存设置" />
		<input type="hidden" name="orbit_settings" value="save" style="display:none;" />
	</p>
</form>
</div>
<?php }