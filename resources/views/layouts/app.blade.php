<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <livewire:styles />
    <livewire:scripts />
    <x-livewire-alert::scripts />
    
</head>
<body>
    
    <div id="loadingSpinner">Loading</div>
    
    <div id="app">
        
        @include('layouts.nav')
        
        <main class="py-4">
            @yield('content')
        </main>
        
    </div>
    
    <script src="https://cdns.gigya.com/js/gigya.js?apikey={{ env('GIGYA_KEY') }}&lang=es"></script>
    <script>
        
        function hideSpinner() {
            
            let spinner = document.getElementById('loadingSpinner');
            spinner.classList.add('d-none');
        }
        
        function showSpinner() {
            let spinner = document.getElementById('loadingSpinner');
            spinner.classList.remove('d-none');
            
        }
        
        function RegistrationLogin(_callback){
            gigya.accounts.showScreenSet({screenSet:'eg-RegistrationLogin', startScreen:'eg-login-screen'});
            hideSpinner();    
        }
        
        function getLoginScreen(_callback){
            gigya.accounts.showScreenSet({screenSet:'eg-RegistrationLogin', startScreen:'eg-login-screen'});
            hideSpinner();    
        }
        
        function getRegistrationScreen(_callback){
            gigya.accounts.showScreenSet({screenSet:'eg-RegistrationLogin', startScreen:'eg-registration-screen'});
            hideSpinner();    
        }
        
        function init()
        {
            
            let loginLink = document.getElementById("gigya-login");
            let registrationLink = document.getElementById("gigya-registration");
            let logoutLink = document.getElementById("gigya-logout");
            
            // Botón de login
            if(loginLink){
                loginLink.addEventListener("click", function(){
                    showSpinner();
                    getLoginScreen();
                });
            }
            
            // Botón de registro
            if(registrationLink){
                registrationLink.addEventListener("click", function(){
                    showSpinner();
                    getRegistrationScreen();
                });
            }

            // Botón de logout
            if(logoutLink){
                logoutLink.addEventListener("click", function(){
                    showSpinner();
                    gigya.socialize.logout({callback:showResponse});
                });
            }
            
            gigya.socialize.getUserInfo({
                callback: getUI
            });
            
            gigya.socialize.addEventHandlers({
                onConnectionAdded: getUI,
                onConnectionRemoved: getUI
            });
            
        }
        
        // Obtener el perfil del usuario
        function getUI(res) {
            
            //Si existe usuario logueado
            if (res.user != null && res.user.isConnected) {
                verifyUser(res);
            }
            //botones(res);
        }
        
        function botones(object) {
            if (object.user != null && object.user.isConnected) {
                $('#gigya-login, #gigya-register').css({
                    "display": "none"
                });
                $('#gigya-profile, #gigya-logout').css({
                    "display": "inline"
                });
            } else {
                $('#gigya-profile, #gigya-logout').css({
                    "display": "none"
                });
                $('#gigya-login, #gigya-register').css({
                    "display": "inline"
                });
            }
        }
        
        
        // Response control
        function showResponse(eventObj) {
            
            showSpinner();
            //Pintar UI
            if (eventObj.eventName == "login") {
                getUI(eventObj);
            } else if (eventObj.eventName == "logout") {
                verifyUser(eventObj);
            }
        }
        
        function verifyUser(object) {
            
            axios({
                method: 'post',
                url: "{{ route('gigya.user-verification') }}",
                data: { 
                    data: object.user,
                    lastName: "{{ csrf_token() }}"
                }
            }).then((response) => {

                if(response.data && response.data.action === 'login' || response.data && response.data.action === 'logout'){
                                           
                    location.reload();
 
                    if(response.is_retail === true){
                        var url = "{{ route('home') }}";
                        window.location.href = url;
                    }else{
                        location.reload();
                    }
                    
                }
            }, (error) => {
                console.table("ERR",error);
            });
            
        }
        
        document.addEventListener("DOMContentLoaded", function () {
            
            hideSpinner();
            init();
            
            //Listeners de evento de socialize
            gigya.socialize.addEventHandlers({
                onLogin: showResponse,
                onLogout: showResponse,
                onConnectionAdded: showResponse,
                onConnectionRemoved: showResponse
            });
        }, false);
        
        
        
    </script>
</body>
</html>
