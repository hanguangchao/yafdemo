<?php

use function DI\create;
use function DI\get;

return [
    //1、接口映射
    \Lib\MailerInterface::class => DI\create(\Lib\Mailer1::class),

    //2、直接配置
    // \Lib\UserManager::class => DI\factory(function () {
    //     return new \Lib\UserManager(new \Lib\Mailer());
    // }),

];
