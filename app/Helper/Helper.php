<?php

use App\Models\Outlet;
use App\Models\TransferHistory;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

if (!function_exists('uniqCode')) {
    function uniqCode($lenght)
    {
        // uniqCode
        if (function_exists("random_bytes")) {
            $bytes = random_bytes(ceil($lenght / 2));
        } elseif (function_exists("openssl_random_pseudo_bytes")) {
            $bytes = openssl_random_pseudo_bytes(ceil($lenght / 2));
        } else {
            throw new Exception("no cryptographically secure random function available");
        }
        return strtoupper(substr(bin2hex($bytes), 0, $lenght));
    }
}

if (!function_exists('singleFile')) {

    function singleFile($file, $folder)
    {
        if ($file) {
            if (!file_exists($folder))
                mkdir($folder, 0777, true);

            $destinationPath = $folder;
            $profileImage = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $profileImage);
            $fileName = $profileImage;
            return $fileName;
        }
        return false;
    }
}

if (!function_exists('multipleFile')) {

    function multipleFile($files, $folder)
    {
        if ($files) {
            if (!file_exists($folder))
                mkdir($folder, 0777, true);
                foreach($files as $file){
            $destinationPath = $folder;
            $profileImage = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $profileImage);
            $fileName[] = "$profileImage";
                 }
             return $fileName;
        }
        return false;
    }
}


if (!function_exists('profileImage')) {

    function errorMsg($msg){
        return $msg;
    }
}


if (!function_exists('pr')) {
    function pr($data)
    {
        echo "<pre>";
        print_r($data);
        echo '</pre>';
        die;
    }
}


if (!function_exists('profileImage')) {

    function profileImage()
    {
        $outlet_id = Auth::user()->outlet_id;
        $outlet = Outlet::select('profile_image')->find($outlet_id);
        return (!empty($outlet->profile_image)) ? asset('attachment') . '/' . $outlet->profile_image :asset('profile/37.jpg');
    }
}


if (!function_exists('transferHistory')) {
    function transferHistory($retailer_id, $amount, $receiver_name, $payment_date, $status)
    {

        $transferHistory = new TransferHistory();
        $transferHistory->retailer_id   = $retailer_id;
        $transferHistory->amount        = $amount;
        $transferHistory->receiver_name = $receiver_name;
        $transferHistory->payment_date  = $payment_date;
        $transferHistory->status        = $status;
        $transferHistory->save();
    }
}




if (!function_exists('mSign')) {
    function mSign($val)
    {

        return '<i class="fas fa-rupee-sign" style="font-size: 13px;
    color: #696b74;"></i>&nbsp;' . $val;
    }
}

if (!function_exists('spentTopupAmount')) {
    function spentTopupAmount($user_id, $amount)
    {
        try {
            $user = User::find($user_id);
            $avaliable_amount = ($user->available_amount) - ($amount);
            $spent_amount = ($user->spent_amount) + ($amount);

            $user->available_amount = $avaliable_amount;
            $user->spent_amount = $spent_amount;

            if ($user->save())
                return true;

            return false;
        } catch (Exception $e) {
            return false;
        }
    }
}


if (!function_exists('addTopupAmount')) {
    function addTopupAmount($user_id, $amount, $transaction_fees = 0, $reject = 0)
    {

        try {
            $user = User::find($user_id);
            $avaliable_amount = ($user->available_amount) + ($amount);
            $total_amount = ($user->total_amount) + ($amount);
            $spent_amount = $user->spent_amount;

            if ($reject && !empty($spent_amount)) {
                $t_amount = ($amount) + ($transaction_fees);
                $user->spent_amount = ($spent_amount) - ($t_amount);
                $avaliable_amount = ($avaliable_amount) + ($transaction_fees);
            } else {
                $user->total_amount     = $total_amount;
            }
            $user->available_amount = $avaliable_amount;

            if ($user->save())
                return true;

            return false;
        } catch (Exception $e) {
            return false;
        }
    }
}
