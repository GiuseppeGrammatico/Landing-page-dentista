<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PublicController extends Controller
{
    public function welcome(){
        
        $dettaglioServizio = [ 
            [
                "id" => 1, 
                "name" => "Cosmetic Dentistry", 
                "desc" => "Custom, patient-centered care for beautiful, natural outcomes.",
                "img" => "./media/icons/dental-care-w.png",
                "price" => "$500",
                "longDesc" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus optio praesentium quam repellendus maiores! Error odit, atque rerum veniam quod laboriosam earum a excepturi odio temporibus, ut minus iure praesentium 1."
            ],

            [
                "id" => 2, 
                "name" => "Restorative Dentistry", 
                "desc" => "Precise, evidence-based care for long-lasting restorations.",
                "img" => "./media/icons/dental-clean-w.png",
                "price" => "$500-$1,300 per tooth",
                "longDesc" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ad, reprehenderit et cupiditate excepturi distinctio qui asperiores ut esse quibusdam aspernatur, repellendus tempore numquam facere veniam laudantium sed molestias. Asperiores, placeat 2."
            ],

            [
                "id" => 3, 
                "name" => "Preventive Dentistry", 
                "desc" => "Minimally invasive care to achieve and maintain health.",
                "img" => "./media/icons/dentist-chair-w.png",
                "price" => " $100 to $400, per tooth",
                "longDesc" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis, aspernatur eos, nemo blanditiis omnis sunt in totam voluptas tempore quo laboriosam, excepturi animi rem magnam. Eum repellat molestiae voluptatem neque 3."
            ],

            [
                "id" => 4, 
                "name" => "General Check", 
                "desc" => "Check the current health state of your teeth.",
                "img" => "./media/icons/dentist-w.png",
                "price" => " $100",
                "longDesc" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat amet, voluptates quae non unde molestiae, cumque corporis voluptatum atque adipisci nobis aspernatur incidunt debitis, quia odit! Soluta ducimus tempore exercitationem 4."
            ]

        ];

        return view('welcome', ['servizi' => $dettaglioServizio]);
    }



    public function chiSiamo(){
        return view('chisiamo');
    }

    public function appointmentSubmitted(Request $request) {
        $name = $request->name;
        $surname = $request->surname;
        $email = $request->email;
        $message = $request->message;

        $inputData = compact('name','surname','email','message');

        Mail::to($email)->send(new ContactMail($inputData));

        return redirect(route('welcome'))->with('flash', 'Your email was successfully sent. Thank you for contacting us!');
    }

    

}
