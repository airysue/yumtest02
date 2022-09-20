                        <h4 class="card-title">{{ $Register->name }}個人小檔案</h4>

                            <p class="base">姓名 {{ $Register->name }}</p>
                            <p class="type">電子郵件 {{ $Register->email }}</p>

                            <p class="base">性別 - {{ $Register->sex }}</p>

                                      @php
              if($Register->landmark!==null){

              $landmarks = [
                  'tp01' => '北車',
                  'tp02' => '北美館',
                  'tp03' => '故宮',
                  'kh01' => '小港機場',
                  'kh02' => '旗津',
                  'kh03' => '中山大學',
              ];
              //var_dump($landmarks);  exit;      //dd($landmarks);

              echo("地標:\n");
              //echo $landmarks["tp01"];  //exit;
              //echo $landmarks[$Register->landmark]; //exit;

              $landmark_name = $landmarks[$Register->landmark];
              }
              else{  $landmarks =[];}

          @endphp
              {{ $landmark_name }}<br>

              <p class="base">地標 - {{ $Register->landmark }}</p>

                        <a href="/reg" class="btn btn-primary">Back to HOME</a>
