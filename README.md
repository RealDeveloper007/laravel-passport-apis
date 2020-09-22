# Laravel Passport APIs

Some following commands are for setup the login register functionality.

First, download the Laravel installer using Composer.

sudo composer global require "laravel/installer=~1.1"

With New Version - composer create-project --prefer-dist laravel/laravel backend

With Specific Version - composer create-project --prefer-dist laravel/laravel backend "6.*"

Permission given to storage folder - sudo chmod 777 -R storage/

composer require laravel/ui

php artisan ui bootstrap --auth

npm install

sudo npm run dev

sudo php artisan key:generate

php artisan migrate 

sudo composer require laravel/passport:7.5

sudo php artisan passport:install

sudo php artisan db:seed

sudo chmod 777 -R storage/

use Laravel\Passport\HasApiTokens;

above trait must be used into the user model.


        'api' => [
            'driver' => 'passport',
            'provider' => 'users',
        ],

above array must be declared into the app\auth.php

<!-- Login API -->
Login API : http://localhost/laravel_passport/public/api/auth/login

Headers : 
Accept:application/json

form-data : 
email:test1@gmail.com
password:12345678 

Response : 

{
    "status": true,
    "message": "Login Successfully",
    "data": {
        "id": 1,
        "name": "test1",
        "email": "test1@gmail.com",
        "email_verified_at": null,
        "created_at": "2020-09-22T05:11:18.000000Z",
        "updated_at": "2020-09-22T05:11:18.000000Z",
        "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImEyMDM3MTg5NjcwYzUyNjU0M2Y2MmMwNjQ0ZWYzZWQ1NWRmNzRhMzIyNWU5ZmIyODFiZDI2ZDg4ZjI3NzQzM2MxZDA1YWU0Zjc2YWVhZTU5In0.eyJhdWQiOiIxIiwianRpIjoiYTIwMzcxODk2NzBjNTI2NTQzZjYyYzA2NDRlZjNlZDU1ZGY3NGEzMjI1ZTlmYjI4MWJkMjZkODhmMjc3NDMzYzFkMDVhZTRmNzZhZWFlNTkiLCJpYXQiOjE2MDA3NTE1ODksIm5iZiI6MTYwMDc1MTU4OSwiZXhwIjoxNjMyMjg3NTg4LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.GYnsB_hWEPn9vlSIc4OHfaoXF9kRwBiBPOSge-WqjaCxNhimUy2BTgwWPZ2fHak9VF_p60PQv5r_uqMwZzJOrZAvM0KIM0u8-ZSrQ_G7GyubN7BE7Jh5BO3TAe4D_ZaYl3xSoPh8GE-4t_ZVpyLfxPAi0fHAy3zPWmJwoEZwBVHQ4-CUttv87yfddxPYz_gX68yIzKlVamxO6DhcWd6vnGS7YW80oaLP6cO71slt-rO9u9pbiV9_4LYB3kF1IgqVU1Lxu148ZiIk_7wTL8dRIxxUagc67X4pJ00rKz8eJ_uiEjrakTClNaxtVfhPkfNEc1XNdY8956EnfhhyzfFIRDf8BBdBtBHh_R5341zu0HBtar3aVaCSLQ43w9TZtywvWAAI3Kvcr3k_Ek-U_U_En79CVTY-fxQqyqeqTAqw0Du_N2fkygTXWKdKaAl0xzwMLw5AMpt4-FSMHEnRAyErbAIpvhUW5JsJ12SYsYrvxU3Jf5z_BcKQjHJ-yqGrliCOP7qZWJiX1HVbkWAVIid4sBNWoibjTLuzAkLRHlpZg0hCiLwKoqyensNsvVxruRLKbNg_qi4PGWSUb6zet4w3Ss2Dj5rY6qhVvesvEWkmGAXkVZxFfZrjFwFRT-6r8AsTb5DmnUXcLzuIWq3dVc3nr4vD7fwYU75Aby5i5CQ2vvI"
    }
}

<!-- User Details API -->

User Details API : http://localhost/laravel_passport/public/api/user-details

Headers : 
Accept:application/json

Authentication :

Bearer TOken : eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjViODQwY2Q4YWM0NmYzNGI5NmRiMGZjNGZiMTA0MDhjNTU5YmIxZTFjNTE0MTlhYTIxODRlYzhkNWY5ODMwYjRmZDdlYTIwODRkYzBlYjNlIn0.eyJhdWQiOiIxIiwianRpIjoiNWI4NDBjZDhhYzQ2ZjM0Yjk2ZGIwZmM0ZmIxMDQwOGM1NTliYjFlMWM1MTQxOWFhMjE4NGVjOGQ1Zjk4MzBiNGZkN2VhMjA4NGRjMGViM2UiLCJpYXQiOjE2MDA3NTI4MzAsIm5iZiI6MTYwMDc1MjgzMCwiZXhwIjoxNjMyMjg4ODMwLCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.BJ1_4iNDHbtV4yuNMYXdyRvm4Cjt_EO3rA7eeWt9Jav32IKQlDa9bl2azlpofK_M0imdenO6BAsjh50EDuyjH5WQMiDohl8yFs7WzcT6xqQwSoQCr_VBU-zIa3983ReDv-m-TVUoFM_jMWIrsPY5bEIKFCnofWsFgWQLHX6vnnafeWhXf7OjAH_A8pprKeVu8DOnEmrrLh5ld5AJ8OIQ89IUhmwqNhBWDLaXV4cOr1XmA7_D3rvkbIVzn4o54eXv7UDC1akORigQ-uYW0w_eYQtLI6oKeBeix2AdMt4WGU_vCt2YYMQfuAceW9O1OPjnVSuRDLm36LqyOTTyEEUug1Qcl3FAtCNQNcu8r0jnslVl5IZR2ET41-hpxLBLiuVP1At5UntOpPWmFDAJ927Qp7J8zUzRs55zZc9zvTHt1uKqz7P-qKPLTEbPhSLT5AOM53_Vpy9LOM17NaZolNnrlZwGSXcMJ7sGDheeLxv3xiVqZajqdyzscoWtC10cWMV3IiMPSPPpJeWXEdNpAXZgp0QTN4GGDoUmUnxaFsMlmQdDjNTy-VANpEUqny4ItyTHog9yay6UhocDDmaqV7f51exjHclyQpMrIL4oKxxbxU1uTJ6HRVQhmzOVvN3nbtxWZJm79O1FurSlpayGEQEK13AnVcHq04B53b5bc1p1dV4


Response : 

{
    "status": true,
    "message": "User Details",
    "data":{
    "status": true,
    "message": "User Deatils",
    "data": {
        "id": 1,
        "name": "test1",
        "email": "test1@gmail.com",
        "email_verified_at": null,
        "created_at": "2020-09-22T05:11:18.000000Z",
        "updated_at": "2020-09-22T05:11:18.000000Z"
    }
}
}

<!-- Logout API -->

Logout API : http://localhost/laravel_passport/public/api/auth/logout

Headers : 
Accept:application/json

Authentication :

Bearer TOken : eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjViODQwY2Q4YWM0NmYzNGI5NmRiMGZjNGZiMTA0MDhjNTU5YmIxZTFjNTE0MTlhYTIxODRlYzhkNWY5ODMwYjRmZDdlYTIwODRkYzBlYjNlIn0.eyJhdWQiOiIxIiwianRpIjoiNWI4NDBjZDhhYzQ2ZjM0Yjk2ZGIwZmM0ZmIxMDQwOGM1NTliYjFlMWM1MTQxOWFhMjE4NGVjOGQ1Zjk4MzBiNGZkN2VhMjA4NGRjMGViM2UiLCJpYXQiOjE2MDA3NTI4MzAsIm5iZiI6MTYwMDc1MjgzMCwiZXhwIjoxNjMyMjg4ODMwLCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.BJ1_4iNDHbtV4yuNMYXdyRvm4Cjt_EO3rA7eeWt9Jav32IKQlDa9bl2azlpofK_M0imdenO6BAsjh50EDuyjH5WQMiDohl8yFs7WzcT6xqQwSoQCr_VBU-zIa3983ReDv-m-TVUoFM_jMWIrsPY5bEIKFCnofWsFgWQLHX6vnnafeWhXf7OjAH_A8pprKeVu8DOnEmrrLh5ld5AJ8OIQ89IUhmwqNhBWDLaXV4cOr1XmA7_D3rvkbIVzn4o54eXv7UDC1akORigQ-uYW0w_eYQtLI6oKeBeix2AdMt4WGU_vCt2YYMQfuAceW9O1OPjnVSuRDLm36LqyOTTyEEUug1Qcl3FAtCNQNcu8r0jnslVl5IZR2ET41-hpxLBLiuVP1At5UntOpPWmFDAJ927Qp7J8zUzRs55zZc9zvTHt1uKqz7P-qKPLTEbPhSLT5AOM53_Vpy9LOM17NaZolNnrlZwGSXcMJ7sGDheeLxv3xiVqZajqdyzscoWtC10cWMV3IiMPSPPpJeWXEdNpAXZgp0QTN4GGDoUmUnxaFsMlmQdDjNTy-VANpEUqny4ItyTHog9yay6UhocDDmaqV7f51exjHclyQpMrIL4oKxxbxU1uTJ6HRVQhmzOVvN3nbtxWZJm79O1FurSlpayGEQEK13AnVcHq04B53b5bc1p1dV4


Response : 
{
    "status": true,
    "message": "Logout Successfully!"
}