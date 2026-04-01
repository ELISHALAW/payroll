<?php

namespace App\Classes;

class BankCodes
{
    private static $data = [];

    /**
     * Initialize the data by loading it from the bank_list.php file.
     */
    private static function init()
    {
        if (empty(self::$data)) {
            // This looks for the file you just recreated in app/Data/
            $path = app_path('Data/bank_list.php');
            
            if (file_exists($path)) {
                self::$data = include($path);
            } else {
                self::$data = [];
            }
        }
    }

    /**
     * Returns a collection of all banks.
     * Used in the Controller to pass data to the Blade view.
     */
    public static function getBankCollection()
    {
        self::init();
        return collect(self::$data);
    }

    /**
     * Helper method to get a bank name by its code if needed.
     */
    public static function getBankNameByCode($code)
    {
        self::init();
        $bank = collect(self::$data)->where('code', $code)->first();
        return $bank['bank_name'] ?? null;
    }
}