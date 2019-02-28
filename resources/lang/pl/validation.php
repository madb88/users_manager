<?php

return [
    'required'      => 'Pole :attribute jest wymagane.',
    'confirmed'      => ':attribute nie zgadza się z polem potwierdzającym.',
    'unique'        => ':attribute jest juz zajęty.',


    'attributes' => [
        'name'      => 'Imię',
        'email'     => 'Email',
        'password'  => 'Hasło',
        'surname'   => 'Nazwisko',
        'role_name' => 'Nazwa',
    ],

    'custom' => [
        'password'  => ':format'
    ]
];