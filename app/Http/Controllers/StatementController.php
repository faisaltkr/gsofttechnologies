<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class StatementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $statements = Transaction::whereUserId(auth()->id())->paginate(5);
        return view('pages.statement',compact('statements'));
    }

   
}
