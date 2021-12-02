<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $seanse->seans_number }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="{{asset('css/all.css')}}" rel="stylesheet">


    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <style>
        .container-fluid
        {
             display: table-cell;
             height: 100vh;
             width: 100vw !important;
             vertical-align: middle;
        }

        .theatre 
    {
        position: relative;
        top: 0;
        left: 0;
        transform: translate(10px,10px);
        padding: 30px;
        text-align: center;
        justify-content: center;
    }

    .left .seat,.right .seat {
        width: 7rem;
        margin-top: -15px;
        margin-left: 2px;
        height: 7rem;
    }

    .bg-green{
        background-color: rgb(8, 187, 103);
        transform: skew(16deg);
        width: 7rem;
        height: 7rem;
        margin-top: -15px;
        margin-left: 2px;
        /* height: 50px; */
        border-radius: 7px;
        box-shadow: 0 0 5px rgb(0 0 0 / 50%);
    }

    .cinema-seats .bg-green span {
        padding: 10px;
        color: #fff;
        font-weight: bold;
    }

    .cinema-seats{
        display: block;
    }

    .left .cinema-row {
        display: flex;
    }

    .cinema-seats .bg-green {
        cursor: pointer;
    }

    .cinema-seats .bg-green:hover {
        background-color: rgb(131, 128, 128) !important;
    }
     </style>

    @yield('third_party_stylesheets')

    @stack('page_css')
</head>

<body>
    <div class="container-fluid">
        {{-- <div class="row">
            <div class="col-10 offset-1">
                <div class="card shadow">
                    
                    <div class="card-header bg-danger text-white">
                        <h2>Login</h2>
                    </div>

                    <div class="card-body">
                        <form action="">
                            <div class="form-group row">
                                <label for="txtemail" class="col-form-label col-sm-2">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" name="txtemail" id="txtemail" class="form-control" required />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="txtpassword" class="col-form-label col-sm-2">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" name="txtpassword" id="txtpassword" class="form-control"
                                        required />
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-danger btn-block">Login</button>
                                <button class="btn btn-warning btn-block">clear all</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div> --}}

        <div class="row  places my-3 my-3 d-block">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex">
                        <h3 class="card-title">
                           {{ $seanse->seans_number }}
                        </h3>
                    </div>

                    <div class="card-body">
                        <div class="theatre">
                            <div class="cinema-seats left">

                              <div class="cinema-row row-1">
                                @foreach ($Aspots as $spot)
                                    <div class="{{ in_array($spot->id, $booking_ids) ? 'seat' : 'bg-green' }}" data-id={{ $spot->id }}><span>{{ $spot->number }}</span></div>    
                                @endforeach
                               
                              </div>

                              <div class="cinema-row row-2">
                                    @foreach ($Bspots as $spot)
                                        <div class="{{ in_array($spot->id, $booking_ids) ? 'seat' : 'bg-green' }}" data-id="{{$spot->id}}"><span>{{ $spot->number }}</span></div>  
                                    @endforeach
                              </div>
                         
                              <div class="cinema-row row-3">
                                    @foreach ($Cspots as $spot)
                                    <div class="{{ in_array($spot->id, $booking_ids) ? 'seat' : 'bg-green' }}" data-id="{{$spot->id}}"><span>{{ $spot->number }}</span></div>  
                                    @endforeach
                              </div>
                          
                              <div class="cinema-row row-4">
                                  @foreach ($Dspots as $spot)
                                    <div class="{{ in_array($spot->id, $booking_ids) ? 'seat' : 'bg-green' }}" data-id="{{$spot->id}}"><span>{{ $spot->number }}</span></div>      
                                  @endforeach
                              </div>
                            </div>

                            <input type="hidden" id="spot_id"/>

                            {{-- <div class="cinema-seats right">
                              <div class="cinema-row row-1">
                                <div class="seat"><span>A1</span></div>
                                <div class="seat"><span>A1</span></div>
                                <div class="seat"><span>A1</span></div>
                                <div class="seat"><span>A1</span></div>
                                <div class="seat"><span>A1</span></div>
                                <div class="seat"><span>A1</span></div>
                                <div class="seat"><span>A1</span></div>
                              </div>
                          
                              <div class="cinema-row row-2">
                                <div class="seat"><span>A1</span></div>
                                <div class="seat"><span>A1</span></div>
                                <div class="seat"><span>A1</span></div>
                                <div class="seat"><span>A1</span></div>
                                <div class="seat"><span>A1</span></div>
                                <div class="seat"><span>A1</span></div>
                                <div class="seat"><span>A1</span></div>
                              </div>
                          
                              <div class="cinema-row row-3">
                                <div class="seat"><span>A1</span></div>
                                <div class="seat"><span>A1</span></div>
                                <div class="seat"><span>A1</span></div>
                                <div class="seat"><span>A1</span></div>
                                <div class="seat"><span>A1</span></div>
                                <div class="seat"><span>A1</span></div>
                                <div class="seat"><span>A1</span></div>
                              </div>
                          
                              <div class="cinema-row row-4">
                                <div class="seat"><span>A1</span></div>
                                <div class="seat"><span>A1</span></div>
                                <div class="seat"><span>A1</span></div>
                                <div class="seat"><span>A1</span></div>
                                <div class="seat"><span>A1</span></div>
                                <div class="seat"><span>A1</span></div>
                                <div class="seat"><span>A1</span></div>
                              </div>
                          
                              <div class="cinema-row row-5">
                                <div class="seat"><span>A1</span></div>
                                <div class="seat"><span>A1</span></div>
                                <div class="seat"><span>A1</span></div>
                                <div class="seat"><span>A1</span></div>
                                <div class="seat"><span>A1</span></div>
                                <div class="seat"><span>A1</span></div>
                                <div class="seat"><span>A1</span></div>
                              </div>
                          
                              <div class="cinema-row row-6">
                                <div class="seat"><span>A1</span></div>
                                <div class="seat"><span>A1</span></div>
                                <div class="seat"><span>A1</span></div>
                                <div class="seat"><span>A1</span></div>
                                <div class="seat"><span>A1</span></div>
                                <div class="seat"><span>A1</span></div>
                                <div class="seat"><span>A1</span></div>
                              </div>
                          
                              <div class="cinema-row row-7">
                                <div class="seat"><span>A1</span></div>
                                <div class="seat"><span>A1</span></div>
                                <div class="seat"><span>A1</span></div>
                                <div class="seat"><span>A1</span></div>
                                <div class="seat"><span>A1</span></div>
                                <div class="seat"><span>A1</span></div>
                                <div class="seat"><span>A1</span></div>
                              </div>
                            </div>  --}}
                        </div>

                        <div class="d-flex">
                          <div class="btn btn-primary m-auto btn-block" style="pointer-events: none; max-width:900px;font-size:30px;">Ekran</div>
                        </div>
                    </div>

                    {{-- <div class="card-footer">
                        <button class="btn btn-primary float-right bilet_al">Bilet al</button>
                    </div> --}}
                </div>
            </div>
        </div>

    </div>



<script src="{{ mix('js/app.js') }}" defer></script>
<script src="{{asset('js/jquery.js')}}"></script>
    <script>
        @if($errors->any() || session('success') || session('error') || session('warning') || session('danger'))
        setTimeout(function () {
            $('#messages').fadeOut('slow');
        }, 5000);
        @endif
    </script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

@yield('third_party_scripts')

@stack('page_scripts')
</body>
</html>
