<?php
/*
    Esto es distinto a activación/desactivación — es un archivo separado, literalmente llamado uninstall.php, 
    que WordPress ejecuta únicamente cuando el usuario elimina por completo el plugin (no solo lo desactiva) 
    desde la pantalla de Plugins.
*/
    //if uninstall.php is not called by Wordpress, die
    //WP_UNINSTALL_PLUGIN	Constante que WordPress define automáticamente solo cuando llama a este archivo 
    //legítimamente desde el proceso de desinstalación
    if (!defined( 'WP_UNINSTALL_PLUGIN' ) ) {
//Seguridad: si alguien intenta acceder a uninstall.php directamente (por URL), esta constante no existiría, 
//y el die detiene la ejecución — mismo patrón de seguridad que ya viste con ABSPATH
        die;
    }

    //Delete our tables
    //Remove our curl_multi_getcontent

    //Función de WordPress que elimina permanentemente una opción guardada en la base de datos
    delete_option( 'wpdev_name' );
?>