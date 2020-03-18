<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'thanhwebseo247_amazingtravel');

/** MySQL database username */
define('DB_USER', 'amazingtravel');

/** MySQL database password */
define('DB_PASSWORD', 'tavujabaq');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'M?`>#J)qrgWZ?%.Id+C]g[`{7DW@3(/|vs2J8~oeo(V;rM=We_Z^*E&)Zew,u7Ai');
define('SECURE_AUTH_KEY',  '}.!F*yi$t]A^>Dx>~V$mt%(lK5tN:gZV1BK_oKuRIy-E90v}4DZh@Q-%?_))s>1w');
define('LOGGED_IN_KEY',    'dP*].Zg+giG|-+9S@`fXf:`(ZMI]Z2?H/VLNX|r3GM|V~C8,i%$6,x8:Q+EvA*@8');
define('NONCE_KEY',        '22qX4v)KW,?k4VQJN$u|Q ,w+xTCaaHT&D3ewLftd*yeOH3cb/K V,oxpgzl~$w8');
define('AUTH_SALT',        'x(C.#mb22yW_P{w&F([#s]iHt59j|8WOA1V/IjZC4ow[JLc:+;l}OX]& r^4Z]hN');
define('SECURE_AUTH_SALT', 'M_W~K%b,);E:@Aj``EbGJi^$]xUl5YuM.sv6iwCi7|q?Z2a2M-)cXV8sw,LE9%<7');
define('LOGGED_IN_SALT',   'U3gwI`]aH2@HQm*[CrPN<1;jV<O>>|wZ&ZMFr4APGf8$9_9<w(ETBdDr%bxk/@tP');
define('NONCE_SALT',       'H^EbM-$P0}prAM^@pGf7*?&iVwr?t9n^YP}{?:dmV3#3p+$7V3-hEnp3DmeDX6Ze');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'ama_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
