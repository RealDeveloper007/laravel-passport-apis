<?php
use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        for ($i = 1; $i < 5; $i++) {
            User::create(
                [
                    'id'                => $i,
                    'name'              => 'test'.$i,
                    'email'             => 'test'.$i.'@gmail.com',
                    'password'          => bcrypt('12345678'),
                    'remember_token'    => NULL,
                    'created_at'        => Carbon::now(),
                    'updated_at'        => Carbon::now(),
                ],
            );
        }
    }
}
