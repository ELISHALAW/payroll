<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'mobile',
        'role',
        'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function details(): HasMany
    {
        return $this->hasMany(UserDetail::class);
    }

    public function companies(): BelongsToMany
    {
        return $this->belongsToMany(Company::class, 'usercompanies');
    }

    public function getDetail(string $key)
    {
        return $this->details()->where('name', $key)->first()?->value;
    }

    public function getOrgHistoryAttribute()
    {
        return \App\Models\UserDetail::where('user_id', $this->id)
            ->where('remark', 'like', 'Updated via Organizational History Modal%')
            ->get()
            ->groupBy(function ($item) {
                return $item->created_at->format('Y-m-d H:i:s');
            })
            ->map(function ($group) {
                return (object)[
                    'type'       => $group->where('name', 'history_employment_type')->first()->value ?? 'N/A',
                    'status'     => $group->where('name', 'history_employment_status')->first()->value ?? 'N/A',
                    'department' => $group->where('name', 'history_department')->first()->value ?? 'N/A',
                    'position'   => $group->where('name', 'history_position')->first()->value ?? 'N/A',
                    'level'      => $group->where('name', 'history_position_level')->first()->value ?? 'N/A',
                ];
            })
            ->values();
    }

    public function getCompensationHistoryAttribute()
    {
        return \App\Models\UserDetail::where('user_id', $this->id)
            ->where('remark', 'Updated via Compensation Details Modal')
            ->latest()
            ->get()
            ->groupBy(function ($item) {
                // Group by the exact second it was saved
                return $item->created_at->format('Y-m-d H:i:s');
            })
            ->map(function ($group) {
                return (object)[
                    'date'        => $group->first()->created_at->format('Y-m-d'),
                    'salary_type' => $group->where('name', 'salary_type')->first()->value ?? 'N/A',
                    'attendance'  => $group->where('name', 'pay_by_attendance')->first()->value ?? 'N/A',
                    'payment'     => $group->where('name', 'payment_method')->first()->value ?? 'N/A',
                    'salary'      => $group->where('name', 'salary')->first()->value ?? 0,
                    'reason'      => $group->where('name', 'reason')->first()->value ?? 'N/A',
                ];
            })
            ->values(); // Reset keys to a simple 0, 1, 2... array
    }
}
