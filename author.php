<?php get_header(); ?>
<article>
<div class="text-center whitebg"><?php echo get_avatar( get_the_author_meta('email'), 100);?></div>
<?php
if(isset($_GET['author_name'])) :
$curauth = get_userdatabylogin($author_name);
else :
$curauth = get_userdata(intval($author));
endif;
?>
<div class="widget-title">作者档案</div>
<div class="author_da">
<?php if($curauth->touxiang){ ?><div class="avatar"><img src="<?php echo $curauth->touxiang; ?>" /></div><?php } ?>
<?php if($curauth->display_name){ ?><p><b>昵称：</b><?php echo $curauth->display_name; ?></p><?php } ?>
<?php if($curauth->job){ ?><p><b>职业：</b><?php echo $curauth->job; ?></p><?php } ?>
<?php if($curauth->addres){ ?><p><b>所在地：</b><?php echo $curauth->addres; ?></p><?php } ?>
<?php if($curauth->user_url){ ?><p><b>主页：</b> <a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a></p><?php } ?>
<?php if($curauth->user_email){ ?><p><b>邮箱：</b><?php the_author_meta('email') ?></p><?php } ?>
<?php if($curauth->qq){ ?><p><b>QQ：</b><?php echo $curauth->qq; ?></p><?php } ?>
<?php if($curauth->description){ ?><p><b>个人简介：</b><?php echo $curauth->description; ?></p><?php } ?>
</div>
</article>