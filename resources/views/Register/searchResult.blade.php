                @if ($Registers->isNotEmpty())
                    @foreach ($Registers as $Register)
                        <div class="card mt-5">

                            <div class="card-body">
                                <h4 class="card-title"> 編號：{{ $Register->id }}--{{ $Register->name }}</h4>
                                  關於我 {{ $Register->aboutme }}<br>
                                  討厭的食物{{ $Register->dislikefood }}</p><br><br>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div>
                        <h4>找不到資料</h4>
                    </div>
                @endif
<a href="/reg"  >Back to HOME</a>
