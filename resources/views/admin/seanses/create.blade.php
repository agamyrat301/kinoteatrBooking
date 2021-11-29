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
                  <h3 class="card-title">taze seans doret</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{route('seanses.store')}}" method="post">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">film ady:</label>
                      <input type="text" class="form-control @error('film_name') is-invalid @enderror" name="film_name" id="film_name" placeholder="kino adyny girin...">
                      @error('film_name')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror

                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">baslayan wagty:</label>
                      <input type="date" class="form-control flatpickr  @error('start_date') is-invalid @enderror" name="start_date" id="exampleInputPassword1" placeholder="kino bashlayan wagty...">
                      @error('start_date')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputPassword1">bahasy(TMT):</label>
                        <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" id="price" placeholder="bahasy...">
                        @error('price')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">kino dowamlylygy:</label>
                        <input type="text" class="form-control @error('duration') is-invalid @enderror" name="duration" id="duration" placeholder="kino dowamlylygy...">
                        @error('duration')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Zal sayla:</label>
                        <select name="hall" id="hall" class="form-control  @error('hall') is-invalid @enderror">
                            <option value="" selected>Zaly saylan...</option>
                            <option value="3d1">1-nji zal 3D</option>
                            <option value="3d2">2-nji zal 3D</option>
                        </select>
                        @error('hall')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
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
           altFormat:"F j, Y",
           locale:"tk",
           minDate: "today"
       });

    </script>
@endsection
