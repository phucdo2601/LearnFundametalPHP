<?php

namespace App\Http\Controllers\Api\V1;

use App\Filters\V1\CustomerFilter;
use App\Models\Customer;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Http\Resources\V1\CustomerResource;
use App\Http\Resources\V1\CustomerCollection;
use Illuminate\Http\Request;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     * http://127.0.0.1:8000/api/v1/customers
     * 
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //    /**
    //     * Lay len het: return new CustomerCollection(Customer::all());
    //     */
    //     /**
    //      * lay list data from db with paging
    //      */
    //     return new CustomerCollection(Customer::paginate());
    // }

     /**
     * Filter data with parameters
     * 
     * http://127.0.0.1:8000/api/v1/customers?postalCode[gt]=30000&type[eq]=1
     */
    public function index(Request $request)
    {
        //
        $filter = new CustomerFilter();
        $filterItems = $filter->transform($request); //['colum', 'operator', '']

        $includeInvoices =$request->query('includeInvoices');

        $customers = Customer::where($filterItems);
        if ($includeInvoices) {
            $customers = $customers->with('invoices');
        }

        
        return new CustomerCollection($customers->paginate()->appends($request->query()));

        // if (count($queryItems) == 0) {
        //     return new CustomerCollection(Customer::paginate());
        // } else {
        //     $customers = Customer::where($queryItems)->paginate();
        //     return new CustomerCollection($customers->appends($request->query()));

        // }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * 
     * In Api: this is the post method for creating a new resource
     */
    public function store(StoreCustomerRequest $request)
    {
        //
        return new CustomerResource(Customer::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
        $includeInvoices =request()->query('includeInvoices');
        if ($includeInvoices) {
            # code...
        return new CustomerResource($customer->loadMissing('invoices'));

        }

        return new CustomerResource($customer);
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
     * 
     * In Api: this is the put method for updating a new resource
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        //
        $customer->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
