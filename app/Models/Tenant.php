<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;

/**
 * 
 *
 * @property int $id_tenant
 * @property string $name
 * @property string $domain
 * @property json $config
 * @property boolean $active
 * @property int $id_plan
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read DatabaseNotificationCollection<int, DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static Builder<static>|Tenant newModelQuery()
 * @method static Builder<static>|Tenant newQuery()
 * @method static Builder<static>|Tenant query()
 * @property-read Plan|null $plan
 * @mixin \Eloquent
 */
class Tenant extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'domain',
        'config',
        'active',
        'id_plan'
    ];

    public function plan(): BelongsTo
    {
        return $this->belongsTo(Plan::class, 'id_plan');
    }
}
