<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\VisitorsData;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Auth;

class RegisterationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('registeration');
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
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:250',
                'email' => 'email|max:250',
                'phone' => ['required', 'regex:/^(77|78|73|70)[0-9]{7}$/','unique:users'],
                'password' => 'required|min:8|confirmed',
                'gender' => 'required',
                'age' => ['required', 'regex:/[0-9٠-٩]+/'],
                'address' => 'string|max:250'
            ], [
                'name.required' => 'يرجى إدخال الاسم.',
                'name.string' => 'يجب أن يكون الاسم نصًا.',
                'name.max' => 'يجب ألا يتجاوز الاسم 250 حرفًا.',
                'email.email' => 'يرجى إدخال بريد إلكتروني صالح.',
                'email.max' => 'يجب ألا يتجاوز البريد الإلكتروني 250 حرفًا.',

                'password.required' => 'يرجى إدخال كلمة المرور.',
                'password.min' => 'يجب أن تحتوي كلمة المرور على الأقل 8 أحرف.',
                'password.confirmed' => 'كلمة المرور غير متطابقة.',

                'phone.required' => 'يرجى إدخال رقم الجوال.',
                'phone.unique' => ' رقم الجوال موجود مسبقاً.',
                'phone.regex' => 'يجب أن يبدأ رقم الجوال بـ 77 أو 78 أو 73 أو 70 وأن يتكون من 9 أرقام.',

                'gender.required' => 'يرجى إدخال الحنس.',

                'age.required' => 'يرجى إدخال العمر.',
                'age.regex' => '  العمر يجب أن يكون رقماً .',

                'address.max' => 'يجب ألا يتجاوز العنوان 250 حرفًا.',

            ]);
            DB::beginTransaction();

            $user = User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'phone' => $validatedData['phone'],
                'password' => Hash::make($validatedData['password']),
            ]);
            VisitorsData::create([
                'gender' => $validatedData['gender'],
                'age' => $validatedData['age'],
                'address' => $validatedData['address'],
                'user_id' => $user->id,
            ]);
            $user->roles()->attach(Role::where('name', 'visitor')->first()->id);
            DB::commit();
            $credentials = $request->only('phone', 'password');
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->route('visitor.home')->with('message','أهلاً وسهلاً عميلنا الجديد.');
                // return view('visitors-home');
            }
            return redirect()->route('login')->with('error', 'فشل الدخول التلقائي! سجل الدخول مرة أخرى.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            DB::rollBack();
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'فشل التسجيل! حاول مرة أخرى.');
            // return redirect()->back()->with('error', $e->getMessage());

        }
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
