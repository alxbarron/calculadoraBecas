@extends('layouts.app')

@section('content')

    <!-- Formulario Calcula Beca -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')

        <!-- New Beca Form -->
        <form action="{{ url('beca') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- Beca Name -->
            <div class="form-group">
                <label for="Nombre" class="col-sm-3 control-label">Nombre</label>

                <div class="col-sm-3">
                    <input type="text" name="name" id="Beca-name" class="form-control">
                </div>
            </div>

            <!-- Beca Promedio -->
            <div class="form-group">
                <label for="Promedio" class="col-sm-3 control-label">Promedio</label>

                <div class="col-sm-3">
                    <input type="text" name="promedio" id="Beca-promedio" class="form-control">
                </div>
            </div>

            <!-- Beca Colegiatura -->
            <div class="form-group">
                <label for="Colegiatura" class="col-sm-3 control-label">Colegiatura</label>

                <div class="col-sm-3">
                    <input type="text" name="colegiatura" id="Beca-colegiatura" class="form-control">
                </div>
            </div>

            <!-- Add Beca Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Calcula Beca
                    </button>
                </div>
            </div>
        </form>

        <!-- Becas guardadas -->
        @if (count($becas) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Becas calculadas
            </div>

            <div class="panel-body">
                <table class="table table-striped beca-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Nombre</th>
                        <th>Promedio</th>
                        <th>Beca</th>
                        <th>Colegiatura</th>
                        <th>Monto a pagar</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($becas as $beca)
                            <tr>
                                <!-- Beca Name -->
                                <td class="table-text">
                                    <div>{{ $beca->name }}</div>
                                </td>

                                <td>
                                    <div>{{ $beca->promedio }}</div>
                                </td>

                                <td>
                                    <div>{{ $beca->beca }}</div>
                                </td>

                                <td>
                                    <div>{{ $beca->colegiatura }}</div>
                                </td>

                                <td>
                                    <div>{{ $beca->pago }}</div>
                                </td>

                                <td>
                                    <form action="{{ url('beca/'.$beca->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash"></i> Borrar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif
    </div>

@endsection

    <!-- TODO: Current Becas -->