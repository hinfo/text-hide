<?php

/**
 * @package my-hello
 * @version 1.0
 */
/*
  Plugin Name:  My Hello
  Plugin URI:   https://developer.wordpress.org/plugins/the-basics/
  Description:  My first plugin hello
  Version:      201801
  Author:       hinfo.com
  Author URI:   https://henriqueantunes.herokuapp.com
  License:      GPL2
  License URI:  https://www.gnu.org/licenses/gpl-2.0.html
  Text Domain:  wporg
  Domain Path:  /languages
 */
/*
 *      Copyright 2018 Henrique Antunes <hinfo@gmx.com>
 *
 *      This program is free software; you can redistribute it and/or modify
 *      it under the terms of the GNU General Public License as published by
 *      the Free Software Foundation; either version 3 of the License, or
 *      (at your option) any later version.
 *
 *      This program is distributed in the hope that it will be useful,
 *      but WITHOUT ANY WARRANTY; without even the implied warranty of
 *      MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *      GNU General Public License for more details.
 *
 *      You should have received a copy of the GNU General Public License
 *      along with this program; if not, write to the Free Software
 *      Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 *      MA 02110-1301, USA.
 */
/*
 * My Hello is free software: you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation, either version 2 of the License, or
  any later version.

  My Hello is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with My Hello. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
 */
?>
<?php

define('WP_DEBUG', true);

defined('ABSPATH') or die('Sem chances');

require('./wp-load.php');
?>
<?php

// Registamos a função para correr na ativação do plugin
register_activation_hook(__FILE__, 'ewp_install_hook');

function ewp_install_hook() {
    // Vamos testar a versão do PHP e do WordPress
    // caso as versões sejam antigas, desativamos
    // o nosso plugin.
    if (version_compare(PHP_VERSION, '5.2.1', '>')
            or version_compare(get_bloginfo('version'), '3.3', '>')) {
        deactivate_plugins(basename(__FILE__));
    }

    // Vamos criar um opção para ser guardada na base-de-dados
    // e incluir um valor por defeito.
    add_option('ewp_opcao', '0');
}
?>

<?php

//add_action('init', 'hello');
//add_filter("the_content", "changeText");
function hello() {
    echo '<script> alert("Hello my friend");</script>';

    /**
     * "entry-title"
     */
}
function changeText($the_Post){
    $the_New_Post = str_replace("asdf", "Teste Plugin", $the_Post);
    return $the_New_Post;
}
?>
