<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Account
 *
 * @property int $id
 * @property string $name
 * @property string $number
 * @property float $balance
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read mixed $account_number
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Account whereBalance($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Account whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Account whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Account whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Account whereNumber($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Account whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Account extends Model
{
    public $accountId;
    public $transactionType;
    public $withdrawalLimit = 20000;
    public $depositLimit = 150000;
    public $deptransactionsperDay = 4;
    public $withtransactionsperDay = 3;
    public $transactionLimitPerDay = 150000;
    public $day = date_time;
    /**
     * @var array
     */
    protected $fillable = ['name', 'number'];
    /**
     * @var array
     */
    protected $appends = ['account_number'];

    /**
     * @return mixed
     */
    public function getAccountNumberAttribute()
    {
        return $this->getAttribute('number');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    /**
     *
     */
    public function __construct($account_id)
    {
        $this->accountId = $account_id;
    }

    public function withdraw($amount){
        $account= $this->getAccount();
        $balance = $this->checkAccountBalance();

        // if balance is less than amount, abort withdrawal and notifiy user

        if ($balance < $amount) {
            // send response to the controller.
            $response = 'You have insufficient funds to withdraw the amount requested';
        }

        elseif ($balance < $amount){

            // send a response to the controller.
            $response = 'You have insufficient money to withdraw'.$amount.' Your balance is .....';
        }
       elseif ($amount > $this->withdrawalLimit){

           // send a response to the controller.
           $response = 'You have exeeded withdrawal limit '.$amount.' Your balance is .....';
       }
       elseif ($this->transactionLimitPerDay){}
        // the amount is enough, continue the withdrawal and notify the user of successful withdrawal
        else {
            // send a response to the controller.
            $response = 'You have successfully withdrawn '.$amount.' Your balance is .....';
        }

        return $response;
    }

    public function deposit($amount){

        if ($amount > $this->depositLimit) {
            // send response to the controller.
            $response = 'You have exeeded deposit amount limit';
        }

        elseif ($amount > $this->depositLimit){

            // send a response to the controller.
            $response = 'You have successfully deposited '.$amount.' Your balance is .....';
        }
        elseif ($this->transactionLimitPerDay ){}
        if( strtotime( date( 'Y-m-d' , strtotime( '2011-02-12 14:44:00' ) ) ) == strtotime( date( 'Y-m-d' ) ) )
        {
//IS TODAY;
        }
        // the amount is enough, continue the withdrawal and notify the user of successful withdrawal
        else {
            // send a response to the controller.
            $response = 'You have successfully withdrawn '.$amount.' Your balance is .....';
        }

        return $response;
    }

   public function checkAccountBalance(){
        // the current amount in account
            return $this->getAccount()->balance;

    }

    public function getAccount(){
        // go to the db and get the account details
    }
}
