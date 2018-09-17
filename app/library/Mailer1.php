<?php 

namespace Lib;

class Mailer1 implements MailerInterface
{
    public function mail($recipient, $content)
    {
        echo __FILE__;
        var_dump(func_get_args());
    }
}
