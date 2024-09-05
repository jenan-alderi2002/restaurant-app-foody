<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // التحقق من عدم وجود مسؤول بالفعل في قاعدة البيانات
    $existingAdmin = User::where('role', 'admin')->first();
    if ($existingAdmin) {
        return response()->json(['message' => 'Admin user already exists'], 409);
    }
    
    // إنشاء المستخدم الجديد
    $user = User::create([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'password' => Hash::make($request->input('password')),
        'role' => 'admin', // تعيين دور المستخدم كمسؤول
    ]);

    return response()->json(['message' => 'Admin user created successfully'], 201);
}
