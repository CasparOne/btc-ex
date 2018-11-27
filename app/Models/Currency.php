<?php

namespace App\Models;


class Currency extends BaseModel
{
    protected $table = 'currency';

    public $timestamps = false;

    public function getAccount()
    {
        return $this->hasMany(Account::getClass());
    }

}