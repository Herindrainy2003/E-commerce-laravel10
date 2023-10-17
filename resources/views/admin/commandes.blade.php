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
                        <strong class="card-title">LES COMMANDES</strong>
                    </div>
                    <div class="table-stats order-table ov-h">
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th class="serial">#</th>
                                   
                                    
                                    <th>Nom client</th>
                                    <th>Telephone</th>
                                    <th>Panier</th>
                                    <th>E-mail</th>
                                    <th>Total Payement</th>
                                    <th>Action</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                             @foreach ($commande as $checkout)
                                <tr>
                                    <td class="serial">{{$checkout->id}}</td>
                                    
                                    <td> {{$checkout->nomClient}} </td>
                                    <td>  <span class="name">{{$checkout->Phone}}</span> </td>
                                    <td> <span class="product">{{$checkout->nomProduit}}</span> </td>
                                    <td>  <span class="name">{{$checkout->email}}</span> </td>
                                    <td>  <span class="name">{{$checkout->total}} Ar</span> </td>
                                    <td>
                                        <a class="btn btn-outline-primary" href="{{url('/generate-pdf',$checkout->id)}}">Enregstrer</a>
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

<div class="clearfix"></div>

<footer class="site-footer">
<div class="footer-inner bg-white">
<div class="row">
    <div class="col-sm-6">
        Copyright &copy; 2018 Ela Admin
    </div>
    <div class="col-sm-6 text-right">
        Designed by <a href="https://colorlib.com">Colorlib</a>
    </div>
</div>
</div>
</footer>

</div><!-- /#right-panel -->

<!-- Right Panel -->
@endsection()
