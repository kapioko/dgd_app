<?php

namespace App\Http\Controllers;
use Log;
use Auth;
use App\Models\User;
use App\Models\Annee;
use App\Models\Dossier;
use App\Models\Historique;
use App\Models\TypeDossier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DossierAdminController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index(Request $request)
    {
        //
        $recents = Dossier::orderBy('created_at', 'desc')->limit(5)->get();
        $dateCreation = $request->input('dateCreation', '');
        $ifu = $request->input('ifu', '');
        $declarant=$request->input('declarant', '');
        $statut=$request->input('statut', '');
        
     
         $query = Dossier::query();
        // Appliquez le filtre en fonction de la date de création
        if (!empty($dateCreation)) {
           $query->whereDate('dossiers.created_at', '=', $dateCreation); 
       }
       if (!empty($ifu)) {
            $query->where('dossiers.ifuDossier', '=', $ifu); 
        }
        if (!empty($declarant)) {
            $query->where('dossiers.declarantDossier', '=', $declarant); 
        }
        if (!empty($statut)) {
            $query->where('dossiers.statutDossier', '=', $statut); 
        }

        $dossiers = $query->paginate(5);
        return view('dossierAdmin.index',compact('dateCreation','recents', 'ifu','declarant','statut','dossiers'))->with('i', (request()->input('page', 1) - 1) * 5);
     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $users = User::orderBy('firstname', 'ASC')->get();
        $typeDossiers = TypeDossier::orderBy('designationTypeDossier', 'ASC')->get();
        //$annees = Annee::orderBy('nomAnnee', 'ASC')->get();
        return view('dossierAdmin.create', compact('users', 'typeDossiers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //$request->idUser = Auth::user()->id;
        $dossiers = $request->validate([
        'nomDossier' => 'required',
        'declarantDossier' => 'required',
        'ifuDossier' => 'required',
        'agrementDossier' => 'required',
        'destinataireDossier' => 'required',
        'elementRequeteDossier' => 'required',
        'texteReferenceDossier' => 'required',
        'statutDossier' => '',
        'idUser' => '',
        'idTypeDossier' => 'required',
        //'idAnnee' => ''
        ]);
        //dd($dossiers);
        Dossier::create($request->all());
   
        return redirect()->route('admin.dossiers.index')->with('success','dossier created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dossier  $dossier
     * @return \Illuminate\Http\Response
     */
    public function show(Dossier $dossier)
    {
        //
        $users = User::orderBy('firstname', 'ASC')->get();
        $typeDossiers = TypeDossier::orderBy('designationTypeDossier', 'ASC')->get();
        //$annee = Annee::orderBy('nomAnnee', 'ASC')->get();
        return view('dossierAdmin.show',compact('dossier', 'users','typeDossiers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dossier  $dossier
     * @return \Illuminate\Http\Response
     */
    public function edit(Dossier $dossier)
    {
        //
        $users = User::orderBy('firstname', 'ASC')->get();
        $typeDossiers = TypeDossier::orderBy('designationTypeDossier', 'ASC')->get();
        //$annee = Annee::orderBy('nomAnnee', 'ASC')->get();
        return view('dossierAdmin.edit',compact('dossier', 'users','typeDossiers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dossier  $dossier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dossier $dossier)
    {
        //dd($dossier);
        $request->validate([
            'nomDossier' => 'required',
            'declarantDossier' => 'required',
            'ifuDossier' => 'required',
            'agrementDossier' => 'required',
            'destinataireDossier' => 'required',
            'elementRequeteDossier' => 'required',
            'texteReferenceDossier' => 'required',
            'statutDossier' => '',
            'idUser' => '',
            'idTypeDossier' => 'required',
            'idAnnee' => ''
        ]);
  
        $dossier->update($request->all());
  
        return redirect()->route('admin.dossiers.index')->with('success','dossier mis à jour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dossier  $dossier
     * @return \Illuminate\Http\Response
     */
    public function getDossiersData()
    {
            $data = DB::table('historique')
                ->select(DB::raw('EXTRACT(MONTH FROM updated_at) as month, EXTRACT(YEAR FROM updated_at) as year, COUNT(*) as count'))
                ->groupBy(DB::raw('EXTRACT(YEAR FROM updated_at)'), DB::raw('EXTRACT(MONTH FROM updated_at)'))
                ->get();
    
            // Traitement des données pour les adapter au format attendu par le graphique
            $months = []; // Tableau pour stocker les noms des mois
            $numbers = []; // Tableau pour stocker les nombres de dossiers

            foreach ($data as $row) {
                $monthName = date('M', mktime(0, 0, 0, $row->month, 1)); // $row->month contient le numéro du mois
                $months[] = $monthName; // Ajoute le nom du mois au tableau des mois

            // Ajoutez le nombre de dossiers à $numbers
            $numbers[] = $row->count;
            }
            //Log::info('Months: ' . json_encode($months));
            //Log::info('Numbers: ' . json_encode($numbers));
            // Retournez les données sous forme de tableau associatif
            return response()->json([
                'months' => $months,
                'numbers' => $numbers
            ]);
    }

    
    
     public function destroy(Dossier $dossier)
    {
        //
        $dossier->delete();
        return redirect()->route('admin.dossiers.index')->with('success','dossier supprimé avec succès');
    }
}
