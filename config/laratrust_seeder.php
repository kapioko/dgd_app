<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'super-administrateur' => [
            'utilisateur' => 'c,r,u,d',
            'dossier' => 'c,r,u,d',
            'profil' => 'c,r,u,d',
            'type-Dossier'=>'c,r,u,d',
            'unite-temps-traitement'=>'c,r,u,d',
            'service'=>'c,r,u,d',
            'direction'=>'c,r,u,d',
            'temps-traitement'=>'c,r,u,d',
            'niveau-traitement'=>'c,r,u,d'

        ],
        'administrateur' => [
            'utilisateur' => 'c,r,u',
            'dossier' => 'c,r,u',
            'profil' => 'c,r,u',
            'type-Dossier'=>'c,r,u',
            'unite-temps-traitement'=>'c,r,u',
            'service'=>'c,r,u',
            'direction'=>'c,r,u,d',
            'temps-traitement'=>'c,r,u,d',
            'niveau-traitement'=>'c,r,u,d'
        ],
        'validateur' => [
            'dossier' => 'c,r,u',
        ],
        'demandeur' => [
            'dossier' => 'c,r,u',
        ]
    ],

    'permissions_map' => [
        'c' => 'creer',
        'r' => 'lire',
        'u' => 'modifier',
        'd' => 'supprimer'
    ]
];