<?php
 /*
 Template Name: Template Lost Password
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

							<form name="lostpasswordform" class="login-form" action="<?php echo esc_url( wp_lostpassword_url() ) ?>" method="post">
								<div class="form-group-description">
									<?php esc_html_e( 'Please enter your username or email address. You will receive a link to create a new password via email.', 'aventura')?>
								</div>
								<div class="form-group">
									<label><?php esc_html_e(  'Username or E-mail', 'aventura' ); ?></label>
									<input type="text" name="user_login"  class="form-control" placeholder="<?php esc_html_e(  'Username or E-mail', 'aventura' ); ?>" value=""></label>
								</div>
								<button type="submit" class="btn_full btn_get_password"><?php esc_html_e( 'Get New Password', 'aventura')?></button>
								<input type="hidden" name="redirect_to" value="<?php echo esc_url( add_query_arg( 'checkemail', 'confirm', wp_login_url() ) ); ?>">
								<br />
								<div style="text-align:center">
									<a href="<?php echo wp_login_url(); ?>" class="underline"><?php esc_html_e(  'Login', 'aventura' ); ?></a>
									<?php if ( get_option('users_can_register') ) { ?>
									 | <a href="<?php echo esc_url($aventura_register_url); ?>" class="underline"><?php esc_html_e(  "Register", 'aventura' ) ?></a>
									<?php } ?>
								</div>
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