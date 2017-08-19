<footer id="contacts">

    <div class="container">

        <div class="col-md-4">

            <div class="address">

                <?php if (LANG == 'RU') echo get_option('gl_address'); else echo get_option('gl_address_en'); ?><br />

                <?php echo get_option('gl_phone'); ?> | <?php echo get_option('gl_email'); ?>

            </div>

            <div class="social">

                <div class="social_ico">

                    <a target="_blank" href="<?php echo get_option('gl_social_fb'); ?>">

                        <img src="<?php echo get_template_directory_uri(); ?>/img/fb.png" alt="" />

                    </a>

                </div>

                <div class="social_ico">

                    <a target="_blank" href="<?php echo get_option('gl_social_youtube'); ?>">

                        <img src="<?php echo get_template_directory_uri(); ?>/img/ytb.png" alt="" />

                    </a>

                </div>

                <div class="social_ico">

                    <a target="_blank" href="<?php echo get_option('gl_social_vk'); ?>">

                        <img src="<?php echo get_template_directory_uri(); ?>/img/vk.png" alt="" />

                    </a>

                </div>

                <div class="social_ico">

                    <a target="_blank" href="<?php echo get_option('gl_social_tw'); ?>">

                        <img src="<?php echo get_template_directory_uri(); ?>/img/tw.png" alt="" />

                    </a>

                </div>

                <div class="clear"></div>

                <div class="regulation_on_protection">
                    <a href="/polozhenie-o-zashhite-personal-ny-h-danny-h/"><?php echo lng_text('Положение о защите персональных данных'); ?></a>
                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="footer_info">

                <?php if (LANG == 'RU') echo get_option('gl_description'); else  echo get_option('gl_description_en'); ?>

            </div>

        </div>

        <div class="col-md-4"></div>

        <div class="col-md-4">

            <div class="copyright">

                <div class="copyright_ico">

                    © LABMGMU

                </div>

                <div class="copyright_text">
                    <?php if (LANG == 'RU') echo get_option('gl_copyright'); else  echo get_option('gl_copyright_en'); ?>
                </div>

                <div class="copyright_design">

                    <div class="copyright_a">

                        <a href="http://labmgmu-media.ru/"target="_blank"class="gabriola">design & promotion</a>

                    </div>

                    <div class="copyright_a_line"></div>

                    <div class="copyright_a">

                        <a href="http://labmgmu-media.ru/"target="_blank">LABMGMU-Media</a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</footer>

<?php //wp_footer(); ?>

</body>

</html>

