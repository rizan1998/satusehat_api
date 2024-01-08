<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Satusehat\Integration\KYC;
use Satusehat\Integration\OAuth2Client;


class SatuSehatTesting extends Controller
{
    public function index()
    {


        // $client = new OAuth2Client;
        // echo $client->token(); // OAuth2Token anda akan muncul
        // die;

        $kyc = new KYC;

        // Isi nama verifikator & NIK verifikator untuk mendapatkan link KYC
        $json = $kyc->generateUrl('Bambang Wisanggeni', '1171022809990001');
        $kyc_link = json_decode($json, true);


        var_dump($kyc_link);
        die;

        /** 
         * Melakukan route redirect ke link KYC
         * saat ini hanya bisa dibuka pada tab baru / pop-up
         * tidak bisa melalui iframe
         */
        return redirect($kyc_link['data']['url']);
    }
}
