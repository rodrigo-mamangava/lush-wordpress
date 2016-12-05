<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa user o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/pt-br:Editando_wp-config.php
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações
// com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'lush-wp');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'root');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', '');

/** Nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Charset do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8mb4');

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para desvalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '* xW[5U>cWA%-vIGbc+!49>~8|A%oxm(Mk>.(1:?vK63+-huVK3;ZxAXr;ouqy9?');
define('SECURE_AUTH_KEY',  '(%)1FBS_kp#>^fN=F?7*T09&W4<u*)O*;rt`>y`5,j>EGY-RHiHO(wRK)@p|~*<.');
define('LOGGED_IN_KEY',    'V_s23wthR! ;6e^.+ S#yy:[6&Xpv!j3.`|[#oDjt-F%r3txzE&0Q!#+QUj#:M_H');
define('NONCE_KEY',        ':lR^OV?n2|<X!asy[D,lo}^z=6jU8NfH77l)9#.qRuuunbD<JpUFn[1dn2~,cWAe');
define('AUTH_SALT',        '2>6SQmwX(;;H0lvq|B*ljnH3V:ROxW##cCKOE.&,/_.*}YA7}S(}]ZdJz?#&<Y%$');
define('SECURE_AUTH_SALT', '<e`Ex?M1pi,^qx[2^q=Q9Q^B;hsSxYC.-[KGt3c]_*_oHb4?D|Z{O0P(xHO icis');
define('LOGGED_IN_SALT',   'gNO:AYQ3QgpsyTbx{eA GP<WM{bY^&Mz,!G.>[K-qCR%2Yz1-v8*m3lug&.6vKrD');
define('NONCE_SALT',       'ZvO?v/7v#vox%+mBfP2D)-fEN;j*Z(JBnT$$C2 $+G}<P6:vwceh+8pb#or4#+dy');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * para cada um um único prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'mmgv_';

/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://codex.wordpress.org/pt-br:Depura%C3%A7%C3%A3o_no_WordPress
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis e arquivos do WordPress. */
require_once(ABSPATH . 'wp-settings.php');
