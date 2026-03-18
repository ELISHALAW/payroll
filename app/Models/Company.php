<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'registration_no',
        'state',
        'country',
        'address',
        'city',
        'postcode',
        'sst_no'
    ];

    // 获取公司旗下的所有员工
    public function users()
    {
        return $this->belongsToMany(User::class, 'usercompanies');
    }
}
