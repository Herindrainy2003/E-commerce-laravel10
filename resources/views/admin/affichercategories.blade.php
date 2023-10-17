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
{{-- @if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif --}}


    

<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-6">
                 <div class="card">
                    <div class="card-header"> 
                        <strong class="card-title">LES CATEGORIES</strong>
                    </div>
                   
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th class="serial">Id</th>
                                    <th>Nom categories</th>
                                    <th></th>
                                    <th>Action</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                               @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                   
                                    <td>  <span class="name">{{$category->nomcategorie}} </td>
                                 

                                    <td>
                                     
                                        
                                       
                                           <a class="btn btn-outline-primary"  href="{{route('categories.edit',$category->id)}}"
                                            >Modifier</a>
                                            <form action="{{ route('categories.destroy',$category->id
                                                ) }}" method="POST">

                                                 @csrf
                                            @method('DELETE')
                                            <td><button type="submit" class="btn btn-outline-danger">Supprimer</button> </td>
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
{{-- {!! $categories->links() !!} --}}
<!-- Right Panel -->

@endsection()
