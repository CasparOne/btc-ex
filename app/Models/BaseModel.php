<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * Class BaseAuthModel
 * @package Core\Models\AuthServer
 * Dedicated base model for al modelsfrm Auth server
 */
abstract class BaseModel extends Model
{
    /**
     * @var string
     * set a connection name
     */
    protected $connection = 'btc_ex';


    /**
     * @return string
     */
    public static function getClass() :string
    {
        return static::class;
    }

}
