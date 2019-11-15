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
                        <button type="button" class="headerRight btn btn-primary btn-sm">
                            <a href="/register" class="loginRegisterText" style = "text-decoration: none; color :white">Inscription</a>
                        </button>
                    </td>
                    <td>
                        <button type="button" class="ouvrir headerRight btn btn-secondary btn-sm">
                                {{-- <a href="#volet" class="loginRegisterText" style = "text-decoration: none; color :white">Connexion</a> --}}
                                <a href="/login" class="loginRegisterText" style = "text-decoration: none; color :white">Connexion</a>
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


                    {{-- <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li> --}}
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
