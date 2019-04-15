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
define( 'DB_NAME', 'wpoettest' );

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
define( 'AUTH_KEY',         '%f>#vcOam9GoJRG}yym!L&bPDyU&`>;G_.vd4UvOHeMKC/U~lsY7x6#L&>[7n%e:' );
define( 'SECURE_AUTH_KEY',  'Rqd9pY,X1-JG<qP51VLYCb1+i[zrjMK ,n9$0` SU9Y{-`vKPK=+Wr)s=y__Opka' );
define( 'LOGGED_IN_KEY',    'O^;zu0!5%nf=U7h=kvdChh1T[WR~%KC$>lOnPkRBdi)2[J?`gvTvD~a!CbY>jA]h' );
define( 'NONCE_KEY',        '<UJ00&,wK(/89j^. C::}[R DcU%!tsO%j/n[g{A+AcucNgP!-9lc9y#NlHNZ!n7' );
define( 'AUTH_SALT',        'sQme%~KxIEcV>N2QQ}bV>zol&!KENpcC T)&(]T=1P%um*F{TTN*PQdNX9{?.m#,' );
define( 'SECURE_AUTH_SALT', 'b(cSegyol} ;QwQ9Ge:k1KNCYABylE1 3{9eLmXQ!{~?:(NOZwWE4EkQiGcEEOrJ' );
define( 'LOGGED_IN_SALT',   'D}FP2`z8b:4yo6:pEHYq=fHSHp2)!| 5(xs!|oKiwe5(iJ:;ud|6>h!B% uvJG# ' );
define( 'NONCE_SALT',       'VKOZ(5$uaxIHn*%n6r%bL`H0$Fw#a~9Ah3saPtQN~BfZb5i25WYvnMvhTeqD+4Zr' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
