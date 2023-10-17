<?php
      
namespace App\Http\Controllers;
       
use Illuminate\Http\Request;
use Stripe;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Session;
       
class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
//     public function stripePost(Request $request): RedirectResponse {
//         $produits = [];
//         Stripe\Stripe::setApiKey(config('stripe.sk'));
//         // Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
//         $totalAmount = 0; // Initialisez le montant total à zéro.
    
//         foreach (session('cart') as $id => $details) {
//             $nomProduit = $details['name'];
//             $total = $details['prix'];
//             $quantity = $details['quantity'];
    
//             $two0 = "00";
//             $unit_amount = $total * 100; // Convertissez le montant en cents (Stripe utilise des cents).
    
//             // Ajoutez le montant unitaire au montant total.
//             $totalAmount += $unit_amount;
    
//             $produits[] = [
//                 'price_data' => [
//                     'product_data' => [
//                         'name' => $nomProduit,
//                     ],
//                     'currency' => 'mga',
//                     'unit_amount' => $unit_amount,
//                 ],
//                 'quantity' => $quantity,
//             ];
//         }
    
//         // Maintenant, $totalAmount contient le montant total du paiement Stripe en cents.
    
//         $checkoutSession = \Stripe\Checkout\Session::create([
//             'line_items' => [$produits],
//             'mode' => 'payment',
//             'allow_promotion_codes' => true,
//             'metadata' => [
//                 'user_id' => "0001"
//             ],
//             'customer_email' => "herindarinyall2003@gmail.com",
//             'success_url' => route('success'),
//             'cancel_url' => route('cancel'),
//         ]);
    
//         // return redirect()->away($checkoutSession->url);
//         return redirect('/cart');
//     }
    
//     public function success(Request $request) {
//         // Supposons que vous récupériez le montant total depuis la réponse Stripe.
//         $totalAmount = $request->input('total_amount'); // Remplacez 'total_amount' par la clé appropriée utilisée par Stripe.
    
//         // Passer le montant total à la vue.
//         return view('frontend.checkout', ['totalAmount' => $totalAmount]);
//     }
    
//    public function cancel(){
//     return "Desole , mais on a rencotrer l'erreure pendant votre achat veuillez nous contacter ou de ressayer";
//    }

public function stripePost(Request $request): RedirectResponse
{
      
        $totalAmount = 0; // Initialisez le montant total à zéro.

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        foreach (session('cart') as $id => $details) {
                            $nomProduit = $details['name'];
                            $total = $details['prix'];
                            $quantity = $details['quantity'];
                    
                            $two0 = "00";
                            $unit_amount = $total *4500; // Convertissez le montant en cents (Stripe utilise des cents).
                    
                            // Ajoutez le montant unitaire au montant total.
                            $totalAmount += $unit_amount;
                    
                            $produits[] = [
                                'price_data' => [
                                    'product_data' => [
                                        'name' => $nomProduit,
                                    ],
                                    'currency' => 'mga',
                                    'unit_amount' => $unit_amount,
                                ],
                                'quantity' => $quantity,
                            ];
                        }
    Stripe\Charge::create ([
        
            "amount" =>$unit_amount ,
            "currency" => "mga",
            "source" => $request->stripeToken,
            "description" => "payement" 
    ]);
   

            
    return redirect('/shop')
            ->with('success', 'Payment successful!');
}
    
}