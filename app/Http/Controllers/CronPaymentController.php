<?php

namespace App\Http\Controllers;

use App\BankTransferLog;
use App\Donasi;
use App\Rekening;
use Yugo\Moota\Facades\Moota;
use App\Notifications\InvoiceNotifcation;

class CronPaymentController extends Controller
{
    public function __invoke()
    {
        // return Moota::mutation('lmVz5Q95zvb')->month();
        // return Moota::mutation('lmVz5Q95zvb')->amount(7964550);
        $banks = Rekening::select('id', 'bank', 'account', 'moota_id')->get();
        $donations = Donasi::select('id', 'type', 'jumlah')
            ->whereIn('type', $banks->pluck('bank'))
            ->where('status', 'pending')
            ->get();

        $count = 0;
        foreach ($donations as $donation) {
            $myBank = $banks->where('bank', $donation->type)
                ->first();

            if ($myBank && $myBank->moota_id) {

                $payment = Moota::mutation($myBank->moota_id)->amount($donation->jumlah);

                if ($payment && isset($payment['mutation'])) {

                    foreach ($payment['mutation'] as $mutation) {
                        // dd($mutation);
                        if ($mutation->type === 'CR') {

                            $donation->status = 'success';
                            $check = $donation->save();

                            $donation->notify(new InvoiceNotifcation($donation,"wa"));

                            if ($check) {
                                $count++;
                                self::storeLog($donation, $mutation);
                            }
                        }
                    }
                }
            }
        }

        return "Donation Received: $count";
    }

    private static function storeLog($donation, $mutation)
    {
        BankTransferLog::updateOrCreate([
            'donasi_id' => $donation->id,
            'account_number' => $mutation->bank->account_number,
            'account_name' => $mutation->bank->atas_nama,
            'date' => $mutation->date,
            'description' => $mutation->description,
            'amount' => $mutation->amount,
        ]);
    }
}
