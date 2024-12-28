<style>
.login-container {
  background-color: white;
  padding: 20px 30px;
  border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  text-align: center;
  width: 350px;
}

.login-title {
  font-size: 24px;
  color: #5a2d82;
  margin-bottom: 20px;
}

.login-form {
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

.login-button {
  background-color: #5a2d82;
  color: white;
  border: none;
  padding: 10px;
  border-radius: 4px;
  font-size: 16px;
  cursor: pointer;
}

.login-button:hover {
  background-color: #4a2370;
}

.signup-text {
  margin-top: 15px;
  font-size: 14px;
  color: #555;
}

.signup-link {
  color: #5a2d82;
  text-decoration: none;
  font-weight: bold;
}

.signup-link:hover {
  text-decoration: underline;
}
</style>
@extends('Menu.main')
@section('content')
    <div class="container-main container-fluid d-flex justify-content-center align-items-center pb-5 px-0" >
        <div class="login-container">
            <h1 class="login-title">LOG IN</h1>
            <form action="{{ route('login') }}" method="POST" class="login-form">
              @csrf
              <input type="email" placeholder="Email" class="input-field" name="email">
              <div class="password-container">
                <input type="password" placeholder="password" class="input-field" name="password">
                <span class="toggle-password">👁</span>
              </div>
              <button type="submit" class="login-button">LOG IN</button>
            </form>
            <p class="signup-text">Don't have an account? <a href="{{ route('register') }}" class="signup-link">SIGN IN</a></p>
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