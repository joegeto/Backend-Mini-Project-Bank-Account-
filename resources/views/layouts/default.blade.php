@section('content')
<head>
    <title>MicroBank Transaction</title>
{{--{{HTML::style('http://maxcdn.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css')}}--}}
<link rel="stylesheet" href="{{asset('css/myapp.css')}}">
</head>
<body>
<div>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ URL::to('attends') }}">MicroBank</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('microbank/bankbalance') }}">Bank A/c Balance</a></li>
            <li><a href="{{ URL::to('microbank/bankdeposit') }}">Make Deposit</a>
            <li><a href="{{ URL::to('microbank/bankwithdrawal') }}">Make Withdrawal</a></li>
        </ul>
    </nav>
</div>
@yield('content')

{{--{{HTML::script('http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js')}}--}}
{{--{{HTML::script('http://maxcdn.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js')}}--}}
@stop