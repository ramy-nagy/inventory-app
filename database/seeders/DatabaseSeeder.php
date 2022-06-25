<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'name' => 'ramy nagy',
            'email' => 'admin@inventory-app.com',
            'password' => '$2y$10$EHdC8t7ArVh7.eluiOLLp.AoOFVrnTCnURp.4CUI/2pnAXxP.8k6a',
            'two_factor_secret' => 'eyJpdiI6IkI4dVEwRThzM1pNc1RodDNtUURsMlE9PSIsInZhbHVlIjoiWi9scjdnZ0JIYlFtcVo2OXhCd0wzelBvMkZWQkZXVWo0ZHpINUo2WGJJRT0iLCJtYWMiOiJiN2Y1Zjg4OTZjMDdlNTc4NGRiMDM4NDAyYjk4MjRhNTNiMWFiYTMzYWMyNzNlMmY4ZGU0ODkxMmI2MGIzMWFlIiwidGFnIjoiIn0=',
            'two_factor_recovery_codes' => 'eyJpdiI6IklBQXpGZTd0Z2E1SWpFTzBCQ3hmZkE9PSIsInZhbHVlIjoiN0xnNFlvZDlKczZCZmMxN29ZUmhqT0hIOVNkM1NtaTlpY013bWxldjB2Y2EvaUxTRmVaazg1NDgyZldMQmNKRjZPMnRla2pkZWV3L0FMSmZqdG12OE1UZWM1YXV0NGZ2Y1NrYVJybktKQmFRNHJtZjdrSGJZTDZPS1JjYnJrWEZpS2tEbThReXZ2aUR4MndITHUvWE4xUWYrZncyN3NMM1VvbUxuNWsyTUVqeDV2aTd4MkIxNXUrbk5vcW1UN3prbXg0Y1I2VE1XaXA4VnFKcVpIUndyNUhJajFKZEdzYWtNMDBobkZZRE10M3F6R09YUk9ISjZWSlJhcE9JSGpza2tEZmpZRGZJREI1MHJTZEx6NGViWFE9PSIsIm1hYyI6ImJmYzRmNmI2OWNiNzkxNDgwNmE1ODQ2MzczM2E0OTVkNzQ2NTBiNzUxNTZhM2Q0ZmUwNTY4NzFlYjhjM2Q2OGMiLCJ0YWciOiIifQ==',
            'two_factor_confirmed_at' => '2022-06-25 12:52:58',
        ]);
        \App\Models\Store::create([
            'name' => 'MF-Samanoud',
            'passcode' => '0022',
        ]);
    }
}
