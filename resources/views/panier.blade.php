@extends('layouts.index')
@section('navbar')

     @include('layouts/partials/_navbar')
     

@endsection('navbar')
@section('main')

@guest 
@if (Route::has('register'))

    @include('layouts/partials/_notconnected')

@endif
{{-- connecter --}}
@else

<table class="list-articles" width="60%">
    <thead class="categories-panier">
        <th scope="col" class="txt-cate cate-photo">Photo</th>
        <th scope="col" class="txt-cate on-right">Nom</th>
        <th scope="col" class="txt-cate on-right">Prix Unitaire</th>
        <th scope="col" class="txt-cate on-right">Nombre d'articles</th>
        <th scope="col" class="txt-cate on-right">Prix total</th>
    </thead>
    <tbody>
        <tr class="article">
            <td class="icon-article-cell">
                <img class="article-icon" src="img/boof.png">
            </td>
            <td class="nom-article on-right">
                <a class="text-articles-panier text-nom">P A S S</a>
            </td>
            <td class="prix-unitaire on-right">
                <a class="text-articles-panier val-prix-unit">10 €</a>
            </td>
            <td class="quantite-article on-right">
                <a class="text-articles-panier val-qtt">2 pièces</a>
            </td>
            <td class="prix-total-article on-right">
                <a class="text-articles-panier prix-tot">20 €</a>
            </td>
        </tr>
        <tr class="article">
            <td class="icon-article-cell">
                <img class="article-icon" src="img/boof2.png">
            </td>
            <td class="nom-article on-right">
                <a class="text-articles-panier text-nom">T H E</a>
            </td>
            <td class="prix-unitaire on-right">
                <a class="text-articles-panier val-prix-unit">20 €</a>
            </td>
            <td class="quantite-article on-right">
                <a class="text-articles-panier val-qtt">2 pièces</a>
            </td>
            <td class="prix-total-article on-right">
                <a class="text-articles-panier prix-tot">40 €</a>
            </td>
        </tr>
        <tr class="article">
            <td class="icon-article-cell">
                <img class="article-icon" src="img/boof3.png">
            </td>
            <td class="nom-article on-right">
                <a class="text-articles-panier text-nom">B O O F</a>
            </td>
            <td class="prix-unitaire on-right">
                <a class="text-articles-panier val-prix-unit">30 €</a>
            </td>
            <td class="quantite-article on-right">
                <a class="text-articles-panier val-qtt">2 pièces</a>
            </td>
            <td class="prix-total-article on-right">
                <a class="text-articles-panier prix-tot">60 €</a>
            </td>
        </tr>
    </tbody>
</table>

<table class="totaux" width="60%">
    <tbody>
        <tr class="infos-panier">
            <td class="padding-total" width="60%">
            </td>
            <td class="txt-totaux total on-right">
                <a class="text-articles-panier text-total">TOTAL :</a>
            </td>
            <td class="txt-totaux total-article on-right" width="9%">
                <a class="text-articles-panier nb-total-article">6 pièces</a>
            </td>
            <td class="txt-totaux total-article on-right" width="16%">
                <a class="text-articles-panier prix-total-panier">120 €</a>
            </td>
        </tr>
    </tbody>
</table>

<div class="payer">
    <div class="payer-box">
            <a class="payer-text" href="/payer" style="text-decoration: none; color: white;">
                PAYER
            </a>
    </div>
</div>

@endguest


@endsection('main')
