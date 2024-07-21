<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Conversation extends Model
{
    use HasFactory;

    protected $fillable = ['user_one_type', 'user_one_id', 'user_two_type', 'user_two_id'];

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function userOne(): MorphTo
    {
        return $this->morphTo();
    }

    public function userTwo(): MorphTo
    {
        return $this->morphTo();
    }
}
