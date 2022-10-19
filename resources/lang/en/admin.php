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
            'activated' => 'Activated',
            'email' => 'Email',
            'first_name' => 'First name',
            'forbidden' => 'Forbidden',
            'language' => 'Language',
            'last_name' => 'Last name',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
                
            //Belongs to many relations
            'roles' => 'Roles',
                
        ],
    ],

    'trip' => [
        'title' => 'Trips',

        'actions' => [
            'index' => 'Trips',
            'create' => 'New Trip',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'bus_id' => 'Bus',
            'destination_id' => 'Destination',
            'parent_trip_id' => 'Parent trip',
            'start_id' => 'Start',
            
        ],
    ],

    'bus' => [
        'title' => 'Buses',

        'actions' => [
            'index' => 'Buses',
            'create' => 'New Bus',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'seat' => [
        'title' => 'Seats',

        'actions' => [
            'index' => 'Seats',
            'create' => 'New Seat',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'bus_id' => 'Bus',
            
        ],
    ],

    'booking' => [
        'title' => 'Booking',

        'actions' => [
            'index' => 'Booking',
            'create' => 'New Booking',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'user' => [
        'title' => 'User',

        'actions' => [
            'index' => 'User',
            'create' => 'New User',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'station' => [
        'title' => 'Station',

        'actions' => [
            'index' => 'Station',
            'create' => 'New Station',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'bus' => [
        'title' => 'Buses',

        'actions' => [
            'index' => 'Buses',
            'create' => 'New Bus',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'seat' => [
        'title' => 'Seats',

        'actions' => [
            'index' => 'Seats',
            'create' => 'New Seat',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'bus_id' => 'Bus',
            
        ],
    ],

    'station' => [
        'title' => 'Stations',

        'actions' => [
            'index' => 'Stations',
            'create' => 'New Station',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            
        ],
    ],

    'bus' => [
        'title' => 'Buses',

        'actions' => [
            'index' => 'Buses',
            'create' => 'New Bus',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'seat' => [
        'title' => 'Seats',

        'actions' => [
            'index' => 'Seats',
            'create' => 'New Seat',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'bus_id' => 'Bus',
            
        ],
    ],

    'trip' => [
        'title' => 'Trips',

        'actions' => [
            'index' => 'Trips',
            'create' => 'New Trip',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'bus_id' => 'Bus',
            'name' => 'Name',
            
        ],
    ],

    'stations-trip' => [
        'title' => 'Stations Trips',

        'actions' => [
            'index' => 'Stations Trips',
            'create' => 'New Stations Trip',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'trip_id' => 'Trip',
            'station_id' => 'Station',
            'station_order' => 'Station order',
            
        ],
    ],

    'booking' => [
        'title' => 'Bookings',

        'actions' => [
            'index' => 'Bookings',
            'create' => 'New Booking',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'trip_id' => 'Trip',
            'user_id' => 'User',
            'seat_id' => 'Seat',
            'start_id' => 'Start',
            'destination_id' => 'Destination',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];