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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'fxsuetcr_wp326' );

/** MySQL database username */
define( 'DB_USER', 'fxsuetcr_wp326' );

/** MySQL database password */
define( 'DB_PASSWORD', '(2SIp(71H3' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'o7zhvbcrxajyg9a1wgbsvopiqrnaembfurbbdmitazepphgyvz7g9zzjpv4mwoua' );
define( 'SECURE_AUTH_KEY',  'kg1k4qgqt1mumi7qcwmkzhm9sdwy9gartpk9s3woilcttqrjz5nuriim9fyohfub' );
define( 'LOGGED_IN_KEY',    'mfyuvhozvgqzzmhwcwjwh396h6m2qx3zgsgbwzfbkxppmvugyje2xvft6epyhksm' );
define( 'NONCE_KEY',        '5ngyvcvnurxzjrphigh0ds0lrvz5qq1egki9jizpi5jygjqfyktnbarr8djdrlpk' );
define( 'AUTH_SALT',        'xswy3qb6jsvcgos8foaxk4syvwvgkdlb3acwhnrgotqyzjqsurqcmzlja32frwea' );
define( 'SECURE_AUTH_SALT', 'qha4va2mflphlle8cfj3p8fuewkutfpksxt6uc0sylusw36nzrsdqkhq9ljwg9w1' );
define( 'LOGGED_IN_SALT',   'pkdyi060zwsebzpnwsmhikpsdxqjcie5fq77gpv9qprhofmtomkdz1vdacw1r5jh' );
define( 'NONCE_SALT',       'mbau5ztudjppgp6e96pu0dxulk7k1k8chuoqo0cyanajc9dbmrnnhc5e8kfdnu3y' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpoy_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
