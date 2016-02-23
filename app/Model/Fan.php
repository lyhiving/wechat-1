<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Fan extends Model
{
    protected $table = 'fans';

    protected $fillable = ['groupid','openid','nickname','sex','language','city','province','country','headimgurl','unionid','subscribe_time'];

    /**
     * 日期修改器
     * @param $value
     */
    public function setSubscribeTimeAttribute($value){
        $this->attributes['subscribe_time'] = date('Y-m-d H:i:s',$value);
    }
}
