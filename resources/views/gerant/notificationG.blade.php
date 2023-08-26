@extends('layouts.masterG')
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

    .notification1  h3 {
        color: #333;
        font-size: 18px;
        margin-bottom: 5px;
    }

    p {
        color: #666;
        font-size: 14px;
    }
    .btn3 {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    cursor: pointer;
  }
  
  .btn3:hover {
    background-color: #45a049;
  }
  
  .btn3:focus {
    outline: none;
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
<table>
<td>
    @if($notification->offre_id)
    <div>
    <form method="GET" action="{{route('offre',$notification->offre_id)}}">
            @csrf
            <input type="hidden" id="maint" name="maint" value="{{$notification->id}}">
            <button class="btn3" type="submit">Consulter</button>
            
        </form>
        </div>
        
        @endif
        </td>    

</div>
</table>                   
                  
                @endforeach
            </div>
        @else
            <p>No notifications.</p>
        @endif





</main>
@endsection


