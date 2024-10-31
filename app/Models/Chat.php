<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Chat extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, HasFactory;

    public $table = 'chats';

    protected $appends = [
        'attachments',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const FEATURE_RADIO = [
        'Brainstorm' => 'Brainstorm',
        'Timeline'   => 'Timeline',
        'Outline'    => 'Outline',
    ];

    protected $fillable = [
        'message',
        'feature_type',
        'feature',
        'session_id',
        'message_from_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getAttachmentsAttribute()
    {
        return $this->getMedia('attachments');
    }

    public function session()
    {
        return $this->belongsTo(GameSession::class, 'session_id');
    }

    public function message_from()
    {
        return $this->belongsTo(User::class, 'message_from_id');
    }
}
