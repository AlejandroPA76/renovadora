@extends('layout.layout2')
@section('title','Agregar Pedido')
@section('content')

<br>
<br>
<div class="card mb-4">
<div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                ingresa los datos
                            </div>
                            <div class="card-body">
                              
                                 


                                    <div class="form-group">
                                      <p>
                                            <label>id:</label>
                                            <input  type="number"  name="name" disabled value="{{$sPedido->id}}">
                                      </p>  
                                      
                                      <p>
                                         <label>Status:</label>
                                            <input  type="text"  name="name" disabled value="{{$sPedido->status}}">
                                      </p>
                                      
                                      <p>

                                            <label>introduce tu nombre:</label>

                                            <input  type="text"  name="name" disabled value="{{$sPedido->nombre}}">

                                            <label>cantidad de zapatos:</label>
                                            <input type="number" name="czapato" disabled value="{{$sPedido->cant_zap}}">
                                            </p>

                                    </div>

                                    <div class="form-group">
                                      <p>
                                        <label>precio:</label>
                                        <input type="number" name="price" disabled value="{{$sPedido->precio}}">
                                        </p>
                                        <p>
                                        <label>abono:</label>
                                        <input type="number"  name="abono" disabled value="{{$sPedido->abono}}">
                                        </p>

                                        <p>
                                        <label>debe:</label>
                                        <input type="number"  name="debe" disabled value="{{$sPedido->restante}}">
                                        </p>
                                    </div>

                                  
                                     <div class="form-group">
                                      <p>
                                            <label>fecha de entrega:</label>
                                            <input type="text" name="" value="{{$fecha}}" disabled>
                                            <br><br>
                                             <label>hora de entrega:</label>
                                           <input type="time" name="time" disabled value="{{$hora}}">
                                    </p>
                                 
                                           
                                          
                                    </div>

                                    
                                      <div class="form-group">
                                        <p>
                                            <label>numero de telefono:</label>
                                            <input type="tel"  name="tel" disabled value="{{$sPedido->tel}}">
                                            </p>
                                    </div>

                                  
                                     <div class="form-group">
                                      <p>
                                            <label>nota:</label>
                                           </p>
                                            <textarea placeholder="Anota las reparaciones" name="description" cols="40" rows="5" style="resize: both;" disabled>{{$sPedido->descripcion}}</textarea>
                                  
                                    </div>

                                    @if($sPedido->status == "recibido")

                                     <form id=proceso action="/pedidos/{{$sPedido->id}}" method="POST" >
                                      @csrf
                                      @method('PUT')
                                      <input type="hidden" name="menu" value="show">
                                      <input type="hidden" name="status" value="proceso">
                                    </form>

                                    
                                    <a href="javascript: document.getElementById('proceso').submit()" class="btn btn-danger " onclick="return confirm('Vas a hacer el pedido?')">Comenzar reparacion</a>
                                   @endif

                                    @if($sPedido->status == "proceso")

                                     <form id=proceso action="/pedidos/{{$sPedido->id}}" method="POST" >
                                      @csrf
                                      @method('PUT')
                                      <input type="hidden" name="menu" value="show2">
                                      <input type="hidden" name="status" value="finalizado">
                                    </form>

                                    
                                    <a href="javascript: document.getElementById('proceso').submit()" class="btn btn-danger " onclick="return confirm('Ya terminaste el zapato?')">Finalizar zapato</a>
                                   @endif


                                    @if($sPedido->status == "finalizado")

                                     <form id=proceso action="/pedidos/{{$sPedido->id}}" method="POST" >
                                      @csrf
                                      @method('PUT')
                                      <input type="hidden" name="menu" value="finalizar">
                                      <input type="hidden" name="status" value="entregado">
                                    </form>

                                    
                                    <a href="javascript: document.getElementById('proceso').submit()" class="btn btn-danger " onclick="return confirm('entregar el zapato?')">Entregar zapato</a>
                                   @endif

                                   
                                    <a href="{{ url()->previous() }}" class="btn btn-info">salir</a>

                             
</div>
</div>
@endsection('content')