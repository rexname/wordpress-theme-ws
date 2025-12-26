<footer class="site-footer">
    <div class="container">
        <!-- Trending Topics Section -->
        <div class="diversions-section">
            <h2 class="section-title" style="margin-bottom: 20px;">Trending Topics</h2>
            <ul class="diversions-list trending-topics-list">
                <li><a href="<?php echo esc_url( home_url( '/?s=Elections' ) ); ?>"><span class="trending-icon">#</span> Elections</a></li>
                <li><a href="<?php echo esc_url( home_url( '/?s=Technology' ) ); ?>"><span class="trending-icon">#</span> Technology</a></li>
                <li><a href="<?php echo esc_url( home_url( '/?s=Climate' ) ); ?>"><span class="trending-icon">#</span> Climate</a></li>
                <li><a href="<?php echo esc_url( home_url( '/?s=Economy' ) ); ?>"><span class="trending-icon">#</span> Economy</a></li>
                <li><a href="<?php echo esc_url( home_url( '/?s=Health' ) ); ?>"><span class="trending-icon">#</span> Health</a></li>
                <li><a href="<?php echo esc_url( home_url( '/?s=World+News' ) ); ?>"><span class="trending-icon">#</span> World News</a></li>
                <li><a href="<?php echo esc_url( home_url( '/?s=Sports' ) ); ?>"><span class="trending-icon">#</span> Sports</a></li>
                <li><a href="<?php echo esc_url( home_url( '/?s=Entertainment' ) ); ?>"><span class="trending-icon">#</span> Entertainment</a></li>
                <li><a href="<?php echo esc_url( home_url( '/?s=Science' ) ); ?>"><span class="trending-icon">#</span> Science</a></li>
            </ul>
        </div>

        <div style="padding: 40px 0; border-top: 1px solid #333;">
            <h1 class="masthead-title" style="font-size: 40px; margin-bottom: 30px;">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
            </h1>
            
            <div class="footer-grid">
                <div class="footer-column">
                    <h4>Company</h4>
                    <ul>
                        <li><a href="#">About The Post</a></li>
                        <li><a href="#">Newsroom Policies & Standards</a></li>
                        <li><a href="#">Diversity & Inclusion</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Media & Community Relations</a></li>
                        <li><a href="#">WP Creative Group</a></li>
                        <li><a href="#">Accessibility Statement</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h4>Sections</h4>
                    <ul>
                        <li><a href="#">Trending</a></li>
                        <li><a href="#">Politics</a></li>
                        <li><a href="#">Elections</a></li>
                        <li><a href="#">Opinions</a></li>
                        <li><a href="#">National</a></li>
                        <li><a href="#">World</a></li>
                        <li><a href="#">Style</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h4>Get The Post</h4>
                    <ul>
                        <li><a href="#">WP Intelligence</a></li>
                        <li><a href="#">Enterprise Subscriptions</a></li>
                        <li><a href="#">Become a Subscriber</a></li>
                        <li><a href="#">Gift Subscriptions</a></li>
                        <li><a href="#">Mobile & Apps</a></li>
                        <li><a href="#">Newsletters & Alerts</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h4>Contact Us</h4>
                    <ul>
                        <li><a href="#">Contact the Newsroom</a></li>
                        <li><a href="#">Contact Customer Care</a></li>
                        <li><a href="#">Contact the Opinions Team</a></li>
                        <li><a href="#">Advertise</a></li>
                        <li><a href="#">Licensing & Syndication</a></li>
                        <li><a href="#">Request a Correction</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h4>Terms of Use</h4>
                    <ul>
                        <li><a href="#">Digital Products Terms of Sale</a></li>
                        <li><a href="#">Print Products Terms of Sale</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/terms-of-service/' ) ); ?>">Terms of Service</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>">Privacy Policy</a></li>
                        <li><a href="#">Cookie Settings</a></li>
                        <li><a href="#">Submissions & Discussion Policy</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="footer-info" style="border-top: 1px solid #333; padding: 20px 0; text-align: center; font-size: 12px; color: #666;">
            <p>&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>. All rights reserved.</p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
