<?php

namespace App\Http\Requests\Site;

use App\Http\Requests\AbstractRequest;
use TimeHunter\LaravelGoogleReCaptchaV3\Validations\GoogleReCaptchaV3ValidationRule;

/**
 * Class SubscribeRequest
 * @package App\Http\Requests\Site
 */
class SubscribeRequest extends AbstractRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
			'email' => 'required|string|unique:subscribes|email|max:255',
            'g-recaptcha-response' => [new GoogleReCaptchaV3ValidationRule('subscribe')]
        ];
    }
}
