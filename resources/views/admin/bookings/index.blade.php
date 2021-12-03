@extends('layouts.app')
@section('title')
    Satylan biletler
@endsection
@section('third_party_stylesheets')
    <link  rel="stylesheet" href="{{ asset('css/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2-custom.css') }}">
  <style>

    .dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter, .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_processing, .dataTables_wrapper .dataTables_paginate{
      padding: 10px;
    }

    .select2-container .select2-selection--single .select2-selection__rendered{
      padding: 0;
    }

  </style>
@endsection

@section('content')
    <div class="container-fluid p-3">
        
      <div class="float-left"><h1>Satylan biletler</h1></div>

        <div class="float-right">

          <form class="form-row" action="" method="get">
            @csrf

            <div class="form-group mr-2">
              <input type="text" class="form-control" name="search_query" id="search_query" autocomplete="off"
                value="{{ $keyword }}"  placeholder="gozleg ...">
            </div>

            <div class="form-group mr-2">
              <select name="seans_id" class="form-control">
                <option value="">Seans sayla...</option>

                  @foreach (App\Seans::all() as $seanse)
                  <option value="{{ $seanse->id }}" {{ $seanse->id == $seans_id ? 'selected' : ''  }}>
                    {{ $seanse->seans_number }} -- {{ $seanse->film_name }}
                  </option>
                  @endforeach
                  
              </select>
            </div>

            <div class="form-group mr-2">

                <input type="text" class="form-control flatpickr" name="seans_start_date" id="seans_start_date"

                  value="{{ $seans_start_date }}"  placeholder="berlen wagty...">
            </div>

            <div class="form-group">

            <button type="submit" class="btn btn-primary btn-block">
                Gozleg
            </button>

            </div>

        </form>

        </div>

        <div class="clearfix"></div>

      

        <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Satylan biletler</h4>
  
                  {{-- <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                      <input type="text" name="table_search" id="search_query" class="form-control float-right" placeholder="Search">
  
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                      </div>
                    </div>
                  </div> --}}
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap" id="myTable">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>bilet nomer</th>
                        <th>Seans nomer</th>
                        <th>Zal, orny</th>
                        <th>berlen wagty</th>
                        <th></th>
                      </tr>
                    </thead>

                    <tbody>
                      @foreach ($bookings as $booking)

                      <tr>
                        <td> {{ (request('page', 1) - 1) * 10 + $loop->iteration }} </td>
                        <td> {{$booking->booking_number}} </td>
                        <td> {{ $booking->seans->seans_number }} </td>
                        <td> {{ $booking->seans->getHall().' , '.$booking->spot['number'] }} </td>
                        <td> {{ date('d/m/Y H:i', strtotime($booking->created_at)) }} </td>
                        <td></td>
                      </tr>
                          
                      @endforeach
                     
                    </tbody>

                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              {{-- {{ $bookings->links() }} --}}
            
              <div class="d-flex justify-content-between">
                <div>  {{ $bookings->appends(['seans_start_date'=>$seans_start_date,'keyword'=>$keyword,'seans_id'=>$seans_id])->links() }} </div>

                <div>Jemi <b>{{ $bookings->total() }}</b> sany</div>
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
    <script src="{{asset('js/select2.min.js')}}"></script>

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



                $("select").select2({
                    tags: true
                 });

                $("select").on("select2:select", function (evt) {
                    var element = evt.params.data.element;
                    var $element = $(element);
                    $element.detach();
                    $(this).append($element);
                    $(this).trigger("change");
                });

        $('b[role="presentation"]').hide();


                // fill_datatable();   

                //  $('#search_query, #seans_start_date').on('keyup change',function (e)
                //   {
                //     e.preventDefault();
                //     $('#myTable').DataTable().destroy();
                //     var search_query = $('#search_query').val();
                //     var seans_start_date = $('#seans_start_date').val();
                //     fill_datatable(seans_start_date, search_query);
                //   });

                // function fill_datatable(seans_start_date = '', search_query = '')
                // {
                //   var tablo = $('#myTable').DataTable({
                //     processing: true,
                //     serverSide: true,
                //     responsive: true,
                //     searching:false,
                //     stateSave: true,
                //     "search":{
                //         "caseInsensitive":false
                //     },
                //     "bLengthChange": false,
                //     "language": {
                //         "paginate": {
                //             "previous": "Предыдущий",
                //             "next":"Следующий"
                //         },
                //         "emptyTable": "Ничего не найдено",
                //         "zeroRecords": "Ничего не найдено",
                //         "search": "",
                //         "searchPlaceholder": "Gözleg...",
                //         "lengthMenu":"_MENU_ sany görkez",
                //         "infoEmpty": "0 - 0 aralygy görkezilýär, jemi 0 sany",
                //         "info": "_START_ - _END_ aralygy görkezilýär, jemi _TOTAL_ sany",
                //         "processing": "<div class=\"spinner-border spinner-border-sm text-primary\" role=\"status\">" +
                //             "<span class=\"sr-only\">Loading...</span>" +
                //             "</div>" +
                //             "<span class=\"d-block mt-1\">Ýüklenýär...</span>"
                //     },

                //     ajax:{
                //         url:window.location.pathname,
                //          data: {
                //            seans_start_date: seans_start_date,
                //            search_query:search_query 
                //         }
                //     },
                //     columns:[

                //         {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                //         {data:'booking_number',name:'booking_number'},
                //         {data:'seans_id',name:'seans_id'},
                //         {data:'spot_id',name:'spot_id'},
                //         {data:'created_at',name:'created_at'},
                //         {
                //             data:'action',
                //             name:'action',
                //             "orderable": false,
                //             "searchable":false
                //         }

                //     ],

                // });

                // }


    });



     
    </script>
@endsection
