@extends('layouts.index')
@section('navbar')

     @include('layouts/partials/_navbar')
     

@endsection('navbar')
@section('main')

<table class="list-articles" width="60%">
    <tbody>
        <tr class="categories-panier">
            <th scope="col" class="cate-photo">Photo</th>
            <th scope="col" class="on-right">Nom</th>
            <th scope="col" class="on-right">Prix Unitaire</th>
            <th scope="col" class="on-right">Nombre d'articles</th>
            <th scope="col" class="on-right">Prix total</th>
        </tr>
        <tr class="article">
            <td class="icon-article-cell">
                <img class="article-icon" src="img/boof.png">
            </td>
            <td class="nom-article on-right">
                <a class="text-nom">P A S S</a>
            </td>
            <td class="prix-unitaire on-right">
                <a class="val-prix-unit">10 €</a>
            </td>
            <td class="quantite-article on-right">
                <a class="val-qtt">2 pièces</a>
            </td>
            <td class="prix-total-article on-right">
                <a class="prix-tot">20 €</a>
            </td>
        </tr>
        <tr class="article">
            <td class="icon-article-cell">
                <img class="article-icon" src="img/boof2.png">
            </td>
            <td class="nom-article on-right">
                <a class="text-nom">T H E</a>
            </td>
            <td class="prix-unitaire on-right">
                <a class="val-prix-unit">20 €</a>
            </td>
            <td class="quantite-article on-right">
                <a class="val-qtt">2 pièces</a>
            </td>
            <td class="prix-total-article on-right">
                <a class="prix-tot">40 €</a>
            </td>
        </tr>
        <tr class="article">
            <td class="icon-article-cell">
                <img class="article-icon" src="img/boof3.png">
            </td>
            <td class="nom-article on-right">
                <a class="text-nom">B O O F</a>
            </td>
            <td class="prix-unitaire on-right">
                <a class="val-prix-unit">30 €</a>
            </td>
            <td class="quantite-article on-right">
                <a class="val-qtt">2 pièces</a>
            </td>
            <td class="prix-total-article on-right">
                <a class="prix-tot">60 €</a>
            </td>
        </tr>
    </tbody>
</table>

<table class="totaux" width="60%">
    <tbody>
        <tr class="infos-panier">
            <td class="total on-right">
                <a class="text-total">TOTAL :</a>
            </td>
            <td class="total-article on-right" width="9%">
                <a class="nb-total-article">6 pièces</a>
            </td>
            <td class="total-article on-right" width="9%">
                <a class="prix-total-panier">120 €</a>
            </td>
        </tr>
    </tbody>
</table>

@endsection('main')
