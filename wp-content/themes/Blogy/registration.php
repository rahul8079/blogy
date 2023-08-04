<?php
/* Template Name: Registration */
if (!is_user_logged_in()) {
  wp_enqueue_style('authenticate');
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
                <form action="" id="validation" method="post">
                  <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="username" aria-describedby="textHelp">
                  </div>
                  <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-4">
                    <label for="pass" class="form-label">Password</label>
                    <input type="password" class="form-control" id="pass" name="password">
                  </div>
                  <div class="mb-3">
                    <label for="exampleSelect1" class="form-label">Role</label>
                    <select class="form-select" id="utype" name="usertype">
                      <option value="user">User</option>
                      <option value="blogger">Blogger</option>
                    </select>
                  </div>
                  <input type="hidden" value="insert_user" name="action">
                  <input type='submit' class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" name="signup" value="Sign Up">
                  <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-bold">Already have an Account?</p>
                    <a class="text-primary fw-bold ms-2" href="<?php echo site_url() . '/login' ?>">Sign In</a>
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
          name: {
            required: true
          },
          email: {
            required: true
          },
          password: {
            required: true
          }
        },
        messages: {
          name: {
            required: 'Name field is required.'
          },
          email: {
            required: 'Email field is required.'
          },
          password: {
            required: 'Password field is required.'
          }
        },

        submitHandler: function(e) {
          var form_data = $('#validation').serialize();

          $.ajax({
            url: '<?php echo admin_url('admin-ajax.php'); ?>',
            type: "POST",
            data: form_data,
            success: function(data) {

              var response = JSON.parse(data);
              var location = '<?php echo site_url(); ?>';
              if (response.status == 1) {
                Swal.fire({
                  icon: 'success',
                  title: response.message,
                  text: 'User has been registered successfully.',
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.href = location;
                  }
                });
              } else {
                Swal.fire({
                  icon: 'error',
                  title: response.message,
                  text: 'Failed to create user. Please try again.',
                });
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