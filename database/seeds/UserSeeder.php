<?php

use App\User;
use App\Position;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $position = Position::find(1);
        User::create([
            'student_no' => $this->generateStudentNumber(),
            'image' => 'admin_profile.jpg',
            'first_name' => 'wendell',
            'last_name' => 'suazo',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'position_id' => $position->id,
        ]);
    }

    private function generateStudentNumber()
    {
        $max_id = User::max('id');
        return date("Y") . '-' . str_pad(($max_id + 1), 5, "0", STR_PAD_LEFT) . '-ST-0';
    }
}
