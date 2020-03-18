<?php
 /*
 Template Name: Template Register
 */

get_header();
get_template_part('template_inc/inc', 'menu');
get_template_part('template_inc/inc','breadcrumb');
global $aventura_options;
$aventura_image_page  =  ((!isset($aventura_options['aventura_login_image'])) || empty($aventura_options['aventura_login_image'])) ? '' : $aventura_options['aventura_login_image'];

?>
<?php
if ( have_posts() ) :
	while ( have_posts() ) : the_post(); ?>
		<div class="tz_page_login">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
						<div id="login" class="login">
							<div class="text-center">
								<?php if($aventura_image_page != ''):?>
									<img src="<?php echo esc_url($aventura_image_page["url"]);?>" alt="" data-retina="true" >
								<?php else:?>
									<img src="<?php echo esc_url(get_template_directory_uri()).'/images/logo.png' ?>" alt="" data-retina="true" >
								<?php endif;?>
							</div>
							<hr>

							<form name="registerform" class="login-form" action="<?php echo esc_url( wp_registration_url() )?>" method="post">
								<div class="form-group-description">
									<?php esc_html_e(  'Register For This Site', 'aventura' );?>
								</div>

								<?php
								if ( isset( $_GET['email_exists'] ) && $_GET['email_exists'] == '1' ) {
									echo '<div class="form-group-message">';
									echo '<label>'. esc_html__('Error:','aventura') .'</label>';
									esc_html_e( 'This email is already registered, please choose another one.', 'aventura' );
									echo '</div>';
								} elseif( isset( $_GET['username_exists'] ) && $_GET['username_exists'] == '1' ){
									echo '<div class="form-group-message">';
									echo '<label>'. esc_html__('Error:','aventura') .'</label>';
									esc_html_e('This username is already registered. Please choose another one.','aventura');
									echo '</div>';
								} elseif( isset( $_GET['empty_username'] ) && $_GET['empty_username'] == '1' ){
									echo '<div class="form-group-message">';
									echo '<label>'. esc_html__('Error:','aventura') .'</label>';
									esc_html_e('Please enter a username.', 'aventura');
									echo '</div>';
								} elseif( isset( $_GET['empty_email'] ) && $_GET['empty_email'] == '1' ){
									echo '<div class="form-group-message">';
									echo '<label>'. esc_html__('Error:','aventura') .'</label>';
									esc_html_e('Please type your email address.','aventura');
									echo '</div>';
								}
								?>

								<div class="form-group">
									<label><?php esc_html_e(  'Username', 'aventura' ); ?></label>
									<input type="text" name="user_login" class=" form-control" placeholder="<?php esc_html_e(  'Username', 'aventura' ); ?>">
								</div>
								<div class="form-group">
									<label><?php esc_html_e(  'Email', 'aventura' ); ?></label>
									<input type="email" name="user_email" class=" form-control" placeholder="<?php esc_html_e(  'Email', 'aventura' ); ?>">
								</div>

								<input type="hidden" name="redirect_to" value="<?php echo esc_url( add_query_arg( 'checkemail', 'registered', wp_login_url() ) ); ?>">
								<div id="pass-info" class="clearfix"></div>
<!--								--><?php //do_action('register_form');?>
								<button class="btn_full btn_create_account"><?php esc_html_e(  'Create an account', 'aventura' ); ?></button>
								<br /><?php esc_html_e(  'Already a member?', 'aventura' ); ?> <a href="<?php echo wp_login_url(); ?>"><?php esc_html_e(  'Login', 'aventura' ); ?></a>
							</form>

						</div>
					</div>
				</div>
			</div><!--End Container -->
		</div><!--End Page Content -->
<?php
	endwhile;
endif;
?>

<?php
get_footer();
?>