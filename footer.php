<div class="footer">
        <small class="footer-small text-center col-xs-12 col-md-12">© 2019 All rights <?php bloginfo('name'); ?>.
        &nbsp;&nbsp;&nbsp;
        <span><?php echo of_get_option('beian', ''); ?></span>
        &nbsp;&nbsp;&nbsp;
        <span>邮箱：<?php echo of_get_option('your-email', 'null'); ?></span></small>
    </div>

    <script src="<?php bloginfo('template_url'); ?>/res/js/jquery-3.4.1.min.js"></script>
    <!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
    <script src="<?php bloginfo('template_url'); ?>/res/js/bootstrap.min.js"></script>
    
    
    
    <?php wp_footer(); ?>
</body>
</html>