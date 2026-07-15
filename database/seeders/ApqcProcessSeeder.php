<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ApqcProcessSeeder extends Seeder
{
    public function run(): void
    {
        $file = fopen(base_path("database/seeders/apqc_csv/combined.csv"), "r");
        
        fgetcsv($file);

        $dataToInsert = [];
        $now = Carbon::now();

        while (($data = fgetcsv($file, 10000, ",")) !== FALSE) {
            $dataToInsert[] = [
                'pcf_id'              => $data[0],
                'hierarchy_id'        => $data[1],
                'name'                => $data[2],
                'has_metric'          => (trim(strtoupper($data[5])) === 'Y') ? 1 : 0,
                'element_description' => $data[6],
                'parent_id'           => null,
                'level'               => null,
                'created_at'          => $now,
                'updated_at'          => $now,
            ];
        }
        fclose($file);

        foreach (array_chunk($dataToInsert, 500) as $chunk) {
            DB::table('apqc_processes')->insert($chunk);
        }

        DB::statement("
            UPDATE apqc_processes 
            SET level = LENGTH(hierarchy_id) - LENGTH(REPLACE(hierarchy_id, '.', '')) + 1
        ");
        
        DB::statement("
            UPDATE apqc_processes AS child
            JOIN apqc_processes AS parent 
              ON parent.hierarchy_id = SUBSTRING_INDEX(child.hierarchy_id, '.', LENGTH(child.hierarchy_id) - LENGTH(REPLACE(child.hierarchy_id, '.', '')))
            SET child.parent_id = parent.id
            WHERE child.hierarchy_id LIKE '%.%'
        ");
    }
}