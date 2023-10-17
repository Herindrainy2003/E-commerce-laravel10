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
                   
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn">


                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">NOUVEAU SLIDERS</strong>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center">SLIDERS</h3>
                                        </div>
                                        <hr>
                                        <form action="{{route('sliders.store')}}" method="post"  enctype="multipart/form-data">
                                           @csrf
                                       
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Premiere Description</label>
                                                <input  name="premiereDescription" type="text" class="form-control">
                                                
                                            </div>
                                            <div class="form-group">
                                                <label  class="form-control">Deuxieme Description</label>
                                                <input  name="deuxiemeDescription" type="text" class="form-control " >
                                            </div>
                                            
                                               
                                                <div class="col-6">
                                                    <label for="x_card_code" class="form-comtrol">Image</label>
                                                   
                                                        <input name="image" type="file" class="form-control" >
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