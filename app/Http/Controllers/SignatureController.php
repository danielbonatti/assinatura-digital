<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SignatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('coleta');
    }

    // Armazena a imagem da assinatura
    public function saveSignature()
    {
        $sig_string=$_POST['signature'];
        $path = 'public/images/signatures/';
        $nama_file="signature_".date("his").".png";
        file_put_contents($path.$nama_file, file_get_contents($sig_string));
        if(file_exists($path.$nama_file)){
            echo "<p>Ficheiro Assinatura - ".$nama_file."</p>";
            echo "<p style='border:solid 1px teal;width:355px;height:110px;'><img src='".$path.$nama_file."'></p>";
        }
    }
}
