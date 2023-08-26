@extends('layouts.masterA')
@section('title')
Home|Admin
@endsection
@section('content')

<div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
<main class="main-content">
        <h1>Dashboard</h1>
        <div class="insights">
            <div class="sales">
                <span><ion-icon name="pricetags-outline"></ion-icon></span>
                <div class="middle">
                    <div class="left">
                        <h3> Totale Ventes</h3>
                        <h1>DZD25,454</h1>
                    </div>
                    <div class="progress">
                        <svg>
                            <circle cx='38' cy='38' r='36'></circle>
                        </svg>
                        <div class="number">
                            <p>81%</p>
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
                        <h3>Totale Dépenses</h3>
                        <h1>DZD14,604</h1>
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
                        <h3> Totale Revenu</h3>
                        <h1>DZD40,460</h1>
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
           <h2>Demandes récente  </h2>
           <table>
            <thead>
                <th>Nom</th>
                <th>Email</th>
                <th>Payment</th>
                <th>Status</th>
                <th></th>
            </thead>
            <tbody>
                <tr>
                    <td>Meedy</td>
                    <td>addoumoh@gmail.com </td>
                    <td>Due</td>
                    <td class="warning">En attente</td>
                    <td class="primary">Details </td>
                </tr>
                <tr>
                    <td>Meedy</td>
                    <td>addoumoh@gmail.com </td>
                    <td>Due</td>
                    <td class="warning">En attente</td>
                    <td class="primary">Details </td>
                </tr>
                <tr>
                    <td>Meedy</td>
                    <td>addoumoh@gmail.com </td>
                    <td>Due</td>
                    <td class="warning">En attente</td>
                    <td class="primary">Details </td>
                </tr>
                <tr>
                    <td>Meedy</td>
                    <td>addoumoh@gmail.com </td>
                    <td>Due</td>
                    <td class="warning">En attente</td>
                    <td class="primary">Details </td>
                </tr>
                <tr>
                    <td>Meedy</td>
                    <td>addoumoh@gmail.com </td>
                    <td>Due</td>
                    <td class="warning">En attente</td>
                    <td class="primary">Details </td>
                </tr>
            </tbody>
           </table> 
           <a href="requests">Afficher tout</a>
        </div>
    </main>
    @endsection
