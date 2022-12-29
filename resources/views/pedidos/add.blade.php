@extends('layout.layout2')
@section('title','Agregar Pedido')
@section('content')
<a href="">agregar pedido</a>
<br>
<br>
<div class="card mb-4">
<div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                ingresa los datos
                            </div>
                            <div class="card-body">
                                <form method="POST" action="/users">
                                    @csrf
                                    <div class="form-group">
                                            <label>introduce tu nombre:</label>
                                            <input type="text"  name="name" required>

                                    </div>

                                    <div class="form-group">
                                        <label>cantidad de zapatos:</label>
                                        <input type="number" name="email" required>
                                    </div>

                                    <div class="form-group">
                                        <label>precio:</label>
                                        <input type="number" name="pass" required>
                                    </div>

                                     <div class="form-group">
                                            <label>abono:</label>
                                            <input type="number"  name="nombre" required>
                                    </div>
                                     <div class="form-group">
                                            <label>fecha de recibido:</label>
                                            <input type="date"  name="nombre" required>
                                    </div>
                                     <div class="form-group">
                                            <label>fecha de entrega:</label>
                                            <input type="datetime-local"  name="nombre" required>
                                    </div>

                                     <div class="form-group">
                                            
                                            <input type="hidden"  name="nombre" required>
                                    </div>
                                      <div class="form-group">
                                            <label>numero de telefono:</label>
                                            <input type="tel"  name="nombre" required>
                                    </div>
                                     <div class="form-group">
                                            <label>nota:</label>
                                            <input type="text"  name="nombre" required>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Agregar</button>
                                    <a href="usuario" class="btn btn-info">salir</a>

                                </form>
</div>
</div>
@endsection('content')