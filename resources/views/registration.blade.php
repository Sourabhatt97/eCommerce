<!DOCTYPE html>
<html>
<head>
    <title>Add Details</title>
    
    <meta http-equiv="Content-Type" content="text/html; charset=Western (ISO-8895-1)" />
    <link rel="stylesheet" type="text/css" href="css/frontend.css">
    <script src="//code.jquery.com/jquery-1.9.1.js"></script>
    <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>

    <style>
        input[type=number]::-webkit-inner-spin-button, 
        input[type=number]::-webkit-outer-spin-button { 
            -webkit-appearance: none; 
            margin: 0; 
        }

        #myform .error
        {
            color: red;
        }

    </style>

</head>
<body>
    @if (session('message'))
    <div id = "success"  class="alert alert-success alert-white alert-dismissible fade show" role="alert">
        {{ session('message') }}
    </div>
    @endif

    <center>
        <form action="{{ route('register') }}" id = "myform" method = "post">
            @csrf

            @if(isset($data))
                Name:- <input type="text" name="name" value="{{$data->name}}"><br>
                Email:- <input type="email" name="email" value="{{$data->email}}"><br>
            @endisset

            <div class="form-group row">
                <label for="gender" class="col-md-4 col-form-label text-md-right"><center>{{ __('Gender ') }}</center></label>  
                <div class="col-md-6">
                    <input type = "radio" name = "gender" value = "Male" Checked> Male<br>
                    <input type = "radio" name = "gender" value = "Female"> Female<br>
                    <input type = "radio" name = "gender" value = "Other"> Other<br>
                </div>                            

                @error('gender')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                </div>
            </div>


            <input type="submit" id = "button" value="submit">
        </form>
    </center>

</body>
<script type="text/javascript">
    $(document).ready(function(){
        $("#myform").validate({
            rules: 
            {
                name:
                {
                    required: true
                },
                email:
                {
                    required: true,
                    email: true
                },
                phone:
                {
                    required: true,
                    digits: true,
                    minlength: 10,
                    maxlength: 10
                },
                password:
                {
                    required: true,
                    minlength: 8
                },

                password_confirmation:
                {
                    required: true,
                    equalTo: "#password"
                }
            },

            messages:
            {
                name: 'Name is required',
                email: 'Enter valid email address',
                phone: 'Enter valid phone number',
                password: 'Password is required',
                password_confirmation: 'Both password must be same',
            },
        });
    });
</script>   
</html>