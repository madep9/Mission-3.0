extends ('vue_sommaire_comptable')
    @section('contenu1')
      <div id="contenu">
        <h2>ID du visiteur</h2>
         
    <div class="flexbody">
        <nav class="menuLeft item">Menu</nav>
        <section class="content item">
           
<label for="">Numéro de visiteur</label>
            <select name="idvisiteur" size="1">
<?php foreach($idVisteurs as $unVisiteur): ?>
<option value="<?php echo $unVisiteur['id'] ?>"><?php echo $unVisiteur['id'] ?></option>
<?php endforeach ?>
</select>
             
      </section>      
           
     
    </div>


        <h3>Mois à sélectionner : </h3>
        {{ csrf_field() }} <!-- laravel va ajouter un champ caché avec un token -->
        <div class="corpsForm"><p>
          <label for="lstMois" >Mois : </label>
          <select id="lstMois" name="lstMois">
              @foreach($lesMois as $mois)
                  @if ($mois['mois'] == $leMois)
                    <option selected value="{{ $mois['mois'] }}">
                      {{ $mois['numMois']}}/{{$mois['numAnnee'] }} 
                    </option>
                  @else 
                    <option value="{{ $mois['mois'] }}">
                      {{ $mois['numMois']}}/{{$mois['numAnnee'] }} 
                    </option>
                  @endif
              @endforeach
          </select>
        </p>
        </div>
        <div class="piedForm">
        <p>
          <input id="ok" type="submit" value="Valider" size="20" />
          <input id="annuler" type="reset" value="Effacer" size="20" />
        </p> 
        </div>
          
        </form>
  @endsection 
 