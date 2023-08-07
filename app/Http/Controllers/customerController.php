<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customers;
use App\Models\cars;
use Illuminate\Support\Facades\DB;

class customerController extends Controller
{

    // public function __construct(){
    //     $this->middleware('auth');
    // }

    public function index()
    {
        return view('customer_section');
    }
    function add(Request $req)
    {
        $customer = new customers;
        $customer->name = $req['name'];
        $customer->reference = $req['reference_number'];
        $customer->save();
        return redirect('/customer/index');
    }
    function list()
    {
        $customers = customers::all();
        return view('list_cars')->with('customers', $customers);
    }
    function show_cars($id)
    {
        $query = db::select("select * from cars where customer_id = ?", [$id]);
        return $query;
    }
}
