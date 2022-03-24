@extends ('modeles/visiteur')
    @section('menu')
            <!-- Division pour le sommaire -->
        <div id="menuGauche">
            <div id="infosUtil">
                  
             </div>  
               <ul id="menuList">
                   <li >
                   <strong>Bonjour {{ $visiteur['nom'] . ' ' . $visiteur['prenom'] }}</strong>
                      
                   </li>
                  <li class="smenu">
                     <a href="{{ route('chemin_selectionMois2')}}" title="Valider note de frais ">Valider note de frais</a>
                  </li>
                
               <li class="smenu">
                <a href="{{ route('chemin_deconnexion') }}" title="Se déconnecter">Déconnexion</a>
                  </li>
                </ul>
               
        </div>
    @endsection          