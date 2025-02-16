<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;

/**
 * 
 *
 * @property-read DatabaseNotificationCollection<int, DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Plan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Plan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Plan query()
 * @mixin \Eloquent
 */
class Plan extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'description',
        'config',
        'value',
        'active',
    ];
}
