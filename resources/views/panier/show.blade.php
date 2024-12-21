@extends('layouts.app')
@section('title', 'Accueil')
@section('content')

<!--  errors show-->
<!-- @if(!$errors->isEmpty())
<div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif -->


<div class="container p-5">
  <h3 class="mb-4">Votre Panier D'achat</h3>
  <div class="table-responsive">
    <table id="cart" class="table table-hover table-condensed">
      <!-- Table header -->
      <thead>
        <tr>
          <th style="width:50%">Marque</th>
          <th style="width:10%">Modèle</th>
          <th style="width:10%">Année</th>
          <th style="width:10%">Prix</th>
          <th style="width:20%">Actions</th>
        </tr>
      </thead>
      <tbody>
        <!-- Table body -->
        <!-- @php $total = 0 @endphp
        @if(session('panier'))
          @foreach(session('panier') as $id => $voiture)
            @php $total +=  $voiture['price']  @endphp
            <tr data-id="{{ $id }}">
              <td data-th="Marque" class="align-middle">{{ $voiture['marque'] }}</td>
              <td data-th="Modèle" class="align-middle">{{ $voiture['modele'] }}</td>
              <td data-th="Année" class="align-middle">{{ $voiture['annee'] }}</td>
              <td data-th="Prix" class="align-middle">{{ $voiture['price'] }} $</td>
              <td class="actions" data-th="Actions">
                <a href="{{ route('remove.panier', $voiture['id']) }}" class="btn btn-outline-danger btn-sm w-100 border"> Supprimer</a>
              </td>
            </tr>
          @endforeach
        @endif -->
      </tbody>
    </table>
  </div>

  <!-- @php $tps = $total * 0.05 @endphp
  @php $tvq = $total * 0.09975 @endphp
  @php $totalNet = $total + $tps + $tvq @endphp
 -->

  <!-- Section des taxes et total -->
  <!-- <div class="row justify-content-end mt-4">
    <div class="col-md-4">
      <div style="text-align: right;">
        <strong>{{ $taxes[0]->nom }}:</strong> ${{ number_format($tvq, 2) }}
      </div>
      <div class="mt-2" style="text-align: right;">
        <strong>{{ $taxes[1]->nom }}:</strong> ${{ number_format($tps, 2) }}
      </div>
      <div class="mt-2" style="text-align: right;">
        <strong>Total:</strong> ${{ number_format($totalNet, 2) }}
      </div>
      <div class="mt-4" style="text-align: right;">
        <a href="{{ route('index.voiture') }}" class="btn btn-light border"><i class="fa fa-arrow-left"></i> Continuer les achats</a>
        <a href="{{ route('commande.create', $totalNet) }}" class="btn btn-success border"><i class="fa fa-money"></i> Payer</a>
      </div>
    </div>
  </div> -->
</div>

    
@endsection
    
<!-- @section('scripts') -->

<script type="text/javascript">
    /* document.querySelectorAll(".cart_update").forEach(function(element) {
        element.addEventListener("change", function(e) {
            e.preventDefault();
            
            var ele = e.target;
            var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            var formData = new FormData();
            formData.append('_token', csrfToken);
            formData.append('id', ele.closest("tr").getAttribute("data-id"));
            formData.append('quantity', ele.closest("tr").querySelector(".quantity").value);

            fetch('', {
                method: 'POST',
                headers: {
                    'X-CSRF-Token': csrfToken
                },
                body: formData
            })
            .then(function(response) {
                if (response.ok) {
                    window.location.reload();
                }
            })
            .catch(function(error) {
                console.error('Error:', error);
            });
        });
    });

    document.querySelectorAll(".cart_remove").forEach(function(element) {
        element.addEventListener("click", function(e) {
            e.preventDefault();

            var ele = e.target;

            if (confirm("Do you really want to remove?")) {
                var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                var formData = new FormData();
                formData.append('_token', csrfToken);
                formData.append('id', ele.closest("tr").getAttribute("data-id"));

                fetch('', {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-Token': csrfToken
                    },
                    body: formData
                })
                .then(function(response) {
                    if (response.ok) {
                        window.location.reload();
                    }
                })
                .catch(function(error) {
                    console.error('Error:', error);
                });
            }
        });
    }); */
</script>


<!-- @endsection('content') -->
