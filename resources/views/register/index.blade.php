
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - {{ $title }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/bootstrap.css">
    <link rel="stylesheet" href="/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/assets/css/app.css">
    <link rel="stylesheet" href="/assets/css/pages/auth.css">
</head>

<body>
<div id="auth">
        
<div class="row h-100">
    <div class="col-lg-5 col-12">
        <div id="auth-left">
            <h1 class="auth-title">Register</h1>
            <p class="auth-subtitle mb-5">Input your data to register to our website.</p>
            
            <form action="{{ route('register') }}" method="POST">
                @csrf
                @method('POST')
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text" class="form-control form-control-xl  @error('name') is-invalid @enderror" placeholder="Fullname" value="{{ old('name') }}" name="name" autofocus required>
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text" class="form-control form-control-xl  @error('username') is-invalid @enderror" placeholder="Username" value="{{ old('username') }}" name="username" autofocus required>
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text" class="form-control form-control-xl @error('email') is-invalid @enderror" placeholder="alex@gmail.com" name="email" value="{{ old('email') }}" required>
                    <div class="form-control-icon">
                        <i class="bi bi-envelope"></i>
                    </div>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror  
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="password" class="form-control form-control-xl @error('password') is-invalid @enderror" name="password" placeholder="Password" required>
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                
                <button type="submit" class="btn btn-primary btn-block btn-lg shadow-md mt-5">Register</button>
            </form>
            <div class="text-center mt-5 text-lg fs-4">
                <p class='text-gray-600'>Already have an account? <a href="/login" class="font-bold">Login</a>.</p>
            </div>
        </div>
    </div>
    <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right">

        </div>
    </div>
</div>

    </div>
</body>
</html>
