<?php
/* Template Name: Search*/
if (isset($_GET['search'])) {
    get_header();
    $search = $_GET['search'];

?>

    <section class="section-padding latest-post-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?php
                    $page_title = wp_title('', false);
                    settype($page_title, "string");
                    $page_title = trim($page_title, " ");
                    ?>
                    <h4 class="heading"><?php echo $page_title ?></h4>
                </div>
            </div>
            <div class="row">
                <?php
                $posts = get_post_type_data('blog-post', -1);
                $available_posts = 0;
                foreach ($posts as $post) {
                    $tag_obj = get_the_tags($post['id']);
                    $tag_name = $tag_obj[0]->name;
                    if (strcmp(strtolower($tag_name), strtolower($search)) == 0) {
                        $available_posts++;

                ?>
                        <div class="blog-item col-md-6 col-lg-4">
                            <div class="blog-item-image">
                                <a href="<?php echo site_url() . '/full-article/' ?>">
                                    <?php echo get_the_post_thumbnail($post['id']) ?>
                                </a>
                            </div>
                            <div class="blog-item-info">
                                <span class="fs-6 has-line"><?php echo $tag_name; ?></span>
                                <h5><a href="<?php echo site_url() . '/full-article/' ?>"><?php echo $post['title']; ?></a></h5>
                                <div class="blog-item-info-release">
                                    <span>March 25, 2021</span> <span class="dot"></span> <span>4 min read</span>
                                </div>
                                <a href="<?php echo site_url() . '/full-article/' ?>" class="btn btn-link">Read Article
                                    <svg width="18" height="12" viewBox="0 0 18 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12.5 1.5L17 6M17 6L12.5 10.5M17 6H1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </a>
                            </div>

                        </div>
                <?php }
                }
                if ($available_posts == 0) {
                    echo "<pre>No posts available</pre>";
                }
                ?>
            </div>
    </section>
<?php
    get_footer();
}else{
    wp_redirect(home_url());
} 
?>