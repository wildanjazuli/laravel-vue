<?php

namespace App\Http\Controllers;

use App\Helpers\APIHelper as HelpersAPI;
use App\Models\Customer as ModelsCustomer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function all() {
        $customer = ModelsCustomer::all();
        $response = HelpersAPI::create(false, 200, "Success", $customer);
        return response()->json($response);
    }

    public function show($id) {
        $customer = ModelsCustomer::find($id);
        $response = HelpersAPI::create(false, 200, "Success", $customer);
        return response()->json($response);

    }

    public function store(Request $request) {
        ModelsCustomer::create($request->all());
        $response = HelpersAPI::create(false, 200, "Success", '');
        return response()->json($response);
    }

    public function update($id, Request $request){
        $customer = ModelsCustomer::find($id);
        $customer->update($request->all());
        // return $customer;
        $response = HelpersAPI::create(false, 200, "Success", $customer);
        return response()->json($response);
    }

    public function delete($id) {
        $customer = ModelsCustomer::find($id);
        $customer->delete();
        // return 204;
        $response = HelpersAPI::create(false, 200, "Success", '');
        return response()->json($response);
    }
}
