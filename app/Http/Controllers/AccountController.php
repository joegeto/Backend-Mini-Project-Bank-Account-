<?php

namespace App\Http\Controllers;

use App\Contracts\TransactionContract;
use App\Http\Requests\AccountRequest;
use App\Http\Requests\TransactionRequest;
use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Http\Request;

/**
 * Class AccountController
 * @package App\Http\Controllers
 */
class AccountController extends Controller
{
    /**
     * @param AccountRequest $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function store(AccountRequest $request)
    {
        $account = Account::create($request->all());
        return $account;
    }

    /**
     * @param Account $account
     * @return float
     */
    public function balance(Account $account)
    {
        return $account->balance;
    }

    /**
     * @param TransactionRequest $request
     * @param Account $account
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function deposit(TransactionRequest $request, Account $account)
    {

            return $this->createTransaction($request, $account, TransactionContract::TRANSACTION_DEPOSIT);

    }

    /**
     * @param TransactionRequest $request
     * @param Account $account
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function withdraw(TransactionRequest $request, Account $account)
    {
        return $this->createTransaction($request, $account, TransactionContract::TRANSACTION_WITHDRAWAL);
    }

    /**
     * @param TransactionRequest $request
     * @param Account $account
     * @param $type
     * @return \Illuminate\Database\Eloquent\Model
     */
    protected function createTransaction(TransactionRequest $request, Account $account, $type): \Illuminate\Database\Eloquent\Model
    {
        return $account->transactions()->create(array_merge($request->all(), ['type' => $type]));
    }
}
