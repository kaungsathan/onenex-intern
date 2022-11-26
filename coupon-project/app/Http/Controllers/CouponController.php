<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class CouponController extends Controller
{
    //create coupon
    public function createCoupon(Request $request) {
        Coupon::create([
            'name' => $request->name,
            'coupon_code' => $request->couponCode,
            'coupon_type' => $request->couponType,
            'amount' => $request->amount
        ]);
        return response()->json('created',204);
    }

    public function getCoupon() {
        $coupon = Coupon::get();
        $coupon = $coupon->toArray();

        $couponArray = [];
        $i = 0;
        foreach ($coupon as $c) {
            $couponArray[$i] = base64_encode(QrCode::size(300)->generate(json_encode($c)));
            $i++;
        }

        return response()->json([
            'qrcode' => $couponArray
        ],200);

    }
}
