<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\commandes;
use PDF;
  
class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF($id)
    {
        $commande=commandes::get();
  
        $data = [
            'title' => 'Welcome to ItSolutionStuff.com',
            'date' => date('m/d/Y'),
            'users' => $commande
        ]; 
            
        $pdf = PDF::loadView('frontend\myPDF', $data,compact('commande'));
     
        return $pdf->download('itsolutionstuff.pdf');
    }
}
