<?php
add_action('init', 'ashu_post_type');
function ashu_post_type() {
    /**********幻灯片*****************/
    register_post_type( 'slider_type',
        array(
            'labels' => array(
                'name' => '幻灯片',
                'singular_name' => '幻灯片',
                'add_new' => '添加',
                'add_new_item' => '添加新幻灯片',
                'edit_item' => '编辑幻灯片',
                'new_item' => '新幻灯片'
            ),
        'public' => true,
        'has_archive' => false,
        'exclude_from_search' => true,
        'menu_position' => 5,
        'supports' => array( 'title','thumbnail'),
        )
    );
}
 
add_filter( 'manage_edit-slider_type_columns', 'slider_type_custom_columns' );
function slider_type_custom_columns( $columns ) {
    $columns = array(
        'cb' => '<input type="checkbox" />',
        'title' => '幻灯片名',
        'haslink' => '链接到',
        'thumbnail' => '幻灯片预览',
        'date' => '日期'
    );
    return $columns;
}
add_action( 'manage_slider_type_posts_custom_column', 'slider_type_manage_custom_columns', 10, 2 );
function slider_type_manage_custom_columns( $column, $post_id ) {
    global $post;
    switch( $column ) {
        case "haslink":
            if(get_post_meta($post->ID, "slider_link", true)){
                echo get_post_meta($post->ID, "slider_link", true);
            } else {echo '----';}
                break;
        case "thumbnail":
                $slider_pic = get_post_meta($post->ID, "slider_pic", true);
                echo '<img src="'.$slider_pic.'" width="95" height="41" alt="" />';
                break;
        default :
            break;
    }
}
?>