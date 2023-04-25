<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> PDF</title>
</head>
<body>
    @foreach (auth()->user()->cvs as $cv)
        <div>
                <div >
                <h2 >{{ $cv->name }}</h2>
                <div >{{ $cv->headline }}</div>
                <div >
                   
                </div>
                </div>
                <div >{{ $cv->profil }}</div>
                <div >
                <i ></i>
                <div >{{ $cv->phone }}</div>
                </div>
                <div ">
                <i></i>
                <div>{{ $cv->email }}</div>
                </div>
                <div>
                <i ></i>
                <div >{{ $cv->address }}</div>
                </div>
                <hr />
                <div>
                    <div >
                        <div>Education</div>
                        <ul >
                            @foreach (explode("\n", $cv->education) as $education)
                                <li>{{ $education }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div >
                        <div >Experience</div>
                        <ul>
                            @foreach (explode("\n", $cv->experience) as $experience)
                                <li>{{ $experience }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <hr />
                <div >
                <div >
                    <div >Skills</div>
                    <ul>
                        @foreach (explode("\n", $cv->skills) as $skill)
                            <li>{{ $skill }}</li>
                        @endforeach
                    </ul>
                </div>
                <div >
                    <div >Languages</div>
                    <ul>
                        @foreach (explode("\n", $cv->languages) as $languages)
                            <li>{{ $languages }}</li>
                        @endforeach
                    </ul>
                </div>
                <div >
                    <div >Interests</div>
                    <ul>
                        @foreach (explode("\n", $cv->interests) as $interest)
                            <li>{{ $interest }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endforeach
</body>

</html>
