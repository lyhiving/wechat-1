<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use EasyWeChat\Foundation\Application;

class WechatController extends Controller{
    /**
     * 微信SDK应用实例
     * @var
     */
    private $app;

    public function __construct(Application $application){

        $this->app = $application;
    }

    public function users(){
        $openId = $this->app->user->lists()['data']['openid'];
        var_dump($openId);
        //view('admin.wechat.user')->with('users',$users);
    }
}
