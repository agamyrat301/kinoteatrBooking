@extends('layouts.app')
@section('third_party_stylesheets')
    <link  rel="stylesheet" href="{{ asset('css/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flatpickr.min.css') }}">
@endsection

@section('content')
    <div class="container-fluid p-3">
      <div class="float-left d-flex">
        <h2 class="ml-2">Hasabat</h2>
      </div>

        <div class="float-right">
            
        <div class="form-row">

          <div class="form-group mr-4">
            <a href="{{ route('reports.fived_reports') }}" class="btn btn-primary btn-block">5D</a>
        </div>

            <form class="form-row" action="" method="get">
                @csrf

                <div class="form-group col-md-6">
                    <input type="text" class="form-control flatpickr" name="seans_start_date" id="seans_start_date"
                        placeholder="seans wagty...">
                </div>

                <div class="form-group col-md-6">

                <button type="submit" class="btn btn-primary btn-block">
                    Submit
                </button>

                </div>

            </form>

        </div>
            
        </div>

        <div class="clearfix"></div>


        <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Hasabat</h3>

                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap" id="myTable">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Film ady</th>
                        <th>Seans</th>
                        <th>Seans bahasy</th>
                        
                        <th>Baslayan wagty</th>
                        <th>Dowamlylygy</th>
                        <th>nace sany bilet</th>
                        <th>jemi girdeji(TMT)</th>
                        <th>Zal</th>
                        <th></th>

                      </tr>
                    </thead>

                    <tbody>
                        @foreach ($seanses as $seans)
                            <tr>
                                <td>{{$seans->id }}</td>
                                <td>{{ $seans->film_name }}</td>
                                <td>{{$seans->seans_number }}</td>
                                
                                <td>{{$seans->price }} TMT</td>
                                
                                <td>{{ date('d/m/Y H:i', strtotime($seans->start_date)) }}</td>
                                <td>{{ $seans->duration}}</td>
                                <td>{{ $seans->Bookings->count() }}</td>
                                <td>{{ $seans->Bookings->count() * $seans->price }} TMT</td>
                                <td>{{ $seans->getHall() }}</td>
                                <td></td>
                            </tr>
                        @endforeach

                     
                    </tbody>

                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
    </div>
@endsection

@section('third_party_scripts')

    <script src="{{asset('js/jquery.js')}}"></script>

    <script src="{{ asset('js/datatables.min.js') }}"></script>

    <script src="{{ asset('js/flatpickr.js') }}"></script>

    <script src="{{ asset('js/flatpickr-locale-tk.js') }}"></script>

    <script>
                $(document).ready(function (e) {
                    $.noConflict();

                        $(".flatpickr").flatpickr({
                            // enableTime: true,
                            // time_24hr:true,
                            dateFormat: "Y-m-d",
                            autoclose: true,
                            mode:"range"
                        });


                });


    </script>

  
@endsection
