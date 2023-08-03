<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Encryption\StringEncrypter;
use Illuminate\Http\Request;
use App\Models\cars;
use Illuminate\Support\Facades\DB;

class car_controller extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    function index(){
        $all_cars = cars::paginate(8);
        return view('cars')->with('car', $all_cars);
    }
    function new(){
        return view('add_car_form');
    }
    function create(Request $req){
        $car = new cars;
        $car->code = $req['code'];
        $car->name = $req['name'];
        $car->stock = $req['stock'];
        $car->purchase_price = $req['purchase_price'];
        $car->rent = $req['rent'];
        $car->avail = $req['avail'];
        $car->save();
        return redirect('/cars');

    }
    function delete($id){
        cars::destroy($id);
        return redirect('/cars');
    }
    function edit($id){
        $car_data = cars::find($id);
        return view('editCar')->with('car', $car_data);
    }
    function update(Request $req, $id){
        $car = cars::find($id);
        $car->code = $req['code'];
        $car->name = $req['name'];
        $car->stock = $req['stock'];
        $car->purchase_price = $req['purchase_price'];
        $car->rent = $req['rent'];
        $car->avail = $req['avail'];
        $car->updated_at = now();
        $car->save();
        return redirect('/cars');
    }
    function search(Request $req){
        $query = $req->input('query');
        $result = DB::table('cars')->where('name', 'LIKE', ''.$query.'%')->orWhere('code', 'LIKE', '%'.$query.'%')->get();
        $t_count = DB::select("select count(*) as total_cars from cars where name like '".$query."%' or code like '".$query."%' group by name");
        return response()->json([
            'result'=> $result,
            'total_cars'=> $t_count
        ]);
    }
    function show($id){
        $result = cars::find($id);
        // return response()->json(['results', $result]);
        return $result;
    }
    function displayChart(){
        $avail_data = DB::select("select count(*) as available from cars where avail = '1'");
        $unavail_data =DB::select("select count(*) as unavailable from cars where avail = '0'");
        $data = [
            'avail'=> $avail_data,
            'unavail'=> $unavail_data
        ];
        return $data;
    }
    function showAvailCars(Request $req){
        $input = $req->input('carName');
        $avail_cars = DB::select("select * from cars where name like  '" . $input . "%'  and avail = '1'");
        return $avail_cars;
    }
}
