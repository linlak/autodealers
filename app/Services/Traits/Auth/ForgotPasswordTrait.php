<?php

namespace App\Services\Traits\Auth;

use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\Services\Traits\MyVariables;

trait ForgotPasswordTrait
{
    use SendsPasswordResetEmails, MyVariables;
    /**
     * Get the needed authentication credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        return [WebConf::getTableClm($request->input('username')) => $request->input('username')];
    }
    /**
     * Validate the email for the given request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function validateEmail(Request $request)
    {
        $this->_validator = Validator::make($request->all(), ['username' => ['required', new AuthUser]]);
    }

    /**
     * Send a reset link to the given user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);

        if ($this->_validator->fails()) {
            $this->getErrs();
            return $this->_showResult();
        }
        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $response = $this->broker()->sendResetLink(
            $this->credentials($request)
        );
        // $v_code = new ActivationCode();
        // $v_code->user_id = $user->id;
        // $vCode = Str::random(6);
        // while (ActivationCode::count()->where('v_code', '=', $vCode)) {
        //     $vCode = Str::random(6);
        // }
        // $v_code->v_code = $vCode;
        // $v_code->expires_at = Date::now()->addHours(24);
        // $v_code->code_type = 'activation';
        // $v_code->save();
        return $response == Password::RESET_LINK_SENT
            ? $this->sendResetLinkResponse($request, $response)
            : $this->sendResetLinkFailedResponse($request, $response);
    }

    /**
     * Get the response for a successful password reset link.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendResetLinkResponse(Request $request, $response)
    {
        $this->_type = "success";
        $this->_success_flag = 1;
        $this->_msg = trans($response);
        return $this->_showResult();
    }

    /**
     * Get the response for a failed password reset link.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        $this->_msg = trans($response);
        return $this->_showResult();
    }
}
