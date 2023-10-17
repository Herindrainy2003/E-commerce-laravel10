@extends('admin.layout')
@section('title')
Afficher produit
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
                        <strong class="card-title">LES PRODUITS</strong>
                    </div>
                    <div class="table-stats order-table ov-h">
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th class="serial">ID</th>
                                    <th class="avatar">Image</th>
                                    
                                    <th>Nom</th>
                                    <th>Categories</th>
                                    <th>Prix</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                     <th></th>
                                  
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($produit as $produits)
                               <tr>
                                <td class="serial">{{$produits->id}}</td>
                                <td class="avatar">
                                    <div class="round-img">
                                        <a href="#"><img class="rounded-circle" src="/images/{{$produits->image}}" alt=""></a>
                                    </div>
                                </td>
                                <td> {{$produits->nomProduit}}</td>
                                <td>  <span class="name">{{$produits->categories}}</span> </td>
                                <td> <span class="product">{{$produits->prixProduit}} Ariary</span> </td>
                               
                                <td>
                                  @if($produits->statut==1)
                                    <label class="badge badge-success">Active</label>   
                                    @else
                                    <label class="badge badge-danger">Desactive</label>
                                    @endif
                                </td>
                                <td>
                                
                                    <a class="btn btn-outline-primary" href="{{route('produits.edit',$produits->id)}}">Modifier</a>
                                </td> 
                            <td>  
                                <form action="{{route('produits.destroy',$produits->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger">Supprimer</button>
                                    @if($produits->statut==1)
                                             <a class="btn btn-outline-warning" href="{{URL::to('desactiverproduit',$produits->id)}}">Desactive</a>
                                    @else
                                             <a class="btn btn-outline-primary" onclick="window.location='{{url('/activerproduit/'.$produits->id)}}'">Activer</a>
                                    @endif
                                </form> 
                          
                        
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
