<?php 
/* Template Name: Contact Us*/
wp_enqueue_style('contact');
get_header();
?>
<div class="form-container">
    <h1>Contact Us</h1>
<?php
echo do_shortcode('[contact-form-7 id="81" title="Contact Us"]');
?>
</div>

<?php
wp_enqueue_script('validate');
get_footer();
?>