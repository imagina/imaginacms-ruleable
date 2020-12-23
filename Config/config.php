<?php

return [
    'name' => 'Ruleable',
    'rules' => [
        "users" => [
            "label" => "Reglas de Usuario",
            "values" => [
                "userGroup" => [
                    "entity" => "Modules\\Iprofile\\Entities\\Department",
                    "name" => "userGroup",
                    'value' => '',
                    'type' => 'select',
                    'required' => true,
                    'isFakeField' => false,
                    'props' => [
                        'label' => 'Grupo de Usuarios *',
                        'options' => [
                            ['label'=> 'Todos', 'id' => '0']
                        ],
                    ],
                    'loadOptions' =>[
                        'apiRoute'=> 'apiRoutes.quser.departments',
                        'select' => ['label' => 'title', 'id' => 'id'],
                    ]
                ],
            ]
        ],
        "dates" => [
            "label" => "Reglas de Fechas",
            "values" => [
                "datesFrom" =>[
                    "name" => "from",
                    'value' => '',
                    'type' => 'date',
                    "isFakeField" => 'dates',
                    'required' => true,
                    "cols" => "col-6",
                    'props' => [
                        'label' => 'Desde',
                    ],
                ],
                "datesTo" => [
                    "name" => "to",
                    'value' => '',
                    'type' => 'date',
                    "isFakeField" => 'dates',
                    'required' => true,
                    "cols" => "col-6",
                    'props' => [
                        'label' => 'Hasta',
                    ],
                ]
            ]
        ]
    ]
];
