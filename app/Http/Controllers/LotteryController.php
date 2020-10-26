<?php

namespace App\Http\Controllers;

use App\Components\Lottery\Lottery;
use App\Repositories\SettingsRepository;
use App\Repositories\ThingRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LotteryController extends Controller
{
    public function index(Request $request, UserRepository $userRepository)
    {
        if (isset($request->_token)){
            $settingsRepository = new SettingsRepository();
            $lottery = new Lottery(Auth::id(), $settingsRepository);

            $prize = $lottery->getPrise();
        }

        return view('lottery.index', [
            'prize' => isset($prize) ? $prize : null
        ]);
    }
}
