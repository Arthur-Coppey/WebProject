@extends('layouts.index')

@section('main')


<span class="notlogedcontainer">
    <div class="notlogedtext">
        Malheureusement, il semblerait que vous ne soyez pas connectés !<br>
        Veuillez vous connecter ou vous inscrire à l'aide des liens ci dessous !
    </div>
    <div>
        <table class="redirectlinks">
            <tr>
                <td class="redirectlinks">
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
            </tr>
        </table>
    </div>
</span>
@endsection

