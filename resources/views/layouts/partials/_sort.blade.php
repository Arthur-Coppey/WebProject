<center><form method="GET" action="{{ 'shop' }}">
    <select class="sort-criter" name="by" type="text">
        <option value disabled selected>Trier par</option>
        <option value="label">Nom</option>
        <option value="price">Prix</option>
    </select><br>
    <input type="radio" name="order" value="asc" checked>Par ordre croissant<br>
    <input type="radio" name="order" value="desc">Par ordre décroissant<br>
    <input class="search-box" type="text" name="search">
    <input class="search-butt" type="submit" value="Rechercher">
</form></center>