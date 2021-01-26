<?php

namespace Redbastie\Tailwire\Rules;

use Illuminate\Contracts\Validation\Rule;
use ReCaptcha\ReCaptcha;

class RecaptchaRule implements Rule
{
    public function passes($attribute, $value)
    {
        $recaptcha = new ReCaptcha(config('services.recaptcha.secret_key'));

        return $recaptcha->verify($value, request()->ip())->isSuccess();
    }

    public function message()
    {
        return trans('The recaptcha response is invalid.');
    }
}
