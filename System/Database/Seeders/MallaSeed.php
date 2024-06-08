<?php
namespace Malla\Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Malla\User\Model\Store;

class MallaSeed extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        (new Store)->factory(50)->create();
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}