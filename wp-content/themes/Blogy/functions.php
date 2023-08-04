<?php

register_nav_menus(array(
	'primary-menu' => 'Main Menu'
));

add_theme_support('title-tag');
add_theme_support('post-thumbnails');
add_post_type_support('website_contents', 'thumbnail');

function custom_logout_redirect()
{
	wp_redirect(home_url('/login/'));
	exit;
}
add_action('wp_logout', 'custom_logout_redirect');

function register_styles()
{
	$location = get_template_directory_uri();
	wp_register_style('bootstrap', "$location/css/bootstrap.min.css");
	wp_register_style('contact', "$location/css/contact_form.css");
	wp_register_style('homebtn', "$location/css/home-bttn.css");
	wp_register_style('authenticate', "$location/css/styles.min.css");
	wp_register_style('slick', "$location/css/slick.css");
	wp_register_style('slick-theme', "$location/css/slick-theme.css");
	wp_register_style('main', "$location/css/main.css");
	wp_register_style('fonts', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css");
	wp_register_style('sweet-alert', "https://cdn.jsdelivr.net/npm/sweetalert2@10.15.7/dist/sweetalert2.min.css");
	wp_register_script('swal', "https://cdn.jsdelivr.net/npm/sweetalert2@10.15.7/dist/sweetalert2.min.js");
	wp_register_script('validate', "https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js");
	wp_enqueue_script("jquery", "$location/js/jquery-3.6.0.min.js");
	wp_enqueue_script("jquery37", "https://code.jquery.com/jquery-3.7.0.min.js");
	wp_enqueue_script("bootstrap", "$location/js/bootstrap.bundle.min.js");
	wp_enqueue_script("slick", "$location/js/slick.min.js");
	wp_enqueue_script("main", "$location/js/main.js");
	wp_enqueue_script("menu", "$location/js/menu.js");
}
add_action('wp_enqueue_scripts', 'register_styles');

function create_posttype()
{

	register_post_type(
		'website_contents',
		// CPT Options
		array(
			'labels' => array(
				'name' => __('Website Contents'),
				'singular_name' => __('Website Content'),
				'menu_name' => _x('Website Contents', 'admin menu'),
				'name_admin_bar' => _x('Website Contents', 'admin bar'),
				'add_new' => _x('Add New', 'add new'),
				'add_new_item' => __('Add New Website Content'),
				'new_item' => __('New Website Content'),
				'edit_item' => __('Edit Website Contents'),
				'view_item' => __('View Website Contents'),
				'all_items' => __('All Website Contents'),
				'search_items' => __('Search Website Contents'),
				'not_found' => __('No web content found.'),
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'website_contents'),
			'show_in_rest' => true,
			'taxonomies' => get_taxonomies()

		)
	);
}
// Hooking up our function to theme setup
add_action('init', 'create_posttype');
/*Custom Post type end*/
function get_post_type_data($category_slug, $posts_per_page)
{
	$taxonomy = 'category';
	$args = array(
		'post_type' => 'website_contents',
		'posts_per_page' => $posts_per_page,
		'tax_query' => array(
			array(
				'taxonomy' => $taxonomy,
				'field' => 'slug',
				'terms' => $category_slug,
			),
		)
	);
	$post_type_data = new WP_Query($args);
	$posts = array();

	if ($post_type_data->have_posts()) {
		while ($post_type_data->have_posts()) {
			$post_type_data->the_post();

			$post = array(
				'id' => get_the_id(),
				'title' => get_the_title(),
				'content' => get_the_content()
			);
			$posts[] = $post;
		}
	}
	wp_reset_postdata();
	return $posts;
}

add_action('wp_ajax_nopriv_insert_user', 'insert_user');
function insert_user()
{
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$user_type = $_POST['usertype'];

	$data = array(
		'display_name' => $name,
		'user_login' => $email,
		'user_pass' => $password,
		'role' => $user_type,
	);


	$userCreated = wp_insert_user($data);

	if (!is_wp_error($userCreated)) {

		$credentials = array(
			'user_login'    => $email,
			'user_password' => $password,
			'remember'      => true
		);

		$user_signon = wp_signon($credentials, false);

		if (!is_wp_error($user_signon)) {
			$response = array(
				'status' => 1,
				'message' => "Registration Successful"
			);
		} else {
			$response = array(
				'status' => 0,
				'message' => "Auto-Login Failed"
			);
		}
	} else {
		$response = array(
			'status' => 0,
			'message' => "Registration Failed"
		);
	}

	echo json_encode($response);
	die;
}

add_action('wp_ajax_nopriv_user_login', 'user_login');
function user_login()
{
	$email = sanitize_text_field($_POST['email']);
	$password = $_POST['password'];

	$credentials = array(
		'user_login'    => $email,
		'user_password' => $password,
		'remember'      => false
	);

	$user = wp_signon($credentials, false);

	if (is_wp_error($user)) {
		$response = array(
			'status' => 0,
			'message' => 'Invalid Username or Password'
		);
	} else {
		$response = array(
			'status' => 1,
			'message' => 'Login Successfully'
		);
	}

	echo json_encode($response);
	die;
}

add_action('wp_ajax_add_comment', 'add_comment');
add_action('wp_ajax_nopriv_add_comment', 'add_comment');
function add_comment()
{
	if (is_user_logged_in()) {
		global $wpdb;

		$table_name = 'user_comments';

		$name = $_POST['username'];
		$email = $_POST['email'];
		$comment = $_POST['comment'];

		$file_name = $_FILES['image']['name'];
		$file_temp_name = $_FILES['image']['tmp_name'];
		$image = time() . $file_name;
		$image_path = get_template_directory() . '/images/' . $image;

		move_uploaded_file($file_temp_name, $image_path);
		$data = array(
			'NAME'    => $name,
			'EMAIL'   => $email,
			'COMMENT'   => $comment,
			'Image' => $image
		);

		$query_result = $wpdb->insert($table_name, $data);

		if ($query_result) {
			$response = array(
				'status'  => 1,
				'message' => 'Comment Posted Successfully',
				'username' => $name,
				'comment' => $comment,
				'image' => $image
			);
		} else {
			$response = array(
				'status'  => 0,
				'message' => 'Comment Failed'
			);
		}
	} else {
		$response = array(
			'status' => 0,
			'message' => 'Please Login'
		);
	}
	echo json_encode($response);
	die;
}

add_role('blogger', 'Blogger', array(
	'read' => true,
	'create_posts' => true,
	'edit_posts' => true,
	'edit_others_posts' => true,
	'publish_posts' => true,
	'manage_categories' => true,
));

add_role('user', 'User', array(
	'read' => false,
	'create_posts' => false,
	'edit_posts' => false,
	'edit_others_posts' => false,
	'publish_posts' => false,
	'manage_categories' => false,
));

function save_contact_form_submission($contact_form)
{
	if ($contact_form->id() == "81") {
		$name = sanitize_text_field($_POST['your-name']);
		$email = sanitize_email($_POST['your-email']);
		$subject = sanitize_textarea_field($_POST['your-subject']);
		$message = sanitize_textarea_field($_POST['your-message']);

		global $wpdb;
		$table_name = 'contact_us';
		$data = array(
			'name' => $name,
			'email' => $email,
			'subject' => $subject,
			'message' => $message,
		);
		$wpdb->insert($table_name, $data);

		add_filter('wpcf7_skip_mail', '__return_true');
	}
}
add_action('wpcf7_before_send_mail', 'save_contact_form_submission');
function dd($data)
{
	echo "<pre>";
	print_r($data);
	die();
}
