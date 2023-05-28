<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Price Log</title>

    
    <meta name="csrf-token" content="{{ csrf_token() }}"> 

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('../resourcecss/style.css') }}">
    
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

</head>
<body>
    <h1>Price Logs</h1>
    <div class="container1">
    <table>
        <tr>
          <th>ID</th>
          <th>Item Name</th>
          <th>Previous Price</th>
          <th>Updated Price</th>
          {{-- <th>Clear Log</th> --}}
        </tr>
        @foreach ( $pricedata as $pricedata )
        <tr>
            <td id="logID{{ $pricedata['pricelog_id'] }}">{{$pricedata->pricelog_id}}</td>
            <td id="itemName{{ $pricedata['pricelog_id'] }}">{{$pricedata->item_name}}</td>
            <td id="prePrice{{ $pricedata['pricelog_id'] }}">{{$pricedata->previous_price}}</td>
            <td id="updatedPrice{{ $pricedata['pricelog_id'] }}">{{$pricedata->updated_price}}</td>
            {{-- <td id="pricelogbtn{{ $pricedata['pricelog_id'] }}"> <button class="clsbtn" id="clear{{ $pricedata['pricelog_id'] }}" onclick="clearBtn({{ $pricedata['pricelog_id'] }})">Clear</button> --}}
          </tr>
          
        @endforeach
      </table></div>
</body>
</html>
<script type="text/javascript" src="{{ URL::asset('../resourcecss/app.js') }}"></script>