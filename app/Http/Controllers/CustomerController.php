<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $data = Customer::orderBy('created_at', 'asc')->paginate(10);

            return response()->json([
                'status' => true,
                'data'   => $data
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'data'   => $th->getMessage()
            ], 400);
        }
    }
    public function countCustomerByCity()
    {
        try {
            $data = DB::select("SELECT customers.city::json->>'nama' as nama, count(id) FROM customers GROUP BY city->>'nama'");

            $namaValues = array_column($data, "nama");
            $countValues = array_column($data, "count");
            
            return response()->json([
                'status' => true,
                'data'   => [
                    'labels' => $namaValues,
                    'count' => $countValues
                ]
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'data'   => $th->getMessage()
            ], 400);
        }
    }

    public function countCustomerGenders()
    {
        try {
            $data = DB::select("SELECT customers.gender as nama, count(id) FROM customers GROUP BY gender");

            $namaValues = array_column($data, "nama");
            $countValues = array_column($data, "count");
            
            return response()->json([
                'status' => true,
                'data'   => [
                    'labels' => $namaValues,
                    'count' => $countValues
                ]
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'data'   => $th->getMessage()
            ], 400);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        try {
            $data = Customer::create([
                'name'        => $request->name,
                'gender'      => $request->gender,
                'birth_date'  => $request->birth_date,
                'occupation'  => $request->occupation,
                'province'    => $request->province,
                'city'        => $request->city,
                'subdistrict' => $request->subdistrict,
                'village'     => $request->village
            ]);

            return response()->json([
                'status' => true,
                'data'   => $data
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'data'   => $th->getMessage()
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $data = Customer::findOrFail($id);

            return response()->json([
                'status' => true,
                'data'   => $data
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'data'   => $th->getMessage()
            ], 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, string $id)
    {
        try {
            $data = Customer::where("id", $id)->update([
                'name'        => $request->name,
                'gender'      => $request->gender,
                'birth_date'  => $request->birth_date,
                'occupation'  => $request->occupation,
                'province'    => $request->province,
                'city'        => $request->city,
                'subdistrict' => $request->subdistrict,
                'village'     => $request->village
            ]);

            return response()->json([
                'status'  => true,
                'message' => "updated"
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'data'   => $th->getMessage()
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = Customer::findOrFail($id);

            $data->delete();

            return response()->json([
                'status'  => true,
                'message' => "deleted"
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'data'   => $th->getMessage()
            ], 400);
        }
    }
}