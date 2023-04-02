<html>
<head>

    <style>
        .text-center{
            text-align: center;
        }
        *{
            font-family: "Montserrat-Arabic-Medium";
            font-size: 18px;;
        }
    </style>
</head>
<body class="text-center" style="padding: 50px 40px 40px 50px; border: 1px rgba(0,0,0,0.12) solid;background-color:  #ffffff;">
<div style="padding: 2px; border: 1px #f5f5f5 solid;background-color:  #e7ecf1;">
    <h4>{{__('cp.name')}}: </h4> <h2 style="color: #0a6aa1; text-align: center;">{{$data->name}}</h2>
    <h4>{{__('cp.mobile')}}: </h4> <h2 style="color: #0a6aa1; text-align: center;">{{$data->email}}</h2>
    <h4>{{__('cp.email')}}: </h4> <h2 style="color: #0a6aa1; text-align: center;">{{$data->phone}}</h2>
    <h4>{{__('cp.answer')}}: </h4><p>{!! $answer !!}</p>


{{--    <p>{{__('cp.name')}}: &nbsp;  {{$data->name}}</p>--}}
{{--    <p>{{__('cp.mobile')}}: &nbsp;  {{$data->phone}}</p>--}}
{{--    <p>{{__('cp.email')}}: &nbsp;  {{$data->email}}</p>--}}
{{--    <p>{{__('cp.answer')}}: &nbsp; {{$answer}}</p>--}}
</div>

</body>
</html>

