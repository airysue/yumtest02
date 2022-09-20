<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<body>
    HELLO <br>

    <form action="{{ route('search') }}" method="GET" class="">
        <div class="input-group">
            <input type="text" name="search" placeholder="Search" required />
            <button class="btn btn-secondary ml-0 btn-sm" type="submit">Search</button>
        </div>
    </form>


    {{-- 01 最陽春通知 --}}
    {{-- <p style="color:red;">{{ session('mssg') }}</p> --}}

    {{-- 02 bootstrap版通知 --}}
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif

    {{-- 03 sweetalert版通知 --}}




    @foreach ($Registers as $Register)
        {{ $Register->id }}姓名{{ $Register->name }}
        --電子郵件{{ $Register->email }}
        --電話{{ $Register->tel }}
        --性別{{ $Register->sex }}
        --About me{{ $Register->aboutme }}
        --地標{{ $Register->landmark }}<br>
        @php
            if ($Register->landmark !== null) {
                $landmarks = [
                    'tp01' => '北車',
                    'tp02' => '北美館',
                    'tp03' => '故宮',
                    'kh01' => '小港機場',
                    'kh02' => '旗津',
                    'kh03' => '中山大學',
                ];
                //var_dump($landmarks);  exit;      //dd($landmarks);

                echo "地標:\n";
                //echo $landmarks["tp01"];  //exit;
                //echo $landmarks[$Register->landmark]; //exit;

                $landmark_name = $landmarks[$Register->landmark];
            } else {
                $landmarks = [];
            }

        @endphp
        {{ $landmark_name }}<br>




        --嫌棄食物{{ $Register->dislikefood }} {{-- 此作法僅是將資料庫的值直接取出 --}}

        @php
            if ($Register->dislikefood !== null) {
                $dislikefoods = json_decode($Register->dislikefood);
            } else {
                $dislikefoods = [];
            }
        @endphp

        @if ($dislikefoods !== null)
            {{-- 強制轉型的(array)必加，不然會報錯 --}}
            @foreach ((array) $dislikefoods as $key => $value)
                {{ $key }},{{ $value }},&nbsp;
            @endforeach
        @elseif($dislikefoods == null)
            $dislikefoods =[];
        @endif

        <span><a href="{{ route('reg.edit', $Register->id) }}">『Edit this record』</a></span>
        <span><a href="{{ route('reg.show', $Register->id) }}">『Show this record』</a></span>

        <form action="{{ route('reg.destroy', $Register->id) }}" method="post" onclick="return confirm('確定要刪除嗎?')">
            @csrf @method('DELETE')
            <button type="submit">delete</button>
        </form>


        </span><br><br>
    @endforeach

    <br><br>





    <p><a href="{{ Route('reg.create') }}">Add a record</a></p>

    <div class="card-body mb-5 ">
        {{ $Registers->appends(['search' => request()->search])->links('vendor.pagination.bootstrap-4') }}
    </div>


</body>

</html>
