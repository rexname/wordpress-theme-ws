<?php
/**
 * Template Name: Privacy Policy
 */

get_header();
?>

<main id="primary" class="site-main container-narrow" style="padding: 60px 0;">
    <article class="page-content">
        <header class="entry-header">
            <h1 class="entry-title" style="font-family: 'Playfair Display', serif; font-size: 48px; margin-bottom: 40px;"><?php _e('Privacy Policy', 'modern-broadsheet'); ?></h1>
        </header>

        <div class="entry-content" style="line-height: 1.8; color: #ccc;">
            <p><em><?php printf(__('Last Updated: %s', 'modern-broadsheet'), date('F j, Y')); ?></em></p>

            <p><?php printf(__('Your privacy is important to us. It is %s\'s policy to respect your privacy regarding any information we may collect from you across our website and other sites we own and operate.', 'modern-broadsheet'), get_bloginfo('name')); ?></p>

            <h2 style="color: #fff; margin-top: 30px;">1. Information We Collect</h2>
            <p><?php _e('We only ask for personal information when we truly need it to provide a service to you. We collect it by fair and lawful means, with your knowledge and consent. We also let you know why we’re collecting it and how it will be used.', 'modern-broadsheet'); ?></p>

            <h2 style="color: #fff; margin-top: 30px;">2. Use of Information</h2>
            <p><?php _e('We only retain collected information for as long as necessary to provide you with your requested service. What data we store, we’ll protect within commercially acceptable means to prevent loss and theft, as well as unauthorized access, disclosure, copying, use or modification.', 'modern-broadsheet'); ?></p>

            <h2 style="color: #fff; margin-top: 30px;">3. Data Sharing</h2>
            <p><?php _e('We don’t share any personally identifying information publicly or with third-parties, except when required to by law.', 'modern-broadsheet'); ?></p>

            <h2 style="color: #fff; margin-top: 30px;">4. Third-Party Links</h2>
            <p><?php _e('Our website may link to external sites that are not operated by us. Please be aware that we have no control over the content and practices of these sites, and cannot accept responsibility or liability for their respective privacy policies.', 'modern-broadsheet'); ?></p>

            <h2 style="color: #fff; margin-top: 30px;">5. Your Rights</h2>
            <p><?php _e('You are free to refuse our request for your personal information, with the understanding that we may be unable to provide you with some of your desired services.', 'modern-broadsheet'); ?></p>

            <h2 style="color: #fff; margin-top: 30px;">6. Cookies</h2>
            <p><?php _e('We use "cookies" to collect information about you and your activity across our site. A cookie is a small piece of data that our website stores on your computer, and accesses each time you visit, so we can understand how you use our site. This helps us serve you content based on preferences you have specified.', 'modern-broadsheet'); ?></p>

            <h2 style="color: #fff; margin-top: 30px;">7. Changes to This Policy</h2>
            <p><?php printf(__('We may update our Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page. You are advised to review this Privacy Policy periodically for any changes.', 'modern-broadsheet')); ?></p>

            <h2 style="color: #fff; margin-top: 30px;">8. Contact Us</h2>
            <p><?php printf(__('If you have any questions about how we handle user data and personal information, feel free to contact us.', 'modern-broadsheet')); ?></p>
        </div>
    </article>
</main>

<?php
get_footer();
