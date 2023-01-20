<?php

namespace App\Http\Controllers;

use App\Imports\DonationCsvImport;
use Exception;
use Maatwebsite\Excel\Facades\Excel;

class DonationCronController extends Controller
{
    public function __invoke($filename = 'Whatsapp Tools Testing Sheet  - Sheet1.csv')
    {
        $message = 'Success';
        
        try {
            Excel::import(new DonationCsvImport, storage_path('import/' . $filename));
        } catch (Exception $error) {
            $message = $error->getMessage();
        }

        return $message;
    }
}
