<?php

namespace Redbastie\Tailwire;

use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Notifications\Notifiable;
use Redbastie\Tailwire\Traits\HashesPasswords;

class Authenticatable extends Model implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract
{
    use Notifiable, \Illuminate\Auth\Authenticatable, Authorizable, CanResetPassword, MustVerifyEmail, HashesPasswords;
}
