<?php

use Flynsarmy\CsvSeeder\CsvSeeder;

class DesignationsTableSeeder extends CsvSeeder {

    public function __construct()
    {
        $this->table = 'designations';
        $this->filename = base_path().'/database/seeds/csvs/designations.csv';
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
