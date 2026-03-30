<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserDetail extends Model
{
    use HasFactory;

    // 默认情况下，Laravel 会找 user_details 表
    protected $table = 'user_details';

    protected $fillable = [
        'user_id',
        'name',
        'value',
        'remark'
    ];

    /**
     * 反向关联：这个详情属于哪个用户
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public static function getValue($chunk, $name)
    {
        return $chunk->where('name', $name)->value('value') ?? '-';
    }
}