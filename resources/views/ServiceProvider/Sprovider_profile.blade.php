@extends('layouts.base')
@section('content')


<!DOCTYPE html>
<html>
<head>
  <title>Responsive Table</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{asset('assets/css/style_for_table.css')}}"/>
</head>


 <center><h3> {{$sprov->name}}  </h3></center>


 <table class="table">
     <thead>
     	<tr>
     	 <th>Number</th>
        <th>Code</th>
     	 <th>rate Name</th>
        <th>rate price</th>
        <th>Approved y/n </th>
        
     	 
     	</tr>
     </thead>
     <tbody>
     <?php $i=0; ?>
     @foreach($get_customer as $V_get_customer)
     	  
     	  <tr>     
                  <tr>
                    <?php $i++; ?>
                <td data-label="Numbr">{{ $i }}</td>  
                <td data-label="Name">{{$V_get_customer->customer_name}}</td>
                <td data-label="Name">{{$V_get_customer->customer_email }}</td>
                <td data-label="Name">{{$V_get_customer->customer_phone}}</td>
                <td data-label="Name">Yes/no</td>
              
     	  	  
     	  	 
     	  
     	  </tr>
  @endforeach

     </tbody>
   </table>
   </body>
</html>

@endsection



