<?php

namespace Codehappy\Captcha;

use App\Http\Controllers\Controller;

class CaptchaController extends Controller
{
	public function getIndex()
	{
		// $captcha = new Captcha();

		// return $captcha->make();

		return app('captcha')->make();
	}
}