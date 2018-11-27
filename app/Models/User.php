<?php

namespace App\Models;


/**
 * Class User represents users entity
 * @package Core\Models\AuthServer
 */
class User extends BaseModel
{

    protected $table = 'users';
    protected $fillable = ['login', 'password', 'email', 'name',];

    public function getAccount()
    {
        return $this->hasMany(Account::getClass());
    }

    public function getTransaction()
    {
        return $this->hasManyThrough(Transaction::getClass(), Account::getClass());
    }

    public function createUser($login, $password, $email, $userName = null)
    {
        $this->name = $userName ? $userName : $this->name;
        $this->login = $login;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
        $this->email = $email;
        $this->save();
        $accAtr = [
            'id' => random_int((time() - rand(0, 9999999)), 9999999999),
            'user_id'=> self::all()->last()->id,
        ];
        return Account::createAccount(self::all()->last()->id);
        //return Account::create($accAtr);
        //$account->save();

    }

}

