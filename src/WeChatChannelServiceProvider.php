<?php
/**
 * This is NOT a freeware, use is subject to license terms
 * @copyright Copyright (c) 2010-2099 Jinan Larva Information Technology Co., Ltd.
 * @link http://www.larva.com.cn/
 * @license http://www.larva.com.cn/license/
 */

namespace Larva\WeChat\Notifications;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Notification;

/**
 * 微信通知渠道
 *
 * @author Tongle Xu <xutongle@gmail.com>
 */
class WeChatChannelServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $channels = [
            'wechat' => OfficialAccountChannel::class,
            'wechatMiniProgram' => MiniProgramChannel::class
        ];
        foreach ($channels as $name => $className) {
            Notification::extend($name, function () use ($className) {
                return new $className;
            });
        }
    }
}