<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

#[Signature('reqres:get-user')]
#[Description('Command description')]
class ReqResUser extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user = Http::withHeaders([
            "x-api-key" => "free_user_3Gdjv9BRizp42oxx8DnS31lrAio",
        ])->get('https://reqres.in/api/users/8');
        $userCreate = Http::withHeaders([
            "x-api-key" => "free_user_3Gdjv9BRizp42oxx8DnS31lrAio"
        ])->post("https://reqres.in/api/users/2", [
            "name" => "Luka",
            "job" => "Full stack developer"
        ]);
        dd($userCreate->json());
    }
}
