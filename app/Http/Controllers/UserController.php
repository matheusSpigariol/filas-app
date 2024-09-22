<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Jobs\JobSendWelcomeEmail;
use App\Mail\SendWelcomeEmail;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function create()
    {
        return view('users.create');
    }

    public function store(UserRequest $request)
    {
        $request->validated();

        DB::beginTransaction();

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password
            ]);

            // Mail::to($user->email)->send(new SendWelcomeEmail($user));

            JobSendWelcomeEmail::dispatch($user->id)->onQueue('default');

            DB::commit();

            return redirect()->route('users.create')->with('success', 'usuário cadastrado com sucesso.');
            
        } catch (Exception) {
            DB::rollBack();

            return back()->withInput()->with('error', 'Usuário não cadastrado.');
        }
    }
}
