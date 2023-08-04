<?php
/* Template Name: Full Article */
wp_enqueue_style('sweet-alert');
get_header();

global $wpdb;
$fetchAllComments = $wpdb->get_results("SELECT * from `user_comments` ORDER BY Timestamp DESC");

function getTimeInterval($comment)
{
    date_default_timezone_set("Asia/Kolkata");
    $now = new DateTime();
    $commentTime = new DateTime($comment->Timestamp);
    $timeDifference = $now->diff($commentTime);

    $days = $timeDifference->d;
    $hours = $timeDifference->h;
    $minutes = $timeDifference->i;
    $seconds = $timeDifference->s;

    if ($days > 0) {
        return $days . ' days ago';
    } elseif ($hours > 0) {
        return $hours . ' hours ago';
    } elseif ($minutes > 0) {
        return $minutes . ' minutes ago';
    } elseif ($seconds > 0) {
        return $seconds . ' seconds ago';
    } else {
        return 'Just now';
    }
}

?>

<!-- Blog Details Banner Starts Here -->
<section class="details-banner">
    <?php $location = get_template_directory_uri() . '/images/'; ?>
    <img src="<?php echo $location . 'detailsbanner.jpg' ?>" alt="Background Image" class="img-fluid w-100">
</section>
<!-- Blog Details Banner Ends Here -->

<!-- Blog Details Intro Starts Here -->
<section class="blog-intro">
    <div class="container">
        <div class="row">
            <div class="col-lg-10">
                <div class="blog-intro-area">
                    <span class="has-line fs-6"><a href="#">Interior</a></span>
                    <h3>20 essential skills for successful web designers</h3>
                    <div class="blog-intro-area-bottom">
                        <div class="intro-start">
                            <div class="intro-start-author">
                                <div class="author-image">
                                    <img src="<?php echo $location . 'authorsm.png' ?>" alt="Author">
                                </div>
                                <a href="#" class="fs-6">Kadin Dias</a>
                            </div>
                            <div class="intro-start-release d-flex">
                                <div>
                                    <span class="dot"></span>
                                    <span class="intro-start-time">March 25, 2021</span>
                                </div>
                                <div>
                                    <span class="dot"></span>
                                    <span class="intro-start-time">4 min read</span>
                                </div>
                            </div>
                        </div>
                        <div class="intro-end">
                            <ul class="list-unstyled list-inline social-links mb-0">
                                <li class="list-inline-item">
                                    <a href="#">
                                        <img src="<?php echo get_template_directory_uri() . '/images/clip1.svg'; ?>" alt="">
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">
                                        <img src="<?php echo get_template_directory_uri() . '/images/clip2.svg'; ?>" alt="">
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">
                                        <img src="<?php echo get_template_directory_uri() . '/images/clip3.svg'; ?>" alt="">
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">
                                        <img src="<?php echo get_template_directory_uri() . '/images/clip4.svg'; ?>" alt="">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Details Intro Ends Here -->

<!-- Blog Article Starts Here -->
<section class="blog-article section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-10">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="blog-article-start">
                            <div class="blogy-counts">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.49997 18.9999H2.79999C2.3226 18.9999 1.86477 18.8102 1.5272 18.4727C1.18964 18.1351 1 17.6773 1 17.1999V10.8999C1 10.4226 1.18964 9.96472 1.5272 9.62715C1.86477 9.28959 2.3226 9.09995 2.79999 9.09995H5.49997M11.7999 7.29996V3.69998C11.7999 2.9839 11.5155 2.29715 11.0091 1.79081C10.5028 1.28446 9.81603 1 9.09995 1L5.49997 9.09995V18.9999H15.6519C16.086 19.0048 16.5072 18.8527 16.838 18.5715C17.1688 18.2903 17.3868 17.8991 17.4519 17.4699L18.6939 9.36995C18.733 9.11197 18.7156 8.84856 18.6429 8.59798C18.5701 8.34739 18.4438 8.11562 18.2726 7.91872C18.1013 7.72182 17.8894 7.5645 17.6513 7.45765C17.4133 7.35081 17.1548 7.297 16.8939 7.29996H11.7999Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <span>24 Likes</span>
                            </div>
                            <div class="blogy-counts">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19 13C19 13.5304 18.7893 14.0391 18.4142 14.4142C18.0391 14.7893 17.5304 15 17 15H5L1 19V3C1 2.46957 1.21071 1.96086 1.58579 1.58579C1.96086 1.21071 2.46957 1 3 1H17C17.5304 1 18.0391 1.21071 18.4142 1.58579C18.7893 1.96086 19 2.46957 19 3V13Z" fill="white" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <span>195 Comments</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="blog-article-end">
                            <h4>20 web designer skills to have</h4>
                            <p>
                                Here's a medley of 20 skills to help you become a design expert, no matter where you're at in your career.
                            </p>
                            <div class="blog-article-end-feature">
                                <p>
                                    Being a web designer involves harmoniously combining visuals and content. But non-technical skills, like collaboration and communication, are also important.
                                </p>
                            </div>
                            <?php
                            $posts = get_post_type_data('article', -1);
                            $i = 0;
                            foreach ($posts as $post) {
                                $i++;
                            ?>
                                <h6><?php echo $i . '. ' . $post['title']; ?></h6>
                                <?php echo get_the_post_thumbnail($post['id']); ?>
                                <p>
                                    <?php echo $post['content'] ?>
                                </p>

                            <?php } ?>
                            <div class="blog-article-end-bottom">
                                <button class="btn-default">
                                    <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.49997 18.9999H2.79999C2.3226 18.9999 1.86477 18.8102 1.5272 18.4727C1.18964 18.1351 1 17.6773 1 17.1999V10.8999C1 10.4226 1.18964 9.96472 1.5272 9.62715C1.86477 9.28959 2.3226 9.09995 2.79999 9.09995H5.49997M11.7999 7.29996V3.69998C11.7999 2.9839 11.5155 2.29715 11.0091 1.79081C10.5028 1.28446 9.81603 1 9.09995 1L5.49997 9.09995V18.9999H15.6519C16.086 19.0048 16.5072 18.8527 16.838 18.5715C17.1688 18.2903 17.3868 17.8991 17.4519 17.4699L18.6939 9.36995C18.733 9.11197 18.7156 8.84856 18.6429 8.59798C18.5701 8.34739 18.4438 8.11562 18.2726 7.91872C18.1013 7.72182 17.8894 7.5645 17.6513 7.45765C17.4133 7.35081 17.1548 7.297 16.8939 7.29996H11.7999Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg> Like
                                </button>
                                <div class="d-flex align-items-center flex-column flex-lg-row">
                                    <span class="me-3">Share the Post:</span>
                                    <ul class="list-unstyled list-inline social-links mb-0">
                                        <li class="list-inline-item">
                                            <a href="#">
                                                <img src="<?php echo get_template_directory_uri() . '/images/clip1.svg'; ?>" style="margin:0;" alt="">
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#">
                                                <img src="<?php echo get_template_directory_uri() . '/images/clip2.svg'; ?>" style="margin:0;" alt="">
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#">
                                                <img src="<?php echo get_template_directory_uri() . '/images/clip3.svg'; ?>" style="margin:0;" alt="">
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#">
                                                <img src="<?php echo get_template_directory_uri() . '/images/clip4.svg'; ?>" style="margin:0;" alt="">
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Article Ends Here -->

<!-- Blog Item Feature Starts Here -->
<section class="blog-item-feature">
    <div class="container">
        <div class="blog-item-feature-heading">
            <h4>You May Also Like</h4>
            <a href="#">View All</a>
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
                        <a href="details.html">
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
<!-- Blog Item Feature Ends Here -->

<!-- Comments Area Starts Here -->
<section class="comments-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h5>Leave a Comment</h5>
                <form action="" id="validation" onsubmit="return false" method="post" enctype="multipart/form-data">
                    <div class="row g-3">
                        <div class="col-lg-6">
                            <input type="text" class="form-control" id="name" placeholder="Your name" name="username">
                        </div>
                        <div class="col-lg-6">
                            <input type="email" class="form-control" id="email" placeholder="Your email" name="email">
                        </div>
                    </div>
                    <textarea class="form-control" id="comment" placeholder="Your Comments" name="comment"></textarea>
                    <input type="file" id="file" name="image">
                    <input type="hidden" value="add_comment" id="action" name="action">
                    <div class="d-flex justify-content-lg-end">
                        <button type="submit" class="btn-default">Post Commnent</button>
                    </div>
                </form>
                <div class="comments-area-content">
                    <h5>Comments (<span id="comments-count"><?php echo count($fetchAllComments); ?></span>)</h5>
                    <?php
                    foreach ($fetchAllComments as $comment) {
                        $posted_time = getTimeInterval($comment);
                    ?>
                        <div id="comment-container">
                            <div class="comments">
                                <div class="comments-owner">
                                    <div class="comments-owner-image">
                                        <a href="#" class="d-block">
                                            <img src="<?php echo get_template_directory_uri() . '/images/' . $comment->Image ?>" alt="Image" id="profilepic">
                                        </a>
                                    </div>
                                    <div class="comments-owner-text">
                                        <p><a href="#"><?php echo $comment->NAME; ?></a></p>
                                        <span><?php echo $posted_time ?></span>
                                    </div>
                                </div>
                                <p>
                                    <?php echo $comment->COMMENT; ?>
                                </p>
                            </div>
                        </div>
                    <?php
                    }
                    ?>


                </div>
            </div>
        </div>
    </div>
</section>
<!-- Comments Area Ends Here -->
<script>
    $(document).ready(function() {

        $('#validation').validate({
            rules: {
                username: {
                    required: true
                },
                email: {
                    required: true
                },
                comment: {
                    required: true
                }
            },
            messages: {
                username: {
                    required: 'Name field is required.'
                },
                email: {
                    required: 'Email field is required.'
                },
                comment: {
                    required: 'Comment field is required.'
                }
            },

            submitHandler: function(e) {
                var form_data = new FormData(e);

                $.ajax({
                    url: '<?php echo admin_url('admin-ajax.php'); ?>',
                    type: "POST",
                    data: form_data,
                    success: function(data) {

                        var response = JSON.parse(data);
                        var location = '<?php echo site_url() . 'full-article'; ?>';
                        if (response.status == 1) {
                            Swal.fire({
                                icon: 'success',
                                title: response.message,
                                text: 'comment has been posted successfully.',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    let location = "<?php echo get_template_directory_uri() . '/images/'; ?>" + response.image;
                                    var commentSection = `<div class="comments">
                            <div class="comments-owner">
                                <div class="comments-owner-image">
                                    <a href="#" class="d-block">
                                        <img src="${location}" alt="Image">
                                    </a>
                                </div>
                                <div class="comments-owner-text">
                                    <p><a href="#">${response.username}</a></p>
                                    <span>Just Now</span>
                                </div>
                            </div>
                            <p>
                                ${response.comment}
                            </p>
                        </div>`;
                                    let commentCount = $('#comments-count').html();
                                    $('#comments-count').html(parseInt(commentCount) + 1);
                                    console.log(commentCount === '0');
                                    if (commentCount === '0') {
                                        $('#comment-container').html(commentSection);
                                    } else {
                                        $('#comment-container').prepend(commentSection);
                                    }

                                    $('#validation')[0].reset();
                                }
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: response.message,
                                text: 'Failed to post comment. Please try again.',
                            });
                        }
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
            }
        });
    });
</script>

<?php
wp_enqueue_script('validate');
wp_enqueue_script('swal');
wp_footer();
get_footer();
?>