<?php
/**
 * The template for displaying search forms in Twenty Eleven
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>
	<form method="get" class="searchform" action="<?php echo esc_url( get_home_url( '/' ) ); ?>">
		<input type="text" class="field Tzsearchform inputbox search-query" name="s" placeholder="<?php esc_attr_e( 'Search...', 'aventura' ); ?>" />
		<input type="submit" class="submit searchsubmit" name="submit" value="<?php esc_attr_e( 'Search', 'aventura' ); ?>" />
		<span aria-hidden='true' class='fa fa-search icon_search'></span>
	</form>
