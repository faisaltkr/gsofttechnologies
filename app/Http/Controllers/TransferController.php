<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransferRequest;
use App\Services\BankService;
use Illuminate\Http\Request;

class TransferController extends Controller
{

    /**
     * dependency injection
     */
    public $bankService;


    public function __construct()
    {
        $this->bankService = new BankService();
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.transfer');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TransferRequest $request)
    {
        try {

            $currentBalance = getUserBalance();

            if($currentBalance < $request->amount)
            {
                return redirect()->back()->withError('Insuficiant balance in your account');
            }

            if($request->email==auth()->user()->email)
            {
                return redirect()->back()->withError('Please use deposit window');
            }


            $this->bankService->CreateTransaction($request);
            return redirect()->back()->withSuccess('Amout transferd successfully');
            
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }
}
