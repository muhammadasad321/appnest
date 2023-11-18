<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Password;

class PasswordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $passwords = [
            'P$2kD8V#sR',
'T3*AqYwG9L',
'7H@6mUvPpF',
'Bt$Kj1M#Lx',
'Q&5yRvW#Zs',
'M9*XpLcK#3',
'V#2tGw7FjR',
'Xr$H4Uz1@S',
'6N#yWpDvLk',
'4$TjA9S#Zo',
'R6*PvFq#2K',
'1J@oT5yRnH',
'Ys3$WzN#8B',
'Z&vX7Aq#Kp',
'e5L$Ct2S#h',
'Qm#9D7jGvZ',
'i6*PzFqL#B',
'dV2$T8nA#y',
'w3*HsMvR#K',
'G#1oB5kDnX',
            // Add more passwords as needed
        ];

        foreach ($passwords as $password) {
            $hashedPassword = Hash::make($password);

            Password::create([
                'passwords' => $hashedPassword,
            ]);
        }
    }
}
