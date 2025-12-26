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
            <p class="masthead-title" style="font-size: 40px; margin-bottom: 30px;">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
            </p>
            
            <div class="footer-grid">
                <div class="footer-column">
                    <h3>Company</h3>
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
                    <h3>Sections</h3>
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
                    <h3>Get The Post</h3>
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
                    <h3>Contact Us</h3>
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
                    <h3>Terms of Use</h3>
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

<!-- Bookmark/Save Modal -->
<div id="bookmark-modal" class="custom-modal">
    <div class="modal-overlay"></div>
    <div class="modal-content">
        <button class="modal-close">&times;</button>
        <h3 class="modal-title">Save to Bookmarks</h3>
        <div class="modal-body">
            <div class="instruction-group desktop-only">
                <p><strong>Windows/Linux:</strong> <kbd>Ctrl</kbd> + <kbd>D</kbd></p>
                <p><strong>Mac:</strong> <kbd>Cmd</kbd> + <kbd>D</kbd></p>
            </div>
            <div class="instruction-group mobile-only">
                <p><strong>iOS Safari:</strong> Share &rarr; Add to Home Screen</p>
                <p><strong>Android Chrome:</strong> Menu &rarr; Add to Home screen</p>
            </div>
        </div>
    </div>
</div>

<!-- Share Modal -->
<div id="share-modal" class="custom-modal">
    <div class="modal-overlay"></div>
    <div class="modal-content share-modal-content">
        <button class="modal-close">&times;</button>
        <h3 class="modal-title">Share this Story</h3>
        <div class="modal-body">
            <div id="native-share-container" style="display: none; margin-bottom: 20px;">
                <button id="btn-native-share" class="share-btn-primary">
                    <span class="icon">&#10150;</span> Share via...
                </button>
            </div>

            <div class="copy-link-section">
                <div class="copy-input-wrapper">
                    <input type="text" id="share-url" readonly value="<?php echo is_single() ? get_permalink() : home_url('/'); ?>">
                    <button id="btn-copy-link">Copy</button>
                </div>
                <span id="copy-toast" class="toast-msg">Copied!</span>
            </div>

            <div class="social-quick-buttons">
                <?php
                $share_url = urlencode(is_single() ? get_permalink() : home_url('/'));
                $share_title = urlencode(is_single() ? get_the_title() : get_bloginfo('name'));
                ?>
                <a href="https://wa.me/?text=<?php echo $share_title . '%20' . $share_url; ?>" target="_blank" class="social-icon wa" title="WhatsApp">
                    <img src="https://cdn-icons-png.flaticon.com/512/733/733585.png" alt="WhatsApp">
                </a>
                <a href="https://t.me/share/url?url=<?php echo $share_url; ?>&text=<?php echo $share_title; ?>" target="_blank" class="social-icon tg" title="Telegram">
                    <img src="https://cdn-icons-png.flaticon.com/512/2111/2111646.png" alt="Telegram">
                </a>
                <a href="https://twitter.com/intent/tweet?url=<?php echo $share_url; ?>&text=<?php echo $share_title; ?>" target="_blank" class="social-icon x" title="X/Twitter">
                    <img src="https://cdn-icons-png.flaticon.com/512/733/733579.png" alt="X">
                </a>
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $share_url; ?>" target="_blank" class="social-icon fb" title="Facebook">
                    <img src="https://cdn-icons-png.flaticon.com/512/733/733547.png" alt="Facebook">
                </a>
                <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo $share_url; ?>" target="_blank" class="social-icon in" title="LinkedIn">
                    <img src="https://cdn-icons-png.flaticon.com/512/174/174857.png" alt="LinkedIn">
                </a>
            </div>
        </div>
    </div>
</div>

<?php wp_footer(); ?>
</body>
</html>
