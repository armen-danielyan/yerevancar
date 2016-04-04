        <footer>
            <nav>
                <?php
                wp_nav_menu( array(
                    'menu'              => 'footer-menu',
                    'theme_location'    => 'yerevancar',
                    'depth'             => 2
                ));
                ?>
            </nav>
            <div class="row">
                <div class="col-md-12">
                    <address>© <?php echo date("Y"); ?> Powered by <a href="http://ilikeit.am" target="_blank">I LIKE IT</a></address>
                </div>
            </div>
        </footer>
    </div>
    <?php wp_footer(); ?>
</body>
</html>