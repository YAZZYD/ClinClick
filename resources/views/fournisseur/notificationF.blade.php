@extends('layouts.masterF')
@section('css')
<style>


        h1 {
            margin-bottom: 20px;
        }

        .notification1 {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
        }
     

    .notification-card {
        background-color: #f5f5fa;
        border: 1px solid #0044ff;
        border-radius: 5px;
        padding: 10px;
        margin-bottom: 10px;
    }

    h3 {
        color: #333;
        font-size: 18px;
        margin-bottom: 5px;
    }

    p {
        color: #666;
        font-size: 14px;
    }
</style>
    
@endsection
@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
@section('content')
<main class="main-content">
    
<h1>Notifications</h1>
        <hr>

        @if ($notifications->count() > 0)
            <div class="list-group">
                @foreach ($notifications as $notification)
                   
                    <div class="card">
                    <div class="notification-card">
    <!-- Inside the card, you can add the subject and text -->
    <a href="#" class="list-group-item list-group-item-action">
    <h3>{{ $notification->sujet }}</h3>
    <p>{{ $notification->content }}</p>
    </a>
</div>


</div>
                    
                  
                @endforeach
            </div>
        @else
            <p>No notifications.</p>
        @endif





</main>
@endsection
