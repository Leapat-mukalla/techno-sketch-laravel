<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\VisitorsData;
use Illuminate\Support\Facades\DB;
class ManageVisitorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all users who are in the visitor role along with their data
        $users = User::whereHas('roles', function ($query) {
            $query->where('name', 'visitor');
        })->with('VisitorsData')->paginate(10);
        return view('admin.visitors-main', compact('users'));
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            $visitorData = VisitorsData::find($id);
            if (!$visitorData) {
                return redirect()->back()->with('error', 'لاتوجد بيانات لهذا المستخدم.');
            }

            // Validate the request
            $request->validate([
                'action' => 'required',
            ]);

            // Update the status based on the action
            $status = $request->action;
            $visitorData->update(['status' => $status]);

            DB::commit();

            return redirect()->back()->with('success', 'تم تعديل الحالة بنجاح.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'حدث خطأ أثناء تعديل الحالة.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();

            $user = User::find($id);

            if (!$user) {
                return redirect()->back()->with('error', 'هذا المستخدم غير موجود.');
            }

            // Delete associated data
            $user->VisitorsData()->delete();

            // Delete the user
            $user->delete();

            DB::commit();

            return redirect()->back()->with('success', 'تم حذف المستخدم بنجاح.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'حدث خطأ أثناء حذف المستخدم.');
        }
    }
}
