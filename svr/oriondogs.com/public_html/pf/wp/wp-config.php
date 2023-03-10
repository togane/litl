<?php
/**
 * WordPress の基本設定
 *
 * このファイルは、インストール時に wp-config.php 作成ウィザードが利用します。
 * ウィザードを介さずにこのファイルを "wp-config.php" という名前でコピーして
 * 直接編集して値を入力してもかまいません。
 *
 * このファイルは、以下の設定を含みます。
 *
 * * MySQL 設定
 * * 秘密鍵
 * * データベーステーブル接頭辞
 * * ABSPATH
 *
 * @link http://wpdocs.osdn.jp/wp-config.php_%E3%81%AE%E7%B7%A8%E9%9B%86
 *
 * @package WordPress
 */

// 注意:
// Windows の "メモ帳" でこのファイルを編集しないでください !
// 問題なく使えるテキストエディタ
// (http://wpdocs.osdn.jp/%E7%94%A8%E8%AA%9E%E9%9B%86#.E3.83.86.E3.82.AD.E3.82.B9.E3.83.88.E3.82.A8.E3.83.87.E3.82.A3.E3.82.BF 参照)
// を使用し、必ず UTF-8 の BOM なし (UTF-8N) で保存してください。

// ** MySQL 設定 - この情報はホスティング先から入手してください。 ** //
/** WordPress のためのデータベース名 */
define( 'DB_NAME', 'lomatom_pf' );

/** MySQL データベースのユーザー名 */
define( 'DB_USER', 'lomatom_lonlonkt' );

/** MySQL データベースのパスワード */
define( 'DB_PASSWORD', '2tumenpr' );

/** MySQL のホスト名 */
define( 'DB_HOST', 'mysql8017.xserver.jp' );

/** データベースのテーブルを作成する際のデータベースの文字セット */
define( 'DB_CHARSET', 'utf8mb4' );

/** データベースの照合順序 (ほとんどの場合変更する必要はありません) */
define( 'DB_COLLATE', '' );

/**#@+
 * 認証用ユニークキー
 *
 * それぞれを異なるユニーク (一意) な文字列に変更してください。
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org の秘密鍵サービス} で自動生成することもできます。
 * 後でいつでも変更して、既存のすべての cookie を無効にできます。これにより、すべてのユーザーを強制的に再ログインさせることになります。
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'd1L:^.<~S(mu8*vJ8T{_6C^moh7Q(h#}T?x>~mtSFwTI~hIlS157O_@YfIho@V>:' );
define( 'SECURE_AUTH_KEY',  'a26n<)r?go-B,_LfhYfXPmg8N1&SMpOLm-4kb)(vC9f)JMKRw8?<~P0e!_|zGGn.' );
define( 'LOGGED_IN_KEY',    '-pxZm-0JkJfxWnDT9@RNrX/#5z-$=5G|QZ/~DRN4ZS!lqc.~%s?x)/nNJmY/:G;S' );
define( 'NONCE_KEY',        'GpB]Iz)jU,S1.Gl3}k-AWK}>}Ey]J=`(E|1@.%%vdHFqLkSW*28BrI_f-?<U^V;?' );
define( 'AUTH_SALT',        'prFdBv-cUr3G!Y?!DKy?scV`ga7|M A#/0N@pFrao(^6%-!,Mkx4oJLtk>BG?~x?' );
define( 'SECURE_AUTH_SALT', ']s{:`l]V]:lO{1[RVR9euJBT}Uf}F-TDD4WD,>JlXBk`*B*Ju%9)oTmsG4*mO-.Q' );
define( 'LOGGED_IN_SALT',   '49VZY~>b0[qkow^,/tU]my2dpB#G;uIm7Cq_bltJm)n4otSz2sK~!^vME[$R0SKw' );
define( 'NONCE_SALT',       '#($&E0I2;tw9NSCh5BqPI@+^/5tK-<`bJ/vXlrgOWXJ<;hP8d.v!qvWvl(uwykv4' );

/**#@-*/

/**
 * WordPress データベーステーブルの接頭辞
 *
 * それぞれにユニーク (一意) な接頭辞を与えることで一つのデータベースに複数の WordPress を
 * インストールすることができます。半角英数字と下線のみを使用してください。
 */
$table_prefix = 'wp_';

/**
 * 開発者へ: WordPress デバッグモード
 *
 * この値を true にすると、開発中に注意 (notice) を表示します。
 * テーマおよびプラグインの開発者には、その開発環境においてこの WP_DEBUG を使用することを強く推奨します。
 *
 * その他のデバッグに利用できる定数については Codex をご覧ください。
 *
 * @link http://wpdocs.osdn.jp/WordPress%E3%81%A7%E3%81%AE%E3%83%87%E3%83%90%E3%83%83%E3%82%B0
 */
define( 'WP_DEBUG', false );

/* 編集が必要なのはここまでです ! WordPress でのパブリッシングをお楽しみください。 */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
