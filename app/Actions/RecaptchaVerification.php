<?php

namespace App\Actions;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use ReCaptcha\ReCaptcha as GoogleRecaptcha;

class RecaptchaVerification
{
  public function __invoke(Request $request, Closure $next)
  {

    $recaptcha = new GoogleRecaptcha(env("RECAPTCHA_SECRET_KEY"));
    $res = $recaptcha->setExpectedHostname(env("SESSION_DOMAIN"))
      ->verify($request["g-recaptcha-response"], $request->ip());

    if ($res->isSuccess()) {
      return $next($request);
    } else {
      return response($res->getErrorCodes(), 400);
    }
  }
}
