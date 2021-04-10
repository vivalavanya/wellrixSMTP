<?php
if($_POST){

    foreach($_POST as $key => $value){
        if ( get_option( $key ) != $value ) {
            update_option( $key, $value );
        }
        else {
            $deprecated = '';
            $autoload = 'yes';
            add_option( $key, $value, $deprecated, $autoload );
        }
    }

}
?>

<div class="wellrix-smtp__settings">
    <h2>Настройки уведомлений</h2>
    <form method="POST" action="">
        <label for="">Укажите SMTP хост</label>
        <input type="text" name="wellrix_smt_host" required value="<?=get_option( 'wellrix_smt_host' ) ? get_option( 'wellrix_smt_host' ) : '';?>">
        <label for="">SMTP порт</label>
        <input type="text" name="wellrix_smt_port" required value="<?=get_option( 'wellrix_smt_port' ) ? get_option( 'wellrix_smt_port' ) : '';?>">
        <label for="">Логин от акканута </label>
        <input type="text" name="wellrix_smt_username" required value="<?=get_option( 'wellrix_smt_username' ) ? get_option( 'wellrix_smt_username' ) : '';?>">
        <label for="">Пароль от акканута </label>
        <input type="password" name="wellrix_smt_password" required value="<?=get_option( 'wellrix_smt_password' ) ? get_option( 'wellrix_smt_password' ) : '';?>">
        <label for="">Email администратора</label>
        <input type="text" name="wellrix_smt_admin_email" required value="<?=get_option( 'wellrix_smt_admin_email' ) ? get_option( 'wellrix_smt_admin_email' ) : '';?>">
        <button>Сохранить настройки</button>
    </form>

</form>
</div>