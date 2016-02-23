<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use EasyWeChat\Foundation\Application;
use App\Model\Fan;

/**
 * 微信消息入口,处理各类七七八八的消息和事件
 * Class IndexController
 * @package App\Http\Controllers
 */
class IndexController extends Controller{
    private $app;
    private $message;
    private $server;

    public function __construct(Application $application){
        $this->app = $application;
        $this->server = $this->app->server;
    }

    public function index(){
        $this->server->setMessageHandler([$this,'handler']);
        $this->server->serve()->send();
    }

    /**
     * 消息处理
     * @param $message
     * @return $msg
     */
    public function handler($message){
        $this->message = $message;
        switch($this->message->MsgType){
            case 'event':
                return $this->handleEvent();
            default:
                break;
        }
    }

    /**
     * 处理事件
     */
    private function handleEvent(){
        switch($this->message->Event){
            case 'subscribe':   //关注
                return $this->handleSubscribe();
                break;
            case 'unsubscribe':     //取消关注
                $this->handleUnSubscribe();
                break;
            default:
                break;
        }
    }

    /**
     * 处理关注事件
     */
    private function handleSubscribe(){
        $user = $this->getUser($this->message->FromUserName);
        Fan::create($user->toArray());
        //return $user->toJSON();   //关注消息回复
    }

    /**
     * 处理取消关注事件
     */
    private function handleUnSubscribe(){
        $user = $this->getUser($this->message->FromUserName);
        Fan::where('openid',$user->openid)->delete();
    }

    /**
     * 根据openId获取用户实例
     * @param $openId
     */
    private function getUser($openId){
        return $this->app->user->get($openId);
    }

}
