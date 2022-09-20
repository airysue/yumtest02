<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Form</title>
    <link rel="stylesheet" href="https://codepen.io/gymratpacks/pen/VKzBEp#0">
    <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/main.css">

    <style>
        *,
        *:before,
        *:after {
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        body {
            font-family: 'Nunito', sans-serif;
            color: #384047;
        }

        form {
            max-width: 300px;
            margin: 10px auto;
            padding: 10px 20px;
            background: #f4f7f8;
            border-radius: 8px;
        }

        h1 {
            margin: 0 0 30px 0;
            text-align: center;
        }

        input[type="text"],
        input[type="password"],
        input[type="date"],
        input[type="datetime"],
        input[type="email"],
        input[type="number"],
        input[type="search"],
        input[type="tel"],
        input[type="time"],
        input[type="url"],
        textarea,
        select {
            background: rgba(255, 255, 255, 0.1);
            border: none;
            font-size: 16px;
            height: auto;
            margin: 0;
            outline: 0;
            padding: 15px;
            width: 100%;
            background-color: #e8eeef;
            color: #8a97a0;
            box-shadow: 0 1px 0 rgba(0, 0, 0, 0.03) inset;
            margin-bottom: 30px;
        }

        input[type="radio"],
        input[type="checkbox"] {
            margin: 0 4px 8px 0;
        }

        select {
            padding: 6px;
            height: 32px;
            border-radius: 2px;
        }

        button {
            padding: 19px 39px 18px 39px;
            color: #FFF;
            background-color: #4bc970;
            font-size: 18px;
            text-align: center;
            font-style: normal;
            border-radius: 5px;
            width: 100%;
            border: 1px solid #3ac162;
            border-width: 1px 1px 3px;
            box-shadow: 0 -1px 0 rgba(255, 255, 255, 0.1) inset;
            margin-bottom: 10px;
        }

        fieldset {
            margin-bottom: 30px;
            border: none;
        }

        legend {
            font-size: 1.4em;
            margin-bottom: 10px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        label.light {
            font-weight: 300;
            display: inline;
        }

        .number {
            background-color: #5fcf80;
            color: #fff;
            height: 30px;
            width: 30px;
            display: inline-block;
            font-size: 0.8em;
            margin-right: 4px;
            line-height: 30px;
            text-align: center;
            text-shadow: 0 1px 0 rgba(255, 255, 255, 0.2);
            border-radius: 100%;
        }

        @media screen and (min-width: 480px) {

            form {
                max-width: 480px;
            }

        }
    </style>


</head>

<body>
    <div class="row">
        <div class="col-md-12">
            <form action="/reg" method="POST">
                @csrf
                <h1> Sign Up </h1>

                {{-- 一次顯示所有錯誤驗證訊息 --}}
                @if (count($errors) > 0)
                        @foreach ($errors->all() as $error)
                        <p class="alert alert-danger">{{ $error }}</p>
                        @endforeach
                @endif



                <fieldset>

                    <legend><span class="number">1</span> 基本資料</legend>

                    <label for="name">Name:
                        <span style="color:red;">
                            @error('user_name')
                                {{ $message }}
                            @enderror
                        </span></label>
                    <input type="text" name="user_name" value="{{ old('user_name') }}" >

                    <label for="email">Email:
                        <span style="color:red;">
                            @error('user_email')
                                {{ $message }}
                            @enderror
                        </span></label>
                    <input type="email" name="user_email" value="{{ old('user_email') }}" >

                    <label for="tel">Tel:
                        <span style="color:red;">
                            @error('user_tel')
                                {{ $message }}
                            @enderror
                        </span></label>
                    <input type="text" name="user_tel" value="{{ old('user_tel') }}" >

                    <label>Sex:
                        <span style="color:red;">
                            @error('user_sex')
                                {{ $message }}
                            @enderror
                        </span>
                    </label>
                    <input type="radio" value="male" name="user_sex"
                    @if (old('user_sex') == 'male') checked @endif >
                    <label for="sex" class="light">男</label><br>
                    <input type="radio" value="female" name="user_sex"
                    @if (old('user_sex') == 'female') checked @endif >
                    <label for="sex" class="light">女</label>

                </fieldset>
                <fieldset>

                    <legend><span class="number">2</span>aboutme</legend>

                    <label for="aboutme">About me:
                        <span style="color:red;">
                            @error('aboutme')
                                {{ $message }}
                            @enderror
                        </span>
                    </label>
                    <textarea name="aboutme" value="">{{ old('aboutme') }}</textarea>



                    <label for="landmark">Landmark:
                        <span style="color:red;">
                            @error('landmark')
                                {{ $message }}
                            @enderror
                        </span></label>
                    <select name="landmark">
                        <option value="">請選擇</option>
                        <optgroup label="北市">
                            <option value="tp01" {{ old('landmark') == 'tp01' ? 'selected' : '' }} >北車</option>
                            <option value="tp02" {{ old('landmark') == 'tp02' ? 'selected' : '' }} >北美館</option>
                            <option value="tp03" {{ old('landmark') == 'tp03' ? 'selected' : '' }} >故宮</option>

                        </optgroup>
                        <optgroup label="高雄">
                            <option value="kh01" {{ old('landmark') == 'kh01' ? 'selected' : '' }} >小港機場</option>
                            <option value="kh02" {{ old('landmark') == 'kh02' ? 'selected' : '' }} >旗津</option>
                            <option value="kh03" {{ old('landmark') == 'kh03' ? 'selected' : '' }} >中山大學</option>
                        </optgroup>

                    </select>

                    <label>不愛吃的食物:
                        <span style="color:red;">
                            @error('dislikefood')
                                {{ $message }}
                            @enderror
                        </span>
                    </label>

                    <input type="checkbox" value="01芹菜" name="dislikefood[]"
                    @if (is_array(old('dislikefood')) && in_array('01芹菜', old('dislikefood'))) checked @endif>
                    <label class="light" for="01芹菜">01芹菜</label><br>

                    <input type="checkbox" value="02香菜" name="dislikefood[]"
                    @if (is_array(old('dislikefood')) && in_array('02香菜', old('dislikefood'))) checked @endif>
                    <label class="light" for="02香菜">02香菜</label><br>

                    <input type="checkbox" value="03苦瓜" name="dislikefood[]"
                    @if (is_array(old('dislikefood')) && in_array('03苦瓜', old('dislikefood'))) checked @endif>
                    <label class="light" for="03苦瓜">03苦瓜</label><br>

                    <input type="checkbox" value="04茄子" name="dislikefood[]"
                    @if (is_array(old('dislikefood')) && in_array('04茄子', old('dislikefood'))) checked @endif>
                    <label class="light" for="04茄子">04茄子</label><br>

                    <input type="checkbox" value="05青椒" name="dislikefood[]"
                    @if (is_array(old('dislikefood')) && in_array('05青椒', old('dislikefood'))) checked @endif>
                    <label class="light" for="05青椒">05青椒</label>

                </fieldset>

                <button type="submit">完成</button>

            </form>
        </div>
    </div>

</body>

</html>
