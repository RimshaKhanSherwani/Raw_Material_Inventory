<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data</title>

    
    <meta name="csrf-token" content="{{ csrf_token() }}"> 

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('../resourcecss/style.css') }}">
    
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

</head>
<body>
    <h1>My Inventory Data</h1>
    <div class="container1">
    <table>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Description</th>
          <th id="Quantity">Quantity</th>
          <th>Unit</th>
          <th>Price</th>
          <th>Total Prices</th>
        </tr>
        @foreach ( $itemsdata as $itemdata )
        <tr>
            <td>{{ $itemdata->item_id}}</td>
            <td id="namefield{{ $itemdata['item_id'] }}">{{$itemdata->item_name}}</td>
            <td>{{ $itemdata->item_desc}}</td>
            <td id="Quantityfield{{ $itemdata['item_id'] }}"> <span id="QuantityfieldDis{{ $itemdata['item_id'] }}">{{ $itemdata->item_quantity}}</span> <button class="addbtn" id="addQuantityBtn{{ $itemdata['item_id'] }}" onclick="addQuanInput({{ $itemdata['item_id'] }})">Add Quantity</button></td>
            <td>{{ $itemdata->item_qtype}} </td>
            <td id="Pricefield{{ $itemdata['item_id'] }}"> <span id="PricefieldDis{{ $itemdata['item_id'] }}">{{ $itemdata->item_cost}}</span> <button class="addbtn" id="addPriceBtn{{ $itemdata['item_id'] }}" onclick="addPriceInput({{ $itemdata['item_id'] }})"> Add Price </button></td>
            
          <td id="costfield{{ $itemdata['item_id'] }}">Rs. {{ $itemdata->Total_cost}}</td>
          </tr>
          
          
        @endforeach
      </table>
    </div>
    <form action="{{ url("price") }}/logview"><button class="pricelogtn" id="pricelogBtn{{ $itemdata['item_name'] }}">View Price Logs</button></form></div>
</body>
</html>
<script type="text/javascript" src="{{ URL::asset('../resourcecss/app.js') }}"></script>