<?php

return [
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

    'role' => [
        'title' => 'Roles',

        'actions' => [
            'index' => 'Roles',
            'create' => 'New Role',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'guard_name' => 'Guard name',
            
        ],
    ],

    'permission' => [
        'title' => 'Permissions',

        'actions' => [
            'index' => 'Permissions',
            'create' => 'New Permission',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
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

    'type-academic-degree' => [
        'title' => 'Type Academic Degree',

        'actions' => [
            'index' => 'Type Academic Degree',
            'create' => 'New Type Academic Degree',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            
        ],
    ],

    'entity' => [
        'title' => 'Entity',

        'actions' => [
            'index' => 'Entity',
            'create' => 'New Entity',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'code' => 'Code',
            'name' => 'Name',
            
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

    'requirement' => [
        'title' => 'Requirement',

        'actions' => [
            'index' => 'Requirement',
            'create' => 'New Requirement',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'quantity' => 'Quantity',
            'observation' => 'Observation',
            
        ],
    ],

    'academic-degree-requirement' => [
        'title' => 'Academic Degree Requirement',

        'actions' => [
            'index' => 'Academic Degree Requirement',
            'create' => 'New Academic Degree Requirement',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'id_type_academic_degree' => 'Id type academic degree',
            'id_requirement' => 'Id requirement',
            
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
            'no_request' => 'No request',
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
            'no_request' => 'No request',
            'id_academic_degree' => 'Id academic degree',
            'id_request_state' => 'Id request state',
            'user_student' => 'User student',
            'user_transcriber' => 'User transcriber',
            
        ],
    ],

    'minute' => [
        'title' => 'Minute',

        'actions' => [
            'index' => 'Minute',
            'create' => 'New Minute',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'no_request' => 'No request',
            
        ],
    ],

    'user-academic-degree' => [
        'title' => 'User Academic Degree',

        'actions' => [
            'index' => 'User Academic Degree',
            'create' => 'New User Academic Degree',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'no_request' => 'No request',
            'code_academic_degree' => 'Code academic degree',
            
        ],
    ],

    'signer' => [
        'title' => 'Signer',

        'actions' => [
            'index' => 'Signer',
            'create' => 'New Signer',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'id_minute' => 'Id minute',
            'code_user_academic_degre' => 'Code user academic degre',
            'code' => 'Code',
            'id_step' => 'Id step',
            'is_signed' => 'Is signed',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];