<?php
 /*
 Template Name: Template Login
 */

get_header();
get_template_part('template_inc/inc', 'menu');
get_template_part('template_inc/inc','breadcrumb');

global $aventura_options;
$aventura_register_page = ((!isset($aventura_options['aventura_register_page'])) || empty($aventura_options['aventura_register_page'])) ? '' : $aventura_options['aventura_register_page'];
$aventura_image_page  =  ((!isset($aventura_options['aventura_login_image'])) || empty($aventura_options['aventura_login_image'])) ? '' : $aventura_options['aventura_login_image'];


$aventura_register_url = add_query_arg( 'action', 'register', aventura_get_permalink_clang( $aventura_register_page ) );
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

							<form name="loginform" class="login-form" action="<?php echo esc_url( wp_login_url() )?>" method="post">
								<?php if ( ! empty( $_GET['login'] ) && ( $_GET['login'] == 'failed' ) ) { ?>
									<div class="alert alert-info"><span class="message"><?php esc_html_e(  'Invalid username or password','aventura' ); ?></span></div>
								<?php } ?>
								<div class="form-group-description">
									<?php if ( isset( $_GET['checkemail'] ) ) {
										esc_html_e( 'Check your e-mail for the confirmation link.', 'aventura' );
									} else {
										esc_html_e( 'Please login to your account.', 'aventura' );
									} ?>
								</div>
								<div class="form-group">
									<label><?php esc_html_e(  'Username', 'aventura' ); ?></label>
									<input type="text" name="log" class="form-control" placeholder="<?php esc_html_e(  'Username', 'aventura' ); ?>" value="<?php echo empty($_GET['user']) ? '' : esc_attr( $_GET['user'] ) ?>">
								</div>
								<div class="form-group">
									<label><?php esc_html_e(  'Password', 'aventura' ); ?></label>
									<input type="password" name="pwd" class="form-control" placeholder="<?php esc_html_e(  'Password', 'aventura' ); ?>">
								</div>
								<div class="form-group">
									<input type="checkbox" name="rememberme" tabindex="3" value="forever" id="rememberme" class="pull-left"> <label for="rememberme" class="pl-8"><?php esc_html_e(  'Remember my details', 'aventura' ); ?></label>
									<div class="small pull-right"><a href="<?php echo wp_lostpassword_url(); ?>"><?php esc_html_e(  'Forgot password?', 'aventura' ); ?></a></div>
								</div>
								<button type="submit" class="btn_full btn_sign_in"><?php esc_html_e( 'Sign in', 'aventura')?></button>
								<input type="hidden" name="redirect_to" value="<?php echo esc_url( aventura_start_page_url() ) ?>">
								<?php if ( get_option('users_can_register') ) { ?>
									<br><?php esc_html_e(  "Don't have an account?", 'aventura' ) ?>
									<a href="<?php echo esc_url($aventura_register_url); ?>" class=""><?php esc_html_e(  "Register", 'aventura' ) ?></a>
								<?php } ?>
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