<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use App\Services\BankService;
use Illuminate\Http\Request;

class WithdrawController extends Controller
{

    /**
     * dependency injection
     */
    public $bankService;


    public function __construct()
    {
        $this->bankService = new BankService();
    }

    public function create()
    {
        return view('pages.withdraw');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TransactionRequest $request)
    {
        try {

            $currentBalance = getUserBalance();
            if($currentBalance < $request->amount)
            {
                return redirect()->back()->withError('Insuficiant balance in your account');
            }
            
           $this->bankService->CreateTransaction($request);
            return redirect()->back()->withSuccess('Amout withdrawn successfully');
            
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }
}
