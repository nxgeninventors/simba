<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <title>clients table</title>
</head>
<body>
<div class="container py-5">
    @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <form id="form"  style="background: aliceblue;padding:20px;border-radius:10px;">    
         {{ csrf_field() }}
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">Name</label>
                <input type="text" class="form-control" id="name" placeholder="Name" name="name">
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Website</label>
                <input type="text" class="form-control" id="website" placeholder="website" name="website">
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Industry</label>
                <input type="text" class="form-control" id="industry" placeholder="industry" name="industry">
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Description</label>
                <input type="text" class="form-control" id="description" placeholder="description" name="description">
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Country id</label>
                <select id="country" class="form-control" name="country_id" >
                <option value=""></option>
                @foreach($country as $countries)
                <option  value="{{$countries->id}}">{{$countries->name}}-{{$countries->country_code}}</option>
                @endforeach
                </select>
            </div> 
            <div class="form-group col-md-6 space">
                <label for="inputPassword4">Mobile</label>
                <input type="number" class="form-control" id="mobile" placeholder="mobile" name="mobile">
            </div>

        </div>
        <div class="form-group">
                <label for="inputPassword4">Email</label>
                <input type="email" class="form-control" id="email" placeholder="email" name="email">
            </div>
        <div class="form-group">
            <label for="inputAddress">Street Address</label>
            <input type="text" class="form-control" id="address" placeholder="1234 Main St" name="street_address">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCity">City</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="Krishnagiri">
            </div>
            <div class="form-group col-md-4">
                <label for="inputState">State</label>
                <input type="text" class="form-control" id="state" placeholder="Tamilnadu" name="state">
            </div>
            <div class="form-group col-md-2">
                <label for="inputZip">Zip</label>
                <input type="text" class="form-control" id="zip" name="zip" placeholder="636800">
            </div>
        </div>
        <button type="submit" class="btn btn-primary" id="submit">Submit</button>
    </form>
</div>

   <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Website</th>
                <th scope="col">Industry</th>
                <th scope="col">Description</th>
                <th scope="col">country Id</th>
                <th scope="col">Mobile</th>
                <th scope="col">Email</th>
                <th scope="col">Street Sddress</th>
                <th scope="col">City</th>
                <th scope="col">State</th>
                <th scope="col">Zip</th>
            </tr>
        </thead>
        <tbody>
            @foreach($client as $clients)
            <tr>
                <td>{{$clients->id}}</td>
                <td>{{$clients->name}}</td>
                <td>{{$clients->website}}</td>
                <td>{{$clients->industry}}</td>
                <td>{{$clients->description}}</td>
                <td>{{$clients->country_id}}</td>
                <td>{{$clients->mobile}}</td>
                <td>{{$clients->email}}</td>
                <td>{{$clients->street_address}}</td>
                <td>{{$clients->city}}</td>
                <td>{{$clients->state}}</td>
                <td>{{$clients->zip}}</td>
            </tr>
            @endforeach
        </tbody>
   </table>
   <div>
    {!! $client !!}
   </div>
</body>
<script>
    $(document).ready(function() {
        $('#country').select2({
            placeholder:'select a country'
        });
        
        $('#submit').click(function(e){
            e.preventDefault();
            console.log('hello');
            var name=$('#name').val();
            $.ajax({
                method:'post',
                url:'/client_save',
                data:$('#form').serialize(),
                success:function(data){
                    console.log(data['name']);
                    $('#name').val('');

                    $('thead').append(data);
                } 
            });

        });
    });
</script>
</html>