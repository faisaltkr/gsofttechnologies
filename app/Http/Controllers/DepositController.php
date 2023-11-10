<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepositRequest;
use App\Http\Requests\TransactionRequest;
use App\Models\Transaction;
use App\Models\User;
use App\Services\BankService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Ramsey\Uuid\v1;

class DepositController extends Controller
{


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
        return view('pages.deposit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TransactionRequest $request)
    {
       try {

        /***
         * every request is a transaction so we are validating in transaction request
         */

        $this->bankService->CreateTransaction($request);

        return redirect()->back()->withSuccess('Amout deposited successfully');

       } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
       }
    }

}
