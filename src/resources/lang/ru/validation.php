<?php

return [
    'required' => 'Поле :attribute обязательно для заполнения.',
    'required_with' => 'Поле :attribute обязательно для заполнения, когда указан(ы) :values.',
    'boolean' => 'Поле :attribute должно быть истиной или ложью.',
    'integer' => 'Поле :attribute должно быть целым числом.',
    'string' => 'Поле :attribute должно быть строкой.',
    'regex' => 'Поле :attribute имеет ошибочный формат.',
    'unique' => 'Такое значение поля :attribute уже существует.',
    'exists' => 'Выбранное значение для :attribute некорректно.',
    'json' => 'Поле :attribute должно быть валидной JSON строкой.',
    'max' => [
        'integer' => 'Поле :attribute должно быть не больше :max.',
        'string' => 'Поле :attribute должно быть не длиннее :max символов.',
    ],
    'min' => [
        'integer' => 'Поле :attribute должно быть не менее :min.',
        'string' => 'Поле :attribute должно быть не короче :min символов.',
    ],
    'date' => 'Поле :attribute не является датой.',
    'date_format' => 'Поле :attribute не соответствует формату :format.',
    'after' => 'Поле :attribute должно быть датой после :date.',
];
