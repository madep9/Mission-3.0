@extends ('listemois2')
@section('contenu2')

    <h2>Renseigner la fiche de frais du mois {{ $numMois }}-{{ $numAnnee }}</h2>
    <form method="post"  action="{{ route('chemin_gererfraiscomptable') }}">
                    {{ csrf_field() }} <!-- laravel va ajouter un champ caché avec un token -->
        <div class="corpsForm">
            <fieldset>
                <legend>Eléments forfaitisés</legend>
                <p><label for="Repas midi " class="form-label">Repas midi : </label>
                <input type="text" class="form-control" id="repas midi" name="tab['REP']" value="{{$tab['REP']}}"></p>
                <p> <label for="Nuitées" class="form-label">Nuitées : </label>
                <input type="text" class="form-control" id="nuitées" name= "tab['NUI']" value="{{$tab['NUI']}}"></p>
                <p> <label for="étapes" class="form-label">étapes : </label>
                <input type="text" class="form-control" id="étapes" name="tab['ETP']" value="{{$tab['ETP']}}"></p>
                <p> <label for="Kilomètres" class="form-label">Kilomètres : </label>
                <input type="text" class="form-control" id="Kilomètre" name="tab['KM']" value="{{$tab['KM']}}"></p>
                <p><button type="submit" class="btn btn-primary">Submit</button></p>
            </fieldset>
        </div>
    </form>
@endsection




