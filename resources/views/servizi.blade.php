<x-layout>
    
    <section id="servizi-header" class="container-fluid bg-primary-clr">
        <div class="row justify-content-center align-items-center vh-100 services-wrapper">
            
            @foreach($servizi as $servizio)
            
                <div class="col-12 col-md-6 col-lg-3 service">
                    <img src="{{$servizio['img']}}" alt="" class="service-img mb-4">
                    <h2 class="service-title text-white-clr text-center">{{$servizio['name']}}</h2>
                    <p class="service-text text-white-clr text-center">{{$servizio['desc']}}</p>
                    <a href="{{route('servizio.dettaglio', ['id' => $servizio['id']])}}">
                        <button class="btn btn-custom mb-5 mb-lg-0">
                            Learn more
                        </button>
                    </a>
                </div>
            
            @endforeach
            
        </section>
        
    </x-layout>