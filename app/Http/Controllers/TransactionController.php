<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use App\Models\Transaction;
use Illuminate\Http\Request;

/**
 * Class TransactionController
 * @package App\Http\Controllers
 */
class TransactionController extends Controller
{
    /**
     * @param TransactionRequest $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function store(TransactionRequest $request)
    {
        $transaction = Transaction::create($request->all());
        return $transaction;
    }
}
