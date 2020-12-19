<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Passport\HasApiTokens;
use Illuminate\Support\Str;

/**
 * @property int $user_id
 * @property int $user_type_id
 * @property string $user_name
 * @property string $user_email
 * @property string $user_phone
 * @property string $user_password
 * @property string $updated_at
 * @property string $created_at
 * @property UserType $userType
 */
class User extends Authenticatable 
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'user_id';

    /**
     * @var array
     */
    protected $fillable = ['user_name', 'email', 'user_phone', 'password','user_type_id', 'updated_at', 'created_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userType()
    {
        return $this->belongsTo('App\UserType', null, 'user_type_id');
    }
}
