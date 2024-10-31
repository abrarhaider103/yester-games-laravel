<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GameSession extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'game_sessions';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'game_id',
        'session_name',
        'game_object',
        'session_code',
        'invitation_code',
        'status',
        'color_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const STATUS_SELECT = [
        'pending'            => 'Pending',
        'completed'          => 'Completed',
        'cancelled'          => 'Cancelled',
        'game_started'       => 'Game Started',
        'invitation_expired' => 'Invitation Expired',
        'game_pause'         => 'Game Pause',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function game()
    {
        return $this->belongsTo(Game::class, 'game_id');
    }

    public function color()
    {
        return $this->belongsTo(Color::class, 'color_id');
    }
}
