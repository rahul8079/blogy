    <!-- Footer Starts Here -->
    <footer class="footer">
        <div class="container">
            <div class="row justify-content-lg-between">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-info">
                        <a href="index.html">
                            <img src="<?php echo get_template_directory_uri() ?>/images/logo.svg" alt="lOGO">
                        </a>
                        <p>
                            Phasellus porttitor sapien a purus venenatis condimentum. Nunc lectus ipsum, laoreet ut
                            efficitur.
                        </p>
                    </div>
                </div>
                <div class="col-lg-1 col-md-2">
                    <div class="footer-wizard">
                        <h6>Category</h6>
                        <?php
                        $tags = get_tags();
                        ?>
                        <ul class="list-unstyled">
                            <?php foreach ($tags as $tag) { ?>
                                <li><a href="#"><?php echo $tag->name ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1 col-md-3">
                    <div class="footer-wizard">
                        <h6>Follow us</h6>
                        <ul class="list-unstyled">
                            <li><a href="#">Facebook</a></li>
                            <li><a href="#">Twitter</a></li>
                            <li><a href="#">Instagram</a></li>
                            <li><a href="#">Youtube</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="footer-wizard">
                        <h6>Newsletter</h6>
                        <form action="#">
                            <div class="footer-wizard-form">
                                <input type="email" placeholder="Enter Email">
                                <button class="btn btn-default btn-default-sm">Subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="copy-right">
                <p>@ 2023 - Blogy</p>
                <p>Designed & Develop by <a href="https://zakirsoft.com/">Rahul Jain</a></p>
            </div>
        </div>
    </footer>
    <!-- Footer Ends Here -->
    <?php
    wp_footer();
    ?>