<?php

namespace App\Http\Controllers;

use App\Helpers\APIHelper as HelpersAPI;
use App\Models\Customer as ModelsCustomer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function all() {
        return ModelsCustomer::all();
        // $response = HelpersAPI::create(false, 200, "Success", $customer);
        // return response()->json($response);
    }

    public function show($id) {
        return ModelsCustomer::find($id);
    }

    public function store(Request $request) {
        return ModelsCustomer::create($request->all());
    }

    public function update($id, Request $request){
        $customer = ModelsCustomer::find($id);
        $customer->update($request->all());
        return $customer;
    }

    public function delete($id) {
        $customer = ModelsCustomer::find($id);
        $customer->delete();
        return 204;
    }
}
