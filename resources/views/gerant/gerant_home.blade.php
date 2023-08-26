@extends('layouts.masterG')
@section('title')
Dashboard 
@endsection
@section('content')
    @section('name')
    {{$gerant->name}}
    @endsection
    @section('email')
    {{$gerant->email}}
    @endsection

<main class="main-content">
        <h1>Dashboard</h1>

        <div class="insights">
            <div class="sales">
                <span><ion-icon name="pricetags-outline"></ion-icon></span>
                <div class="middle">
                    <div class="left">
                        <h3> Équipements en marche</h3>
                        <h1>4/7</h1>
                    </div>
                    <div class="progress">
                        <svg>
                            <circle cx='38' cy='38' r='36'></circle>
                        </svg>
                        <div class="number">
                            <p>62%</p>
                        </div>
                    </div>
                </div>
                <small class="text-muted">Dernières 24 heurs</small>
            </div>
          <!----------------------------END OF SALES--------------------------------------->  
          <div class="expenses">
                <span><ion-icon name="bar-chart-outline"></ion-icon></span>
                <div class="middle">
                    <div class="left">
                        <h3>Taux d'activité</h3>
                        <h1>25 heure</h1>
                    </div>
                    <div class="progress">
                        <svg>
                            <circle cx='38' cy='38' r='36'></circle>
                        </svg>
                        <div class="number">
                            <p>62%</p>
                        </div>
                    </div>
                </div>
                <small class="text-muted">Dernières 24 heurs</small>
            </div>
          <!----------------------------END OF EXEPENSES--------------------------------------->  
          <div class="income">
                <span><ion-icon name="file-tray-stacked-outline"></ion-icon></span>
                <div class="middle">
                    <div class="left">
                        <h3> Totale d'achat</h3>
                        <h1>40,460 DZD</h1>
                    </div>
                    <div class="progress">
                        <svg>
                            <circle cx='38' cy='38' r='36'></circle>
                        </svg>
                        <div class="number">
                            <p>78%</p>
                        </div>
                    </div>
                </div>
                <small class="text-muted">Dernières 24 heurs</small>
            </div>
          <!----------------------------END OF INCOME-------------------------------------->   
        </div>
<!----------------------------END OF INSIGHTS-------------------------------------->
        <div class="recent-orders">
           <h2>mes Achat </h2>
           <table>
            <thead>
                <th>Nom de produit</th>
                <th>Numéro de produit</th>
                <th>Payment</th>
                <th>Status</th>
                <th></th>
            </thead>
            <tbody>
                <tr>
                    <td>Mini Drone</td>
                    <td>2415</td>
                    <td>Due</td>
                    <td class="warning">En attente</td>
                    <td class="primary">Details </td>
                </tr>
                <tr>
                    <td>Mini Drone</td>
                    <td>2415</td>
                    <td>Due</td>
                    <td class="warning">En attente</td>
                    <td class="primary">Details </td>
                </tr>
                <tr>
                    <td>Mini Drone</td>
                    <td>2415</td>
                    <td>Due</td>
                    <td class="warning">En attente</td>
                    <td class="primary">Details </td>
                </tr>
                <tr>
                    <td>Mini Drone</td>
                    <td>2415</td>
                    <td>Due</td>
                    <td class="warning">En attente</td>
                    <td class="primary">Details </td>
                </tr>
                <tr>
                    <td>Mini Drone</td>
                    <td>2415</td>
                    <td>Due</td>
                    <td class="warning">En attente</td>
                    <td class="primary">Details </td>
                </tr>
            </tbody>
           </table> 
           <a href="commande">Afficher tout</a>
        </div>
</main>

@endsection



