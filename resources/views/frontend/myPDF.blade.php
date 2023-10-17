<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facture</title>
    <!-- Inclure Bootstrap CSS (vous devrez peut-être ajuster le chemin) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Styles personnalisés pour la facture */
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        .invoice {
            background-color: #f9f9f9;
            padding: 20px;
        }
    </style>
</head>
<body>
    @foreach ($commande as $item)
    <div class="container">
        <div class="invoice">
            <h1 class="text-center">Facture</h1>
            <div class="row">
                <div class="col-md-6">
                    <p><strong>De :</strong></p>
                    <address>
                        SOAVOANKAZO<br>
                        Antananarivo<br>
                        <br>
                       033 94 41020<br>
                       herindrainyall2003@gmail.com
                    </address>
                </div>
                <div class="col-md-6 text-md-right">
                    <p><strong>À :</strong></p>
                   
                        
                  
                    <address>
                       <br>
                        {{$item->nomClient}}<br>
                        {{$item->Phone}}<br>
                        {{$item->email}}
                    </address>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Les produits</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$item->nomProduit}}</td>
                        
                    </tr>
                   
                </tbody>
            </table>
            <div class="text-right">
                <p><strong>Total : {{$item->total}} AR</strong></p>
            </div>
        </div>
    </div>
    @endforeach
    <!-- Inclure Bootstrap JS (facultatif) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
