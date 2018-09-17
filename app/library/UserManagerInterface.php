<?php

namespace Lib;

interface UserManagerInterface
{
    public function __construct(MailerInterface $mailer);
    public function register($email, $password);
}
