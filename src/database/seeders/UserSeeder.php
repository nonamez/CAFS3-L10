<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = \App\Models\User::factory(10)->create();

        \App\Models\User::factory(10)->unverified()->create();

        \App\Models\UserAddress::factory(1)->create();

        \App\Models\UserAddress::factory()->count(3)->state([
            'user_id' => $users[0]->id,
        ])->create();

        \App\Models\UserAddress::factory(10)->state(new Sequence(
            [
                'user_id' => $users[1]->id,
                'country' => 'LT',
                'phone'   => fake('lt_LT')->phoneNumber(),
            ],
            [
                'user_id' => $users[2]->id,
                'country' => 'LV',
            ],
            [
                'user_id' => $users[3]->id,
                'country' => 'EE',
            ],
        ))->create();
        
        // \App\Models\User::factory(30)->create([
        //     'name' => 'Kiril',
        //     'password' => bcrypt('qwerty123'),
        // ]);

        // // https://laravel.com/docs/10.x/eloquent-factories#sequences
        // \App\Models\User::factory()->count(30)->state(new Sequence(
        //     fn (Sequence $sequence) => [
        //         'name' => 'Kiril-' . $sequence->index,
        //         'password' => bcrypt('qwerty123')
        //     ],
        // ))->create();
    }
}