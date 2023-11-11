@extends('layouts.app')
    @section('content')


    <section class="recent-orders MonContainer">
        <!-- ERROR -->
        @if($errors->any())
          @foreach($errors->all() as $error)
              <div class="alert alert-danger" role="alert">{{ $error }}</div>
          @endforeach
        @endif
        <!--FIN ERROR -->


        <div class="card p-5">
                  <!-- Form de modification -->
        @if(isset($client))
        <div class="ro-title justify-content-center title-form">
            <h2 class="recent-orders-title fw-bold">Formulaire de modification d'un client</h2>
        </div>
        <form action="modifier-client/{{$client->id}}" method="post" >
        @method("put")
        <!--Fin Form de modification  -->
        @else
        <div class="ro-title justify-content-center title-form">
            <h2 class="recent-orders-title fw-bold">Formulaire ajout d'un client</h2>
        </div>
        <form action="{{ route('creer.client') }}" method="post">
        @endif
          @csrf
          <div class="row">
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <input type="text" id="nom" name="nom" class="form-control form-control-lg" value="{{ old('nom', $client->nom ?? '') }}" placeholder="Votre nom complet"/>
                  </div>

                </div>
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <input type="email" id="email" name="email" class="form-control form-control-lg" value="{{ old('email', $client->email ?? '') }}" placeholder="Votre e-mail"/>
                  </div>

                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4 d-flex align-items-center">

                  <div class="form-outline datepicker w-100">
                    <input type="number" class="form-control form-control-lg" name="phone" id="phone" value="{{ old('phone', $client->phone ?? '') }}" placeholder="Votre phone"/>
                  </div>

                </div>
                
                <div class="col-md-6 mb-4 pb-2">

                  <div class="form-outline">
                    <input type="text" id="status" name="status" class="form-control form-control-lg" value="{{ old('status', $client->status ?? '') }}"  placeholder="Votre status"/>
                  </div>

                </div>
              </div>

              <div class="mt-4 pt-2">
                <button name="save" class="btnLong" type="submit">ENREGISTER</button> 
              </div>

            </form>

          </form>
        </div>



    </section>

    @endsection