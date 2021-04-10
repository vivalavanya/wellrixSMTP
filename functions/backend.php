<?php

function array_rename($array){
    $сomparison = [
        'first_name' => 'Имя',
        'last_name' => 'Фамилия',
        'user_phone' => 'Телефон',
        'user_email' => 'Email',
        'user_instagram' => 'Инстаграм',
        'promocode' => 'Промокод',
        'comment' => 'Комментарий',
        'time_start' => 'Начало',
        'time_end' => 'Окончание',
        'time_create' => 'Создан',
        'payment_type' => 'Способ оплаты',
        'amount' => 'Стомость',
        'user_login' => 'Логин',
        'user_password' => 'Пароль',
    ];

    $new_array = [];
    foreach($array as $key => $value){
        if($сomparison[$key]){
            $new_array[$сomparison[$key]] = $value;
        } else {
            $new_array[$key] = $value;
        }
    }
    return $new_array;

}
?>