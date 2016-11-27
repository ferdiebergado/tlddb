<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(RegionsTableSeeder::class);
        $this->call(DivisionsTableSeeder::class);
        $this->call(ParticipantsTableSeeder::class);
        $this->call(DesignationsTableSeeder::class);
        $this->call(TransactionsTableSeeder::class);
        $this->call(Learning_AreasTableSeeder::class);
        $this->call(LanguagesTableSeeder::class);
        $this->call(EventsTableSeeder::class);
        $this->call(Participant_TypesTableSeeder::class);
    }
}
