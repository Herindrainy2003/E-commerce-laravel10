@extends('admin.layout')
@section('title')
Afficher slider
@endsection
@section('content')

<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Table</a></li>
                            <li class="active">Basic table</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-6">
                <!-- <div class="card">
                    <div class="card-header"> -->
                        <strong class="card-title">LES SLIDERS</strong>
                    </div>
                    <div class="table-stats order-table ov-h">
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th class="serial">#</th>
                                    <th class="avatar">Image</th>
                                    
                                    <th>Description one</th>
                                    <th>Descriptio Two</th>
                                  
                                    <th>Status</th>
                                    
                                   
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach($sliders as $slider)
                                <tr>
                                    <td class="serial">{{$slider->id}}</td>
                                    <td class="avatar">
                                        <div class="round-img">
                                            <a href="#"><img class="rounded-circle" src="images/{{$slider->image}}" alt=""></a>
                                        </div>
                                    </td>
                                    <td> {{$slider->premiereDescription}}</td>
                                    <td>  <span class="name">{{$slider->deuxiemeDescription}}</span> </td>
                                   
                                   
                                    <td>
                                       @if($slider->statut==1)
                                            <span class="badge badge-primary">Activer</span>
                                        @else
                                        <span class="badge badge-danger">Desactiver</span>
                                       @endif 
                                    </td>
                                    <td>
                                       <a class="btn btn-outline-primary" href="{{route('sliders.edit',$slider->id)}}">Modifier</a>
                                     <form action="{{route('sliders.destroy',$slider->id)}}" method="post"> 
                                     @csrf
                                     @method('DELETE')
                                     <button class="btn btn-outline-danger" type="submit">Supprimer</button>
                                   <form>
                                    <td>
                                   @if($slider->statut==1)
                                         <a class="btn btn-outline-danger" href="{{URL::to('/desactiverslider',$slider->id)}}">Desactiver</a>
                                    @else 
                                        <a class="btn btn-outline-primary" href="{{URL::to('/activerslider',$slider->id)}}">Activer</a>
                                    @endif
                                </td>
                                </td>
                                </tr>
                               @endforeach
                            </tbody>
                        </table>
                   
            </div>
            
        </div>
    </div>
</div>
</div><!-- .animated -->
</div><!-- .content -->



</div><!-- /#right-panel -->

<!-- Right Panel -->
@endsection()
