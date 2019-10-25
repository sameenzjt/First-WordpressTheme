<?php
/**
 * Customize Function of Theme
 */
?>
<?php

//一、创建需要的字段信息
    /**
        * 这里将以添加两个自定义字段，名称分别为 _description_value 和 _keywords_value，你可以给下面数组添加多个元素，实现添加多个自定义字段的目的。
        *数组第一个元素name为自定义字段的名称，在本代码中自定义字段的名称为name值加_value，以防止与其他代码发生冲突，
        *如 _description_value；std为自定义字段的默认值，当你发表文章时该自定义字段没填任何值，那么将取默认值；
        *title为自定义字段模块的标题，如文章编辑页的"摘要"、"分类"和"标签"，这些都是模块名称。
    */
$new_meta_boxes =
array(

    "file_img" => array(
      "name" => "_file_img",
      "std" => "",
      "title" => "演示图(860*116)："),

    "file_name" => array(
        "name" => "_file_name",
        "std" => "",
        "title" => "文件名："),

    "file_size" => array(
        "name" => "_file_size",
        "std" => "",
        "title" => "文件大小："),

    "file_version" => array(
        "name" => "_file_version",
        "std" => "",
        "title" => "文件版本："),

    "file_system" => array(
        "name" => "_file_system",
        "std" => "",
        "title" => "适用平台："),

    "baidupan_link" => array(
        "name" => "_baidupan_link",
        "std" => "",
        "title" => "百度网盘地址："),

    "baidupan_password" => array(
        "name" => "_baidupan_password",
        "std" => "",
        "title" => "百度网盘提取码："),

    "otherpan_link" => array(
        "name" => "_otherpan_link",
        "std" => "",
        "title" => "其他网盘地址："),

    "otherpan_password" => array(
        "name" => "_otherpan_password",
        "std" => "",
        "title" => "其他网盘提取码："),

    "rar_password" => array(
        "name" => "_rar_password",
        "std" => "",
        "title" => "压缩包解压密码："),
);


//二、创建自定义字段输入框
    /**
        * 以下代码将用于创建自定义域以及输入框
    */
    function new_meta_boxes() {
  global $post, $new_meta_boxes;

  foreach($new_meta_boxes as $meta_box) {
    $meta_box_value = get_post_meta($post->ID, $meta_box['name'].'_value', true);

    if($meta_box_value == "")
      $meta_box_value = $meta_box['std'];

    // 自定义字段标题
    echo'<p>'.$meta_box['title'].'</p>';

    // 自定义字段输入框
    echo '<span><textarea cols="60" rows="1" name="'.$meta_box['name'].'_value">'.$meta_box_value.'</textarea></span>';
  }
   
  echo '<input type="hidden" name="ludou_metaboxes_nonce" id="ludou_metaboxes_nonce" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
}

//三、创建自定义字段模块
    /**
        * 以下代码将用于创建自定义域以及输入框
    */
     function create_meta_box() {
        if ( function_exists('add_meta_box') ) {
          add_meta_box( 'new-meta-boxes', '下载', 'new_meta_boxes', 'post', 'normal', 'high' );
        }
      }

//四、保存文章数据
      function save_postdata( $post_id ) {
        global $new_meta_boxes;
         
        if ( !wp_verify_nonce( $_POST['ludou_metaboxes_nonce'], plugin_basename(__FILE__) ))
          return;
         
        if ( !current_user_can( 'edit_posts', $post_id ))
          return;
                     
        foreach($new_meta_boxes as $meta_box) {
          $data = $_POST[$meta_box['name'].'_value'];
      
          if($data == "")
            delete_post_meta($post_id, $meta_box['name'].'_value', get_post_meta($post_id, $meta_box['name'].'_value', true));
          else
            update_post_meta($post_id, $meta_box['name'].'_value', $data);
         }
      }
//五、将函数连接到指定action（动作）
    /**
        * 这是最后一步，也是最重要的一步，我们要做的是将函数连接到指定action（动作），以让WordPress程序执行我们之前编写的函数：
    */

    add_action('admin_menu', 'create_meta_box');
    add_action('save_post', 'save_postdata');


?>