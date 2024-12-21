@extends('layouts.app')
@section('title', 'Commande')
@section('content')

<!--  errors show-->
@if(!$errors->isEmpty())
<div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

@endif
 
 <!-- Inscription Form section -->
  <section class="register-section py-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <h2 class="text-center mb-4">Paiement</h2>
          <form method="POST">
           @csrf
            <div class="mb-3">
              <label for="commande_id" class="form-label">Commande</label>
              <input type="number" name="commande_id" class="form-control" id="commande_id" readonly  placeholder="" value="{{ $commande_id }}">
            </div>

            <div class="mb-3">
            <label for="paiementmode" class="form-label">Mode de Paiement</label>
            <select class="form-control"  placeholder="" name="paiementmode_id" id="paiementmode" value="{{ old('pays_id')}}">
            <option value="" selected disabled>---selectionnez un Mode de Paiement ---</option>

                @foreach($mode_paiments as $modeP)
                <option value="{{$modeP->id}}" {{ old('paiementmode_id') == $modeP->id ? 'selected' : '' }} >{{$modeP->nom}} </option>
                @endforeach
              </select>            
            </div>

            <!-- paiement modes -->

            <div id="2_fields" style="display: none;">
                
                <label for="credit_card_number">Credit Card Number</label>
                <input type="text" class="form-control" id="credit_card_number" name="credit_card_number">
                <label for="expiry_date">Expiry Date</label>
                <input type="text" class="form-control" id="expiry_date" name="expiry_date">
                <label for="cvv">CVV</label>
                <input type="text" class="form-control" id="cvv" name="cvv">
            </div>


            <div id="1_fields" style="display: none;">
                <label for="cash_amount">Cash Amount</label>
                <input type="text" class="form-control" id="cash_amount" name="cash_amount">
                
            </div>

            <div id="5_fields" style="display: none;">
                
            </div>

    
            <button type="submit" class="btn btn-primary">Payer </button>
          </form>
        </div>
      </div>
    </div>
  </section>


  @endsection

