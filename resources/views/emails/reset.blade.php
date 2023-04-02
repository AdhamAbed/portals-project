<!doctype html>
<html >
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Reset Password</title></head>
<style>
    *{
        margin:0;
        padding:0;
        text-decoration:none;
    }



    td {
        padding: 10px 0;
    }

    #divall{
        width: 70%;
        margin: auto;
    }

    @media only screen and (max-width: 720px)
    {
        #divall{
            width: auto;
            margin: auto;
        }
    }

</style>

<body>

<div style="background-color: #005392;padding: 21px;width:auto;direction: {{app()->getLocale() == 'ar' ? 'rtl' : 'ltr'}};font-family:Arial, Helvetica, sans-serif;font-size: large;">
    <table width="100%" id="table" bgcolor="ffffff" align="center" style="padding: 21px;margin: auto;text-align: right;">
        <tr>
            <td style="text-align: center"><img src="{{$message->embed(url(assets('website')).'/img/logo.png')}}" style="max-width:24%; height: auto;" alt="الأقصى الرياضي" title="الأقصى الرياضي" border="0"></td>
        </tr>

        <tr>
            <td style="color: #005392;"><center>{{__('cp.Welcome To') . $name}}</center></td>
        </tr>

        <tr>
            <td style="color: #74657b;"><center>{{$user['first_name'].' '.$user['last_name']}}</center> </td>
        </tr>



        <tr>
            <td style="color:#005392;text-align: {{app()->getLocale() == 'ar' ? 'right' : 'left'}}">
                {{__('cp.If you have requested to change password please')}}
                <a  href="{{route('user.changePassword',['forgetCode'=>$hiddenCode, 'email'=>$user['email']])}}" target="_blank">
                    <br>
                    <b>
                    {{__('cp.click here')}}
                    </b>
                    <br>
                </a>
                {{__('cp.to reset your account password or ignore this message thank you ...')}}
            </td>
        </tr>

    </table>
</div>
</body>

</html>
