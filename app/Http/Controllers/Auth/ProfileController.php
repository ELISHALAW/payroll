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



    public function showEmployee(string $id)
    {
        if (auth()->id() != $id) {
            abort(403, 'Unauthorized access.');
        }

        // 获取当前用户数据
        $user = \App\Models\User::findOrFail($id);

        // 返回 user 文件夹下的 profile.blade.php
        return view('user.employment', compact('user'));
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


    public function updateEmploymentInfo(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        // 1. Validation (Good practice to ensure data types are correct)
        $request->validate([
            'employee_no'           => 'nullable|string',
            'employment_type'       => 'nullable|string',
            'position'              => 'nullable|string',
            'position_level'        => 'nullable|string',
            'department'            => 'nullable|string',
            'cost_center'           => 'nullable|string',
            'subsidiary'            => 'nullable|string',
            'employment_status'     => 'nullable|string',
            'date_of_confirmation'  => 'nullable|date',
            'reports_to'            => 'nullable|string',
            'location'              => 'nullable|string',
            'pay_group'             => 'nullable|string',
            'functional_group'      => 'nullable|string',
            'knowledge_worker'      => 'nullable|string',
            'join_date'             => 'nullable|date',
            'status_effective_from' => 'nullable|date',
            'notice_period'         => 'nullable|integer',
            'work_permit_no'        => 'nullable|string',
            'work_permit_expiry'    => 'nullable|date',
            'retirement_date'       => 'nullable|date',
        ]);

        // 2. Define the Mapping (Input Name => Database Label)
        $employmentMap = [
            'employee_no'           => 'employee_no',
            'employment_type'       => 'employment_type',
            'position'              => 'Position', // Matches {{ $user->getDetail('Position') }}
            'position_level'        => 'position_level',
            'department'            => 'department',
            'cost_center'           => 'cost_center',
            'subsidiary'            => 'subsidiary',
            'employment_status'     => 'employment_status',
            'date_of_confirmation'  => 'date_of_confirmation',
            'reports_to'            => 'reports_to',
            'location'              => 'location',
            'pay_group'             => 'pay_group',
            'functional_group'      => 'functional_group',
            'knowledge_worker'      => 'knowledge_worker',
            'join_date'             => 'join_date',
            'status_effective_from' => 'Employment Status Effective From',
            'notice_period'         => 'Notice Period (days)',
            'work_permit_no'        => 'Work Permit No.',
            'work_permit_expiry'    => 'Work Permit Expiry Date',
            'retirement_date'       => 'Date of Retirement / End of Contract',
        ];

        // 3. Loop and Update/Create
        foreach ($employmentMap as $inputKey => $dbLabel) {
            // Use 'filled' so we don't save empty strings if the user leaves a field blank
            if ($request->filled($inputKey)) {
                UserDetail::updateOrCreate(
                    [
                        'user_id' => $user->id,
                        'name'    => $dbLabel
                    ],
                    [
                        'value'   => $request->get($inputKey),
                        'remark'  => 'Updated via Employment Modal'
                    ]
                );
            }
        }

        return back()->with('success', 'Employment info updated successfully!');
    }
    public function destroy(string $id)
    {
        //
    }
}
