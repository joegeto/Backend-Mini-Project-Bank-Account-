<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Transaction
 *
 * @property int $id
 * @property int $account_id
 * @property float $amount
 * @property string $type
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Transaction whereAccountId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Transaction whereAmount($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Transaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Transaction whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Transaction whereType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Transaction whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Transaction extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['amount', 'type'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function account()
    {
        return $this->belongsTo(Account::class);
    }
    public function withdraw(){
        if ($this->account_id){

        }
    }
}
