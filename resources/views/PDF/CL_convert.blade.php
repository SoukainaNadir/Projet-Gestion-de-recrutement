<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> PDF</title>
</head>
<body>
    @foreach (auth()->user()->coverletters as $coverletter )
            <div>
                    <div>
                    <h1 >{{ $coverletter->name }}</h1>
                    <div >{{ $coverletter->headline }}</div>
                    </div>
                    <hr/>
                    <div >
                    <i ></i>
                    <div >{{ $coverletter->phone }}</div>
                    </div>
                    <div>
                    <i></i>
                    <div >{{ $coverletter->email }}</div>
                    </div>
                    <div>
                    <i></i>
                    <div >{{ $coverletter->address }}</div>
                    </div>
                    <hr/>
                    <div>
                        <div >Object:</div>
                        <div >&nbsp; {{ $coverletter->object }}</div>
                    </div>
                    <div>
                        <div >{{ $coverletter->content}}</div>
                    </div>
                    <h3 >{{ $coverletter->name }}</h3>
            </div>
        @endforeach
</body>

</html>
