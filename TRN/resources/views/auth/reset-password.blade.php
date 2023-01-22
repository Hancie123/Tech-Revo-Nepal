<!DOCTYPE html>
<html>

<head>
    <title>Reset Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('icons\apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('icons\android-chrome-192x192.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('icons\android-chrome-512x512.png')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body>
    <div class="container px-5 pb-5 border w3-display-middle" style="width:50%">
        <h2 class="text-center">Reset Password</h2>
        <form class="w3-container">
            @csrf

            <label>Email</label>
            <input class="w3-input w3-border" name="email" value="{{old('email')}}" type=" email">
            <br>
            <label>New Password</label>
            <input class="w3-input w3-border" name="password" type="text">
            <br>
            <label>Confirmed Password</label>
            <input class="w3-input w3-border" name="password_confirmation" type="text">
            <br>
            <button type="submit" class="btn btn-primary">Reset Password</button>

        </form>

    </div>


</body>




</html>