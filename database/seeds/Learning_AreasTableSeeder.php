<?php

use Flynsarmy\CsvSeeder\CsvSeeder;

class Learning_AreasTableSeeder extends CsvSeeder {

    public function __construct()
    {
        $this->table = 'learning_areas';
        $this->filename = base_path().'/database/seeds/csvs/learningareas.csv';
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
