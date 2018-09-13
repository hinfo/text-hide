<?php

/**
 * @package text-hide
 * @version 1.0
 */
/*
  Plugin Name:  Text Hide
  Plugin URI:   https://developer.wordpress.org/plugins/the-basics/
  Description:  This pluggin is to hide certainly text in document
  Version:      teste1
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

define('WP_DEBUG', true);

defined('ABSPATH') or die('Sem chances');
// Registamos a função para correr na ativação do plugin
register_activation_hook(__FILE__, 'ewp_install_hook');

function ewp_install_hook() {
    // Teste de versão do PHP e do WordPress
    // caso as versões sejam antigas, desativamos
    // o nosso plugin.
    if (version_compare(PHP_VERSION, '5.2.1', '<')
            or version_compare(get_bloginfo('version'), '3.3', '<')) {
        deactivate_plugins(basename(__FILE__));
    }

    // Vamos criar um opção para ser guardada na base-de-dados
    // e incluir um valor por default.
    add_option('ewp_opcao', '0');
}

add_action('wp_head', 'add_jquery');
add_action("wp_head", 'hide_text2');

/**
 * Adicionando o jQuery para manipulacao do DOM
 */
function add_jquery() {
    ?>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>"
    <?php

}

function hide_text() {
    ?>
    <script>
        $(document).ready(function () {
            $("h1").click(function () {
                $(".test-content").hide();
            });
        });
    </script>
    <?php

}

function hide_text2() {
    ?>
    <script>
        $(function(){
            var block = document.getElementById("block-content");
            console.log("valor de block: " + block);
            if (!block.null) {
                $(".test-content").hide();
                alert("Você Não tem permissão para visualizar este conteúdo!");
            } else {
                console.log("Entrou no else");
                alert("Tudo certo!");
            }
        });
    </script>
    <?php

}
?>
