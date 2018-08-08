<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Thread
 *
 * @mixin \Eloquent
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string $body
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 */
class Thread extends Model
{
    //

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
}
