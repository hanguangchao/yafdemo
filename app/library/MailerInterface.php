<?php

namespace Lib;

interface MailerInterface
{
    public function mail($recipient, $content);
}
