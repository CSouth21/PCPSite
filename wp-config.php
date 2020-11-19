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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'b8032127' );

/** MySQL database password */
define( 'DB_PASSWORD', 'Aventador312' );

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
define( 'AUTH_KEY',         '%/1oN/c87LA.{QIIKyJa8UC hCx5^%2h[JXC,Q1lo!g{<Qc)ut{d K9*yS+h0g!]' );
define( 'SECURE_AUTH_KEY',  '[]& 5_nWKp2kvw6N|u74$;|6v{|)r-5}g1g7N$s ?M(:GyZlp6p49b69g,[ gPgl' );
define( 'LOGGED_IN_KEY',    'Sic;M+-F,S|W{=^^5h`]hA]PK2Wk?zKKJ:eUHg&G(WnH6pV(><z>[_]k}Wp+itla' );
define( 'NONCE_KEY',        '(acg@)Vuo`!#ltlw$Pio4C^5BxL$)2i5KIklPA)6LX}c~D80R~{~@%i=6I}0w2pK' );
define( 'AUTH_SALT',        '-HQItQ[;+<n%Qa^V1%&=!_* ~gwgu2+xzeodEnlOn!(Ku]sB9.OND9pWF-]+E=uc' );
define( 'SECURE_AUTH_SALT', '~smL1=kw{Cd;FO$JV& /HMx5z<+*;1Z:T]gZX*&}@<WJK4,nK7%3,x[@CyzC2q(H' );
define( 'LOGGED_IN_SALT',   'SU)&!B*7M_v9rbgg(KsBq:az~FTwYWlSy8|j]>a:uhO0RlKup.iMjS*ck$NDzU]i' );
define( 'NONCE_SALT',       'zipMF. )/Xx</>WI>lLrvzzPCUBgC)3nu1Ltd)l]_LOdtIX*!1n}u#Y-A45Q`|N0' );

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
