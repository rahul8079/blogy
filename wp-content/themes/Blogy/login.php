<?php
/* Template Name: Login */
if (!is_user_logged_in()) {
  wp_enqueue_style('login');
  wp_enqueue_style('sweet-alert');
  get_header();
?>

  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
    <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="<?php echo get_template_directory_uri() . '/images/header-logo.svg' ?>" width="180" alt="">
                </a>
                <p class="text-center">Publish Your Passions Your Way</p>
                <form id="validation" action="" method="post">
                  <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-4">
                    <label for="pass" class="form-label">Password</label>
                    <input type="password" class="form-control" id="pass" name="password">
                  </div>
                  <div class="d-flex align-items-center justify-content-between mb-4">
                    <div class="form-check">
                      <input class="form-check-input primary" type="checkbox" value="" id="flexCheckChecked" checked>
                      <label class="form-check-label text-dark" for="flexCheckChecked">
                        Remeber this Device
                      </label>
                    </div>
                    <input type="hidden" value="user_login" name="action">
                    <a class="text-primary fw-bold" href="./index.html">Forgot Password ?</a>
                  </div>
                  <input type='submit' class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" name="signin" value="Sign In">
                  <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-bold">New to Blogy?</p>
                    <a class="text-primary fw-bold ms-2" href="<?php echo site_url() . '/create-new-account' ?>">Create an account</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    $(document).ready(function() {

      $('#validation').validate({
        rules: {
          email: {
            required: true
          },
          password: {
            required: true
          }
        },
        messages: {
          email: {
            required: 'Email field is required.'
          },
          password: {
            required: 'Password field is required.'
          }
        },

        submitHandler: function(e) {

          var email = $('.email').val();
          var password = $('.password').val();
          var login_data = $('#validation').serialize();

          $.ajax({
            url: '<?php echo admin_url('admin-ajax.php'); ?>',
            type: "POST",
            data: login_data,
            success: function(data) {

              var response = JSON.parse(data);
              if (response.status == 0) {
                Swal.fire({
                  icon: 'error',
                  title: response.message,
                  text: 'Please check your username and password.',
                });
              } else {
                var location = "<?php echo site_url(); ?>";
                window.location.href = location;
              }
            }
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
} else {
  wp_redirect(home_url());
}
?>