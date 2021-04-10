<?php
/*
Plugin Name: Wellrix SMTP
Plugin URI: http://wellrix.ru
Description: Чистый PHP модуль для обратной связи на сайте средствами SMTP. Позволяет отправлять данные на почту клиентам и администраторам через API Wordpress
Author: Wellrix std.
Version: 1.0
Author URI: http://wellrix.ru
*/

// Основные переменные для работы внутри плагина
define( 'WELLRIX_SMTP_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'WELLRIX_SMTP_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'WELLRIX_SMTP_SITE_URL', get_home_url() );
define( 'WELLRIX_SMTP_API_ROUTE', get_home_url() . '/wp-json/wellrixSMTP/v2/api/' );
define( 'WELLRIX_SMTP_PLUGIN_NAME', 'wellrixSMTP' );

// Инициализируем ключевые файлы проекта
include( WELLRIX_SMTP_PLUGIN_PATH . 'functions/init.php' ); // Главный файл функций плагина
include( WELLRIX_SMTP_PLUGIN_PATH . 'functions/backend.php' ); // Внутренние функции плагина
include( WELLRIX_SMTP_PLUGIN_PATH . 'api/index.php' ); // Главный файл расширения шины API Wordpress



