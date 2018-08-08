<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Reply
 *
 * @mixin \Eloquent
 * @property int $id
 * @property int $thread_id
 * @property int $user_id
 * @property string $body
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 */
class Reply extends Model
{
    //

    public function owner()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
