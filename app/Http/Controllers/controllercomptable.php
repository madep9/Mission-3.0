<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use PdoGsb;
use MyDate;
class controllercomptable extends Controller
{
	
    function selectionMois2(){
        if(session('visiteur') != null){
            $visiteur = session('visiteur');
            $lesMois = PdoGsb::getLesMoisDisponibles2();
            $lesvisiteurs =  PdoGsb::getIdVisiteurcr();
          
		    // Afin de sélectionner par défaut le dernier mois dans la zone de liste
		    // on demande toutes les clés, et on prend la première,
		    // les mois étant triés décroissants
		    $lesCles = array_keys( $lesMois );
		    $moisASelectionner = $lesCles[0];
            return view('listemois2')
                        ->with('lesMois', $lesMois)
                        ->with('leMois', $moisASelectionner)
                        ->with('visiteur',$visiteur)
                        ->with('lesvisiteurs',$lesvisiteurs);
        }
        else{
            return view('connexion')->with('erreurs',null);
        }

    }


   /* function voirCr($leMois,$idVisiteur){
        if( session('visiteur')!= null){
            dd($request);
            $visiteur = session('visiteur');
            $idVisiteur = $visiteur['idVisiteur'];
            $leMois = $request['lstMois']; 
		    $lesMois = PdoGsb::getLesMoisDisponibles($idVisiteur);
            $lesFraisForfait = PdoGsb::getLesFraisForfait($idVisiteur,$leMois);
		    $lesInfosFicheFrais = PdoGsb::getLesInfosFicheFrais($idVisiteur,$leMois);
		    $numAnnee = MyDate::extraireAnnee( $leMois);
		    $numMois = MyDate::extraireMois( $leMois);
		    $libEtat = PdoGsb::getCr("CR");
		    $montantValide = $lesInfosFicheFrais['montantValide'];
            $nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
            $dateModif =  $lesInfosFicheFrais['dateModif'];
            $dateModifFr = MyDate::getFormatFrançais($dateModif);
            $vue = view('s2enregistrercr')->with('lesMois', $lesMois)
                    ->with('leMois', $leMois)->with('numAnnee',$numAnnee)
                    ->with('numMois',$numMois)->with('libEtat',$libEtat)
                    ->with('montantValide',$montantValide)
                    ->with('nbJustificatifs',$nbJustificatifs)
                    ->with('dateModif',$dateModifFr)
                    ->with('lesFraisForfait',$lesFraisForfait)
                    ->with('visiteur',$visiteur);
            return $vue;
        }
 
    }
    */
    function gererfraisc(Request $request)
    {
        if( session('visiteur') != null){
            //dd($request);
            $visiteur = session('visiteur');
          // dd($lesMois);
            //$idVisiteur = $visiteur['id'];
           
            $leMois = $request['lstMois'];
            $idVisiteur =$request['lesIdCr'];

            $lesMois = PdoGsb::getLesMoisDisponibles2();
            $lesvisiteurs =  PdoGsb::getIdVisiteurcr();
            $numAnnee = MyDate::extraireAnnee( $leMois);
		    $numMois = MyDate::extraireMois( $leMois);
          
            $lignesForfaits = PdoGsb::getLesFraisForfait($idVisiteur,$leMois);
            foreach ($lignesForfaits as $k=>$v){
                if($v['idfrais']=='ETP'){$tab['ETP']=$v['quantite'];}
                if($v['idfrais']=='REP'){$tab['REP']=$v['quantite'];}
                if($v['idfrais']=='NUI'){$tab['NUI']=$v['quantite'];}
                if($v['idfrais']=='KM'){$tab['KM']=$v['quantite'];}   
            }
            if(!isset($tab)){
                $tab['ETP']="";
                $tab['REP']="";
                $tab['NUI']="";
                $tab['KM']="";
            }
           // dd($lignesForfaits);
         //   $lesHorsForfais = PdoGsb::getLesFraisForfait($idVisiteur,$mois);
            $view = view('s2enregistrercr')
                 ->with('lesvisiteurs',$lesvisiteurs)
                    ->with('lesMois', $lesMois)
                    ->with('leMois', $leMois)
                    ->with('numMois',$numMois)
                    ->with('tab',$tab)
                    ->with('erreurs',null)
                    ->with('numAnnee',$numAnnee)
                    ->with('visiteur',$visiteur)
                    ->with('lesFrais',$lignesForfaits)
                    ->with('message',"");
                 //   ->with ('method',$request->method());
            return $view;
        }
        else{
            return view('connexion')->with('erreurs',null);
        }


    }

    function enregistrerfrais()
    {

        $Id=$_REQUEST["idvisiteur"];
        $rep=$_REQUEST["mois"];
        $melange=$rep.$repa;
        $RES=$pdo->modifResultatRep($Id,$mois);
       /* foreach($_REQUEST['tab'] as $k=>$quantite){

               if($k=='REP'){$RES=$pdo->insert($repId,$melange,'REP',$quantite);}

                if($k=='NUI'){$RES=$pdo->insertResultatNui($repId,$melange,'NUI',$quantite);}

                if($k=='ETP'){$RES=$pdo->insertResultatEtp($repId,$melange,'ETP',$quantite);}

                if($k=='KM'){$RES=$pdo->insertResultatKm($repId,$melange,'KM',$quantite);}
        }*/
		    
        
    }


}