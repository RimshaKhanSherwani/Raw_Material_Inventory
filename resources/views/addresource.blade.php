<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Inventory</title>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('../resourcecss/style.css') }}">

    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}

    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js" ></script>

</head>
<body>
    <div class="topnav">
        <a class="active" href="#home">Home</a>
        <a href="#Shop">Shop</a>
        <a href="#contact">Contact</a>
        <a href="#about">About</a>
      </div>

      <div class="container">
      <form action="{{url('/')}}/add" method="POST">
        @csrf
        
          <h1>Inventory</h1>
          <hr>
      
          <label for="name"><b>Name</b></label>
          <input type="text" placeholder="Enter Name of Item" name="name" id="name" required>
      
          <label for="desc"><b>Description</b></label>
          <input type="text" placeholder="Enter Description of Item" name="desc" id="desc" required>
          
          <label for="unit"><b>Unit</b></label><br><br>
          <input type="text" name="amt" id="amtt" placeholder="Enter the unit for Item" required>
          <div class="amtt"></div>  
          
          <br>
          <label for="quantity"><b>Quantity</b></label><br><br>
          <input type="numeric" placeholder="Enter the Quantity of Item" name="quant" id="quant" required>
          <div class="price-field">
            <label for="cost"><b>Price</b></label><br><br>
            <input type="numeric" placeholder="Enter the price of Item" name="cost" id="cost" required>
          </div>
          <div class="total-field">
            <label for="total"><b>Total Cost</b></label><br><br>
            <input type="numeric" name="totcost" id="totcost" placeholder="Item Total Cost is....">
          </div>
          <hr>
          <button class="add btn">Add</button><br> 
      </form>
      <form action="{{ url("item") }}/view"><button class="view btn">View</button></form></div> 




        {{-- JAVASCRIPT --}}
       
    <script>
      $(document).ready(function() 
      {
        var path = "{{ route('autocomplete') }}";
        $('#amtt').typeahead({
          source: function(terms, process)
          {
            return $.get(path, {terms:terms}, function(data)
            {
              return process(data);
            });
          }
        });
      });

      $('#quant, #cost').change(function()
      {
        var price = parseFloat($('#quant').val());
        var qty = parseFloat($('#cost').val());

        $('#totcost').val(price * qty);    
      });
      </script>
</body>
</html>
