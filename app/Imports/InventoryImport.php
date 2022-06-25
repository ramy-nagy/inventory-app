<?php

namespace App\Imports;

use App\Models\Inventory;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;


class InventoryImport implements ToCollection, WithChunkReading, WithStartRow, WithBatchInserts
{
    public $store;
    public function collection(Collection $rows)
    {
        $filtered = $rows->filter(function ($value, $key) {
            return $value[2] == "A";
        });

        foreach ($filtered->all() as $row) {
            DB::table('inventories')->insertOrIgnore([
                'sn' => $row[1],
                'store_id' => 1,
                'status' => $row[2],
                'store_name' => $row[3],
                'inventory' => $row[4],
                'article' => $row[5],
                'article_name' => $row[6],
                'price' => $row[7],
                'modified_on' => $row[8],
                'created_at' => date("Y-m-d H:i:s")
            ]);
        }
    }

    public function batchSize(): int
    {
        return 1000;
    }

    public function chunkSize(): int
    {
        return 2000;
    }
    public function startRow(): int
    {
        return 5;
    }
}
