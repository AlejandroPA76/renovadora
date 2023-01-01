@extends('layout.layout2')
@section('title','Pedidos en proceso')
@section('content')

<br><br>
<div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Pedidos en proceso
                            </div>
                            <div class="card-body">
                                <table class="table">

                                          <thead>
                                            <tr>
                                              <th scope="col">codigo</th>
                                              <th scope="col">nombre</th>
                                              <th scope="col">status</th>
                                              <th scope="col">Accion</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                             @foreach($listProc as $lproc)
                                            <tr>
                                              <td>{{$lproc->id}}</td>
                                              <td>{{$lproc->nombre}}</td>
                                              <td>{{$lproc->status}}</td>

                                              <td><a href="/pedidos/{{$lproc->id}}" class="btn btn-primary">ver</a></td>
                                              
                                            </tr>
                                            
                                           @endforeach
                                            
                                          </tbody>
                                        </table>
                            </div>
                        </div>

@endsection('content')