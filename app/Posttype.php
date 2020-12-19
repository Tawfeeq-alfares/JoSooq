<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $post_type_id
 * @property string $post_type_name
 * @property string $updated_at
 * @property string $created_at
 * @property Post[] $posts
 */
class Posttype extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'post_types';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'post_type_id';

    /**
     * @var array
     */
    protected $fillable = ['post_type_name', 'updated_at', 'created_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany('App\Post', null, 'post_type_id');
    }
}
