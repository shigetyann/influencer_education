<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function updateProfileImage(Request $request)
    {
        $user = Auth::user();
        if ($request->hasFile('profile_image')) {
            $imagePath = $request->file('profile_image')->store('public/profile_image');
            $user->profile_image = Storage::url($imagePath);
            $user->save();
        }
    }

    public function changeProfile(){
        $user = Auth::user();
        return view('user/change_profile',compact('user'));
    }

    public function updateProfile(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'name_kana' => 'required|max:255',
            'email' => 'required|email|max:255',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = Auth::user();
        $user->name = $validatedData['name'];
        $user->name_kana = $validatedData['name_kana'];
        $user->email = $validatedData['email'];

        try {
            $this->updateProfileImage($request);
        } catch (\Exception $e) {
            return back()->withErrors(['profile_image' => '画像のアップロードに失敗しました。']);
        }
        
        $user->save();
        return redirect()->route('profile')->with('success','プロフィールの変更を登録いたしました。');
    }

    public function changePassword(){
        $user = Auth::user();
        return view('user/change_password',compact('user'));
    }
    
    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'old_password' => ['required', function ($attribute, $value, $fail) use ($user) {
                if (!Hash::check($value, $user->password)) {
                    $fail('旧パスワードが正しくありません。');
                }
            }],
            'new_password' => 'required|min:8',
            'confirmation_password' => 'required|same:new_password',
        ],[
            'new_password.required' => '新しいパスワードを入力してください。',
            'new_password.min' => 'パスワードは最低8文字必要です。',
            'confirmation_password.required' => '確認用のパスワードを入力してください。',
            'confirmation_password.same' => '新パスワードと確認パスワードが一致していません。',
        ]);

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('profile')->with('success', 'Passwordの変更が完了いたしました。');
    }

}

