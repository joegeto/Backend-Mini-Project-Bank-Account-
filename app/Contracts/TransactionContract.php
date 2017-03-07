<?php
/**
 * Created by PhpStorm.
 * User: drake
 * Date: 06/03/17
 * Time: 20:05
 */

namespace App\Contracts;


interface TransactionContract
{
    const TRANSACTION_DEPOSIT = 'deposit';
    const TRANSACTION_WITHDRAWAL = 'withdrawal';
}