<?php
/**
 * Template Name: 投稿页面
 */
    
if( isset($_POST['tougao_form']) && $_POST['tougao_form'] == 'send') {
    global $wpdb;
    
    $current_url = get_option('home');   // 注意修改此处的链接地址

    $last_post = $wpdb->get_var("SELECT `post_date` FROM `$wpdb->posts` ORDER BY `post_date` DESC LIMIT 1");

    // 博客当前最新文章发布时间与要投稿的文章至少间隔120秒。
    // 可自行修改时间间隔，修改下面代码中的120即可
    // 相比Cookie来验证两次投稿的时间差，读数据库的方式更加安全
    if ( (date_i18n('U') - strtotime($last_post)) < 120 ) {
        wp_die('您投稿也太勤快了吧，先歇会儿！<a href="'.$current_url.'">点此返回</a>');
    }
        
    // 表单变量初始化
    $name = isset( $_POST['tougao_authorname'] ) ? trim(htmlspecialchars($_POST['tougao_authorname'], ENT_QUOTES)) : '';
    $email =  isset( $_POST['tougao_authoremail'] ) ? trim(htmlspecialchars($_POST['tougao_authoremail'], ENT_QUOTES)) : '';
    $blog =  isset( $_POST['tougao_authorblog'] ) ? trim(htmlspecialchars($_POST['tougao_authorblog'], ENT_QUOTES)) : '';
    $title =  isset( $_POST['tougao_title'] ) ? trim(htmlspecialchars($_POST['tougao_title'], ENT_QUOTES)) : '';
    $category =  isset( $_POST['cat'] ) ? (int)$_POST['cat'] : 0;
    $content =  isset( $_POST['tougao_content'] ) ? trim(htmlspecialchars($_POST['tougao_content'], ENT_QUOTES)) : '';
    
    // 表单项数据验证
    if ( empty($name) || mb_strlen($name) > 20 ) {
        wp_die('昵称必须填写，且长度不得超过20字。<a href="'.$current_url.'">点此返回</a>');
    }
    
    if ( empty($email) || strlen($email) > 60 || !preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email)) {
        wp_die('Email必须填写，且长度不得超过60字，必须符合Email格式。<a href="'.$current_url.'">点此返回</a>');
    }
    
    if ( empty($title) || mb_strlen($title) > 100 ) {
        wp_die('标题必须填写，且长度不得超过100字。<a href="'.$current_url.'">点此返回</a>');
    }
    
    if ( empty($content) || mb_strlen($content) > 3000 || mb_strlen($content) < 100) {
        wp_die('内容必须填写，且长度不得超过3000字，不得少于100字。<a href="'.$current_url.'">点此返回</a>');
    }
    
    $post_content = '昵称: '.$name.'<br />Email: '.$email.'<br />blog: '.$blog.'<br />内容:<br />'.$content;
    
    $tougao = array(
        'post_title' => $title, 
        'post_content' => $post_content,
        'post_category' => array($category)
    );


    // 将文章插入数据库
    $status = wp_insert_post( $tougao );
  
    if ($status != 0) { 
        // 投稿成功给博主发送邮件
        // somebody#example.com替换博主邮箱
        // My subject替换为邮件标题，content替换为邮件内容
        wp_mail("somebody#example.com","My subject","content");

        wp_die('投稿成功！感谢投稿！<a href="'.$current_url.'">点此返回</a>', '投稿成功');
    }
    else {
        wp_die('投稿失败！<a href="'.$current_url.'">点此返回</a>');
    }
}

get_header(); ?>





<article>

<?php if (have_posts()) : the_post(); update_post_caches($posts); ?>

<div class="whitebg" style="width:60%; margin: 0 auto;">

<div class="con_text">
    <?php the_content(); ?>
</div>


<!-- 关于表单样式，请自行调整-->
<form class="ludou-tougao" method="post" action="<?php echo $_SERVER["REQUEST_URI"]; $current_user = wp_get_current_user(); ?>" role="form">
	<div style="text-align: left; padding-top: 10px;" class="form-group">
		<label for="tougao_authorname">昵称：*</label>
		<input type="text" size="40" value="<?php if ( 0 != $current_user->ID ) echo $current_user->user_login; ?>" id="tougao_authorname" name="tougao_authorname" class ="form-control" />
	</div>

	<div style="text-align: left; padding-top: 10px;" class="form-group">
		<label for="tougao_authoremail">E-Mail：*</label>
		<input type="text" size="40" value="<?php if ( 0 != $current_user->ID ) echo $current_user->user_email; ?>" id="tougao_authoremail" name="tougao_authoremail" class ="form-control" />
	</div>

	<div style="text-align: left; padding-top: 10px;" class="form-group">
		<label for="tougao_authorblog">您的博客：</label>
		<input type="text" size="40" value="<?php if ( 0 != $current_user->ID ) echo $current_user->user_url; ?>" id="tougao_authorblog" name="tougao_authorblog" class ="form-control" />
	</div>

	<div style="text-align: left; padding-top: 10px;" class="form-group">
		<label for="tougao_title">文章标题：*</label>
		<input type="text" size="40" value="" id="tougao_title" name="tougao_title" class ="form-control" />
	</div>

	<div style="text-align: left; padding-top: 10px;" class="form-group">
		<label for="tougaocategorg">分类：*</label>
		<?php wp_dropdown_categories('hide_empty=0&id=tougaocategorg&show_count=1&hierarchical=1&class=form-control'); ?>
	</div>

	<div style="text-align: left; padding-top: 10px;" class="form-group">
		<label style="vertical-align:top" for="tougao_content">文章内容：*</label>
		<textarea rows="15" cols="55" id="tougao_content" name="tougao_content" class ="form-control"></textarea>
	</div>

	<br clear="all">
	<div style="text-align: center; padding-top: 10px;" class="form-group">
		<input type="hidden" value="send" name="tougao_form" />
		<input type="submit" value="提交" class ="form-control" style="width:100px" />
        <br>
		<input type="reset" value="重填" class ="form-control" style="width:100px" />
	</div>
</form>
</div>
<?php else : ?>
        <div class="grid_8">
            没有找到你想要的页面！
        </div>
    <?php endif; ?>
</article>



<?php get_footer(); ?>