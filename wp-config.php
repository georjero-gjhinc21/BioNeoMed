<?php
/**
 * WordPress Configuration File
 * BioNeoMed Research Foundation
 * Configured for Replit with SQLite
 */

// ** SQLite Database Integration ** //
define('DB_DIR', __DIR__ . '/wp-content/database/');
define('DB_FILE', 'bioneomed.sqlite');

// ** Dummy MySQL settings (required by WP core, overridden by SQLite plugin) ** //
define('DB_NAME', 'bioneomed_wp');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');
define('DB_CHARSET', 'utf8mb4');
define('DB_COLLATE', 'utf8mb4_unicode_ci');

// ** Security Keys ** //
define('AUTH_KEY',         '<pSl:q4M5Vd^(:XP/~@zI:H}8 -KmpXMRhd1JZW]RsYUri-y<|Zku6T[H>p:H5_@');
define('SECURE_AUTH_KEY',  'N0Zd)Vt+*LI%HohRu`;L66$*s*:57EUW9&Blg-67Na!ua%56W*2DgyT9P`wSeZPB');
define('LOGGED_IN_KEY',    '9J;v+]p@pgYDEDL@@0sL~hof5n==2yd/!SuV<k!+2}6?{T*ZNQe9,W<bK|uf|7(x');
define('NONCE_KEY',        'r!&+*fZ)+ei};ZF`c.[g:T|T7M}TToYoEC^=81.bZ]55[H[3uh 1m|B<5buPd*fO');
define('AUTH_SALT',        '*4C<-P>_|}YNsk)ZXBCtjw}8(H|4~~Gsx^qW9^JA/-u![k27C(}o4ab(hJ8+cvl>');
define('SECURE_AUTH_SALT', 'E0(86_QQAY)2 nX&a[xdBw@-<BV?SA>s+r>HHBdoFC^`@3n8zx(Y.y7+8M**qPEA');
define('LOGGED_IN_SALT',   '#-g[+:1<)9uA4&|f2Vy[96Pf6jQ=?P_IPm_1,|YiozDLF[M^Uk+&Kl{U]baM%GE2');
define('NONCE_SALT',       '$y(CkXOFn]$.x+hw1W)<&ru*qz2Nm!Hhf2q0P9:*<>a+YP>{Vd9%y&9>l7(3-{ u');

// ** Database Table prefix ** //
$table_prefix = 'wp_';

// ** WordPress Memory Limits ** //
define('WP_MEMORY_LIMIT', '256M');
define('WP_MAX_MEMORY_LIMIT', '512M');

// ** Performance Optimizations ** //
define('WP_POST_REVISIONS', 5);
define('AUTOSAVE_INTERVAL', 300);
define('EMPTY_TRASH_DAYS', 30);

// ** Security Hardening ** //
define('DISALLOW_FILE_EDIT', false);
define('FORCE_SSL_ADMIN', false);
define('WP_AUTO_UPDATE_CORE', 'minor');

// ** Debug Settings ** //
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);
@ini_set('display_errors', 0);

// ** Site URLs - Replit Proxy Support ** //
// Replit proxies HTTPS traffic; trust the forwarded host header
if (isset($_SERVER['HTTP_X_FORWARDED_HOST'])) {
    $host = $_SERVER['HTTP_X_FORWARDED_HOST'];
    $protocol = 'https';
} elseif (isset($_SERVER['HTTP_HOST'])) {
    $host = $_SERVER['HTTP_HOST'];
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
} else {
    $host = 'localhost:5000';
    $protocol = 'http';
}
define('WP_HOME', $protocol . '://' . $host);
define('WP_SITEURL', $protocol . '://' . $host);

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
    define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
