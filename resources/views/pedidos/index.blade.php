@extends('layout.layout2')
@section('title','Pedidos')
@section('content')
<a href="/pedidos/create" class="btn btn-primary btn-lg">agregar pedido</a>
<br><br>
<div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Pedidos
                            </div>
                            <div class="card-body">
                              
                                <table class="table">

                                          <thead>
                                            <tr>
                                              <th scope="col">codigo</th>
                                              <th scope="col">nombre</th>
                                              <th scope="col">status</th>
                                              <th scope="col">fecha</th>
                                              <th scope="col">Accion</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                             @foreach($listPedidos as $lp)
                                            <tr>
                                              <td>{{$lp->id}}</td>
                                              <td>{{$lp->nombre}}</td>
                                              <td>{{$lp->status}}</td>
                                              <td>{{$lp->entrega}}</td>
                                              <td>
                                                <a href="pedidos/{{$lp->id}}" class="btn btn-primary">ver</a> 
                                               <a href="pedidos/{{$lp->id}}/edit" class="btn btn-secondary">editar</a> 

                                               <a href="javascript: document.getElementById('delete').submit()" class="btn btn-danger btn-sm" onclick="return confirm('deseas borrar?')">Eliminar</a>

                                                  <form id=delete action="pedidos/{{$lp->id}}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                   
                                                  </form>
                                                  </td>
                                            </tr>
                                            
                                           @endforeach
                                            
                                          </tbody>
                                        </table>
                            </div>
                        </div>

@endsection('content')