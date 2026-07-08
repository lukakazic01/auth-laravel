<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{

    private function doesUserExists(string $email): bool {
        return (bool) User::query()->where('email', $email)->first()?->exists;
    }

    public function run(): void
    {
        $total = $this->command->ask('How many users would you like to create?', 1);
        if (!is_numeric($total)) {
            $this->command->getOutput()->error("Total number of users must be a number");
            return;
        }
        $chunkSize = $this->command->ask('How much users you want to create per iteration?', 1);
        if (!is_numeric($chunkSize)) {
            $this->command->getOutput()->error("Total iteration of users must be a number");
            return;
        }
        $email = $this->command->ask('What should be the email for the user?');
        if ($this->doesUserExists($email)) {
            $this->command->getOutput()->error("$email already exists");
            return;
        }
        $name = $this->command->ask('What should be the name for the user?');
        if (!isset($name)) {
            $this->command->getOutput()->error('Name is required');
            return;
        }
        $password = Hash::make($this->command->ask('What should be the password for the user?', 'password'));
        $this->command->getOutput()->progressStart($total);
        for($i = 0; $i < $total; $i += $chunkSize) {
            User::factory()->count($chunkSize)->create([
                'email' => $email,
                'name' => $name,
                'password' => $password,
            ]);
            $this->command->getOutput()->progressAdvance($chunkSize);
        }
        $this->command->getOutput()->progressFinish();
        $this->command->getOutput()->success("You successfully created user \n email: $email \n password: $password \n name: $name");
    }
}
