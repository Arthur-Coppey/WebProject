<script>
    //document.cookie = "acceptcookies=false";

    window.onload = function () {
        var cookieValue = getCookie("acceptcookies");
        if(cookieValue == "true") {
            document.getElementById("accordeon").style.display = 'none';
        } else {
            document.getElementById("accordeon").style.display = 'block';
        }
    }
</script>

<div id="accordeon" style="display: none;">
    <div class="card">
        <div class="collapse show" id="item1">
            <div class="card-body">
                <p class="card-text">
                    En poursuivant la navigation sur ce site, vous acceptez l'utilisation de Cookies pour vous proposer un contenu personnalisés et adaptés à vos centres d'intérêts
                </p>
                <button class="boutons-cookies" class="card-link" data-toggle="collapse" data-parent="#accordeon">
                    <a class="liens-boutons" style="text-decoration: none;" href="https://www.cnil.fr/fr/cookies-traceurs-que-dit-la-loihttps://www.cnil.fr/fr/cookies-traceurs-que-dit-la-loi">
                        En savoir plus
                    </a>
                </button>
                <button class="boutons-cookies" class="card-link" data-toggle="collapse" data-parent="#accordeon">
                    <a class="liens-boutons" style="text-decoration: none;" href="https://www.google.fr/">
                        Décliner
                    </a>
                </button>
                <button class="boutons-cookies" onclick="acceptCookies()" href="#item1" class="card-link" data-toggle="collapse" data-parent="#accordeon">
                    Accepter
                </button>
            </div>
        </div>
    </div>
</div>

<table class="headerTable">
    <tbody>
        <tr>
            <td style="width: 3%">
                <button class="w3-button w3-white w3-xlarge" onclick="w3_open()" >&#9776;</button>
            </td>
            <td style="width: 19%">
                <a class="navbarImg" href="/"><img class="responsive" src="/img/logoBDE.png" style="height: 7vw">
            </td>

            <td class="headerMiddle">
                <h1 class="header-title">
                    BDE BORDEAUX
                </h1>
            </td>
            <td>
                {{-- pas connecter --}}
                @guest 
                @if (Route::has('register'))
                <td>
                    <button type="button" class="headerRight btn btn-primary btn-sm" id="btnGauche">
                        <a href="/register" style="text-decoration: none">
                            <h3 class="loginRegisterText">Inscription</h3>
                        </a>
                    </button>
                </td>
                <td>
                    <button type="button" class="ouvrir headerRight btn btn-secondary btn-sm" id="btnDroit">
                        <a href="/login" class="bouton-test" style="text-decoration: none">
                            <h3 class="loginRegisterText">Connexion</h3>
                        </a>
                    </button>       
                </td>
                @endif
                {{-- connecter --}}
                @else
                <td style="width: 15%;">
                        <a href="/panier">
                            <i class="user-shop fas fa-shopping-basket" href="/panier"></i>
                        </a>
                    </td>
                    <td style="width: 15%;">
                        <a href="/profile">
                            <i class="user-shop fas fa-user-circle" href="/profile"></i> 
                        </a>
                    </td>



                @endguest

            </td>

        </tr>
    </tbody>
</table>
