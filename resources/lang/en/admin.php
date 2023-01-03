<?php

return [
    #
    'admin-user' => [
        'title' => 'Usuarios',

        'actions' => [
            'index' => 'Usuarios',
            'create' => 'Nuevo Usuario',
            'edit' => 'Edit :name',
            'edit_profile' => 'Editar Perfil',
            'edit_password' => 'Editar Contraseña',
        ],
    
        'columns' => [
            'id' => 'ID',
            'last_login_at' => 'Último acceso',//Last login
            'first_name' => 'Nombres',//First name
            'last_name' => 'Apellidos',//Last name
            'email' => 'Email',
            'password' => 'Contraseña',
            'password_repeat' => 'Confirmación de Contraseña',
            'activated' => 'Activado',
            'forbidden' => 'Prohibido',
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
            'guard_name' => 'Tipo de Usuario',//Guard name
            
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
            'guard_name' => 'Tipo de Usuario',//Guard name
            
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
            'gender' => 'Género',
            'country' => 'País',
            'city' => 'Ciudad',
            'province' => 'Provincia',
            'email' => 'Email',
            'email_verified_at' => 'Email Verificado',
            'password' => 'Contraseña',
            
        ],
    ],

    'role-has-permission' => [
        'title' => 'Permisos de Rol',

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
        'title' => 'Permisos de Rol',//Role Has Permissions

        'actions' => [
            'index' => 'Permisos de Rol',
            'create' => 'Nuevo Permiso de Rol',// Role Has Permission
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'permission_id' => 'Permiso',
            'role_id' => 'Rol',
            
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
//---------------------------------------Entidades(Institución)-----------------
    'entity' => [
        'title' => 'Institución',

        'actions' => [
            'index' => 'Institución',
            'create' => 'Nueva Institución',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'code' => 'Cod. Carrera',
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
        'title' => 'Usuarios',

        'actions' => [
            'index' => 'Usuarios',
            'create' => 'Nuevo Usuarios',
            'edit' => 'Edit :name',
            'edit_profile' => 'Editar Perfil',//Edit Profile
            'edit_password' => 'Editar Contraseña',
        ],

        'columns' => [
            'id' => 'ID',
            'last_login_at' => 'Último acceso',
            'first_name' => 'Nombres',
            'last_name' => 'Apellidos',//Last name
            'ci' => 'Ci',
            'code' => 'Codigo',
            'gender' => 'Género',
            'date_of_birth' => 'Fecha de Nacimiento',//Date of birth
            'country' => 'País',
            'city' => 'Ciudad',
            'province' => 'Provincia',
            'email' => 'Email',
            'password' => 'Contraseña',
            'password_repeat' => 'Confirmación de Contraseña',
            'activated' => 'Activado',
            'forbidden' => 'Prohibido',
            'language' => 'Language',
                
            //Belongs to many relations
            'roles' => 'Roles',
                
        ],
    ],

    'admin-user' => [
        'title' => 'Usuarios',

        'actions' => [
            'index' => 'Usuarios',
            'create' => 'Nuevo Usuarios',
            'edit' => 'Edit :name',
            'edit_profile' => 'Editar Perfil',//Edit Profile
            'edit_password' => 'Edit Editar Contraseña',//
        ],

        'columns' => [
            'id' => 'ID',
            'last_login_at' => 'Último acceso',
            'first_name' => 'Nombres',
            'last_name' => 'Apellidos',
            'email' => 'Email',
            'password' => 'Contraseña',
            'password_repeat' => 'Confirmación de Contraseña',
            'activated' => 'Activado',
            'forbidden' => 'Prohibido',
            'language' => 'Language',
            'ci' => 'Ci',
            'code' => 'Codigo',
            'gender' => 'Género',
            'date_of_birth' => 'Fecha de Nacimiento',
            'country' => 'País',
            'city' => 'Ciudad',
            'province' => 'Provincia',
                
            //Belongs to many relations
            'roles' => 'Roles',
                
        ],
    ],
//-----------------------------------usuario administrador------------------
    'admin-user' => [
        'title' => 'Usuarios',//Users

        'actions' => [
            'index' => 'Usuarios',//Users
            'create' => 'Nuevo Usuario',//New User
            'edit' => 'Edit :name',
            'edit_profile' => 'Editar Perfil',//Edit Profile
            'edit_password' => 'Editar Contraseña',
        ],

        'columns' => [
            'id' => 'ID',
            'last_login_at' => 'Último acceso',
            'first_name' => 'Nombres',
            'last_name' => 'Apellidos',
            'email' => 'Email',
            'password' => 'Contraseña',
            'password_repeat' => 'Confirmación de Contraseña',
            'activated' => 'Activado',
            'forbidden' => 'Prohibido',
            'language' => 'Language',
            'ci' => 'Ci',
            'code' => 'Codigo',
            'gender' => 'Género',
            'date_of_birth' => 'Fecha de Nacimiento',
            'country' => 'País',
            'city' => 'Ciudad',
            'province' => 'Provincia',
                
            //Belongs to many relations
            'roles' => 'Roles',
                
        ],
    ],
//------------------------------Procedure RequestSolicitud de trámite----------------------------
    'procedure-request' => [
        'title' => 'Solicitud de Trámite',//Procedure Request

        'actions' => [
            'index' => 'Solicitud de Trámite',
            'create' => 'Nueva Solicitud de Trámite',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'no_request' => 'Nro Solicitud',
            'id_academic_degree' => 'Id Títulos Académicos',//academic degree
            'id_request_state' => 'Estado de Solicitud',//Id request state
            'user_student' => 'Registro de Estudiantes',
            'user_transcriber' => 'Codigo de Transcriptor',
            
        ],
    ],
//---------------------------Gestión De Títulos 
    'academic-degree' => [
        'title' => 'Gestión De Títulos',

        'actions' => [
            'index' => 'Gestión De Títulos',
            'create' => 'Nuevo Gestión De Títulos ',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'id_entity' => 'Cod. Carrera',//Id entity
            'id_type' => 'Tipo',//Id type
            'name' => 'Nombre',
            
        ],
    ],

    'admin-user' => [
        'title' => 'Usuarios',//Users

        'actions' => [
            'index' => 'Usuarios',
            'create' => 'Nuevo Usuario',
            'edit' => 'Edit :Nombre',
            'edit_profile' => 'Editar Perfil',
            'edit_password' => 'Editar Contraseña',
        ],
//---------Gestion de usuario---------------------------
        'columns' => [
            'id' => 'ID',
            'last_login_at' => 'Último acceso',//Last login
            'first_name' => 'Nombres',//First name
            'last_name' => 'Apellidos',//Last name
            'email' => 'Email',
            'password' => 'Contraseña',
            'password_repeat' => 'Confirmación de Contraseña',//Password Confirmation
            'activated' => 'Activado',
            'forbidden' => 'Prohibido',
            'language' => 'Lenguaje',
            'ci' => 'Ci',
            'code' => 'Codigo',//code
            'gender' => 'Género',//Gender
            'date_of_birth' => 'Fecha de Nacimiento',//Date of birth
            'country' => 'País',
            'city' => 'Ciudad',//City
            'province' => 'Provincia',
                
            //Belongs to many relations
            'roles' => 'Roles',
                
        ],
    ],
//------------------------------------Solicitud de trámite(Procedure Request)-----
    'procedure-request' => [
        'title' => 'Solicitud de Trámite',

        'actions' => [
            'index' => 'Solicitud de Trámite',
            'create' => 'Nueva Solicitud de Trámite',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'no_request' => 'No. Tramite ',
            'id_academic_degree' => 'Titulo Academico',
            'id_request_state' => 'Estado de Solicitud',//Id request state
            'user_student' => 'Registro de Estudiantes', //user student
            'user_transcriber' => 'Codigo de Transcriptor',//user transcriber
            
        ],
    ],
//--------------------------------Actas--------------------------------------
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
//-----------------------Tramites a Firmar------------------------
    'signer' => [
        'title' => 'Tramite a Firmar',

        'actions' => [
            'index' => 'Tramite a Firmar',
            'create' => 'Nuevo Tramite a Firmar',//New Signer
            'edit' => 'Edit :name',
        ],

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
//---------------------------------Estadisticas-----------------------------------
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
-
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