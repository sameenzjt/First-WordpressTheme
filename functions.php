<?php 

/**
 * WordPress本地化
 */
function myplugin_init() {
  load_plugin_textdomain( 'sameen', false , dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}
add_action('plugins_loaded', 'myplugin_init');
/**
 * WordPress本地化——结束
 */

/**
 * WordPress 添加菜单
 */
register_nav_menus(array(
    'top-menu' => '顶部菜单',
  ));
/**
 * WordPress 添加菜单
 */


/**
 * WordPress 添加面包屑导航 
 */
function cmp_breadcrumbs() {
	$delimiter = '/'; // 分隔符
	$before = '<span class="current">'; // 在当前链接前插入
	$after = '</span>'; // 在当前链接后插入
	if ( !is_home() && !is_front_page() || is_paged() ) {
		echo '<div itemscope itemtype="http://schema.org/WebPage" id="crumbs">'.__( '现在的位置：' , 'cmp' );
		global $post;
		$homeLink = home_url();
		echo ' <a itemprop="breadcrumb" href="' . $homeLink . '">' . __( 'Home' , 'cmp' ) . '</a> ' . $delimiter . ' ';
		if ( is_category() ) { // 分类 存档
			global $wp_query;
			$cat_obj = $wp_query->get_queried_object();
			$thisCat = $cat_obj->term_id;
			$thisCat = get_category($thisCat);
			$parentCat = get_category($thisCat->parent);
			if ($thisCat->parent != 0){
				$cat_code = get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' ');
				echo $cat_code = str_replace ('<a','<a itemprop="breadcrumb"', $cat_code );
			}
			echo $before . '' . single_cat_title('', false) . '' . $after;
		} elseif ( is_day() ) { // 天 存档
			echo '<a itemprop="breadcrumb" href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
			echo '<a itemprop="breadcrumb"  href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
			echo $before . get_the_time('d') . $after;
		} elseif ( is_month() ) { // 月 存档
			echo '<a itemprop="breadcrumb" href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
			echo $before . get_the_time('F') . $after;
		} elseif ( is_year() ) { // 年 存档
			echo $before . get_the_time('Y') . $after;
		} elseif ( is_single() && !is_attachment() ) { // 文章
			if ( get_post_type() != 'post' ) { // 自定义文章类型
				$post_type = get_post_type_object(get_post_type());
				$slug = $post_type->rewrite;
				echo '<a itemprop="breadcrumb" href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> ' . $delimiter . ' ';
				echo $before . get_the_title() . $after;
			} else { // 文章 post
				$cat = get_the_category(); $cat = $cat[0];
				$cat_code = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
				echo $cat_code = str_replace ('<a','<a itemprop="breadcrumb"', $cat_code );
				echo $before . get_the_title() . $after;
			}
		} elseif ( !is_single() && !is_page() && get_post_type() != 'post' ) {
			$post_type = get_post_type_object(get_post_type());
			echo $before . $post_type->labels->singular_name . $after;
		} elseif ( is_attachment() ) { // 附件
			$parent = get_post($post->post_parent);
			$cat = get_the_category($parent->ID); $cat = $cat[0];
			echo '<a itemprop="breadcrumb" href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
			echo $before . get_the_title() . $after;
		} elseif ( is_page() && !$post->post_parent ) { // 页面
			echo $before . get_the_title() . $after;
		} elseif ( is_page() && $post->post_parent ) { // 父级页面
			$parent_id  = $post->post_parent;
			$breadcrumbs = array();
			while ($parent_id) {
				$page = get_page($parent_id);
				$breadcrumbs[] = '<a itemprop="breadcrumb" href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
				$parent_id  = $page->post_parent;
			}
			$breadcrumbs = array_reverse($breadcrumbs);
			foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
			echo $before . get_the_title() . $after;
		} elseif ( is_search() ) { // 搜索结果
			echo $before ;
			printf( __( 'Search Results for: %s', 'cmp' ),  get_search_query() );
			echo  $after;
		} elseif ( is_tag() ) { //标签 存档
			echo $before ;
			printf( __( 'Tag Archives: %s', 'cmp' ), single_tag_title( '', false ) );
			echo  $after;
		} elseif ( is_author() ) { // 作者存档
			global $author;
			$userdata = get_userdata($author);
			echo $before ;
			printf( __( 'Author Archives: %s', 'cmp' ),  $userdata->display_name );
			echo  $after;
		} elseif ( is_404() ) { // 404 页面
			echo $before;
			_e( 'Not Found', 'cmp' );
			echo  $after;
		}
		if ( get_query_var('paged') ) { // 分页
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() )
				echo sprintf( __( '( Page %s )', 'cmp' ), get_query_var('paged') );
		}
		echo '</div>';
	}
}
/**
 * WordPress 添加面包屑导航 —— 结束
 */

/**
 * 添加后台主题设置
 */

if (!function_exists('optionsframework_init')){
	define('OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri().'/inc/');
	require_once dirname(__FILE__).'/inc/options-framework.php';
}

// Loads options.php from child or parent theme
$optionsfile = locate_template( 'options.php' );
load_template( $optionsfile );

add_action( 'optionsframework_custom_scripts', 'optionsframework_custom_scripts' );

function optionsframework_custom_scripts() { ?>

<script type="text/javascript">
jQuery(document).ready(function() {

	jQuery('#example_showhidden').click(function() {
  		jQuery('#section-example_text_hidden').fadeToggle(400);
	});

	if (jQuery('#example_showhidden:checked').val() !== undefined) {
		jQuery('#section-example_text_hidden').show();
	}

});
</script>

<?php
}
/**
 * 添加后台主题设置 —— 结束
 */

/**
 * 注册侧边栏
 */
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
	  'name'=>'首页侧边栏',
	  'id'=>'sidebar-index',
	  'before_widget' => '<div id="%1$s" class="sidebar_li %2$s whitebg">',
	  'after_widget' => '</div>',
	  'before_title' => '<p class="htitle">',
	  'after_title' => '</p>',
	));
	register_sidebar(array(
	  'name'=>'文章页边栏',
	  'id'=>'sidebar-single',
	  'before_widget' => '<li id="%1$s" class="sidebar_li %2$s">',
	  'after_widget' => '</li>',
	  'before_title' => '<h3>',
	  'after_title' => '</h3>',
	));
}
/**
 * 注册侧边栏——结束
 */


/**
 * 注册小工具
 */
// 任何添加于主题目录widgets文件夹内的php文件都被调用到这里
define('widgets', TEMPLATEPATH.'/widgets');
IncludeAll( widgets );
function IncludeAll($dir){
    $dir = realpath($dir);
    if($dir){
        $files = scandir($dir);
        sort($files);
        foreach($files as $file){
            if($file == '.' || $file == '..'){
                continue;
            }elseif(preg_match('/.php$/i', $file)){
                include_once $dir.'/'.$file;
            }
        }
    }
}
/**
 * 注册小工具——结束
 */


/**
 * 默认角色用户无法进入后台
 */
if ( is_admin() && ( !defined( 'DOING_AJAX' ) || !DOING_AJAX ) ) {
	$current_user = wp_get_current_user();
	if($current_user->roles[0] == get_option('default_role')) {
	  wp_safe_redirect( home_url() );
	  exit();
	}
  }
/**
 * 默认角色用户无法进入后台——结束
 */

/**
 * 用户默认不显示工具栏
 */
add_action("user_register", "set_user_admin_bar_false_by_default", 10, 1);
function set_user_admin_bar_false_by_default($user_id) {
    update_user_meta( $user_id, 'show_admin_bar_front', 'false' );
    update_user_meta( $user_id, 'show_admin_bar_admin', 'false' );
}
/**
 * 用户默认不显示工具栏——结束
 */

/**
 * 更改作者存档前缀 
 */
add_action('init', 'wpdaxue_change_author_base');
function wpdaxue_change_author_base() {
    global $wp_rewrite;
    $author_slug = "profile"; // 更改前缀为 profile
    $wp_rewrite->author_base = $author_slug;
}
/**
 * 更改作者存档前缀 ——结束
 */
add_theme_support( 'post-thumbnails' );


/**
 * 注册下载
 */

@include(TEMPLATEPATH.'/pages/download/diy-download.php');
/**
 * 注册下载——结束
 */


if ( !function_exists('pagenavi') ) {
    function pagenavi( $p = 3 ) { // 取当前页前后各 4 页
        if ( is_singular() ) return; // 文章与插页不用
        global $wp_query, $paged;
        $max_page = $wp_query->max_num_pages;
        if ( $max_page == 1 ) return; // 只有一页不用
        if ( empty( $paged ) ) $paged = 1;
        //echo '<li class="page-item"><a class="page-link">' . $paged . ' / ' . $max_page . '</a></li> '; // 显示页数
        if ( $paged > $p + 1 ) p_link( 1, '最前页', '首页' );
	    if ( $paged > 1 ) p_link( $paged - 1, '上一页', '&lsaquo;' );/* 如果当前页大于1就显示上一页链接 */

        for( $i = $paged - $p; $i <= $paged + $p; $i++ ) { // 中间页
            if ( $i > 0 && $i <= $max_page ) $i == $paged ? print "<li class='page-item active'><a class='page-link'>{$i}</a></li> " : p_link( $i );
        }
        if ( $paged < $max_page - $p - 1 ) echo '<li class="page-item"><a class="page-link">&hellip;</a></li>';
        if ( $paged < $max_page ) p_link( $paged + 1,'下一页', '&rsaquo;' );/* 如果当前页不是最后一页显示下一页链接 */
	    if ( $paged < $max_page - $p ) p_link( $max_page, '最后页', '尾页' );

    }
   function p_link( $i, $title = '', $linktype = '' ) {
        if ( $title == '' ) $title = "第 {$i} 页";
        if ( $linktype == '' ) { $linktext = $i; } else { $linktext = $linktype; }
        echo "<li class='page-item'><a class='page-link' href='", esc_html( get_pagenum_link( $i ) ), "' title='{$title}'>{$linktext}</a></li> ";
    }
}

?>