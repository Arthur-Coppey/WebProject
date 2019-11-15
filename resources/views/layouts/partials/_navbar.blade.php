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
                <p>BDE BORDEAUX</p>
            </td>
            <td>
                {{-- pas connecter --}}
                @guest 
                @if (Route::has('register'))
                <td>
                    <button type="button" class="headerRight btn btn-primary btn-sm" id="btnGauche">
                        <a href="/register" style="text-decoration: none">
                            <p class="loginRegisterText">Inscription</p>
                        </a>
                    </button>
                </td>
                <td>
                    <button type="button" class="ouvrir headerRight btn btn-secondary btn-sm" id="btnDroit">
                        <a href="/login" class="bouton-test" style="text-decoration: none">
                            <p class="loginRegisterText">Connexion</p>
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

<<<<<<< HEAD


=======
>>>>>>> e1b0e6e6e3979297faa2d77b256ff9b329c03db5
                @endguest

            </td>

        </tr>
    </tbody>
</table>




<div id="volet_clos">
	<div id="volet">
            <table class="logWindow">
                <tbody>
                    <tr>
                        <td>Pseudo</td>
                        <td>Mot de passe</td>
                    </tr>
                    <tr>
                        <td><input type="text"></td>
                        <td><input type="text"></td>
                    </tr>
                </tbody>
            </table>
		<div class="onglets">
			<a href="#volet_clos" class="fermer" aria-hidden="true"><button type="button" class="btn btn-secondary">Fermer</button></a>
		</div>
	</div>
</div>
