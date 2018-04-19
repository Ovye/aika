<?php

namespace App\Http\Controllers\Backends;

use App\Aika\Contracts\SocialiteUsersInterface;
use App\Aika\Contracts\UsersInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UsersController extends Controller
{

    protected $users, $socialite, $user = false, $alert;

    public function __construct(UsersInterface $users, SocialiteUsersInterface $socialiteUsers)
    {
        $this->middleware('auths');
        $this->users = $users;
        $this->socialite = $socialiteUsers;
        $this->alert = app('NormalAlert');
    }

    public function index()
    {
        $this->assign['scripts'] = add_scripts(['views' => 'backend/users/script']);
        $this->assign['title'] = "Users";
        $this->assign['body'] = 'users.index';
        $this->assign['users'] = $this->users->nonAdmins();
        $this->assign['socialiteUsers'] = $this->socialite->all();
        $this->assign['admins'] = $this->users->onlyAdmins();

        return view('backend.wrapper', $this->assign);
    }

    public function edit(Request $request)
    {
        $userId = string($request->userId)->segment('-', 1);
        $this->assign['user'] = $this->users->find($userId);
        $this->assign['randomFormId'] = Str::uuid();

        return view('backend.users.modals.edit', $this->assign);
    }

    public function update(Request $request)
    {
        if ($request->guard == 'web') {
            $this->user = $this->users->find($request->user_id);
        }

        if (!$this->user) {
            $this->alert->error('e', "This is user doesn't exist any longer.");
            return back();
        }

        $sendPasswordCheck = "send_user_password_{$this->user->id}";

        $this->user->fname = ucfirst($request->fname);
        $this->user->lname = ucfirst($request->lname);
        $this->user->fullname = sprintf("%s %s", $this->user->fname, $this->user->lname);
        $this->user->email = $request->email;
        $this->user->phone = $request->phone;

        $alertType = 'success';

        if ($request->password != '') {
            $this->user->password = bcrypt($request->password);
            $message = "User data including password, was updated successfully.";

            if ($request->$sendPasswordCheck == 'on') {
                if ($this->smsNewPasswordToUser($request)) {
                    $message = "User data updated and password sent to communication channels.";
                }
                else {
                    $alertType = 'warning';
                    $message = "Password changed but sending password to user's phone number failed. Make sure you are connected to an active internet connection.";
                }
            }
        }
        else {
            $message = "<b class=''>{$this->user->fname}'s</b> details updated successfully.";
        }

        if ($this->user->save()) {
            if ($alertType == 'warning') {
                $this->alert->warning($message);
            }
            else {
                $this->alert->success($message);
            }
        }
        else {
            $this->alert('e', "Failed to update user info.");
        }

        return back();
    }

    public function smsNewPasswordToUser(Request $request)
    : bool
    {
        $sms = aikasms("Aika")->to($this->user->phone)
            ->send("Hi {$this->user->fname},\n
                Your aika password has been changed to {$request->password}. Use it to login.\n 
                -Aika Team.
                "
            );
        if ($sms->response == true) {
            return true;
        }

        return false;
    }


}
