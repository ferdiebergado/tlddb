<?php

use Flynsarmy\CsvSeeder\CsvSeeder;

class Participant_TypesTableSeeder extends CsvSeeder {

    public function __construct()
    {
        $this->table = 'participant_types';
        $this->filename = base_path().'/database/seeds/csvs/participanttypes.csv';
    }

    public function run()
    {
        // Recommended when importing larger CSVs
        DB::disableQueryLog();

        // Uncomment the below to wipe the table clean before populating
        DB::table($this->table)->truncate();

        parent::run();
    }
}
