<?php

return [
    #
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],
    
        'columns' => [
            'id' => 'ID',
            'last_login_at' => 'Last login',
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
            'activated' => 'Activated',
            'forbidden' => 'Forbidden',
            'language' => 'Language',
                
            //Belongs to many relations
            'roles' => 'Roles',
                
        ],
    ],

    'post' => [
        'title' => 'Posts',

        'actions' => [
            'index' => 'Posts',
            'create' => 'New Post',
            'edit' => 'Edit :name',
            'will_be_published' => 'Post will be published at',
        ],

        'columns' => [
            'id' => 'ID',
            'title' => 'Title',
            'slug' => 'Slug',
            'perex' => 'Perex',
            'published_at' => 'Published at',
            'enabled' => 'Enabled',
            
        ],
    ],
//----------------------Roles------------------------------------------------------------
    'role' => [
        'title' => 'Roles',

        'actions' => [
            'index' => 'Roles',
            'create' => 'Nuevo Rol',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Nombre',
            'guard_name' => 'Guard name',
            
        ],
    ],

    'permission' => [
        'title' => 'Permisos',

        'actions' => [
            'index' => 'Permisos',
            'create' => 'Nuevo Permisos',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Nombre',
            'guard_name' => 'Guard name',
            
        ],
    ],

    'user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'ci' => 'Ci',
            'phone' => 'Phone',
            'address' => 'Address',
            'date_bird' => 'Date bird',
            'gender' => 'Gender',
            'country' => 'Country',
            'city' => 'City',
            'province' => 'Province',
            'email' => 'Email',
            'email_verified_at' => 'Email verified at',
            'password' => 'Password',
            
        ],
    ],

    'role-has-permission' => [
        'title' => 'Role Has Permission',

        'actions' => [
            'index' => 'Role Has Permission',
            'create' => 'New Role Has Permission',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'role-has-permission' => [
        'title' => 'Role Has Permissions',

        'actions' => [
            'index' => 'Role Has Permissions',
            'create' => 'New Role Has Permission',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'permission_id' => 'Permission',
            'role_id' => 'Role',
            
        ],
    ],
     //----------------------------------------------------Tipos de Titulo
    'type-academic-degree' => [
        'title' => 'Tipos de Títulos',

        'actions' => [
            'index' => 'Tipos de Títulos',
            'create' => 'Nuevo Tipos de Títulos',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Nombre',
            
        ],
    ],
//---------------------------------------Entidades
    'entity' => [
        'title' => 'Entidad',

        'actions' => [
            'index' => 'Entidad',
            'create' => 'Nueva Entidad',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'code' => 'Codigo',
            'name' => 'Nombre',
            
        ],
    ],
///--------------------------------------Gestión De Títulos
    'academic-degree' => [
        'title' => 'Gestión De Títulos',

        'actions' => [
            'index' => 'Gestión De Títulos',
            'create' => 'Nueva Gestión De Títulos',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'id_entity' => 'ID Entidad',
            'id_type' => 'ID Tipo',
            'name' => 'Nombre',
            
        ],
    ],

    'requirement' => [
        'title' => 'Gestión de Requisitos Generales',

        'actions' => [
            'index' => 'Gestión de Requisitos Generales',
            'create' => 'Nueva Gestión de Requisitos Generales',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Nombre',
            'quantity' => 'Cantidad',
            'observation' => 'Observación',
            
        ],
    ],
//-------------Gestión de Requisito por Título
    'academic-degree-requirement' => [
        'title' => 'Gestión de Requisito por Título',

        'actions' => [
            'index' => 'Gestión de Requisito por Título',
            'create' => 'Nueva Gestión de Requisito por Título',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'id_type_academic_degree' => 'ID Tipos de Títulos Académicos',
            'id_requirement' => 'Id Requisito',
            
        ],
    ],

    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => 'ID',
            'last_login_at' => 'Last login',
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'ci' => 'Ci',
            'code' => 'Code',
            'gender' => 'Gender',
            'date_of_birth' => 'Date of birth',
            'country' => 'Country',
            'city' => 'City',
            'province' => 'Province',
            'email' => 'Email',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
            'activated' => 'Activated',
            'forbidden' => 'Forbidden',
            'language' => 'Language',
                
            //Belongs to many relations
            'roles' => 'Roles',
                
        ],
    ],

    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => 'ID',
            'last_login_at' => 'Last login',
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
            'activated' => 'Activated',
            'forbidden' => 'Forbidden',
            'language' => 'Language',
            'ci' => 'Ci',
            'code' => 'Code',
            'gender' => 'Gender',
            'date_of_birth' => 'Date of birth',
            'country' => 'Country',
            'city' => 'City',
            'province' => 'Province',
                
            //Belongs to many relations
            'roles' => 'Roles',
                
        ],
    ],

    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => 'ID',
            'last_login_at' => 'Last login',
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
            'activated' => 'Activated',
            'forbidden' => 'Forbidden',
            'language' => 'Language',
            'ci' => 'Ci',
            'code' => 'Code',
            'gender' => 'Gender',
            'date_of_birth' => 'Date of birth',
            'country' => 'Country',
            'city' => 'City',
            'province' => 'Province',
                
            //Belongs to many relations
            'roles' => 'Roles',
                
        ],
    ],

    'procedure-request' => [
        'title' => 'Procedure Request',

        'actions' => [
            'index' => 'Procedure Request',
            'create' => 'New Procedure Request',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'no_request' => 'Nro Solicitud',
            'id_academic_degree' => 'Id academic degree',
            'id_request_state' => 'Id request state',
            'user_student' => 'User student',
            'user_transcriber' => 'User transcriber',
            
        ],
    ],

    'academic-degree' => [
        'title' => 'Academic Degree',

        'actions' => [
            'index' => 'Academic Degree',
            'create' => 'New Academic Degree',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'id_entity' => 'Id entity',
            'id_type' => 'Id type',
            'name' => 'Name',
            
        ],
    ],

    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],
//---------Gestion de usuario---------------------------
        'columns' => [
            'id' => 'ID',
            'last_login_at' => 'Último acceso',//Last login
            'first_name' => 'Primer Nombre',
            'last_name' => 'Apellido',//Last name
            'email' => 'Email',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
            'activated' => 'Activated',
            'forbidden' => 'Forbidden',
            'language' => 'Language',
            'ci' => 'Ci',
            'code' => 'Codigo',//code
            'gender' => 'Gender',
            'date_of_birth' => 'Date of birth',
            'country' => 'Country',
            'city' => 'City',
            'province' => 'Province',
                
            //Belongs to many relations
            'roles' => 'Roles',
                
        ],
    ],

    'procedure-request' => [
        'title' => 'Procedure Request',

        'actions' => [
            'index' => 'Solicitud de Trámite',
            'create' => 'Nueva Solicitud de Trámite',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'no_request' => 'No. Tramite ',
            'id_academic_degree' => 'Titulo Academico',
            'id_request_state' => 'Estado de Solicitud',
            'user_student' => 'Registro de Estudiantes',
            'user_transcriber' => 'Codigo de Transcriptor',
            
        ],
    ],
//--------------------------------Actas
    'minute' => [
        'title' => 'Actas',

        'actions' => [
            'index' => 'Acta',
            'create' => 'Nueva Acta',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'no_request' => 'No. Solicitud',
            
        ],
    ],
///------------------------------------------------------------Titulos academicos
    'user-academic-degree' => [
        'title' => 'Títulos Académicos de Usuarios',//User Academic Degree

        'actions' => [
            'index' => 'Títulos Académicos de Usuarios',
            'create' => 'Nuevo Títulos Académicos de Usuarios',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'no_request' => 'Nro de Solicitud',
            'code_academic_degree' => 'Código  de Grado Académico',
            
        ],
    ],

    'signer' => [
        'title' => 'Tramite a Firmar',

        'actions' => [
            'index' => 'Tramite a Firmar',
            'create' => 'Nuevo Tramite a Firmar',//New Signer
            'edit' => 'Edit :name',
        ],
//-----------------------Tramites a Firmar
        'columns' => [
            'id' => 'ID',
            'id_minute' => 'Acta', //Id Minute
            'code_user_academic_degre' => 'Título académico del usuario del código',
            'code' => 'Codigo',
            'id_step' => 'Pasos',//Id step
            'is_signed' => 'Está Firmado',//Is signed
            
        ],
    ],

    'stat' => [
        'title' => 'Stats',

        'actions' => [
            'index' => 'Stats',
            'create' => 'New Stat',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'page_name' => 'Page name',
            'count' => 'Count',
            
        ],
    ],

    'stat' => [
        'title' => 'Stat',

        'actions' => [
            'index' => 'Stat',
            'create' => 'New Stat',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'stat' => [
        'title' => 'Stats',

        'actions' => [
            'index' => 'Stats',
            'create' => 'New Stat',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];