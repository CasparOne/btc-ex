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
        return Account::createAccount(self::all()->last()->id);
    }

    public static function checkPassword($login, $password) :bool
    {
        if (self::isExists($login)) {
            return password_verify($password,
                trim(self::where('login', $login)->first()->password));
        }
        return false;

    }

    public static function isExists($username) :bool
    {
        $login = self::where('login', $username)->exists();
        return $login;
    }

}

