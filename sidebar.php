<div class="rbox">

            <div class="card">
                <?php if ( !function_exists('dynamic_sidebar') 
                            || !dynamic_sidebar('First_sidebar') ) : ?>
                    <h2>我的名片</h2>
                    <p>网名：DanceSmile | 即步非烟</p>
                    <p>职业：Web前端设计师、网页设计</p>
                    <p>现居：四川省-成都市</p>
                    <p>Email：<?php echo of_get_option('your-email', '请到主题选项--基本设置中填写'); ?></p>
                <?php endif; ?>
            </div>
            <div>
                <?php 
                    if(is_home() || is_front_page()) { //首页显示“首页侧栏”
                        if (function_exists('dynamic_sidebar') && dynamic_sidebar('sidebar-index')){} 
                    }
                ?>
                <?php 
                    if ( is_single() ) {//文章页显示 “文章页侧栏”
                        if (function_exists('dynamic_sidebar') && dynamic_sidebar('sidebar-single')){}
                    }
                ?> 
            </div>

            <div class="whitebg notice">
                <p class="htitle">网站公告</p>
                <ul>
                    <li>
                        <a href="http://v.bootstrapmb.com/">十条设计原则教你学会如何设计网页布局!</a>
                    </li>
                    <li>
                        <a href="http://v.bootstrapmb.com/">用js+css3来写一个手机栏目导航</a>
                    </li>
                    <li>
                        <a href="http://v.bootstrapmb.com/">6条网页设计配色原则,让你秒变配色高手</a>
                    </li>
                    <li>
                        <a href="http://v.bootstrapmb.com/">三步实现滚动条触动css动画效果</a>
                    </li>
                </ul>
            </div>
            <div class="whitebg paihang">
                <p class="htitle">点击排行</p>
                <section class="topnews imgscale">
                    <a href="http://v.bootstrapmb.com/">
                        <img src="<?php bloginfo('template_url'); ?>/images/h1.jpg">
                        <span>6条网页设计配色原则,让你秒变配色高手</span>
                    </a>
                </section>
                <ul>
                    <li>
                        <i></i>
                        <a href="http://v.bootstrapmb.com/">十条设计原则教你学会如何设计网页布局!</a>
                    </li>
                    <li>
                        <i></i>
                        <a href="http://v.bootstrapmb.com/">用js+css3来写一个手机栏目导航</a>
                    </li>
                    <li>
                        <i></i>
                        <a href="http://v.bootstrapmb.com/">6条网页设计配色原则,让你秒变配色高手</a>
                    </li>
                    <li>
                        <i></i>
                        <a href="http://v.bootstrapmb.com/">三步实现滚动条触动css动画效果</a>
                    </li>
                    <li>
                        <i></i>
                        <a href="http://v.bootstrapmb.com/">个人博客，属于我的小世界！</a>
                    </li>
                    <li>
                        <i></i>
                        <a href="http://v.bootstrapmb.com/">安静地做一个爱设计的女子</a>
                    </li>
                    <li>
                        <i></i>
                        <a href="http://v.bootstrapmb.com/">个人网站做好了，百度不收录怎么办？来，看看他们怎么做的。</a>
                    </li>
                    <li>
                        <i></i>
                        <a href="http://v.bootstrapmb.com/">做个人博客如何用帝国cms美化留言增加头像选择</a>
                    </li>
                </ul>
            </div>
            <div class="whitebg tuijian">
                <p class="htitle">站长推荐</p>
                <section class="topnews imgscale">
                    <a href="http://v.bootstrapmb.com/">
                        <img src="<?php bloginfo('template_url'); ?>/images/h2.jpg">
                        <span>6条网页设计配色原则,让你秒变配色高手</span>
                    </a>
                </section>
                <ul>
                    <li>
                        <a href="http://v.bootstrapmb.com/">
                            <i>
                                <img src="<?php bloginfo('template_url'); ?>/images/text01.jpg">
                            </i>
                            <p>十条设计原则教你学会如何设计网页布局!</p>
                        </a>
                    </li>
                    <li>
                        <a href="http://v.bootstrapmb.com/">
                            <i>
                                <img src="<?php bloginfo('template_url'); ?>/images/text02.jpg">
                            </i>
                            <p>用js+css3来写一个手机栏目导航</p>
                        </a>
                    </li>
                    <li>
                        <a href="http://v.bootstrapmb.com/">
                            <i>
                                <img src="<?php bloginfo('template_url'); ?>/images/text03.jpg">
                            </i>
                            <p>6条网页设计配色原则,让你秒变配色高手</p>
                        </a>
                    </li>
                    <li>
                        <a href="http://v.bootstrapmb.com/">
                            <i>
                                <img src="<?php bloginfo('template_url'); ?>/images/text04.jpg">
                            </i> 
                            <p>三步实现滚动条触动css动画效果</p>
                        </a>
                    </li>
                    <li>
                        <a href="http://v.bootstrapmb.com/">
                            <i>
                                <img src="<?php bloginfo('template_url'); ?>/images/text05.jpg">
                            </i>
                            <p>个人博客，属于我的小世界！</p>
                        </a>
                    </li>
                    <li>
                        <a href="http://v.bootstrapmb.com/">
                            <i>
                                <img src="<?php bloginfo('template_url'); ?>/images/text06.jpg">
                            </i>
                            <p>安静地做一个爱设计的女子</p>
                        </a>
                    </li>
                    <li>
                        <a href="http://v.bootstrapmb.com/">
                            <i>
                                <img src="<?php bloginfo('template_url'); ?>/images/text07.jpg">
                            </i>
                            <p>个人网站做好了，百度不收录怎么办？来，看看他们怎么做的。</p>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="ad whitebg imgscale">
                <ul>
                    <a href="http://v.bootstrapmb.com/">
                        <img src="<?php bloginfo('template_url'); ?>/images/ad.jpg">
                    </a>
                </ul>
            </div>
            <div class="whitebg wenzi">
                <p class="htitle">猜你喜欢</p>
                <ul>
                    <li>
                        <a href="http://v.bootstrapmb.com/">十条设计原则教你学会如何设计网页布局!</a>
                    </li>
                    <li>
                        <a href="http://v.bootstrapmb.com/">用js+css3来写一个手机栏目导航</a>
                    </li>
                    <li>
                        <a href="http://v.bootstrapmb.com/">6条网页设计配色原则,让你秒变配色高手</a>
                    </li>
                    <li>
                        <a href="http://v.bootstrapmb.com/">三步实现滚动条触动css动画效果</a>
                    </li>
                    <li>
                        <a href="http://v.bootstrapmb.com/">个人博客，属于我的小世界！</a>
                    </li>
                    <li>
                        <a href="http://v.bootstrapmb.com/">安静地做一个爱设计的女子</a>
                    </li>
                    <li>
                        <a href="http://v.bootstrapmb.com/">个人网站做好了，百度不收录怎么办？来，看看他们怎么做的。</a>
                    </li>
                    <li>
                        <a href="http://v.bootstrapmb.com/">做个人博客如何用帝国cms美化留言增加头像选择</a>
                    </li>
                </ul>
            </div>
            <div class="whitebg tongji">
                <p class="htitle">站点信息</p>
                <ul>
                    <li>
                        <b>建站时间</b>：2018-10-24
                    </li>
                    <li>
                        <b>网站程序</b>：帝国CMS7.5
                    </li>
                    <li>
                        <b>主题模板</b>：<a href="http://v.bootstrapmb.com/2019/3/ik0la3804/index.html#" target="_blank">《今夕何夕》</a>
                    </li>
                    <li>
                        <b>文章统计</b>：299条
                    </li>
                    <li>
                        <b>文章评论</b>：490条
                    </li>
                    <li>
                        <b>统计数据</b>：<a href="http://v.bootstrapmb.com/">百度统计</a>
                    </li>
                    <li>
                        <b>微信公众号</b>：扫描二维码，关注我们
                    </li>
                    <img src="<?php bloginfo('template_url'); ?>/images/wxgzh.jpg" class="tongji_gzh">
                </ul>
            </div>
            <div class="links whitebg">
                <p class="htitle">
                    <span class="sqlink">
                        <a href="http://v.bootstrapmb.com/">申请链接</a>
                    </span>
                    友情链接
                </p>
                <ul>
                    <li>
                        <a href="http://v.bootstrapmb.com/2019/3/ik0la3804/index.html#" target="_blank">杨青青个人博客</a>
                    </li>
                </ul>
            </div>
        </div>

