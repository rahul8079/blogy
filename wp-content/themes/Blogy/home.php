<?php
/* Template Name: Home */
get_header();
?>
<!-- Post Feture Starts Here -->
<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="heading">Recent Post</h4>
            </div>
        </div>
        <div class="row">
            <?php
            $posts = get_post_type_data('blog-post', 3);

            foreach ($posts as $post) {

                $tag_obj = get_the_tags($post['id']);
                $tag_name = $tag_obj[0]->name;
            ?>
                <div class="col-lg-4">
                    <div class="post-feature">
                        <span class="fs-6 has-line"><?php echo $tag_name ?></span>
                        <h6><a href="<?php echo site_url().'/full-article'?>"><?php echo $post['title'] ?></a></h6>
                        <div class="blog-item-info-release">
                            <span>March 25, 2021</span> <span class="dot"></span> <span>4 min read</span>
                        </div>
                        <a href="details.html" class="btn btn-link">Read Article
                            <svg width="18" height="12" viewBox="0 0 18 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12.5 1.5L17 6M17 6L12.5 10.5M17 6H1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<!-- Post Feture Ends Here -->

<!-- Latest Post Starts Here -->
<section class="section-padding latest-post-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="heading">Latest Post</h4>
            </div>
        </div>
        <div class="row">
            <?php
            $posts = get_post_type_data('blog-post', 3);

            foreach ($posts as $post) {

                $tag_obj = get_the_tags($post['id']);
                $tag_name = $tag_obj[0]->name;
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
            <?php } ?>
        </div>
</section>
<!-- Latest Post Ends Here -->

<!-- Featured Post Starts Here -->
<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="heading">Featured Post</h4>
            </div>
        </div>
        <div class="row">
            <?php
            $posts = get_post_type_data('featured-post', 2);

            foreach ($posts as $post) {
                $tag_obj = get_the_tags($post['id']);
                $tag_name = $tag_obj[0]->name;
            ?>
                <div class="blog-item col-lg-6 col-md-6">
                    <div class="blog-item-image">
                        <a href="<?php echo site_url().'/full-article'?>">
                            <?php echo get_the_post_thumbnail($post['id']) ?>
                        </a>
                    </div>
                    <div class="blog-item-info">
                        <span class="fs-6 has-line"><?php echo $tag_name ?></span>
                        <h5><a href="details.html"><?php echo $post['title'] ?></a></h5>
                        <div class="blog-item-info-release">
                            <span>March 25, 2021</span> <span class="dot"></span> <span>4 min read</span>
                        </div>
                        <a href="details.html" class="btn btn-link">Read Article
                            <svg width="18" height="12" viewBox="0 0 18 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12.5 1.5L17 6M17 6L12.5 10.5M17 6H1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<!-- Featured Post Ends Here -->

<!-- All Post Starts Here -->
<section class="section-padding all-post-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="heading">All Post</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <?php
                    $posts = get_post_type_data('blog-post', 4);
                    foreach ($posts as $post) {
                        $tag_obj = get_the_tags($post['id']);
                        $tag_name = $tag_obj[0]->name;
                    ?>
                        <div class="col-lg-6 col-md-6">
                            <div class="blog-item blog-item-sm">
                                <div class="blog-item-image">
                                    <a href="<?php echo site_url().'/full-article'?>">
                                        <?php echo get_the_post_thumbnail($post['id']) ?>
                                    </a>
                                </div>
                                <div class="blog-item-info">
                                    <span class="fs-6 has-line"><?php echo $tag_name; ?></span>
                                    <h5><a href="<?php echo site_url().'/full-article'?>"><?php echo $post['title']; ?></a></h5>
                                    <div class="blog-item-info-release">
                                        <span>March 25, 2021</span> <span class="dot"></span> <span>4 min read</span>
                                    </div>
                                    <a href="d<?php echo site_url().'/full-article'?>" class="btn btn-link">Read Article
                                        <svg width="18" height="12" viewBox="0 0 18 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12.5 1.5L17 6M17 6L12.5 10.5M17 6H1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                            </path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-lg-4 mt-4 mt-lg-0">
                <div class="featured-category">
                    <h6>Featured Category</h6>
                    <?php
                    $posts = get_post_type_data('featured-category', 3);
                    foreach ($posts as $post) {
                    ?>
                        <div class="featured-category-item">
                            <?php echo get_the_post_thumbnail($post['id']); ?>
                            <a href="#"><?php echo $post['title']; ?></a>
                        </div>
                    <?php } ?>
                </div>

                <div class="all-tags">
                    <h6>All Tags</h6>
                    <?php
                    $tags = get_tags();
                    ?>
                    <ul class="list-unstyled list-inline all-tags-list">
                        <?php foreach ($tags as $tag) { ?>
                            <li class="list-inline-item"><a href="#"><?php echo $tag->name ?></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<?php

get_footer();
?>