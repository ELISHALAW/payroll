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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
