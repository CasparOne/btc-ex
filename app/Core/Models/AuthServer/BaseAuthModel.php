<?php


namespace Core\Models\AuthServer;


use Illuminate\Database\Eloquent\Model;

/**
 * Class BaseAuthModel
 * @package Core\Models\AuthServer
 * Dedicated base model for al modelsfrm Auth server
 */
abstract class BaseAuthModel extends Model
{
    /**
     * @var string
     * set a connection name
     */
    protected $connection = 'l2_auth';
}