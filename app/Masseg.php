<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $msg_id
 * @property string $msg_name
 * @property string $msg_email
 * @property string $msg_phone
 * @property string $msg_text
 * @property string $updated_at
 * @property string $created_at
 */
class Masseg extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'masseges';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'msg_id';

    /**
     * @var array
     */
    protected $fillable = ['msg_name', 'msg_email', 'msg_phone', 'msg_text', 'updated_at', 'created_at'];

}
