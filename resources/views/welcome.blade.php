<x-layout>
    
    
    
    @if(session('flash'))
        <div>
            {{session('flash')}}
        </div>
    @endif
    
    <main>
        
        {{-- header --}}
        <header class="container-fluid header">
            
            <div class="row vh-100 header-wrapper">
                <div class="col-12 col-md-6 d-flex justify-content-center align-items-center">
                    <img src="/media/logo/logo-full.png" class="img-fluid header-logo" alt="">
                </div>
                
                <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
                    <div class="p-5 shadow-3-strong bg-primary-clr inputs-wrapper">
                        
                        <h3 class="text-white-clr mb-4">
                            Book your free checkup visit here:
                        </h3>
                        
                        <form method="POST" action="{{route('appointmentSubmitted')}}">
                            @csrf
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Name</span>
                                <input type="text" id="name" name="name" class="form-control" placeholder="Name" aria-label="Name"/>
                            </div>
                            
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Surname</span>
                                <input type="text" id="surname" name="surname" class="form-control" placeholder="Surname" aria-label="Surname"/>
                            </div>
                            
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Email</span>
                                <input type="email" id="email" name="email" class="form-control" placeholder="john.doe@email.com" aria-label="Email"/>
                            </div>                        
                            
                            <div class="input-group">
                                <span class="input-group-text">Optional<br>Message</span>
                                <textarea cols="50" id="message" name="message" class="form-control text-area-custom" placeholder="Type your message here..."aria-label="Optional Message"></textarea>
                            </div>
                            
                            <button type="submit" class="btn btn-submit btn-custom mt-4">Book an appointment</button>
                        </form>
                        
                    </div>
                </div>
            </div>
            
        </header>
        
        <button id="modalButton" class="btn btn-custom btn-custom-appointment"data-mdb-toggle="modal" data-mdb-target="#appointmentModal">
            Book an appointment
        </button>

        <div class="modal fade" id="appointmentModal" tabindex="-1" aria-labelledby="appointmentModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content bg-white-clr">
                    <div class="modal-body">
                        

                        <div class="p-5 shadow-3-strong bg-primary-clr inputs-wrapper">
                        
                            <h3 class="text-white-clr mb-4">
                                Book your free checkup visit here:
                            </h3>
                            
                            <form method="POST" action="{{route('appointmentSubmitted')}}">
                                @csrf
                                <div class="input-group mb-3">
                                    <span class="input-group-text text-white-clr" id="basic-addon1">Name</span>
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Name" aria-label="Name"/>
                                </div>
                                
                                <div class="input-group mb-3">
                                    <span class="input-group-text text-white-clr" id="basic-addon1">Surname</span>
                                    <input type="text" id="surname" name="surname" class="form-control" placeholder="Surname" aria-label="Surname"/>
                                </div>
                                
                                <div class="input-group mb-3">
                                    <span class="input-group-text text-white-clr" id="basic-addon1">Email</span>
                                    <input type="email" id="email" name="email" class="form-control" placeholder="john.doe@email.com" aria-label="Email"/>
                                </div>                        
                                
                                <div class="input-group">
                                    <span class="input-group-text text-white-clr">Optional<br>Message</span>
                                    <textarea cols="50" id="message" name="message" class="form-control text-area-custom" placeholder="Type your message here..."aria-label="Optional Message"></textarea>
                                </div>
                                
                                <button type="submit" class="btn btn-submit btn-custom mt-4">Submit</button>
                            </form>
                            
                        </div>

                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-custom" data-mdb-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        
        
        {{-- header cards section --}}
        <section id="services" class="container-fluid d-flex justify-content-center align-items-center">
            <div class="row vw-100 services-wrapper">
                
                @foreach($servizi as $servizio)
                
                <div class="col-12 col-md-6 col-lg-3 service">
                    <img src="{{$servizio['img']}}" alt="" class="service-img mb-4">
                    <h2 class="text-white-clr text-center">{{$servizio['name']}}</h2>
                    <p class="text-white-clr text-center">{{$servizio['desc']}}</p>
                    
                    <button class="btn btn-custom mb-5 mb-lg-0" data-mdb-toggle="modal" data-mdb-target="#exampleModal{{$servizio['id']}}">
                        Learn more
                    </button>
                    
                </div>
                
                <div class="modal fade" id="exampleModal{{$servizio['id']}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content bg-white-clr">
                            <div class="modal-header">
                                <h4 class="modal-title text-primary-clr" id="exampleModalLabel">{{ $servizio['name'] }}</h4>
                                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="text-primary-clr">{{$servizio['desc']}}</h5>
                                            <div class="mt-3">
                                                {{$servizio['longDesc']}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-12">
                                            <div class="w-100 d-flex justify-content-end lead">
                                                <strong class="text-primary-clr">
                                                    Price: {{$servizio['price']}}
                                                </strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-custom" data-mdb-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                
                
                @endforeach
                
            </div>
        </section>
        
        
        {{-- map section --}}
        <section class="container-fluid py-5 bg-white-clr">
            <div class="row">
                <div class="col-12 col-lg-6 d-flex justify-content-end pe-4">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d704.4543982672683!2d7.683060850391466!3d45.0692112!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47886d71d14e93a3%3A0x47196bafe0bccda6!2sApple%20Via%20Roma!5e0!3m2!1sen!2sit!4v1648397775534!5m2!1sen!2sit" width="450" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-12 col-lg-6 d-flex flex-column justify-content-center align-items-start ps-4">
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <div>
                            <h2>CONTATTI</h2>
                            <ul>
                                <li>
                                    <span><strong>Telefono: </strong></span>
                                    <span>casa</span>
                                </li>
                                <li>
                                    <span><strong>Indirizzo: </strong></span>
                                    <span>Via dai coglioni</span>
                                </li>
                                <li>
                                    <span><strong>E-mail: </strong></span>
                                    <span>CazziMiei@cazzo.pene</span>
                                </li>
                                <li>
                                    <span><strong>Facebook: </strong></span>
                                    <span>Forse lo mettiamo</span>
                                </li>
                                <li>
                                    <span><strong>Linkedin: </strong></span>
                                    <span>Forse mettiamo anche questo</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        
        {{-- best comments section --}}
        <section id="comments" class="container-fluid bg-primary-clr">
            <div class="row comments-wrapper">
                <div class="col-12 col-lg-4 px-5 mt-5 mt-lg-0">
                    <h3 class="mb-3">Lorem Ipsum</h3>
                    <p class="text-white-clr mb-3">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Debitis odio eos velit sunt esse molestias eaque, aut voluptas facere tempora. Tenetur, cupiditate veniam. Quis facilis suscipit commodi non in error.
                    </p>
                    <cite class="text-white-clr">GianGiulio Culettoni</cite>
                </div>
                <div class="col-12 col-lg-4 px-5 mt-5 mt-lg-0">
                    <h3 class="mb-3">Lorem Ipsum</h3>
                    <p class="text-white-clr mb-3">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Debitis odio eos velit sunt esse molestias eaque, aut voluptas facere tempora. Tenetur, cupiditate veniam. Quis facilis suscipit commodi non in error.
                    </p>
                    <cite class="text-white-clr">Fraborbio Sinistri</cite>
                </div>
                <div class="col-12 col-lg-4 px-5 mt-5 mt-lg-0">
                    <h3 class="mb-3">Lorem Ipsum</h3>
                    <p class="text-white-clr mb-3">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Debitis odio eos velit sunt esse molestias eaque, aut voluptas facere tempora. Tenetur, cupiditate veniam. Quis facilis suscipit commodi non in error.
                    </p>
                    <cite class="text-white-clr">Filippo Ferromasi</cite>
                </div>
            </div>
        </section>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
    </main>
    
</x-layout>