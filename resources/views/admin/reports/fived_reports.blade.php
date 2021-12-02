@extends('layouts.app')
@section('title')
    5D hasabat
@endsection

@section('third_party_stylesheets')
    <link  rel="stylesheet" href="{{ asset('css/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flatpickr.min.css') }}">
@endsection

@section('content')
    <div class="container-fluid p-3">
      <div class="float-left d-flex">
        <h2 class="ml-2">5D Hasabat</h2>
      </div>

        <div class="float-right">
            
        <div class="form-row">

          <div class="form-group mr-4">
            <a href="{{route('reports.index')}}" class="btn btn-primary btn-block">3D</a>
        </div>

            <form class="form-row" action="" method="get">
                @csrf

                <div class="form-group col-md-6">
                    <input type="text" class="form-control flatpickr" name="seans_start_date" id="seans_start_date" value="{{ $seans_start_date }}"
                        placeholder="berlen wagty...">
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
                  <h3 class="card-title">5D Hasabat</h3>

                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap" id="myTable">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>bahasy</th>
                        <th>orny</th>
                        <th>berlen wagty</th>
                      </tr>
                    </thead>

                    <tbody>
                        @foreach ($fiveds as $fived)
                            <tr>
                                <td>  {{ (request('page', 1) - 1) * 10 + $loop->iteration }}</td>
                                <td>{{ $fived->price }} TMT</td>
                                <td>{{$fived->spot->number }}</td>
                                <td>{{ date('d/m/Y H:i', strtotime($fived->created_at)) }}</td>
                                
                            </tr>
                        @endforeach

                     
                    </tbody>

                  </table>
                </div>
              
                <!-- /.card-body -->
              </div>
              {{-- {{ $fiveds->links() }} --}}
              <div class="d-flex justify-content-between">
                <div>{{ $fiveds->appends(['seans_start_date'=>$seans_start_date])->links() }}</div>

                <div>Jemi <b>{{ $fiveds->total() }}</b> sany</div>
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
