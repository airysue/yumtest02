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
            <form action="{{ route('reg.update', $Register->id) }}" method="POST">
                @csrf
                @method('PUT')

                <h1> Sign Up </h1>

                {{-- ???????????????????????????????????? --}}
                @if (count($errors) > 0)
                    @foreach ($errors->all() as $error)
                        <p class="alert alert-danger">{{ $error }}</p>
                    @endforeach
                @endif



                <fieldset>

                    <legend><span class="number">1</span> ????????????</legend>

                    <label for="name">Name:
                        <span style="color:red;">
                            @error('user_name')
                                {{ $message }}
                            @enderror
                        </span></label>
                    <input type="text" name="user_name" value="{{ $Register->name }}">

                    <label for="email">Email:
                        <span style="color:red;">
                            @error('user_email')
                                {{ $message }}
                            @enderror
                        </span></label>
                    <input type="email" name="user_email" value="{{ $Register->email }}">

                    <label for="tel">Tel:
                        <span style="color:red;">
                            @error('user_tel')
                                {{ $message }}
                            @enderror
                        </span></label>
                    <input type="text" name="user_tel" value="{{ $Register->tel }}">

                    <label>Sex:
                        <span style="color:red;">
                            @error('user_sex')
                                {{ $message }}
                            @enderror
                        </span>
                    </label>
                    <input type="radio" value="male" name="user_sex"
                        {{ $Register->sex == 'male' ? 'checked' : '' }}>
                    <label for="sex" class="light">???</label><br>

                    <input type="radio" value="female" name="user_sex"
                        {{ $Register->sex == 'female' ? 'checked' : '' }}>
                    <label for="sex" class="light">???</label>

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
                    <textarea name="aboutme" value="">{{ $Register->aboutme }}</textarea>



                    <label for="landmark">Landmark:
                        <span style="color:red;">
                            @error('landmark')
                                {{ $message }}
                            @enderror
                        </span></label>
                    <select name="landmark">
                        <option value="">?????????</option>
                        <optgroup label="??????">
                            <option value="tp01" {{ $Register->landmark == 'tp01' ? 'selected' : '' }}>??????</option>
                            <option value="tp02" {{ $Register->landmark == 'tp02' ? 'selected' : '' }}>?????????</option>
                            <option value="tp03" {{ $Register->landmark == 'tp03' ? 'selected' : '' }}>??????</option>

                        </optgroup>
                        <optgroup label="??????">
                            <option value="kh01" {{ $Register->landmark == 'kh01' ? 'selected' : '' }}>????????????
                            </option>
                            <option value="kh02" {{ $Register->landmark == 'kh02' ? 'selected' : '' }}>??????</option>
                            <option value="kh03" {{ $Register->landmark == 'kh03' ? 'selected' : '' }}>????????????
                            </option>
                        </optgroup>

                    </select>

                    <label>??????????????????:
                        <span style="color:red;">
                            @error('dislikefood')
                                {{ $message }}
                            @enderror
                        </span>
                    </label>

                    @php
                        if ($Register->dislikefood !== null) {
                            $dislikefoods = json_decode($Register->dislikefood);
                        } else {
                            $dislikefoods = [];
                        }
                    @endphp

                    <input type="checkbox" value="01??????" name="dislikefood[]"
                        {{ in_array('01??????', (array) $dislikefoods) ? 'checked' : '' }}>
                    <label class="light" for="01??????">01??????</label><br>

                    <input type="checkbox" value="02??????" name="dislikefood[]"
                        {{ in_array('02??????', (array) $dislikefoods) ? 'checked' : '' }}>
                    <label class="light" for="02??????">02??????</label><br>

                    <input type="checkbox" value="03??????" name="dislikefood[]"
                        {{ in_array('03??????', (array) $dislikefoods) ? 'checked' : '' }}>
                    <label class="light" for="03??????">03??????</label><br>

                    <input type="checkbox" value="04??????" name="dislikefood[]"
                        {{ in_array('04??????', (array) $dislikefoods) ? 'checked' : '' }}>
                    <label class="light" for="04??????">04??????</label><br>

                    <input type="checkbox" value="05??????" name="dislikefood[]"
                        {{ in_array('05??????', (array) $dislikefoods) ? 'checked' : '' }}>
                    <label class="light" for="05??????">05??????</label>

                </fieldset>

                <button type="submit">??????</button>

            </form>
        </div>
    </div>

</body>

</html>
