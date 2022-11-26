<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeController extends Controller
{
    public function index() {
        $coupon = Coupon::get();
        $coupon = $coupon->toArray();
        // dd($coupon->toArray());
        // echo "<pre>";
        $couponArray = [];
        $i = 0;
        foreach ($coupon as $c) {
            $couponArray[$i] = base64_encode(QrCode::size(300)->generate(json_encode($c)));
            $i++;
        }
        dd($couponArray);
        // $jsonCoupon = json_encode($coupon);
        // $qr = base64_encode(QrCode::size(300)->generate(json_encode($c)));
        // dd($qr);

        // return view('qrcode');
    }
}
