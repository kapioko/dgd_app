@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Dashboard'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card shadow-xl " style="background-color:#3498DB;"  >
                    <div class="card-body p-3">
                        <div class="row text-white ">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bolder">TOTAL DOSSIERS</p>
                                    <h2 class="font-weight-bolder text-white">
                                        286
                                    </h2>
                                    
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape  shadow-primary text-center rounded-circle">
                                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card bg-success shadow-xl">
                    <div class="card-body p-3">
                        <div class="row text-white">
                            <div class="col-8">
                                <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bolder">TOTAL DOSSIERS VALIDES</p>
                                    <h2 class="font-weight-bolder text-white">
                                        260
                                    </h2>
                                    
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape  shadow-danger text-center rounded-circle">
                                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card bg-danger shadow-xl">
                    <div class="card-body p-3">
                        <div class="row text-white">
                            <div class="col-8">
                                <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bolder">TOTAL DOSSIERS REJETES</p>
                                    <h2 class="font-weight-bolder text-white">
                                        15
                                    </h2>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape  shadow-success text-center rounded-circle">
                                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="card bg-warning shadow-xl">
                    <div class="card-body p-3">
                        <div class="row text-white">
                            <div class="col-8">
                                <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bolder">TOTAL DOSSIERS EN COURS</p>
                                    <h2 class="font-weight-bolder text-white">
                                        11
                                    </h2>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape  shadow-warning text-center rounded-circle">
                                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    <!-- partie   contenu de l'administation-->
<div class="container-fluid">

  <!-- DataTales Example -->
    <div class="row text-center mt-5">
        <h4 class="m-0 font-weight-bold text-black">Liste des dossiers</h4>
    </div>
<hr>
    <div class="row shadow mt-2">
       <div class="col-sm-3 col-md-3">
            <div>
                    <h5>FILTRE :</h5>
            </div>
        </div>
        <div class="col-sm-3 col-md-3 ">
            <div class="dataTables_length select" id="dataTable_length">
                <label> <h6>Date</h6>
                    <select name="dataTable_length" aria-controls="dataTable" class="custom-select custom-select-sm form-control form-control-sm">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </label>
            </div>
        </div>

        <div class="col-sm-3 col-md-3">
            <div class="dataTables_length select" id="dataTable_length">
                <label><h6>Statut</h6>
                    <select name="dataTable_length" aria-controls="dataTable" class="custom-select custom-select-sm form-control form-control-sm">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </label>
            </div>
        </div>

        <div class="col-sm-3 col-md-3">
            <div class="dataTables_length select" id="dataTable_length">
                <label><h6>Type</h6>
                    <select name="dataTable_length" aria-controls="dataTable" class="custom-select custom-select-sm form-control form-control-sm">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </label>
            </div>
        </div>

        
    </div>

    <div class="card-body shadow">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th><h6>Designation</h6></th>
                        <th><h6>Type de dossiers</h6></th>
                        <th><h6>Date de création</h6></th>
                        <th><h6>Statut</h6></th>
                        <th><h6>Actions</h6></th>
                     
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                    <th><h6>Designation</h6></th>
                        <th><h6>Type de dossiers</h6></th>
                        <th><h6>Date de création</h6></th>
                        <th><h6>Statut</h6></th>
                        <th><h6>Actions</h6></th>
                    </tr>
                </tfoot>
                <tbody>
                    <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>2011/01/25</td>
                        <td>61</td>
                        <td><a href="" class="text-primary">Détails</a></td>
                       
                    </tr>
                    <tr>
                        <td>Garrett Winters</td>
                        <td>Accountant</td>
                        <td>2011/01/25</td>
                        <td>63</td>
                        <td><a href="" class="text-primary">Détails</a></td>
                        
                    </tr>
                    
                    <tr>
                        <td>Michael Silva</td>
                        <td>Marketing Designer</td>
                        <td>2011/01/25</td>
                        <td>66</td>
                        <td><a href="" class="text-primary">Détails</a></td>
                        
                    </tr>
                    <tr>
                        <td>Paul Byrd</td>
                        <td>Chief Financial Officer (CFO)</td>
                        <td>2011/01/25</td>
                        <td>64</td>
                        <td><a href="" class="text-primary">Détails</a></td>
                        
                    </tr>
                   
                        <td>Sakura Yamamoto</td>
                        <td>Support Engineer</td>
                        <td>2011/01/25</td>
                        <td>37</td>
                        <td><a href="" class="text-primary">Détails</a></td>
                        
                    </tr>
                  
                    <tr>
                        <td>Shad Decker</td>
                        <td>Regional Director</td>
                        <td>2011/01/25</td>
                        <td>51</td>
                        <td><a href="" class="text-primary">Détails</a></td>
                        
                    </tr>
                    <tr>
                        <td>Michael Bruce</td>
                        <td>Javascript Developer</td>
                        <td>2011/01/25</td>
                        <td>29</td>
                        <td><a href="" class="text-primary">Détails</a></td>
                        
                    </tr>
                    <tr>
                        <td>Donna Snider</td>
                        <td>Customer Support</td>
                        <td>2011/01/25</td>
                        <td>27</td>
                        <td><a href="" class="text-primary">Détails</a></td>
                        
                        
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
       
        @include('layouts.footers.auth.footer')
    </div>
@endsection