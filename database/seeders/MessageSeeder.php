<?php

namespace Database\Seeders;

use App\Models\Message;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $numberOfMessages = 1550;
        Message::factory()->count($numberOfMessages)->create();
        $this->command->info("Tabella Messaggi popolata con {$numberOfMessages} record usando la Factory!");

    }
}