<?php

namespace App\Http\Controllers;


use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserSettingController extends Controller
{
    public function resetPassword(Request $request)
    {
        $service = new UserService();
        return $service->resetUserPassword($request->all());
    }

    public function storeUserAppSettings(Request $request)
    {
        $service = new UserService();
        return $service->storeUserAppSettings($request->all());
    }
    public function updateUserAppSettings(Request $request)
    {
        $service = new UserService();
        return $service->updateUserAppSettings($request->all());
    }
}
