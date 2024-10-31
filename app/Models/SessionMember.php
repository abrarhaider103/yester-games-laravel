<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SessionMember extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'session_members';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const POSITION_SELECT = [
        'spectators' => 'Spectators',
        'gamers'     => 'Gamers',
    ];

    public const STATUS_SELECT = [
        'in_game'    => 'In Game',
        'kicked_out' => 'Kicked Out',
        'left'       => 'Left',
    ];

    protected $fillable = [
        'session_id',
        'invited_member_id',
        'position',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function session()
    {
        return $this->belongsTo(GameSession::class, 'session_id');
    }

    public function invited_member()
    {
        return $this->belongsTo(User::class, 'invited_member_id');
    }
}
