<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customers;
use App\Models\cars;
use App\Models\rent_details;
use Illuminate\Support\Facades\DB;

class rentPurchaseController extends Controller
{
    // public function __construct(){
    //     $this->middleware('auth');
    // }

    function index()
    {
        return view('rentPurchase');
    }
    function sale_index()
    {
        $customers_names = db::select("select name, id, reference from customers");
        $cars_names = db::select("select name, code, id from cars where avail = '1'");
        return view('saleForm', compact('customers_names', 'cars_names'));
    }
    function sold_out(Request $req)
    {
        $customer_id = $req['customer_id'];
        $car_id = $req['car_id'];
        // db::select("delete from cars where id = ?", [$car_id]);
        db::select("update cars set updated_at = NOW() where id =  " . $car_id . " ");
        db::select("update cars set stock = stock - 1, avail = '0' where id = "  . $car_id . " ");
        $query = db::select("update cars set customer_id = " . $customer_id . " where id = " . $car_id . " ");
        return redirect('/rentPurchase/sale');
    }
    function rent_index()
    {
        $customers_names = db::select("select name, id, reference from customers");
        $cars_names = db::select("select name, code, id from cars");
        return view('rentForm', compact('customers_names', 'cars_names'));
    }
    function rent_out(Request $req)
    {
        // return $req;
        $rent_details = new rent_details;
        $rent_details->car_id = $req['car_id'];
        $rent_details->customer_id = $req['customer_id'];
        $rent_details->save();
        return redirect('/rentPurchase/rent_index');
    }
}
