<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee;

class EmploymentController extends Controller
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
            abort(403, 'Unauthrizsd Access');
        }

        $user = \App\Models\User::findOrFail($id);


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
    public function update(Request $request, string $id)
    {

        // 1. Validate all the words found in your list
        $validatedData = $request->validate([
            'employee_no'         => 'nullable|string|max:50',
            'employment_type'     => 'nullable|string',
            'position'            => 'nullable|string',
            'position_level'      => 'nullable|string',
            'department'          => 'nullable|string',
            'cost_center'         => 'nullable|string',
            'subsidiary'          => 'nullable|string',

            'employment_status'   => 'nullable|string',
            'date_of_confirmation' => 'nullable|date',
            'reports_to'          => 'nullable|string',
            'location'            => 'nullable|string',
            'pay_group'           => 'nullable|string',
            'functional_group'    => 'nullable|string',
            'knowledge_worker'    => 'required|boolean', // Since it's "Yes/No"

            'join_date'           => 'nullable|date',
            'status_effective_from' => 'nullable|date',
            'notice_period'       => 'nullable|integer',
            'work_permit_no'      => 'nullable|string',
            'work_permit_expiry'  => 'nullable|date',
            'retirement_date'     => 'nullable|date',
        ]);

        // 2. Find the record
        $employee = Employee::findOrFail($id);

        // 3. Update the record
        $employee->update($validatedData);

        // 4. Redirect back with a success message
        return redirect()->back()->with('success', 'Employment Information updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
