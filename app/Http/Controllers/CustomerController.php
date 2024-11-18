<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function list()
    {
        return response()->json(['customers' => 'Customer List']);
    }
    public function detail($id)
    {
        return response()->json(['customer' => 'Customer Detail' . $id]);
    }
    public function create(Request $request)
    {
        return response()->json(['customer' => 'Customer Create' . $request->name]);
    }
    public function update(Request $request, $id)
    {
        return response()->json(['customer' => 'Customer Update' . $id]);
    }
    public function delete($id)
    {
        return response()->json(['customer' => 'Customer Delete' . $id]);
    }
}
