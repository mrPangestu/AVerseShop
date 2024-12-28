<style>
    .signin-container {
    background-color: white;
    padding: 25px 35px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
    width: 400px;
    }

    .signin-title {
    font-size: 24px;
    color: #5a2d82;
    margin-bottom: 20px;
    }

    .signin-form {
    display: flex;
    flex-direction: column;
    gap: 15px;
    }

    .input-field {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    width: 100%;
    }

    .password-container {
    position: relative;
    }

    .password-container .toggle-password {
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
    font-size: 14px;
    }

    .signin-button {
    background-color: #5a2d82;
    color: white;
    border: none;
    padding: 10px;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
    }

    .signin-button:hover {
    background-color: #4a2370;
    }

    .signin-footer {
    margin-top: 15px;
    font-size: 14px;
    color: #555;
    }

    .signin-link {
    color: #5a2d82;
    text-decoration: none;
    font-weight: bold;
    }

    .signin-link:hover {
    text-decoration: underline;
    }

</style>
@extends('Menu.main')
@section('content')
    <div class="container-main container-fluid d-flex justify-content-center align-items-center pb-5 px-0" >
        <div class="signin-container mt-5">
            <h1 class="signin-title">SIGN IN</h1>
            <form action="{{ route('register') }}" method="POST" class="signin-form">
                @csrf
                <input type="text" placeholder="Nama lengkap" class="input-field" name="name">
                <input type="email" placeholder="Email" class="input-field" name="email">
                <div class="password-container">
                    <input type="password" placeholder="Password" class="input-field" name="password">
                    <span class="toggle-password">👁</span>
                </div>
                <div class="password-container">
                    <input type="password" placeholder="Ulangi Password" class="input-field" name="password_confirmation">
                    <span class="toggle-password">👁</span>
                </div>
                <button type="submit" class="signin-button">SIGN IN</button>
            </form>
            <p class="signin-footer">Already have an account? <a href="{{ route('login') }}" class="signin-link">LOG IN</a></p>
            </div>
    </div>
    
@endsection
@include('Menu.navbar')
@include('Menu.footer')

<script>
    document.addEventListener("DOMContentLoaded", () => {
    const passwordInput = document.querySelector(".password-container input");
    const togglePassword = document.querySelector(".toggle-password");

    togglePassword.addEventListener("click", () => {
        const isPassword = passwordInput.getAttribute("type") === "password";
        passwordInput.setAttribute("type", isPassword ? "text" : "password");
        togglePassword.textContent = isPassword ? "🙈" : "👁"; // Ubah ikon mata
    });
    });

</script>