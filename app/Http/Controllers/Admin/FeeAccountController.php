<?php

namespace App\Http\Controllers\Admin;

use App\Model\FeeAccount;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FeeAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.finance.fee_account');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\FeeAccount  $feeAccount
     * @return \Illuminate\Http\Response
     */
    public function show(FeeAccount $feeAccount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\FeeAccount  $feeAccount
     * @return \Illuminate\Http\Response
     */
    public function edit(FeeAccount $feeAccount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\FeeAccount  $feeAccount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FeeAccount $feeAccount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\FeeAccount  $feeAccount
     * @return \Illuminate\Http\Response
     */
    public function destroy(FeeAccount $feeAccount)
    {
        //
    }
}
