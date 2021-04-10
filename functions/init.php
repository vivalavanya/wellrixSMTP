<?php 


class wellrix_smtp_create_plugin_page {

    // Конструктор плагина
    function __construct() {

        add_action( 'wp_enqueue_scripts', array($this, 'wellrix_smt_scripts'), 11 );

    }
    // Подключение скриптов js во фронтенд
    function wellrix_smt_scripts() {
        wp_enqueue_script( 'wellrix-smtp-plugin-common', WELLRIX_SMTP_PLUGIN_URL . 'assets/js/app.min.js', null, null, false);
 
    }

    

}
 
$ncpp = new wellrix_smtp_create_plugin_page();