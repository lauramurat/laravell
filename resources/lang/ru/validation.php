<?php

return [

    'between' => [
        'numeric' => ':attribute должен быть между :min и :max.',
        'file' => ':attribute должен быть между :min и :max килобайтами.',
        'string' => ':attribute должен находиться между символами :min и :max.',
        'array' => ':attribute должен иметь элементы от :min до :max.',
    ],
    'boolean' => 'Поле :attribute должно быть истинным или ложным.',
    'confirmed' => 'Подтверждение :attribute не совпадает.',
    'current_password' => 'Пароль неверен.',
    'date' => ':attribute не является действительной датой.',
    'email' => ':attribute должен быть действительным адресом электронной почты.',
    'file' => ':attribute должен быть файлом.',
    'image' => ':attribute должен быть изображением.',
    'in' => 'Выбранный :attribute недействителен.',
    'integer' => ':attribute должен быть целым числом.',
    'mimes' => ':attribute должен быть файлом типа: :values.',
    'mimetypes' => ':attribute должен быть файлом типа: :values.',
    'max' => [
        'numeric' => ':attribute не должен быть больше :max.',
        'file' => ':attribute не должен превышать :max килобайт.',
        'string' => ':attribute не должен превышать :max символов.',
        'array' => ':attribute не должен содержать более :max элементов.',
    ],
    'min' => [
        'numeric' => ':attribute должен быть как минимум :min.',
        'file' => 'Размер :attribute должен быть не менее :min килобайт.',
        'string' => ':attribute должен содержать не менее :min символов.',
        'array' => ':attribute должен иметь как минимум :min элементов.',
    ],
    'numeric' => ':attribute должен быть числом.',
    'password' => 'Пароль неверен.',
    'required' => 'Поле :attribute является обязательным.',
    'string' => 'Поле :attribute должно содержать записи для: :values.',
    'timezone' => ':attribute должен быть действительным часовым поясом.',
    'unique' => 'Атрибут : уже занят.',

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    'attributes' => [],

];
