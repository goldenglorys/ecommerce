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
define( 'DB_NAME', 'ecommerce' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'xPEpW&=j6~MdGn_{,$QB=CYfqW>,?b[P.yTI#*do+HT:3ytmpa~OG5$6*2PRL+*7' );
define( 'SECURE_AUTH_KEY',  'q+H]w3]*$AzX$Xb{`Di</#sYhYor**Y.]+pN!A*7]7Q]k.hE&O|lb&m5zI#C<vT9' );
define( 'LOGGED_IN_KEY',    '!!r6h%%~,.ya<u2eDOVX?D_fz`#7u3k[N^(()8@|8ivTe@>GaD>h+F#Fx;(om$oV' );
define( 'NONCE_KEY',        'FOrY._}JN`sFUyAClzdWRiy1_Qk;i?y`[HZNjuR^7.3WLIOaC}Vrr]675r_#DDHV' );
define( 'AUTH_SALT',        'nS.?mt[6@`z)<J{R$mGAb]O6`(;3sY~w[K?i%hL<8{{}d`cl_::9:l21}8r#YZ?-' );
define( 'SECURE_AUTH_SALT', '#yo/S|Eg9LaXqt->lk5U(jMvedpXNw~4,~lg(0shvM[(sd##&u^{dAnV$RWVX7/i' );
define( 'LOGGED_IN_SALT',   'b5O^S9ifNByQ{*d;5W6d&Mwjun&}@)x.C7ZoL{^$Gh<)ehn!Jj3F?U /S[ae))v_' );
define( 'NONCE_SALT',       'C0Oq5$HA&}P,d#$juPUgrN7QcKdW$mx^>PgWp&_;dRjZGs!NL.J9batU|UxT44|,' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
