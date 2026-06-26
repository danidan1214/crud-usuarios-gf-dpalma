<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Lineas de validacion en espanol
    |--------------------------------------------------------------------------
    |
    | Mensajes de error de validacion para el locale "es".
    |
    */

    'accepted' => 'El campo :attribute debe ser aceptado.',
    'accepted_if' => 'El campo :attribute debe ser aceptado cuando :other es :value.',
    'active_url' => 'El campo :attribute debe ser una URL valida.',
    'after' => 'El campo :attribute debe ser una fecha posterior a :date.',
    'after_or_equal' => 'El campo :attribute debe ser una fecha posterior o igual a :date.',
    'alpha' => 'El campo :attribute solo puede contener letras.',
    'alpha_dash' => 'El campo :attribute solo puede contener letras, numeros, guiones y guiones bajos.',
    'alpha_num' => 'El campo :attribute solo puede contener letras y numeros.',
    'array' => 'El campo :attribute debe ser un arreglo.',
    'before' => 'El campo :attribute debe ser una fecha anterior a :date.',
    'before_or_equal' => 'El campo :attribute debe ser una fecha anterior o igual a :date.',
    'between' => [
        'array' => 'El campo :attribute debe tener entre :min y :max elementos.',
        'file' => 'El campo :attribute debe pesar entre :min y :max kilobytes.',
        'numeric' => 'El campo :attribute debe estar entre :min y :max.',
        'string' => 'El campo :attribute debe tener entre :min y :max caracteres.',
    ],
    'boolean' => 'El campo :attribute debe ser verdadero o falso.',
    'confirmed' => 'La confirmacion de :attribute no coincide.',
    'current_password' => 'La contrasena es incorrecta.',
    'date' => 'El campo :attribute no es una fecha valida.',
    'date_equals' => 'El campo :attribute debe ser una fecha igual a :date.',
    'date_format' => 'El campo :attribute no coincide con el formato :format.',
    'declined' => 'El campo :attribute debe ser rechazado.',
    'declined_if' => 'El campo :attribute debe ser rechazado cuando :other es :value.',
    'different' => 'Los campos :attribute y :other deben ser diferentes.',
    'digits' => 'El campo :attribute debe tener :digits digitos.',
    'digits_between' => 'El campo :attribute debe tener entre :min y :max digitos.',
    'dimensions' => 'El campo :attribute tiene dimensiones de imagen invalidas.',
    'distinct' => 'El campo :attribute tiene un valor duplicado.',
    'doesnt_end_with' => 'El campo :attribute no debe terminar con uno de los siguientes: :values.',
    'doesnt_start_with' => 'El campo :attribute no debe comenzar con uno de los siguientes: :values.',
    'email' => 'El campo :attribute debe ser un correo valido.',
    'ends_with' => 'El campo :attribute debe terminar con uno de los siguientes: :values.',
    'enum' => 'El valor seleccionado en :attribute no es valido.',
    'exists' => 'El valor seleccionado en :attribute no es valido.',
    'file' => 'El campo :attribute debe ser un archivo.',
    'filled' => 'El campo :attribute debe tener un valor.',
    'gt' => [
        'array' => 'El campo :attribute debe tener mas de :value elementos.',
        'file' => 'El campo :attribute debe pesar mas de :value kilobytes.',
        'numeric' => 'El campo :attribute debe ser mayor que :value.',
        'string' => 'El campo :attribute debe tener mas de :value caracteres.',
    ],
    'gte' => [
        'array' => 'El campo :attribute debe tener :value elementos o mas.',
        'file' => 'El campo :attribute debe pesar :value kilobytes o mas.',
        'numeric' => 'El campo :attribute debe ser mayor o igual que :value.',
        'string' => 'El campo :attribute debe tener :value caracteres o mas.',
    ],
    'hex_color' => 'El campo :attribute debe ser un color hexadecimal valido.',
    'image' => 'El campo :attribute debe ser una imagen.',
    'in' => 'El valor seleccionado en :attribute no es valido.',
    'integer' => 'El campo :attribute debe ser un numero entero.',
    'ip' => 'El campo :attribute debe ser una direccion IP valida.',
    'ipv4' => 'El campo :attribute debe ser una direccion IPv4 valida.',
    'ipv6' => 'El campo :attribute debe ser una direccion IPv6 valida.',
    'json' => 'El campo :attribute debe ser una cadena JSON valida.',
    'list' => 'El campo :attribute debe ser una lista.',
    'lowercase' => 'El campo :attribute debe estar en minusculas.',
    'lt' => [
        'array' => 'El campo :attribute debe tener menos de :value elementos.',
        'file' => 'El campo :attribute debe pesar menos de :value kilobytes.',
        'numeric' => 'El campo :attribute debe ser menor que :value.',
        'string' => 'El campo :attribute debe tener menos de :value caracteres.',
    ],
    'lte' => [
        'array' => 'El campo :attribute no debe tener mas de :value elementos.',
        'file' => 'El campo :attribute no debe pesar mas de :value kilobytes.',
        'numeric' => 'El campo :attribute debe ser menor o igual que :value.',
        'string' => 'El campo :attribute no debe tener mas de :value caracteres.',
    ],
    'mac_address' => 'El campo :attribute debe ser una direccion MAC valida.',
    'max' => [
        'array' => 'El campo :attribute no debe tener mas de :max elementos.',
        'file' => 'El campo :attribute no debe pesar mas de :max kilobytes.',
        'numeric' => 'El campo :attribute no debe ser mayor que :max.',
        'string' => 'El campo :attribute no debe tener mas de :max caracteres.',
    ],
    'max_digits' => 'El campo :attribute no debe tener mas de :max digitos.',
    'mimes' => 'El campo :attribute debe ser un archivo de tipo: :values.',
    'mimetypes' => 'El campo :attribute debe ser un archivo de tipo: :values.',
    'min' => [
        'array' => 'El campo :attribute debe tener al menos :min elementos.',
        'file' => 'El campo :attribute debe pesar al menos :min kilobytes.',
        'numeric' => 'El campo :attribute debe ser al menos :min.',
        'string' => 'El campo :attribute debe tener al menos :min caracteres.',
    ],
    'min_digits' => 'El campo :attribute debe tener al menos :min digitos.',
    'missing' => 'El campo :attribute no debe estar presente.',
    'missing_if' => 'El campo :attribute no debe estar presente cuando :other es :value.',
    'missing_unless' => 'El campo :attribute no debe estar presente a menos que :other sea :value.',
    'missing_with' => 'El campo :attribute no debe estar presente cuando :values este presente.',
    'missing_with_all' => 'El campo :attribute no debe estar presente cuando :values esten presentes.',
    'multiple_of' => 'El campo :attribute debe ser multiplo de :value.',
    'not_in' => 'El valor seleccionado en :attribute no es valido.',
    'not_regex' => 'El formato de :attribute no es valido.',
    'numeric' => 'El campo :attribute debe ser un numero.',
    'password' => [
        'letters' => 'El :attribute debe contener al menos una letra.',
        'mixed' => 'El :attribute debe contener al menos una mayuscula y una minuscula.',
        'numbers' => 'El :attribute debe contener al menos un numero.',
        'symbols' => 'El :attribute debe contener al menos un simbolo.',
        'uncompromised' => 'El :attribute dado ha sido expuesto en una filtracion de datos.',
    ],
    'present' => 'El campo :attribute debe estar presente.',
    'present_if' => 'El campo :attribute debe estar presente cuando :other es :value.',
    'present_unless' => 'El campo :attribute debe estar presente a menos que :other sea :value.',
    'present_with' => 'El campo :attribute debe estar presente cuando :values este presente.',
    'present_with_all' => 'El campo :attribute debe estar presente cuando :values esten presentes.',
    'prohibited' => 'El campo :attribute esta prohibido.',
    'prohibited_if' => 'El campo :attribute esta prohibido cuando :other es :value.',
    'prohibited_unless' => 'El campo :attribute esta prohibido a menos que :other sea :value.',
    'prohibits' => 'El campo :attribute prohibe que :other este presente.',
    'regex' => 'El formato de :attribute no es valido.',
    'required' => 'El campo :attribute es obligatorio.',
    'required_array_keys' => 'El campo :attribute debe contener entradas para: :values.',
    'required_if' => 'El campo :attribute es obligatorio cuando :other es :value.',
    'required_if_accepted' => 'El campo :attribute es obligatorio cuando :other es aceptado.',
    'required_if_declined' => 'El campo :attribute es obligatorio cuando :other es rechazado.',
    'required_unless' => 'El campo :attribute es obligatorio a menos que :other este en :values.',
    'required_with' => 'El campo :attribute es obligatorio cuando :values esta presente.',
    'required_with_all' => 'El campo :attribute es obligatorio cuando :values estan presentes.',
    'required_without' => 'El campo :attribute es obligatorio cuando :values no esta presente.',
    'required_without_all' => 'El campo :attribute es obligatorio cuando ninguno de :values esta presente.',
    'same' => 'Los campos :attribute y :other deben coincidir.',
    'size' => [
        'array' => 'El campo :attribute debe tener :size elementos.',
        'file' => 'El campo :attribute debe pesar :size kilobytes.',
        'numeric' => 'El campo :attribute debe ser :size.',
        'string' => 'El campo :attribute debe tener :size caracteres.',
    ],
    'starts_with' => 'El campo :attribute debe comenzar con uno de los siguientes: :values.',
    'string' => 'El campo :attribute debe ser una cadena de texto.',
    'timezone' => 'El campo :attribute debe ser una zona horaria valida.',
    'unique' => 'El valor de :attribute ya esta registrado.',
    'uploaded' => 'El campo :attribute no se pudo subir.',
    'uppercase' => 'El campo :attribute debe estar en mayusculas.',
    'url' => 'El campo :attribute debe ser una URL valida.',
    'ulid' => 'El campo :attribute debe ser un ULID valido.',
    'uuid' => 'El campo :attribute debe ser un UUID valido.',

    /*
    |--------------------------------------------------------------------------
    | Reglas de validacion personalizadas
    |--------------------------------------------------------------------------
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'mensaje-personalizado',
        ],
    ],

];