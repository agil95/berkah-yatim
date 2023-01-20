<?php

namespace App\Imports;

use App\Donasi;
use App\Proker;
use App\Rekening;
use Exception;
use Maatwebsite\Excel\Concerns\ToModel;

class DonationCsvImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if (strtolower($row[0]) == 'name')
            return null;

        $accountNumber = str_replace(' ', '', $row[8]);
        $rekening = Rekening::where('account', $accountNumber)->first();
        $proker = Proker::find($row[4]);

        /* try {
            return Donasi::updateOrCreate([
                'nohp'          => $row[1],
                'jumlah'        => $row[2],
                'campaign_id'   => $proker ? $proker->id : $row[4],
            ], [
                'nama'      => $row[0],
                // 'mitra_id'  => $proker->fundriser_id,
                // 'email' => null,
                // 'confirm_by' => null,
                // 'status' => 'pending',
                // 'foto' => null,
                'campaign_type' => 'proker',
                'type' => $rekening ? $rekening->bank : $row[8],
                'status' => 1,
            ]);
        } catch (Exception $error) {
            return $error->getMessage();
            return null;
        } */

        return Donasi::updateOrCreate([
            'nohp'          => $row[1],
            'jumlah'        => $row[2],
            'campaign_id'   => $proker ? $proker->id : $row[4],
        ], [
            'nama'      => $row[0],
            'campaign_type' => 'proker',
            'type' => $rekening ? $rekening->bank : $row[8],
            'status' => 1,
        ]);
    }
}
