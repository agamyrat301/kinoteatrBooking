@extends('layouts.app')

@section('third_party_stylesheets')
<link rel="stylesheet" href="{{ asset('css/flatpickr.min.css') }}">
    <style>

    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="card card-primary mt-3">
                <div class="card-header">
                  <h3 class="card-title">Seans uytget</h3>
                </div>

                <!-- /.card-header -->
                <!-- form start -->

                <form role="form" action="{{ route('seanses.update', $seanse->id) }}" method="post">
                    @csrf
                    @method('patch')

                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">film ady:</label>
                      <input type="text" class="form-control" name="film_name" value="{{ old('film_name', $seanse->film_name) }}" id="film_name" placeholder="kino adyny girin...">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">baslayan wagty:</label>
                      <input type="text" class="form-control flatpickr" 
                      name="start_date" value="{{ old('start_date', $seanse->start_date->format('m-d-Y H:i')) }}" id="exampleInputPassword1" placeholder="kino bashlayan wagty...">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">bahasy(TMT):</label>
                        <input type="text" class="form-control" name="price" id="price" value="{{$seanse->price}}" placeholder="seans wagty...">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">kino dowamlylygy:</label>
                        <input type="text" class="form-control" name="duration" id="duration" value="{{ $seanse->duration }}" placeholder="kino dowamlylygy...">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Zal sayla:</label>
                        <select name="hall" id="hall" class="form-control">

                            <option value="3d1" {{ $seanse->hall == '3d1' ? 'selected':'' }}>1-nji zal 3D</option>
                            <option value="3d2" {{ $seanse->hall == '3d2' ? 'selected':'' }}>2-nji zal 3D</option>
                            <option value="5d" {{ $seanse->hall == '5d' ? 'selected':'' }}>5D</option>

                        </select>
                    </div>
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Yatda sakla</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
    </div>
@endsection

@section('third_party_scripts')
<script src="{{ asset('js/flatpickr.js') }}"></script>
<script src="{{ asset('js/flatpickr-locale-tk.js') }}"></script>
    <script>
       $('.flatpickr').flatpickr({
           enableTime: true,
           dateFormat: "m-d-Y H:i",
           time_24hr:true,
          //  altFormat:"F j, Y",
           locale:"tk"
       });
    </script>
@endsection
