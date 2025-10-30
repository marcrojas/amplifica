@extends('layouts.layouts')

@section('content_home')

    <div class="row" style="padding: 0 30px 0 30px;">
        <div class="col-12" style="background-color: #ffffff; margin: 30px 0 30px 0; border-radius: 5px; padding: 0 20px 0 20px;">
            <div class="row">
                <div class="col-6" style="text-align: left;">
                    <div style="margin-top: 30px; color: #5d178c; font-size: 18px; font-weight: bold;">LISTADO DE REGIONES</div>
                </div>
            </div>

            <hr style="border: 1px solid #03901a; margin-top: 30px;">

            @if(isset($error))
                <div class="alert alert-danger">{{ $error }}</div>
            @endif

            <div class="row" style="padding-bottom: 250px;">
                <div class="col-md-6">
                    <label class="form-label">Región</label>
                    <select id="region" class="form-select">
                        <option value="">Seleccione región</option>
                        @foreach($regiones as $region)
                            <option value="{{ $region['region'] }}">{{ $region['region'] }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Comuna</label>
                    <select id="comuna" class="form-select">
                        <option value="">Seleccione comuna</option>
                    </select>
                </div>
            </div>


        </div>
    </div>

    <script>
        var json_regiones = @json($regiones);
    </script>

    <script src="{{ asset('js/pages/regiones/regiones.js') }}?v={{ time() }}"></script>

@endsection
