<?php

use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

function getUserBalance() {
    return Transaction::where('user_id',auth()->id())->sum(DB::raw('credit - debit'));
}
