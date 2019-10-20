<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 */
function optionsframework_option_name() {
	// Change this to use your theme slug
	return 'options-framework-theme';
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'theme-textdomain'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	// Test data
	$test_array = array(
		'one' => __( 'One', 'theme-textdomain' ),
		'two' => __( 'Two', 'theme-textdomain' ),
		'three' => __( 'Three', 'theme-textdomain' ),
		'four' => __( 'Four', 'theme-textdomain' ),
		'five' => __( 'Five', 'theme-textdomain' )
	);

	$navbar_fixed = array(
		'fixed-top' => __( '固定', 'sameen' ),
		'' => __( '不固定', 'sameen' ),
	);

	// Multicheck Array
	$multicheck_array = array(
		'one' => __( 'French Toast', 'theme-textdomain' ),
		'two' => __( 'Pancake', 'theme-textdomain' ),
		'three' => __( 'Omelette', 'theme-textdomain' ),
		'four' => __( 'Crepe', 'theme-textdomain' ),
		'five' => __( 'Waffle', 'theme-textdomain' )
	);

	// Multicheck Defaults
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
	);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// Typography Defaults
	$typography_defaults = array(
		'size' => '15px',
		'face' => 'georgia',
		'style' => 'bold',
		'color' => '#bada55' );

	// Typography Options
	$typography_options = array(
		'sizes' => array( '6','12','14','16','20' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
	);

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}


	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages( 'sort_column=post_parent,menu_order' );
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';

	$options = array();

	$options[] = array(
		'name' => __( '基本设置', 'sameen' ),
		'type' => 'heading'
	);

	$options[] = array(
		'name' => __( '1', 'theme-textdomain' ),
		'desc' => __( '1.', 'theme-textdomain' ),
		'id' => 'ex',
		'std' => 'Default',
		'class' => 'mini',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( '导航栏固定方式', 'sameen' ),
		'desc' => __( '固定：导航栏始终显示在页面最上方，不跟随内容滚动。不固定：导航栏跟随网页滚动，需要将style.css文件第12行“padding-top: 65px;”改为“padding-top: 0px;”', 'sameen' ),
		'id' => 'navbar-fixed-select',
		'std' => 'fixed-top',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $navbar_fixed
	);

	$options[] = array(
		'name' => __( '网站备案信息', 'sameen' ),
		'desc' => __( '位于网站最下方，可填写其他文字。例：“鲁ICP备00000000号”', 'sameen' ),
		'id' => 'beian',
		'placeholder' => '网站备案信息',
		'class' => 'mini',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( '邮箱', 'sameen' ),
		'desc' => __( '填写要显示的邮箱，显示在侧边栏小工具中。', 'sameen' ),
		'id' => 'your-email',
		'placeholder' => '填写邮箱',
		'class' => 'mini',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( 'Input Text', 'theme-textdomain' ),
		'desc' => __( 'A text input field.', 'theme-textdomain' ),
		'id' => 'example_text',
		'std' => 'Default Value',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( 'Input with Placeholder', 'theme-textdomain' ),
		'desc' => __( 'A text input field with an HTML5 placeholder.', 'theme-textdomain' ),
		'id' => 'example_placeholder',
		'placeholder' => 'Placeholder',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( 'Textarea', 'theme-textdomain' ),
		'desc' => __( 'Textarea description.', 'theme-textdomain' ),
		'id' => 'example_textarea',
		'std' => 'Default Text',
		'type' => 'textarea'
	);

	$options[] = array(
		'name' => __( 'Input Select Small', 'theme-textdomain' ),
		'desc' => __( 'Small Select Box.', 'theme-textdomain' ),
		'id' => 'example_select',
		'std' => 'three',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $test_array
	);

	$options[] = array(
		'name' => __( 'Input Select Wide', 'theme-textdomain' ),
		'desc' => __( 'A wider select box.', 'theme-textdomain' ),
		'id' => 'example_select_wide',
		'std' => 'two',
		'type' => 'select',
		'options' => $test_array
	);

	if ( $options_categories ) {
		$options[] = array(
			'name' => __( 'Select a Category', 'theme-textdomain' ),
			'desc' => __( 'Passed an array of categories with cat_ID and cat_name', 'theme-textdomain' ),
			'id' => 'example_select_categories',
			'type' => 'select',
			'options' => $options_categories
		);
	}

	if ( $options_tags ) {
		$options[] = array(
			'name' => __( 'Select a Tag', 'options_check' ),
			'desc' => __( 'Passed an array of tags with term_id and term_name', 'options_check' ),
			'id' => 'example_select_tags',
			'type' => 'select',
			'options' => $options_tags
		);
	}

	$options[] = array(
		'name' => __( 'Select a Page', 'theme-textdomain' ),
		'desc' => __( 'Passed an pages with ID and post_title', 'theme-textdomain' ),
		'id' => 'example_select_pages',
		'type' => 'select',
		'options' => $options_pages
	);

	$options[] = array(
		'name' => __( 'Input Radio (one)', 'theme-textdomain' ),
		'desc' => __( 'Radio select with default options "one".', 'theme-textdomain' ),
		'id' => 'example_radio',
		'std' => 'one',
		'type' => 'radio',
		'options' => $test_array
	);

	$options[] = array(
		'name' => __( 'Example Info', 'theme-textdomain' ),
		'desc' => __( 'This is just some example information you can put in the panel.', 'theme-textdomain' ),
		'type' => 'info'
	);

	$options[] = array(
		'name' => __( 'Input Checkbox', 'theme-textdomain' ),
		'desc' => __( 'Example checkbox, defaults to true.', 'theme-textdomain' ),
		'id' => 'example_checkbox',
		'std' => '1',
		'type' => 'checkbox'
	);

	$options[] = array(
		'name' => __( '高级设置', 'sameen' ),
		'type' => 'heading'
	);

	$options[] = array(
		'name' => __( 'Check to Show a Hidden Text Input', 'theme-textdomain' ),
		'desc' => __( 'Click here and see what happens.', 'theme-textdomain' ),
		'id' => 'example_showhidden',
		'type' => 'checkbox'
	);

	$options[] = array(
		'name' => __( '更改作者存档页面网址前缀', 'sameen' ),
		'desc' => __( '作者存档页面网址前缀默认为"author"。如果更改后缀后，访问新的存档地址出现 404 错误，请访问WP后台 >设置>固定链接，重新保存一次即可。', 'sameen' ),
		'id' => 'author-prefix-change',
		'std' => 'author',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( 'Uploader Test', 'theme-textdomain' ),
		'desc' => __( 'This creates a full size uploader that previews the image.', 'theme-textdomain' ),
		'id' => 'example_uploader',
		'type' => 'upload'
	);

	$options[] = array(
		'name' => "Example Image Selector",
		'desc' => "Images for layout.",
		'id' => "example_images",
		'std' => "2c-l-fixed",
		'type' => "images",
		'options' => array(
			'1col-fixed' => $imagepath . '1col.png',
			'2c-l-fixed' => $imagepath . '2cl.png',
			'2c-r-fixed' => $imagepath . '2cr.png'
		)
	);

	$options[] = array(
		'name' =>  __( 'Example Background', 'theme-textdomain' ),
		'desc' => __( 'Change the background CSS.', 'theme-textdomain' ),
		'id' => 'example_background',
		'std' => $background_defaults,
		'type' => 'background'
	);

	$options[] = array(
		'name' => __( 'Multicheck', 'theme-textdomain' ),
		'desc' => __( 'Multicheck description.', 'theme-textdomain' ),
		'id' => 'example_multicheck',
		'std' => $multicheck_defaults, // These items get checked by default
		'type' => 'multicheck',
		'options' => $multicheck_array
	);

	$options[] = array(
		'name' => __( 'Colorpicker', 'theme-textdomain' ),
		'desc' => __( 'No color selected by default.', 'theme-textdomain' ),
		'id' => 'example_colorpicker',
		'std' => '',
		'type' => 'color'
	);

	$options[] = array( 'name' => __( 'Typography', 'theme-textdomain' ),
		'desc' => __( 'Example typography.', 'theme-textdomain' ),
		'id' => "example_typography",
		'std' => $typography_defaults,
		'type' => 'typography'
	);

	$options[] = array(
		'name' => __( 'Custom Typography', 'theme-textdomain' ),
		'desc' => __( 'Custom typography options.', 'theme-textdomain' ),
		'id' => "custom_typography",
		'std' => $typography_defaults,
		'type' => 'typography',
		'options' => $typography_options
	);

	$options[] = array(
		'name' => __( '首页设置', 'sameen' ),
		'type' => 'heading'
	);

	/**
	 * For $settings options see:
	 * http://codex.wordpress.org/Function_Reference/wp_editor
	 *
	 * 'media_buttons' are not supported as there is no post to attach items to
	 * 'textarea_name' is set by the 'id' you choose
	 */

	$wp_editor_settings = array(
		'wpautop' => true, // Default
		'textarea_rows' => 5,
		'tinymce' => array( 'plugins' => 'wordpress,wplink' )
	);

	$options[] = array(
		'name' => __( 'Default Text Editor', 'theme-textdomain' ),
		'desc' => sprintf( __( 'You can also pass settings to the editor.  Read more about wp_editor in <a href="%1$s" target="_blank">the WordPress codex</a>', 'theme-textdomain' ), 'http://codex.wordpress.org/Function_Reference/wp_editor' ),
		'id' => 'example_editor',
		'type' => 'editor',
		'settings' => $wp_editor_settings
	);

	/*
	* 首页幻灯片
	*/
	//幻灯片1
	$options[] = array(
		'name' => __( '首页幻灯片 1 ', 'sameen' ),
		'desc' => __( '选择首页幻灯片的图片，支持图床外链；建议所有幻灯片保持相同大小', 'sameen' ),
		'id' => 'index-slide-pic-1',
		'placeholder' => '选择图片',
		'type' => 'upload'
	);
	$options[] = array(
		'name' => __( '幻灯片 1 跳转链接', 'sameen' ),
		'desc' => __( '填写完整链接，如：“https://example.com/example”', 'sameen' ),
		'id' => 'index-slide-link-1',
		'std' => '',
		'placeholder' => '填写链接',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __( '幻灯片 1 标题', 'sameen' ),
		'desc' => __( '显示在幻灯片底部的文字', 'sameen' ),
		'id' => 'index-slide-title-1',
		'std' => '',
		'placeholder' => '填写文字',
		'type' => 'text'
	);
	//幻灯片2
	$options[] = array(
		'name' => __( '首页幻灯片 2 ', 'sameen' ),
		'desc' => __( '选择首页幻灯片的图片，支持图床外链；建议所有幻灯片保持相同大小', 'sameen' ),
		'id' => 'index-slide-pic-2',
		'placeholder' => '选择图片',
		'type' => 'upload'
	);
	$options[] = array(
		'name' => __( '幻灯片 2 跳转链接', 'sameen' ),
		'desc' => __( '填写完整链接，如：“https://example.com/example”', 'sameen' ),
		'id' => 'index-slide-link-2',
		'std' => '',
		'placeholder' => '填写链接',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __( '幻灯片 2 标题', 'sameen' ),
		'desc' => __( '显示在幻灯片底部的文字', 'sameen' ),
		'id' => 'index-slide-title-2',
		'std' => '',
		'placeholder' => '填写文字',
		'type' => 'text'
	);

	//幻灯片3
	$options[] = array(
		'name' => __( '首页幻灯片 3 ', 'sameen' ),
		'desc' => __( '选择首页幻灯片的图片，支持图床外链；建议所有幻灯片保持相同大小', 'sameen' ),
		'id' => 'index-slide-pic-3',
		'placeholder' => '选择图片',
		'type' => 'upload'
	);
	$options[] = array(
		'name' => __( '幻灯片 3 跳转链接', 'sameen' ),
		'desc' => __( '填写完整链接，如：“https://example.com/example”', 'sameen' ),
		'id' => 'index-slide-link-3',
		'std' => '',
		'placeholder' => '填写链接',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __( '幻灯片 3 标题', 'sameen' ),
		'desc' => __( '显示在幻灯片底部的文字', 'sameen' ),
		'id' => 'index-slide-title-3',
		'std' => '',
		'placeholder' => '填写文字',
		'type' => 'text'
	);
	


	$options[] = array(
		'name' => __( '广告位', 'sameen' ),
		'type' => 'heading'
	);

	$options[] = array(
		'name' => __( '文章底部广告位', 'sameen' ),
		'desc' => __( '将广告联盟提供的代码复制到这里，将显示在文章页面的文章下面', 'sameen' ),
		'id' => 'ad-single-bottom',
		'placeholder' => '填写文字',
		'type' => 'textarea'
	);




	add_action('optionsframework_after','exampletheme_options_after', 100);
	function exampletheme_options_after() { ?>
	<div style="float:right;text-align: right;">
		<p>Content after the options panel!</p>
		<p>
			主题版本号：<?php $theme = wp_get_theme(); echo $theme->get( 'Version' );//主题名?>
			&nbsp;&nbsp;
			<a href="<?php bloginfo('template_url'); ?>/ReadMe.html">主题版本信息</a>
		</p>
	</div>
		
	<?php }
	return $options;
}