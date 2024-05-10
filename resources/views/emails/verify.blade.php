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
                    IMPORTANT, verification of your email address
                </p>
            </td>
        </tr>
        <tr>
            <td>
                Hello {{$details['firstname']}} {{$details['lastname']}}
                <p>
                    The aim of this message is to verify that the email address linked to your future account is valid.
                    It is indeed crucial that this data is reliable so that you can be contacted you or notified you in
                    the context of the use of the Appointment service.
                </p>
                <p>
                    To answer to our verification request and confirm the validity of the email address linked to your
                    futur account, please click on the below link :
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <a href="{{ route('admin.verify', $details['token'])}}"
                    class="btn">{{ __('Click here to continue registration') }}
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