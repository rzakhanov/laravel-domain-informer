<!DOCTYPE html>
<html>
<head>
    <title>Get information about domain</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <style>
        html, body {
            display: flex;
            justify-content: center;
            height: 100%;
        }
        body, div, h1, form, input, p {
            padding: 0;
            margin: 0;
            outline: none;
            font-family: Roboto, Arial, sans-serif;
            font-size: 16px;
            color: #666;
        }
        h1 {
            padding: 10px 0;
            font-size: 22px;
            font-weight: 300;
            text-align: center;
        }
        p {
            font-size: 12px;
        }
        hr {
            color: #a9a9a9;
            opacity: 0.3;
        }
        .main-block {
            max-width: 450px;
            min-height: 160px;
            padding: 10px 0;
            margin: auto;
            border-radius: 5px;
            border: solid 1px #ccc;
            box-shadow: 1px 2px 5px rgba(0,0,0,.31);
            background: #ebebeb;
        }
        form {
            margin: 0 30px;
        }
        .account-type, .gender {
            margin: 15px 0;
        }
        input[type=radio] {
            display: none;
        }
        label#icon {
            margin: 0;
            border-radius: 5px 0 0 5px;
        }
        label.radio {
            position: relative;
            display: inline-block;
            padding-top: 4px;
            margin-right: 20px;
            text-indent: 30px;
            overflow: visible;
            cursor: pointer;
        }
        label.radio:before {
            content: "";
            position: absolute;
            top: 2px;
            left: 0;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: #1c87c9;
        }
        label.radio:after {
            content: "";
            position: absolute;
            width: 9px;
            height: 4px;
            top: 8px;
            left: 4px;
            border: 3px solid #fff;
            border-top: none;
            border-right: none;
            transform: rotate(-45deg);
            opacity: 0;
        }
        input[type=radio]:checked + label:after {
            opacity: 1;
        }
        input[type=text], input[type=password] {
            width: calc(100% - 57px);
            height: 36px;
            margin: 13px 0 0 -5px;
            padding-left: 10px;
            border-radius: 0 5px 5px 0;
            border: solid 1px #cbc9c9;
            box-shadow: 1px 2px 5px rgba(0,0,0,.09);
            background: #fff;
        }
        input[type=password] {
            margin-bottom: 15px;
        }
        #icon {
            display: inline-block;
            padding: 9.3px 15px;
            box-shadow: 1px 2px 5px rgba(0,0,0,.09);
            background: #1c87c9;
            color: #fff;
            text-align: center;
        }
        .btn-block {
            margin-top: 10px;
            text-align: center;
        }
        button {
            width: 100%;
            padding: 10px 0;
            margin: 10px auto;
            border-radius: 5px;
            border: none;
            background: #1c87c9;
            font-size: 14px;
            font-weight: 600;
            color: #fff;
        }
        button:hover {
            background: #26a9e0;
        }

        .content-info{
            width: 90%;
            margin: auto;
            padding: 2%;
            background: #ddd;
            font-size: 13px;
        }

        .content-info .error{
            color:darkred;
            display: block;
            text-align: center;
        }

        .content-info .success{
            font: 11px;
            color: green;
            display: block;
            padding: 3px;
            margin-top: 3px;
            width: 100%;
            overflow-wrap: anywhere;
            background: #bfd3cb;
        }
    </style>
</head>
<body>
<div class="main-block">
    <h1>Domain info</h1>
    @if(isset($errors))
        <div class="content-info">
            @foreach($errors as $error)
                <span class="error"> {{$error}} </span>
            @endforeach
        </div>
    @endif
    @if(isset($data))
        <div class="content-info">
            @foreach($data as $key => $datum)
                <span class="success">
                    @if(!is_numeric($key))
                    <b>{{$key}}</b>:
                    @endif
                    {{$datum}}</span>
            @endforeach
        </div>
    @endif

    <form action="{{route('domainInformer.check')}}" method="post">
        <hr>
        <label id="icon" for="domain"><i class="fas fa-server"></i></label>
        <input type="text" name="domain" id="domain" value="{{request()->post('domain')}}" placeholder="https://example.com" required/>
        <hr>
       {{-- <div class="gender">
            <input type="radio" value="none" id="male" name="gender" checked/>
            <label for="male" class="radio">Male</label>
            <input type="radio" value="none" id="female" name="gender" />
            <label for="female" class="radio">Female</label>
        </div>--}}
        <div class="btn-block">
            <p>Click and start checking</p>
            <button type="submit">Check for domain</button>
        </div>
    </form>
</div>
</body>
</html>
