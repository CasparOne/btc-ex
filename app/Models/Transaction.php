<?php

namespace App\Models;


use Rhumsaa\Uuid\Uuid;

class Transaction extends BaseModel
{
    protected $table = 'transactions';
    protected $fillable = ['account_id', 'tr_no', 'amount'];

    public function getAccount()
    {
        return $this->belongsTo(Account::getClass(), 'account_id');
    }

    public static function createTransaction($accountId, $amount)
    {
        $uuid = Uuid::uuid5(uuid::NAMESPACE_DNS, (time() * rand(0, time()^0.5)) / cos(rand(0,180)));
        $fields['account_id'] = $accountId;
        $fields['tr_no'] = $uuid->toString();
        $fields['amount'] = $amount;
        $transaction = new Transaction($fields);
        return $transaction->save();
    }

}
