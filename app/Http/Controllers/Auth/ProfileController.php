<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Classes\CountryCodes;
use App\Classes\BankCodes;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function showLeave(string $id)
    {
        if (auth()->id() != $id) {
            abort(403, 'Unauthorized access');
        }
        $user = User::findOrFail($id);

        // 返回 user 文件夹下的 profile.blade.php
        return view('user.leave', compact('user'));
    }


    public function showCompensation(string $id)
    {
        if (auth()->id() != $id) {
            abort(403, 'Unauthorized access.');
        }
        // 获取当前用户数据
        $user = User::findOrFail($id);
        $BankCodes = BankCodes::getBankCollection();
        $userDetails = UserDetail::where('user_id', $id)->pluck('value', 'name')->toArray();

        $totalChildrenUnder18 = (int)($userDetails['child_under_18_full'] ?? 0) + ($userDetails['child_under_18_half'] ?? 0);
        $totalDisabledChildrenUnder18 = (int)($userDetails['disabled_child_under_18_full'] ?? 0) + ($userDetails['disabled_child_under_18_half'] ?? 0);
        $totalChildrenOver18Edu = (int)($userDetails['child_over_18_edu_full'] ?? 0) + ($userDetails['child_over_18_edu_half'] ?? 0);
        $totalChildrenOver18EduDisabled = (int)($userDetails['disabled_child_over_18_edu_full'] ?? 0) + ($userDetails['disabled_child_over_18_edu_half'] ?? 0);

        $weight = [
            'under_18' => 1,
            'tertiary_edu' => 4,
            'disabled' => 3,
            'disabled_edu' => 7
        ];

        $reliefPoints = 0;
        $reliefPoints += ((int)($userDetails['child_under_18_full'] ?? 0) * $weight['under_18']);
        $reliefPoints += ((int)($userDetails['child_under_18_half'] ?? 0) * ($weight['under_18'] / 2));

        $reliefPoints += ((int)($userDetails['child_over_18_edu_full'] ?? 0) * $weight['tertiary_edu']);
        $reliefPoints += ((int)($userDetails['child_over_18_edu_half'] ?? 0) * ($weight['tertiary_edu'] / 2));

        $reliefPoints += ((int)($userDetails['disabled_child_under_18_full'] ?? 0) * $weight['disabled']);
        $reliefPoints += ((int)($userDetails['disabled_child_under_18_half'] ?? 0) * ($weight['disabled'] / 2));

        $reliefPoints += ((int)($userDetails['disabled_child_over_18_edu_full'] ?? 0) * $weight['disabled_edu']);
        $reliefPoints += ((int)($userDetails['disabled_child_over_18_edu_half'] ?? 0) * ($weight['disabled_edu'] / 2));

        return view('user.compensation', compact('user', 'userDetails', 'totalChildrenUnder18', 'totalDisabledChildrenUnder18', 'totalChildrenOver18Edu', 'totalChildrenOver18EduDisabled', 'reliefPoints', 'BankCodes'));
    }

    public function showDocument(string $id)
    {
        if (auth()->id() != $id) {
            abort(403, 'Unauthorized access.');
        }
        // 获取当前用户数据
        $user = User::findOrFail($id);

        $assets = UserDetail::where('user_id', $id)
            ->whereIn('name', ['asset_type', 'date_received', 'date_released', 'asset_details'])
            ->get()
            ->groupBy(function ($item) {
                return $item->created_at->format('Y-m-d H:i:s');
            })
            ->map(function ($group) {
                return (object)[
                    'id' => $group->first()->id, // Keep the ID for reference (e.g., for editing/deleting)
                    'asset_type' => $group->where('name', 'asset_type')->first()->value ?? 'N/A',
                    'date_received' => $group->where('name', 'date_received')->first()->value ?? '-',
                    'date_released' => $group->where('name', 'date_released')->first()->value ?? '-',
                    'asset_details' => $group->where('name', 'asset_details')->first()->value ?? '-',
                ];
            });

        // 返回 user 文件夹下的 profile.blade.php
        return view('user.document', compact('user', 'assets'));
    }

    public function showEditDocument(string $assetId)
    {
        $assetRecord = UserDetail::findOrFail($assetId);
        $user = User::findOrFail($assetRecord->user_id);

        if (auth()->id() != $assetRecord->user_id) {
            abort(403, 'Unauthorized access.');
        }

        // Get all records in this asset group (same created_at)
        $assetData = UserDetail::where('user_id', $assetRecord->user_id)
            ->whereIn('name', ['asset_type', 'date_received', 'date_released', 'asset_details'])
            ->where('created_at', $assetRecord->created_at)
            ->get();


        $asset = (object)[
            'id'            => $assetRecord->id,
            'asset_type'    => $assetData->where('name', 'asset_type')->first()->value ?? '',
            'date_received' => $assetData->where('name', 'date_received')->first()->value ?? '',
            'date_released' => $assetData->where('name', 'date_released')->first()->value ?? '',
            'asset_details' => $assetData->where('name', 'asset_details')->first()->value ?? '',
            'created_at'    => $assetRecord->created_at
        ];


        return view('user.document.editDocument', compact('user', 'asset'));
    }

    public function showOffday(string $id)
    {
        if (auth()->id() != $id) {
            abort(403, 'Unauthorized access.');
        }
        // 获取当前用户数据
        $user = User::findOrFail($id);

        $offdays = UserDetail::where('user_id', $id)
            ->where('name', 'offday_base_date')
            ->orderBy('value', 'asc')
            ->get()
            ->map(function ($item) {
                return (object)[
                    'value' => $item->value, // This is the actual date string (e.g., "2026-04-01")
                    'id'    => $item->id     // Keep the ID so you can delete it later
                ];
            });

        // 返回 user 文件夹下的 profile.blade.php
        return view('user.offday', compact('user', 'offdays'));
    }

    public function showAppraisal(string $id)
    {
        if (auth()->id() != $id) {
            abort(403, 'Unauthorized access.');
        }
        // 获取当前用户数据
        $user = User::findOrFail(auth()->id());

        // 返回 user 文件夹下的 profile.blade.php
        return view('user.appraisal', compact('user'));
    }
    public function showfamily(string $id)
    {
        $user = User::findOrFail($id);

        $countries = CountryCodes::getCountryCollection();

        $familyMembers = UserDetail::where('user_id', $id)
            ->whereIn('name', ['family_name', 'relationship', 'family_nationality', 'family_dob', 'family_phone', 'family_nric'])
            ->get()
            // Group by created_at to keep each person's data together
            ->groupBy(function ($item) {
                return $item->created_at->format('Y-m-d H:i:s');
            })
            // Map the group into a clean object
            ->map(function ($group) {
                return (object)[
                    'id' => $group->first()->id,
                    'name'         => $group->where('name', 'family_name')->first()->value ?? 'N/A',
                    'relationship' => $group->where('name', 'relationship')->first()->value ?? 'Member',
                    'nationality'  => $group->where('name', 'family_nationality')->first()->value ?? '-',
                    'dob'          => $group->where('name', 'family_dob')->first()->value ?? '-',
                    'phone'        => $group->where('name', 'family_phone')->first()->value ?? '-',
                    'nric'         => $group->where('name', 'family_nric')->first()->value ?? '-',
                    'created_at'   => $group->first()->created_at // Useful for the Delete function later
                ];
            });

        return view('user.family', compact('user', 'familyMembers', 'countries'));
    }

    public function showStatutory(string $id)
    {
        if (auth()->id() != $id) {
            abort(403, 'Unauthorized access.');
        }

        // 获取当前用户数据
        $user = User::findOrFail($id);

        // 返回 user 文件夹下的 profile.blade.php
        return view('user.compensation', compact('user'));
    }
    public function showEditFamily(string $id)
    {
        // 1. Find the specific row (e.g., ID 127 for the name)
        // IMPORTANT: Make sure the ID in your URL exists in the 'id' column!
        $mainDetail = UserDetail::findOrFail($id);

        // 2. Fetch all rows for this user that share the EXACT same creation time
        $details = UserDetail::where('user_id', $mainDetail->user_id)
            ->where('created_at', $mainDetail->created_at)
            ->get();

        // 3. Map into one object for the form
        $familyMember = (object)[
            'id'                 => $mainDetail->id,
            'relationship'       => $details->where('name', 'relationship')->first()->value ?? '',
            'family_name'        => $details->where('name', 'family_name')->first()->value ?? '',
            'family_nationality' => $details->where('name', 'family_nationality')->first()->value ?? '',
            'family_dob'         => $details->where('name', 'family_dob')->first()->value ?? '',
            'family_phone'       => $details->where('name', 'family_phone')->first()->value ?? '',
            'family_nric'        => $details->where('name', 'family_nric')->first()->value ?? '',
        ];

        // Get the user for the "Back" link
        $user = User::find($mainDetail->user_id);

        return view('user.family.editFamily', compact('familyMember', 'user'));
    }

    public function showEditCareerProgression(string $careerId)
    {
        try {
            // 1. Find the initial record
            $anchorRecord = UserDetail::findOrFail($careerId);

            // 2. Authorization Check
            if (auth()->id() != $anchorRecord->user_id) {
                abort(403, 'Unauthorized access.');
            }

            $user = User::findOrFail($anchorRecord->user_id);

            // 3. Get the batch using the 'remark' or 'created_at' 
            // Note: It is safer to use the 'remark' if that is your unique batch identifier
            $careerData = UserDetail::where('user_id', $user->id)
                ->where('remark', $anchorRecord->remark)
                ->get();

            // 4. Safety Check: If the collection is empty, redirect back
            if ($careerData->isEmpty()) {
                return redirect()->back()->with('error', 'Career progression record not found.');
            }

            // 5. Map the data into an object for the view
            $editJob = (object)[
                'id'           => $anchorRecord->id, // Use the ID passed in the URL
                'job_title'    => $careerData->where('name', 'job_title')->first()->value ?? '',
                'company_name' => $careerData->where('name', 'company_name')->first()->value ?? '',
                'start_date'   => $careerData->where('name', 'start_date')->first()->value ?? '',
                'end_date'     => $careerData->where('name', 'end_date')->first()->value ?? '',
                'leave_reason' => $careerData->where('name', 'leave_reason')->first()->value ?? '',
                'remark'       => $anchorRecord->remark
            ];

            return view('user.careerProgression.editCareerProgression', compact('user', 'editJob'));
        } catch (\Exception $e) {
            Log::error("Error loading Edit Career page: " . $e->getMessage());
            return redirect()->back()->with('error', 'An unexpected error occurred.');
        }
    }
    public function updateCareerProgression(Request $request, $id)
    {
        // 1. Find the specific record being edited to extract its group 'remark'
        // Note: $id here should be the primary key ID of one of the UserDetail rows
        $originalRecord = UserDetail::findOrFail($id);
        $user = User::findOrFail($originalRecord->user_id);

        // 2. Validation
        $request->validate([
            'job_title'    => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'start_date'   => 'required|date',
            'end_date'     => 'nullable|date|after_or_equal:start_date',
            'leave_reason' => 'nullable|string|max:1000',
        ]);

        // 3. Define the mapping of Form Input Name => Database 'name' column
        $careerMap = [
            'job_title'    => 'job_title',
            'company_name' => 'company_name',
            'start_date'   => 'start_date',
            'end_date'     => 'end_date',
            'leave_reason' => 'leave_reason'
        ];

        // 4. Update the batch using the existing 'remark'
        foreach ($careerMap as $inputKey => $dbLabel) {
            // We use updateOrCreate so if a new field is added to the form later, 
            // it inserts into the group correctly.
            UserDetail::updateOrCreate(
                [
                    'user_id' => $user->id,
                    'name'    => $dbLabel,
                    'remark'  => $originalRecord->remark // Using the existing batch remark
                ],
                [
                    'value'   => $request->get($inputKey) ?? 'N/A'
                ]
            );
        }

        // 5. Redirect back to the employment list
        return redirect()
            ->route('user.employment', $user->id)
            ->with('success', 'Career progression updated successfully!');
    }
    public function show(string $id)
    {
        if (auth()->id() != $id) {
            abort(403, 'Unauthorized access.');
        }

        // 获取当前用户数据
        $user = User::findOrFail($id);
        $countries = CountryCodes::getCountryCollection();


        // 返回 user 文件夹下的 profile.blade.php
        return view('user.profile', compact('user', 'countries'));
    }



    public function showEmployee(string $id)
    {
        if (auth()->id() != $id) {
            abort(403, 'Unauthorized access.');
        }

        $user = User::findOrFail($id);

        // 1. Fetch and group the data EXACTLY like you did in your other working method
        $careerHistory = UserDetail::where('user_id', $id)
            ->where('remark', 'like', 'Career Progression Entry%')
            ->get()
            ->groupBy('remark')
            ->map(function ($group) {
                return (object)[
                    'id'          => $group->first()->id, // Keep the ID for reference (e.g., for editing/deleting)
                    'job_title'    => $group->where('name', 'job_title')->first()->value ?? 'N/A',
                    'company_name' => $group->where('name', 'company_name')->first()->value ?? 'N/A',
                    'start_date'   => $group->where('name', 'start_date')->first()->value ?? null,
                    'end_date'     => $group->where('name', 'end_date')->first()->value ?? 'Present',
                    'leave_reason' => $group->where('name', 'leave_reason')->first()->value ?? '-',
                    'batch_id'     => $group->first()->remark
                ];
            });



        // 2. Pass the variable to the view
        return view('user.employment', compact('user', 'careerHistory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // 1. Validation Logic
        $request->validate([
            'name'           => 'required|string|max:255',
            'preferred_name' => 'nullable|string|max:255',
            'passport'       => 'nullable|string|max:20',
            'nric'           => 'required|string|size:12', // Standard 12-digit Malaysian NRIC
            'dob'            => 'required|date|before:today',
            'phone'          => 'required|string|min:10|max:15',
            'gender'         => 'required|in:Male,Female',
            'race'           => 'nullable|string',
            'religion'       => 'nullable|string',
            'nationality'    => 'required|string',
            'is_pr'          => 'required|boolean',
            'qualification'  => 'nullable|string',
            'marital_status' => 'required|in:Single,Married,Divorced,Widowed',
        ]);

        $user = User::findOrFail($id);

        // 2. Update basic fields in the 'users' table
        $user->update([
            'name' => $request->name,
        ]);

        // 3. Mapping List
        $detailsMap = [
            'preferred_name' => 'preferred_name',
            'passport'       => 'passport',
            'nric'           => 'nric',
            'dob'            => 'dob',
            'phone'          => 'phone',
            'gender'         => 'gender',
            'race'           => 'race',
            'religion'       => 'religion',
            'nationality'    => 'nationality',
            'is_pr'          => 'is_pr',
            'qualification'  => 'qualification',
            'marital_status' => 'marital_status'
        ];

        // 4. [Loop & Save]: Handle each detail one by one
        foreach ($detailsMap as $inputKey => $dbLabel) {
            if ($request->has($inputKey)) {
                UserDetail::updateOrCreate(
                    [
                        'user_id' => $user->id,
                        'name'    => $dbLabel
                    ],
                    [
                        'value'   => $request->get($inputKey),
                        'remark'  => 'Updated via Profile'
                    ]
                );
            }
        }

        return back()->with('success', 'Profile updated successfully!');
    }
    public function updateAddress(Request $request, $id)
    {
        // 1. Validation Logic
        $request->validate([
            'address'  => 'required|string|max:500',
            'city'     => 'required|string|max:100',
            'postcode' => 'required|string|digits:5', // Malaysian postcodes are 5 digits
            'region'   => 'required|string|max:100', // Usually the State (e.g., Selangor, KL)
            'country'  => 'required|string|max:100',
        ]);

        $user = User::findOrFail($id);

        $addressMap = [
            'address'  => 'address',
            'city'     => 'city',
            'postcode' => 'postcode',
            'region'   => 'region',
            'country'  => 'country'
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

        $request->validate([
            'correspondence_address'  => 'required|string|max:500',
            'correspondence_city'     => 'required|string|max:100',
            'correspondence_postcode' => 'required|string|digits:5', // Malaysian postcodes are 5 digits
            'correspondence_region'   => 'required|string|max:100', // Usually the State (e.g., Selangor, KL)
            'correspondence_country'  => 'required|string|max:100',
        ]);
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

        $request->validate([
            'emergency_name'         => 'required|string|max:255',
            'emergency_relationship' => 'required|string|max:255',
            'emergency_phone'        => 'required|string|max:20',
        ]);

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

    public function createCareerProgression(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'job_title' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required_without:currently_working|nullable|date|after_or_equal:start_date',
            'leave_reason' => 'nullable|string'
        ]);

        $careerProgressions = [
            'job_title' => 'job_title',
            'company_name' => 'company_name',
            'start_date' => 'start_date',
            'end_date' => 'end_date',
            'leave_reason' => 'leave_reason'
        ];

        foreach ($careerProgressions as $inputKey => $dbLabel) {
            if ($request->filled($inputKey)) {
                UserDetail::create([
                    'user_id' => $user->id,
                    'name'    => $dbLabel,
                    'value'   => $request->get($inputKey),
                    // Adding a unique identifier like a timestamp or batch ID 
                    // helps group these specific job entries together
                    'remark'  => 'Career Progression Entry - ' . now()->timestamp
                ]);
            }
        }
        return redirect()->route('user.employment', $id)->with('success', 'Career Progression');
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


    public function createOrganizationalDetails(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        // 1. Validation
        $request->validate([
            'history_effective_from'    => 'nullable|date',
            'history_effective_to'      => 'nullable|date|after_or_equal:history_effective_from',
            'history_employment_type'   => 'nullable|string',
            'history_employment_status' => 'nullable|string',
            'history_position'          => 'nullable|string',
            'history_position_level'    => 'nullable|string',
            'history_department'        => 'nullable|string',
            'history_reports_to'        => 'nullable|string',
            'history_remarks'           => 'nullable|string',
        ]);

        // 2. Define the Mapping (Input Name => Database Label)
        // Adjust these labels to match exactly what you want to see in your "name" column
        $historyMap = [
            'history_effective_from'    => 'history_effective_from',
            'history_effective_to'      => 'history_effective_to',
            'history_employment_type'   => 'history_employment_type',
            'history_employment_status' => 'history_employment_status',
            'history_position'          => 'history_position',
            'history_position_level'    => 'history_position_level',
            'history_department'        => 'history_department',
            'history_reports_to'        => 'history_reports_to',
            'history_remarks'           => 'history_remarks',
        ];

        // 3. Loop and Update/Create
        foreach ($historyMap as $inputKey => $dbLabel) {
            // Only update if the user actually typed something in the field
            if ($request->filled($inputKey)) {
                UserDetail::create(
                    [
                        'user_id' => $user->id,
                        'name'    => $dbLabel,
                        'value'   => $request->get($inputKey),
                        'remark'  => 'Updated via Organizational History Modal'
                    ]
                );
            }
        }

        return back()->with('success', 'Organizational details updated successfully!');
    }


    public function updateCompensationDetails(Request $request, string $id)
    {
        $request->validate([
            'effective_date' => 'required|date',
            'pay_by_attendance' => 'required|string',
            'payment_method' => 'required|string',
            'salary' => 'required|int',
            'salary_type' => 'required|string',
            'reason' => 'required|string'
        ]);

        $details = [
            'effective_date' => $request->effective_date,
            'pay_by_attendance' => $request->pay_by_attendance,
            'payment_method' => $request->payment_method,
            'salary' => $request->salary,
            'salary_type' => $request->salary_type,
            'reason' => $request->reason
        ];

        try {
            foreach ($details as $key => $value) {
                \App\Models\UserDetail::create(
                    [
                        'user_id' => $id,
                        'name' => $key,
                        'value' => $value ?? '-',
                        'remark' => 'Updated via Compensation Details Modal'
                    ]
                );
            }

            return redirect()->back()->with('success', 'Compensation details updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    public function updateBankDetail(Request $request, string $id)
    {
        $request->validate([
            'bank_name' => 'required|string',
            'bank_account_no' => 'nullable|string',
            'bank_account_type' => 'required|string',
            'asnb_account_no' => 'required|string',
        ]);

        $bankData = [
            'bank_name' => $request->bank_name,
            'bank_account_no' => $request->bank_account_no,
            'bank_account_type' => $request->bank_account_type,
            'asnb_account_no' => $request->asnb_account_no
        ];

        try {
            foreach ($bankData as $key => $value) {
                \App\Models\UserDetail::updateOrCreate(
                    [
                        'user_id' => $id,
                        'name' => $key
                    ],
                    [
                        'value' => $value ?? '-',
                        'remark' => 'Updated via Bank Details Modal'
                    ]
                );
            }

            return redirect()->back()->with('success', 'Bank details updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }


    public function updateStatutory(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            // EPF
            'pay_epf'               => 'required|boolean',
            'epf_borne_employer'    => 'required|boolean',
            'epf_no'                => 'nullable|string|max:25',
            'extra_epf_employer'    => 'nullable|numeric|min:0',
            'extra_epf_employee'    => 'nullable|numeric|min:0',

            // SOCSO & EIS
            'pay_socso'             => 'required|boolean',
            'socso_borne_employer'  => 'required|boolean',
            'socso_no'              => 'nullable|string|max:25',
            'eis_borne_employer'    => 'required|boolean',

            // HRDF & Zakat
            'pay_hrdf'              => 'required|boolean',
            'zakat_amount'          => 'nullable|numeric|min:0',
            'zakat_no'              => 'nullable|string|max:30',

            // PTPTN
            'ptptn_amount'          => 'nullable|numeric|min:0',
            'ptptn_start'           => 'nullable|date',
            'ptptn_end'             => 'nullable|date|after_or_equal:ptptn_start',
        ]);

        // Define all fields to be saved
        $fields = [
            'pay_epf',
            'epf_borne_employer',
            'epf_no',
            'extra_epf_employer',
            'extra_epf_employee',
            'pay_socso',
            'socso_borne_employer',
            'socso_no',
            'eis_borne_employer',
            'pay_hrdf',
            'zakat_amount',
            'zakat_no',
            'ptptn_amount',
            'ptptn_start',
            'ptptn_end'
        ];

        foreach ($fields as $field) {
            UserDetail::updateOrCreate(
                [
                    'user_id' => $user->id,
                    'name'    => $field,
                ],
                [
                    // If it's not in validated (null/empty), we fetch it from request with a default of 0
                    'value'   => $request->input($field, 0),
                    'remark'  => 'Statutory Detail Update'
                ]
            );
        }

        return redirect()->route('user.compensation', $id)
            ->with('success', 'Statutory details updated successfully!');
    }



    public function updateIncomeTax(Request $request, $id)
    {
        $user = User::findOrFail($id);
        // 1. Validation Logic
        $validator = Validator::make($request->all(), [
            'pay_tax'                         => 'required|in:Yes,No',
            'tax_resident'                    => 'required|in:Yes,No',
            'tax_borne_exployer'              => 'nullable|in:Yes,No',
            'disabled_person'                 => 'nullable|in:Yes,No',
            'spouse_working'                  => 'nullable|in:Yes,No',
            'spouse_disabled'                 => 'nullable|in:Yes,No',
            'tax_no'                          => 'required|in:IG,OG,SG',
            'income_tax_no'                   => 'required|string|min:10|max:15',
            'LHDNM_state'                     => 'required|string',
            'child_under_18_full'             => 'nullable|integer|min:0',
            'child_under_18_half'             => 'nullable|integer|min:0',
            'disabled_child_under_18_full'    => 'nullable|integer|min:0',
            'disabled_child_under_18_half'    => 'nullable|integer|min:0',
            'child_over_18_edu_full'          => 'nullable|integer|min:0',
            'child_over_18_edu_half'          => 'nullable|integer|min:0',
            'disabled_child_over_18_edu_full' => 'nullable|integer|min:0',
            'disabled_child_over_18_edu_half' => 'nullable|integer|min:0',
        ]);

        // If validation fails, redirect back with error messages and old input
        if ($validator->fails()) {
            Log::warning('Validation Failed for user ' . $id, $validator->errors()->toArray());
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // 2. Data Preparation
        $taxData = [
            'pay_tax'                         => $request->pay_tax,
            'tax_resident'                    => $request->tax_resident,
            'tax_borne_exployer'              => $request->tax_borne_exployer,
            'disabled_person'                 => $request->disabled_person,
            'spouse_working'                  => $request->spouse_working,
            'spouse_disabled'                 => $request->spouse_disabled,
            'LHDNM_state'                     => $request->LHDNM_state,
            'income_tax_no'                   => $request->tax_no . $request->income_tax_no, // Prefix + Number
            'child_under_18_full'             => $request->child_under_18_full ?? 0,
            'child_under_18_half'             => $request->child_under_18_half ?? 0,
            'disabled_child_under_18_full'    => $request->disabled_child_under_18_full ?? 0,
            'disabled_child_under_18_half'    => $request->disabled_child_under_18_half ?? 0,
            'child_over_18_edu_full'          => $request->child_over_18_edu_full ?? 0,
            'child_over_18_edu_half'          => $request->child_over_18_edu_half ?? 0,
            'disabled_child_over_18_edu_full' => $request->disabled_child_over_18_edu_full ?? 0,
            'disabled_child_over_18_edu_half' => $request->disabled_child_over_18_edu_half ?? 0,
        ];

        DB::beginTransaction();
        try {
            // 3. Loop and UpdateOrCreate
            foreach ($taxData as $key => $value) {
                UserDetail::updateOrCreate(
                    ['user_id' => $id, 'name' => $key],
                    [
                        'value'  => $value ?? '0',
                        'remark' => 'Updated via Income Tax Modal'
                    ]
                );
            }

            DB::commit();

            return redirect()->back()->with('success', 'LHDN records updated successfully!');
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Database Error in updateIncomeTax: ' . $e->getMessage(), [
                'user_id' => $id,
                'line'    => $e->getLine()
            ]);

            return redirect()->back()
                ->withInput()
                ->with('error', 'System Error: ' . $e->getMessage());
        }
    }


    public function updateDaysTaken(Request $request, string $id)
    {

        $user = User::findOrFail($id);
        info('updateDaysTaken method', ['method' => $request->method()]);
        $request->validate([
            'days_taken' => 'required|numeric|min:0'
        ]);

        try {
            UserDetail::updateOrCreate(
                ['user_id' => $id, 'name' => 'days_taken'],
                ['value' => $request->days_taken, 'remark' => 'Updated via Leave Modal']
            );

            return redirect()->back()->with('success', 'Leave days updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    public function updateHospitalizationDays(Request $request, string $id)
    {


        $request->validate([
            'hosp_days_taken' => 'required|numeric|min:0'
        ]);

        try {
            UserDetail::updateOrCreate(
                ['user_id' => $id, 'name' => 'hospitalization_days'],
                ['value' => $request->hosp_days_taken, 'remark' => 'Updated via Hospitalization Modal']
            );

            return redirect()->back()->with('success', 'Hospitalization days updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }


    public function updateSickDays(Request $request, string $id)
    {
        $request->validate([
            'sick_days_taken' => 'required|numeric|min:0'
        ]);

        try {
            UserDetail::updateOrCreate(
                ['user_id' => $id, 'name' => 'sick_days_taken'],
                ['value' => $request->sick_days_taken, 'remark' => 'Updated via Sick Leave Modal']
            );

            return redirect()->back()->with('success', 'Sick leave days updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }


    public function updateNextOfKin(Request $request, string $id)
    {
        User::findOrFail($id);
        $data = $request->validate([
            'nok_name'         => 'required|string|max:255',
            'nok_relationship' => 'required|string|max:255',
            'nok_phone'        => 'required|string|max:20',
        ]);

        try {
            // 2. Loop through the validated data to update the database
            foreach ($data as $key => $value) {
                UserDetail::updateOrCreate(
                    ['user_id' => $id, 'name' => $key],
                    ['value' => $value, 'remark' => 'Updated via Next of Kin Modal']
                );
            }

            return redirect()->back()->with('success', 'Family details updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Update failed. Please try again.');
        }
    }

    public function createFamilyDetails(Request $request, string $id)
    {
        User::findOrFail($id);

        $request->validate([
            'relationship' => 'required|string|max:255',
            'family_name' => 'required|string|max:255',
            'family_nationality' => 'required|string|max:255',
            'family_dob' => 'required|date|before:today',
            'family_phone' => 'required|string|max:20',
            'family_nric' => 'required|string|max:20'
        ]);

        $familyData = [
            'relationship' => $request->relationship,
            'family_name' => $request->family_name,
            'family_nationality' => $request->family_nationality,
            'family_dob' => $request->family_dob,
            'family_phone' => $request->family_phone,
            'family_nric' => $request->family_nric
        ];

        try {
            foreach ($familyData as $key => $value) {
                UserDetail::create(
                    [
                        'user_id' => $id,
                        'name' => $key,
                        'value' => $value,
                        'remark' => 'Updated via Family Details Modal'
                    ]
                );
            }

            return redirect()->back()->with('success', 'Family details updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Update failed. Please try again.');
        }
    }

    public function updateFamily(Request $request, $id)
    {
        // 1. Validation
        $validated = $request->validate([
            'relationship'       => 'required|string|in:Children,Spouse,Parents,Siblings',
            'family_name'        => 'required|string|max:255',
            'family_nationality' => 'required|string',
            'family_dob'         => 'required|date|before:today',
            'family_phone'       => 'required|numeric|digits_between:9,13',
            'family_nric'        => 'required|string|max:20',
        ], [
            'family_dob.before' => 'The date of birth must be a date in the past.',
            'family_phone.numeric' => 'Please enter a valid phone number without dashes.',
        ]);

        try {
            // 2. Find the anchor record
            $mainRecord = UserDetail::findOrFail($id);

            // 3. Process the update/create loop
            foreach ($validated as $name => $value) {
                UserDetail::updateOrCreate(
                    [
                        'user_id'    => $mainRecord->user_id,
                        'created_at' => $mainRecord->created_at,
                        'name'       => $name
                    ],
                    [
                        'value'      => $value,
                        'remark'     => 'Updated via Family Details Modal'
                    ]
                );
            }

            // If successful, redirect back with success message
            return redirect()->route('user.family', $mainRecord->user_id)->with('success', 'Family member updated successfully!');
        } catch (\Exception $e) {
            // If an error occurs, log it and redirect back with an error message
            Log::error("Update error: " . $e->getMessage());

            return redirect()->back()
                ->withInput()
                ->with('error', 'Unable to update family details. Please check your connection and try again.');
        }
    }

    public function createCompanyAsset(Request $request, string $id)
    {
        User::findOrFail($id);

        $request->validate([
            'asset_type' => 'required|string|max:255',
            'date_received' => 'required|date',
            'date_released' => 'nullable|date|after_or_equal:date_received',
            'asset_details' => 'nullable|string|max:500'
        ]);

        $assetDate = [
            'asset_type' => $request->asset_type,
            'date_received' => $request->date_received,
            'date_released' => $request->date_released,
            'asset_details' => $request->asset_details
        ];

        try {
            foreach ($assetDate as $key => $value) {
                UserDetail::create(
                    [
                        'user_id' => $id,
                        'name' => $key,
                        'value' => $value,
                        'remark' => 'Updated via Company Asset Modal'
                    ]
                );
            }

            return redirect()->back()->with('success', 'Company asset details updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Update failed. Please try again.', $e->getMessage());
        }
    }

    public function updateCompanyAsset(Request $request, $assetId)
    {
        $assetRecord = UserDetail::findOrFail($assetId);

        // Find all records belonging to this "group" (same user and timestamp)
        $group = UserDetail::where('user_id', $assetRecord->user_id)
            ->where('created_at', $assetRecord->created_at)
            ->get();

        $fields = ['asset_type', 'date_received', 'date_released', 'asset_details'];

        foreach ($fields as $field) {
            if ($request->has($field)) {
                // Update the existing record in the group or create it if missing
                UserDetail::updateOrCreate(
                    [
                        'user_id' => $assetRecord->user_id,
                        'created_at' => $assetRecord->created_at,
                        'name' => $field
                    ],
                    ['value' => $request->input($field)]
                );
            }
        }

        return redirect()->route('user.document', $assetRecord->user_id)
            ->with('success', 'Asset updated successfully');
    }

    public function deleteCompanyAsset($id)
    {
        $row = UserDetail::findOrFail($id);

        $groupRemark = $row->remark();

        if (!empty($groupRemark)) {
            UserDetail::where('remark', $groupRemark)
                ->where('user_id', auth()->id())
                ->delete();

            return redirect()->back()->with('status', 'Company Asset deleted successfully');
        }

        $row->delete();

        return redirect()->back()->with('status single record deleted');
    }

    public function createOffday(Request $request, string $id)
    {
        $request->validate([
            'offday_base_date'  => 'required|date',
            'repeat_count'      => 'required_if:recurrence_mode,times|nullable|integer|min:1',
            'repeat_until_date' => 'required_if:recurrence_mode,until|nullable|date|after:offday_base_date',
        ]);

        try {
            $date = Carbon::parse($request->offday_base_date);

            // 1. Save the first day
            $this->saveRow($id, $date);

            // 2. If "Make it recurrent" is checked
            if ($request->has('is_recurrent')) {

                if ($request->recurrence_mode === 'times') {
                    // Loop for X times
                    for ($i = 1; $i <= $request->repeat_count; $i++) {
                        $this->saveRow($id, $date->copy()->addWeeks($i));
                    }
                } else {
                    // Loop until the date is reached
                    $until = Carbon::parse($request->repeat_until_date);
                    $next = $date->copy()->addWeek();

                    while ($next->lte($until)) {
                        $this->saveRow($id, $next);
                        $next->addWeek();
                    }
                }
            }

            return redirect()->back()->with('success', 'Offdays assigned!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    // Simple helper to save to Database
    private function saveRow($userId, $date)
    {
        UserDetail::create([
            'user_id' => $userId,
            'name'    => 'offday_base_date',
            'value'   => $date->format('Y-m-d'),
            'remark'  => 'Scheduled Offday'
        ]);
    }


    public function destroyOffday($offdayId)
    {
        // 1. Find the specific record (e.g., ID 126)
        // Replace 'Offday' with the actual name of your Model
        $offday = UserDetail::findOrFail($offdayId);

        // 2. Security Check: Ensure the record belongs to the logged-in user
        if (auth()->id() != $offday->user_id) {
            abort(403, 'Unauthorized action.');
        }

        // 3. Perform the delete
        $offday->delete();

        // 4. Redirect back to the list with a success message
        return redirect()->back()->with('success', 'Offday removed successfully.');
    }

    public function deleteCareerProgression($id)
    {
        $clickedRow = UserDetail::findOrFail($id);

        // 2. Get the unique remark from that row 
        // (e.g., "Career Progression Entry - 1775118525")
        $groupRemark = $clickedRow->remark;

        // 3. Delete EVERY row that has this same remark and belongs to the user
        if (!empty($groupRemark)) {
            UserDetail::where('remark', $groupRemark)
                ->where('user_id', auth()->id()) // Extra safety
                ->delete();

            return redirect()->back()->with('status', 'Career record fully deleted.');
        }

        // Fallback: If for some reason remark is empty, just delete the single row
        $clickedRow->delete();
        return redirect()->back()->with('status', 'Single record deleted.');
    }

    public function deleteDocument($id)
    {
        $assetRecord = UserDetail::findOrFail($id);

        if (auth()->id() !== $assetRecord->user_id) {
            abort(403, 'Unauthorized action.');
        }

        // This /document section stores one asset as multiple rows (asset_type, date_received, date_released, asset_details)
        // grouped by created_at. Delete the asset group by created_at so only the intended asset is removed.
        $createdAt = $assetRecord->created_at;

        UserDetail::where('user_id', $assetRecord->user_id)
            ->where('created_at', $createdAt)
            ->whereIn('name', ['asset_type', 'date_received', 'date_released', 'asset_details'])
            ->delete();

        return redirect()->back()->with('status', 'Document asset deleted successfully.');
    }

    public function deleteFamily($id)
    {
        try {
            // 1. Find the anchor record
            // Note: Check if you are finding by User or UserDetail. 
            // If $id refers to a specific detail row, use UserDetail::findOrFail($id);
            $familyRecord = UserDetail::findOrFail($id);

            // 2. Authorization Check
            if (auth()->id() != $familyRecord->user_id) {
                abort(403, 'Unauthorized action.');
            }

            $createdAt = $familyRecord->created_at;
            $userId = $familyRecord->user_id;

            // 3. Perform Deletion
            UserDetail::where('user_id', $userId)
                ->where('created_at', $createdAt)
                ->whereIn('name', [
                    'relationship',
                    'family_name',
                    'family_nationality',
                    'family_dob',
                    'family_phone',
                    'family_nric'
                ])
                ->delete();

            return redirect()->back()->with('success', 'Family member records deleted successfully.');
        } catch (\Exception $e) {
            // Log the technical error for your own debugging
            Log::error("Family Deletion Failed: " . $e->getMessage());

            return redirect()->back()->with('error', 'Unable to delete the record. Please try again later.');
        }
    }
}
