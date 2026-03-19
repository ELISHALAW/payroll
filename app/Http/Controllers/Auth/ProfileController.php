<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use id;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserDetail;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (auth()->id() != $id) {
            abort(403, 'Unauthorized access.');
        }

        // 获取当前用户数据
        $user = \App\Models\User::findOrFail($id);

        // 返回 user 文件夹下的 profile.blade.php
        return view('user.profile', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // 1. 更新 users 表的基础信息 (name)
        $user->update([
            'name' => $request->name,
        ]);

        // 2. 定义【翻译清单】：表单 input 名字 => 数据库记录名字
        $detailsMap = [
            'preferred_name' => 'Preferred Name',
            'passport'       => 'Passport No.',
            'nric'           => 'NRIC No.',
            'qualification'  => 'Highest Qualification',
            'gender'         => 'Gender',
            'marital_status' => 'Marital Status',
            'nationality'    => 'Nationality',
            'race'           => 'Race',
            'religion'       => 'Religion',
        ];

        // 3. 【循环搬运】：一行一行地处理数据
        foreach ($detailsMap as $inputKey => $dbLabel) {
            // 只有当用户在网页上填了内容，我们才处理
            if ($request->filled($inputKey)) {
                UserDetail::updateOrCreate(
                    [
                        'user_id' => $user->id,
                        'name'    => $dbLabel // 寻找数据库里是否已有这个标签的记录
                    ],
                    [
                        'value'   => $request->get($inputKey), // 插入用户填的实际内容
                        'remark'  => 'Updated via Profile'
                    ]
                );
            }
        }

        return back()->with('success', 'Profile updated successfully!');
    }

    public function updateAddress(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $addressMap = [
            'address' => 'address',
            'city' => 'city',
            'postcode' => 'postcode',
            'region' => 'region',
            'country' => 'country'
        ];

        foreach ($addressMap as $inputKey => $dbLabel) {
            if ($request->has($inputKey)) {
                UserDetail::updateOrCreate(
                    [
                        'user_id' => $user->id,
                        'name'    => $dbLabel
                    ],
                    [
                        'value'   => $request->get($inputKey),
                        'remark'  => 'Updated via Address Modal'
                    ]
                );
            }
        }

        return back()->with('success', 'Address updated successfully!');
    }
    public function updateCorrespondenceAddress(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $addressMap = [
            'correspondence_address' => 'correspondence_address',
            'correspondence_city' => 'correspondence_city',
            'correspondence_postcode' => 'correspondence_postcode',
            'correspondence_region' => 'correspondence_region',
            'correspondence_country' => 'correspondence_country'
        ];

        foreach ($addressMap as $inputKey => $dbLabel) {
            if ($request->has($inputKey)) {
                UserDetail::updateOrCreate(
                    [
                        'user_id' => $user->id,
                        'name'    => $dbLabel
                    ],
                    [
                        'value'   => $request->get($inputKey),
                        'remark'  => 'Updated via Address Modal'
                    ]
                );
            }
        }

        return back()->with('success', 'Address updated successfully!');
    }

    public function updateEmergencyContact(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Map the form input 'name' to the 'name' column in your UserDetail table
        $emergencyMap = [
            'emergency_name'         => 'Emergency Contact Name',
            'emergency_relationship' => 'Emergency Contact Relationship',
            'emergency_phone'        => 'Emergency Contact Phone',
        ];

        foreach ($emergencyMap as $inputKey => $dbLabel) {
            if ($request->filled($inputKey)) {
                UserDetail::updateOrCreate(
                    ['user_id' => $user->id, 'name' => $dbLabel],
                    ['value' => $request->get($inputKey), 'remark' => 'Updated via Emergency Modal']
                );
            }
        }

        return back()->with('success', 'Emergency contact updated successfully!');
    }
    /**
     * Remove the specified resource from storage.
     */


    public function destroy(string $id)
    {
        //
    }
}
