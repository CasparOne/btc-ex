<?php


namespace App\Models;


class Account extends BaseModel
{
    protected $table = 'accounts';
    protected $fillable = ['id', 'user_id'];

    public function getCurrency()
    {
        return $this->belongsTo(Currency::getClass(), 'currency_id');

    }

    public function getTransaction()
    {
        return $this->hasMany(Transaction::getClass(),'account_id');

    }

    public static function createAccount($userId, $currency_id = null)
    {
        $fields['id'] = random_int((time() - rand(0, 9999999)), 9999999999);
        $fields['user_id'] = $userId;
        $fields['currency_id'] = $currency_id ? $currency_id : null;
        $account = new self($fields);
        return $account->save();

    }




}
