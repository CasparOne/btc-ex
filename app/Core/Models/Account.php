<?php


namespace Core\Models;


class Account extends BaseModel
{
    protected $table = 'accounts';

    public function getCurrency()
    {
        return $this->hasOne('Core\Models\Currency', 'id', 'currency_id');
    }

    public function getTransaction()
    {
        return $this->hasMany('Core\Models\Transaction');
    }

}
