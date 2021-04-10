<?php 


class wellrix_smtp_create_plugin_page {

    // Конструктор плагина
    function __construct() {
        add_action( 'admin_menu', array($this , 'wellrix_smtp_admin_menu'));
        add_action( 'wp_enqueue_scripts', array($this, 'wellrix_smt_scripts'), 11 );
        add_action( 'admin_enqueue_scripts',  array($this , 'wellrix_smtp_admin_assets' ));

    }
    // Настройка пунктов меню плагина
    function wellrix_smtp_admin_menu(){
        add_menu_page( 'Уведомления', 'Уведомления', 'edit_others_posts', 'wellri_smtp_settings', array( $this , 'wellri_smtp_settings_page'), '' );
        
    }

    // Подключение скриптов js во фронтенд
    function wellrix_smt_scripts() {
        wp_enqueue_script( 'wellrix-smtp-plugin-common', WELLRIX_SMTP_PLUGIN_URL . 'assets/js/app.min.js', null, null, false);
 
    }
    // Подключение скриптов и стилей для админ панели
    function wellrix_smtp_admin_assets( $hook_suffix ){
        wp_enqueue_style( 'wellrix-smtp-admin-styles', WELLRIX_SMTP_PLUGIN_URL .'assets/css/app.min.css' );
    }

    // Страница настроек плагина
    function wellri_smtp_settings_page() {
        include( WELLRIX_SMTP_PLUGIN_PATH . 'templates/template-settings.php' );
    }


    

}
 
$ncpp = new wellrix_smtp_create_plugin_page();