@extends('layouts.app')

@section('third_party_stylesheets')
<style>

    .theatre 
    {
        position: relative;
        top: 0;
        left: 0;
        transform: translate(10px,10px);
        padding: 30px;
    }

    .left .seat,.right .seat {
        width: 42px;
        margin-top: -15px;
        margin-left: 2px;
    }

    .bg-green{
        background-color: rgb(8, 187, 103);
        transform: skew(16deg);
        width: 42px;
        margin-top: -15px;
        margin-left: 2px;
        height: 50px;
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
  
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row my-3">
            <div class="col-12 my-3">
             
              <!-- Main content -->
              <div class="invoice p-3 mb-3">
  
                <!-- this row will not appear when printing -->
                <div class="row  places my-3 my-3 d-block">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header justify-content-between">
                                <h3 class="card-title">
                                   5D  Zaldan yer saylan
                                </h3>

                                <div class="float-right">
                                    <a href="{{route('fiveds_empty')}}" class="btn btn-primary">Yerleri boshat</a>
                                </div>

                            </div>

                            <div class="card-body">
                                <div class="theatre">
                                    <div class="cinema-seats left">

                                      <div class="cinema-row row-1">
                                        
                                        @foreach ($Aspots as $spot)
                                            <div class="{{ $spot->status == '0' ? 'seat' : 'bg-green' }}" data-id={{ $spot->id }}><span>{{ $spot->number }}</span></div>    
                                        @endforeach
                                       
                                      </div>

                                      <div class="cinema-row row-2">
                                            @foreach ($Bspots as $spot)
                                                <div class="{{ $spot->status == '0' ? 'seat' : 'bg-green' }}" data-id="{{$spot->id}}"><span>{{ $spot->number }}</span></div>  
                                            @endforeach
                                      </div>
                                 
                                      <div class="cinema-row row-3">
                                            @foreach ($Cspots as $spot)
                                            <div class="{{ $spot->status == '0' ? 'seat' : 'bg-green' }}" data-id="{{$spot->id}}"><span>{{ $spot->number }}</span></div>  
                                            @endforeach
                                      </div>
                                  
                                      <div class="cinema-row row-4">
                                          @foreach ($Dspots as $spot)
                                            <div class="{{ $spot->status == '0' ? 'seat' : 'bg-green' }}" data-id="{{$spot->id}}"><span>{{ $spot->number }}</span></div>      
                                          @endforeach
                                      </div>

                                      <div class="row mt-5 price_bilet d-none">
                                          <div class="col-md-6">
                                              <div class="form-group">
                                                  <label>Bahasy:</label>
                                                  <input type="number" name="price" id="price" class="form-control" placeholder="bahasyny girin..."/>
                                              </div>
                                          </div>
                                      </div>

                                    </div>

                                    <input type="hidden" id="spot_id"/>

                                </div>
                            </div>

                            <div class="card-footer">
                                <button class="btn btn-primary float-right bilet_al">Bilet al</button>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
        </div>

        <div class="row">
          <div class="col-md-6" id="toprint" style="display:none;">
            {{-- <p style="text-align:center;"><b>Seans nomer:</b><span class="to_print_p"></span></p>
            <p style="text-align:center;"><b>Film ady:</b><span class="to_print_film_name"></span></p> --}}

            <table>
              {{-- <tr>
                <td><b>Seans nomer: </b></td><td><span class="to_print_p"></span></td>
              </tr> --}}
              {{-- <tr>
                <td><b>Film ady: </b></td><td><span class="to_print_film_name"></span></td>
              </tr> --}}
              <tr>
                <td><b>Zaldaky orny: </b></td><td><span class="to_print_spot"></span></td>
              </tr>
              <tr>
                <td><b>Bahasy: </b></td><td><span class="to_print_price"></span></td>
              </tr>
            </table>
          </div>
        </div>
    </div>
@endsection

@section('third_party_scripts')
    <script>
       $('.seans_bilet_btn').on('click', function (e) {
           e.preventDefault();
           $('.places').removeClass('d-none').addClass('d-block');
       });

       $('.cinema-seats .bg-green').on('click', function() {
            var elems = document.querySelectorAll(".cinema-seats .bg-green");
            [].forEach.call(elems, function(el) {
                el.classList.remove("seat");
            });

            $(this).toggleClass('seat');
            console.log($(this).attr('data-id'));

            $('#spot_id').val($(this).attr('data-id'));

            $('.price_bilet').removeClass('d-none').addClass('d-block');
        });
        

        $('.bilet_al').on('click', function (e) {

            var price = $('#price').val();
            var spot_id = $('#spot_id').val();

            e.preventDefault();

            if(spot_id == '') {
                alert('5D zaldan yer saylan');
            } else

            if(price == ''){

                alert('bahasyny girin');
                return;

            } else {
                $.ajax({
                    type:'POST',
                    url:'{{ route('fiveds.store') }}',

                    data:{
                        price:price,
                        spot_id:spot_id,
                        _token: "{{ csrf_token() }}",
                    },
                    success:function(data) {
                        console.log(data);
                      $('#toprint').css('display','block');
                      $('.to_print_spot').text('5D zal, '+data.spot.number);
                      $('.to_print_price').text(data.fived.price+' TMT');
                      
                        //console.log(data.booking.booking_number);
                       // window.print();
                       var divToPrint=document.getElementById("toprint");
                        newWin= window.open("");
                        newWin.document.write(divToPrint.outerHTML);
                        newWin.print();
                        newWin.close();
                    $('#toprint').css('display','none');
                      
                    },
                    error: function (err) {
                        console.log(err);
                    }
                });
            }


         
        });

    </script>
@endsection
