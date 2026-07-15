<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ApqcMetricsSeeder extends Seeder
{
    public function run(): void
    {
        $processMap = DB::table('apqc_processes')->pluck('id', 'pcf_id')->toArray();

        $file = fopen(base_path("database/seeders/apqc_csv/metric.csv"), "r");
        
        fgetcsv($file);

        $dataToInsert = [];
        $now = Carbon::now();

        while (($data = fgetcsv($file, 10000, ",")) !== FALSE) {
            
            $pcfId = $data[0];
            
            if (isset($processMap[$pcfId])) {
                $dataToInsert[] = [
                    'apqc_process_id' => $processMap[$pcfId],
                    'metric_category' => $data[3],
                    'metric_id'       => trim($data[4]),
                    'metric_name'     => $data[5],
                    'formula'         => $data[6],
                    'units'           => $data[7],
                    'created_at'      => $now,
                    'updated_at'      => $now,
                ];
            }
        }
        fclose($file);

        foreach (array_chunk($dataToInsert, 500) as $chunk) {
            DB::table('apqc_metrics')->insert($chunk);
        }
    }
}