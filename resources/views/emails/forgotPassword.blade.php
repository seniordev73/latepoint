<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="format-detection" content="Bollore" />
    <meta name="format-detection" content="Bollore" />
    <meta name="format-detection" content="Bollore" />
    <meta name="x-apple-disable-message-reformatting" />
    <title>::Welcome::</title>
</head>

<body
    style="padding: 20px; margin: 0; box-sizing: border-box; background: #ffffff; font-family: 'Proxima Nova Regular';">
    <table cellpadding="0" cellspacing="0" border="0" bgcolor="#fbfbfb">
        <tr>
            <td>
                <p style="color:#000; font-family:Arial; font-size:15pt;">
                    Forgot your password?
                </p>
            </td>
        </tr>
        <tr>
            <td>
                Hello
                <p>
                    You are receiving this email because a password change has been requested on our site for the
                    account associated with your email address.
                </p>
                <p>
                    If you are the originator of this request, and if you still agree to obtain a new password, you will
                    be redirected to a secure page by clicking on the link below:
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <a href="{{ route('admin.password.reset', $token)}}"
                    class="btn">{{ __('Click here to reset password') }}
                </a>
            </td>
        </tr>
        <tr>
            <td>
                <p>
                    We advise that you do it as soon as possible, as the link is only valid for 48 hours.
                </p>


                Best regards,
                <br />
                Customer Service
                <br />

            </td>
        </tr>
        <tr>
            <td>
                ©
                <?= date("Y"); ?> <b style="font-family: 'Multicolore';">{{ config('app.name', 'Appointment') }}
                    -</b>
                {{ __('All rights reserved')}}
                </p>
            </td>

        <tr>
            <td height="12"></td>
        </tr>
    </table>
</body>

</html>