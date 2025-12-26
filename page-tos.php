<?php
/**
 * Template Name: Terms of Service
 */

get_header();
?>

<main id="primary" class="site-main container-narrow" style="padding: 60px 0;">
    <article class="page-content">
        <header class="entry-header">
            <h1 class="entry-title" style="font-family: 'Playfair Display', serif; font-size: 48px; margin-bottom: 40px;"><?php _e('Terms of Service', 'modern-broadsheet'); ?></h1>
        </header>

        <div class="entry-content" style="line-height: 1.8; color: #ccc;">
            <p><em><?php printf(__('Last Updated: %s', 'modern-broadsheet'), date('F j, Y')); ?></em></p>

            <h2 style="color: #fff; margin-top: 30px;">1. Acceptance of Terms</h2>
            <p><?php printf(__('Welcome to %s. By accessing or using our website, you agree to be bound by these Terms of Service and all applicable laws and regulations.', 'modern-broadsheet'), get_bloginfo('name')); ?></p>

            <h2 style="color: #fff; margin-top: 30px;">2. Use License</h2>
            <p><?php printf(__('Permission is granted to temporarily download one copy of the materials (information or software) on %s\'s website for personal, non-commercial transitory viewing only.', 'modern-broadsheet'), get_bloginfo('name')); ?></p>
            <p><?php _e('This is the grant of a license, not a transfer of title, and under this license you may not:', 'modern-broadsheet'); ?></p>
            <ul>
                <li><?php _e('Modify or copy the materials;', 'modern-broadsheet'); ?></li>
                <li><?php _e('Use the materials for any commercial purpose, or for any public display (commercial or non-commercial);', 'modern-broadsheet'); ?></li>
                <li><?php _e('Attempt to decompile or reverse engineer any software contained on the website;', 'modern-broadsheet'); ?></li>
                <li><?php _e('Remove any copyright or other proprietary notations from the materials; or', 'modern-broadsheet'); ?></li>
                <li><?php _e('Transfer the materials to another person or "mirror" the materials on any other server.', 'modern-broadsheet'); ?></li>
            </ul>

            <h2 style="color: #fff; margin-top: 30px;">3. Disclaimer</h2>
            <p><?php printf(__('The materials on %s\'s website are provided on an \'as is\' basis. %s makes no warranties, expressed or implied, and hereby disclaims and negates all other warranties including, without limitation, implied warranties or conditions of merchantability, fitness for a particular purpose, or non-infringement of intellectual property or other violation of rights.', 'modern-broadsheet'), get_bloginfo('name'), get_bloginfo('name')); ?></p>

            <h2 style="color: #fff; margin-top: 30px;">4. Limitations</h2>
            <p><?php printf(__('In no event shall %s or its suppliers be liable for any damages (including, without limitation, damages for loss of data or profit, or due to business interruption) arising out of the use or inability to use the materials on %s\'s website.', 'modern-broadsheet'), get_bloginfo('name'), get_bloginfo('name')); ?></p>

            <h2 style="color: #fff; margin-top: 30px;">5. Accuracy of Materials</h2>
            <p><?php printf(__('The materials appearing on %s\'s website could include technical, typographical, or photographic errors. %s does not warrant that any of the materials on its website are accurate, complete or current.', 'modern-broadsheet'), get_bloginfo('name'), get_bloginfo('name')); ?></p>

            <h2 style="color: #fff; margin-top: 30px;">6. Links</h2>
            <p><?php printf(__('%s has not reviewed all of the sites linked to its website and is not responsible for the contents of any such linked site. The inclusion of any link does not imply endorsement by %s of the site.', 'modern-broadsheet'), get_bloginfo('name'), get_bloginfo('name')); ?></p>

            <h2 style="color: #fff; margin-top: 30px;">7. Modifications</h2>
            <p><?php printf(__('%s may revise these terms of service for its website at any time without notice. By using this website you are agreeing to be bound by the then current version of these terms of service.', 'modern-broadsheet'), get_bloginfo('name')); ?></p>

            <h2 style="color: #fff; margin-top: 30px;">8. Governing Law</h2>
            <p><?php _e('These terms and conditions are governed by and construed in accordance with the laws and you irrevocably submit to the exclusive jurisdiction of the courts in that State or location.', 'modern-broadsheet'); ?></p>
        </div>
    </article>
</main>

<?php
get_footer();
