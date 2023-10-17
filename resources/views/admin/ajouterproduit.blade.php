@extends('admin.layout')
@section('title')
ajouter Produit
@endsection
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
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
                                    <li><a href="#">Forms</a></li>
                                    <li class="active">Basic</li>
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
                        <div class="card">
                            
                            <div class="card-body">
                               
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center">PRODUITS</h3>
                                        </div>
                                        <hr>
                                        <form action="{{route('produits.store')}}" method="post"  enctype="multipart/form-data">
                                           @csrf
                                          
                                           <div class="form-group">
                                           
                                                <label for="cc-name" class="control-label mb-1">Nom Produit</label>
                                                <input name="nomProduit" type="text" class="form-control" >
                                             </div>
                                            
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Prix Produit</label>
                                                <input  name="prixProduit" type="number"  class="form-control"></span>
                                            </div>
                                            <div class="form-group">
                                             
                                            <select name="categories" class="form-control">
                                                <option value="" selected disabled>Select category</option>
                                                @foreach($categories as $key => $value)
                                                    <option value="{{ $key }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                            
                                                
                                            </div>
                                               
                                                <div class="form-group">
                                                    <label for="x_card_code" >Image</label>
                                                
                                                        <input  name="image" type="file" class="form-control">
                                                       
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <button  type="submit" class="btn btn-lg btn-info btn-block">
                                                   
                                                    Ajouter
                                                   
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div> <!-- .card -->

                    </div><!--/.col-->


                    
                            </form>
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