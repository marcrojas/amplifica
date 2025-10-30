@extends('layouts.layouts')

@section('content_home')

    <div class="row" style="padding: 0 30px 0 30px;">
        <div class="col-12" style="background-color: #ffffff; margin: 30px 0 30px 0; border-radius: 5px; padding: 0 20px 0 20px;">
            <div class="row">
                <div class="col-6" style="text-align: left;">
                    <div style="margin-top: 30px; color: #5d178c; font-size: 18px; font-weight: bold;">LISTADO DE PRODUCTOS</div>
                </div>
            </div>

            <hr style="border: 1px solid #03901a; margin-top: 30px;">


            <div class="row justify-content-center">
                <div class="table-responsive table-card" style="margin-top: 30px;">
                    <table class="table table-bordered align-middle table-hover text-uppercase" id="tabla-productos" style="font-size: 11px;">
                        <thead class="text-muted" style="background-color: #100f1f; color: #ffffff;">
                        <tr>
                            <th class="sort text-uppercase" style="font-size: 11px; width: 5%; background-color: #100f1f; color: #ffffff;">ID</th>
                            <th class="sort text-uppercase" style="font-size: 11px; width: 25%; background-color: #100f1f; color: #ffffff;">NOMBRE</th>
                            <th class="sort text-uppercase" style="font-size: 11px; width: 10%; background-color: #100f1f; color: #ffffff;">PRECIO</th>
                            <th class="sort text-uppercase" style="font-size: 11px; width: 10%; background-color: #100f1f; color: #ffffff;">PESO</th>
                            <th class="sort text-uppercase" style="font-size: 11px; width: 10%; background-color: #100f1f; color: #ffffff;">ANCHO</th>
                            <th class="sort text-uppercase" style="font-size: 11px; width: 10%; background-color: #100f1f; color: #ffffff;">ALTO</th>
                            <th class="sort text-uppercase" style="font-size: 11px; width: 10%; background-color: #100f1f; color: #ffffff;">LARGO</th>
                            <th class="sort text-uppercase" style="font-size: 11px; width: 10%; background-color: #100f1f; color: #ffffff;">STOCK</th>
                            <th class="sort text-uppercase" style="font-size: 11px; width: 5%; background-color: #100f1f; color: #ffffff;">EDITAR</th>
                            <th class="sort text-uppercase" style="font-size: 11px; width: 5%; background-color: #100f1f; color: #ffffff;">ELIMINAR</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>


            <!-- VENTANA MODAL PARA PRODUCTOS -->
            <div class="modal fade" id="modalProductos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content" style="border-color: #151529">
                        <div id="html_modal_productos"></div>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <script>
        var url_modal_productos = "{{route("modal_productos")}}";
    </script>

    <script src="{{ asset('js/pages/productos/productos.js') }}?v={{ time() }}"></script>

    <script>


    </script>

@endsection


