@extends('admin.layout')
@section('title')
Ajouter Categgories 
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
<div class="content">
    <div class="animated fadeIn">


        <div class="row">
          <div class="col-lg-6">
              <div class="card">
                    <div class="card-header">
                                <strong class="card-title">CATEGORIES</strong>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center"> categories Produit</h3>
                                        </div>
                                        <hr>
                                        <form action="{{route('categories.store')}}" method="POST" enctype="multipart/form-data">
                                           @csrf
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Ajouter categories</label>
                                                <input id="cc-payment" name="nomcategorie" type="text" class="form-control" aria-required="true" aria-invalid="false" value="">
                                            </div>
                                            
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                   
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
