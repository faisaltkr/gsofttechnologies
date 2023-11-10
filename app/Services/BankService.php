<?php
namespace App\Services;

use App\Models\User;
use App\Models\Transaction;
use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BankService {

 
    public function CreateTransaction($request)
    {
        $data=false;
        /**
         * if the reques is deposit
         */

        if($request->type=='credit')
        {
            $data = [
                'user_id' => auth()->id(),
                'credit' => $request->amount,
                'comment' => $request->amount . " is deposited",
            ];
            $this->create($data);
            $this->updateAccountBalace(auth()->id());
        }
        /**
         * if the request is withdraw
         */
        if($request->type=='debit')
        {
            $data = [
                'user_id' => auth()->id(),
                'debit' => $request->amount,
                'comment' => $request->amount . " is withdrawn",
            ];
            $this->create($data);
            $this->updateAccountBalace(auth()->id());
        }
        if($request->type=='transfer')
        {
           
            $debited = [
                'user_id' => auth()->id(),
                'debit' => $request->amount,
                'comment' => $request->amount . " is withdrawn",
            ];
            $this->create($debited);
            $recipient = User::whereEmail($request->email)->first();
            $credited = [
                'user_id' => $recipient->id,
                'credit' => $request->amount,
                'comment' => "Mr/Mrs ".auth()->user()->name." has deposited Rs".$request->amount . " into your account",
            ];

            $this->create($credited);
            $this->updateAccountBalace($recipient->id);
            $this->updateAccountBalace(auth()->id());
        }
        return true;
    }

    public function updateAccountBalace($id)
    {
        /**
         * we need to update account balce in each and every transaction otherwise balance fetching query is too much taking time
         */
         $data  = Transaction::where('user_id',$id)->sum(DB::raw('credit - debit'));
         $user =  User::whereId($id)->update(['account_balance'=>$data]);
        return $user;
    }


    public function create($data)
    {
        return Transaction::create($data);
    }


}