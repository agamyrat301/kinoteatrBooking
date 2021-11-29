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
                <!-- title row -->
                <div class="row">
                  <div class="col-12">
                    <h4>
                      <i class="fas fa-globe"></i> Seans maglumatlary
                      <small class="float-right">{{ $seanse->seans_number }}</small>
                    </h4>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row invoice-info my-3">
               
                 
                  <div class="col-sm-4 invoice-col">
                    {{-- <b>Invoice #007612</b><br> --}}
                    <b>Film ady:</b> {{ $seanse->film_name }}<br>
                    <b>baslayan wagty:</b> {{ date('d/m/Y H:i', strtotime($seanse->start_date)) }}<br>
                    <b>Dowamlylygy:</b> {{ $seanse->duration }}
                  </div>

                  <div class="col-sm-4 invoice-col">
                    {{-- <b>Invoice #007612</b><br> --}}
                    <b>Bahasy:</b> {{ $seanse->price }} TMT<br>
                    <b>Haysy zalda:</b> {{ $seanse->hall =='3d1' ? '1nji zal 3D' : '2nji zal 3D' }}<br>
                    {{-- <b>Account:</b> 968-34567 --}}
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
  
                <!-- Table row -->
                <div class="row">
                  <div class="col-12 table-responsive">
                    {{-- <table class="table table-striped">
                      <thead>
                      <tr>
                        <th>Qty</th>
                        <th>Product</th>
                        <th>Serial #</th>
                        <th>Description</th>
                        <th>Subtotal</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>1</td>
                        <td>Call of Duty</td>
                        <td>455-981-221</td>
                        <td>El snort testosterone trophy driving gloves handsome</td>
                        <td>$64.50</td>
                      </tr>
                      <tr>
                        <td>1</td>
                        <td>Need for Speed IV</td>
                        <td>247-925-726</td>
                        <td>Wes Anderson umami biodiesel</td>
                        <td>$50.00</td>
                      </tr>
                      <tr>
                        <td>1</td>
                        <td>Monsters DVD</td>
                        <td>735-845-642</td>
                        <td>Terry Richardson helvetica tousled street art master</td>
                        <td>$10.70</td>
                      </tr>
                      <tr>
                        <td>1</td>
                        <td>Grown Ups Blue Ray</td>
                        <td>422-568-642</td>
                        <td>Tousled lomo letterpress</td>
                        <td>$25.99</td>
                      </tr>
                      </tbody>
                    </table> --}}
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
  
                <div class="row">
                  <!-- accepted payments column -->
                
                  <!-- /.col -->
                 
                  <!-- /.col -->
                </div>
                <!-- /.row -->
  
                <!-- this row will not appear when printing -->
                <div class="row no-print">
                  <div class="col-12">
                    {{-- <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a> --}}
                    <button type="button" class="btn btn-success float-right seans_bilet_btn"><i class="fas fa-credit-card"></i> Seans ucin Bilet Al
                    </button>
                    {{-- <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                      <i class="fas fa-download"></i> Generate PDF
                    </button> --}}
                  </div>
                </div>

                <div class="row  places my-3 my-3 d-none">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex">
                                <h3 class="card-title">
                                   {{ $seanse->hall == '3d1' ? '1nji 3D' : '2nji 3D'}}  Zaldan yer saylan
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
              <tr>
                <td><b>Seans nomer: </b></td><td><span class="to_print_p"></span></td>
              </tr>
              <tr>
                <td><b>Film ady: </b></td><td><span class="to_print_film_name"></span></td>
              </tr>
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
        var seans_id = '{{ $seanse->id }}';
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

            $('#spot_id').val($(this).attr('data-id'));
        });

        $('.bilet_al').on('click', function (e) {

            e.preventDefault();

            $.ajax({
                    type:'POST',
                    url:'{{ route('bookings.store') }}',

                    data:{
                        seans_id:seans_id,
                        spot_id:$('#spot_id').val(),
                        _token: "{{ csrf_token() }}",

                    },
                    success:function(data) {
                      $('#toprint').css('display','block');
                      $('.to_print_p').text(data.seans.seans_number);
                      $('.to_print_film_name').text(data.seans.film_name);
                      $('.to_print_spot').text(data.spot.number);
                      $('.to_print_price').text(data.seans.price+' TMT');
                      
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
        });

    </script>
@endsection
