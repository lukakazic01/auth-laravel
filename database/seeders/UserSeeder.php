<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $total = (int) $this->command->ask('How many users would you like to create?', 0);
        $chunkSize = (int) $this->command->ask('How much users you want to create per iteration?', 1);
        $password = (string) Hash::make($this->command->ask('What should be the password for the created model?', 'password'));
        $this->command->getOutput()->progressStart($total);
        for($i = 0; $i < $total; $i += $chunkSize) {
            User::factory()->count($chunkSize)->create([
                'password' => $password,
            ]);
            $this->command->getOutput()->progressAdvance($chunkSize);
        }
        $this->command->getOutput()->progressFinish();
    }
}
