<?php

namespace Core\Models;


/**
 * Class User represents users entity
 * @package Core\Models\AuthServer
 */
class User extends BaseModel
{

    protected $table = 'users';
    protected $fillable = ['login'];

    public function getAccounts()
    {
        return $this->hasMany('Core\Models\Account');
    }

}

