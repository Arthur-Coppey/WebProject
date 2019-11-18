<form method="GET" action="{{ 'shop' }}">
    <select name="by" type="text">
        <option value disabled selected>Trier par</option>
        <option value="label">Nom</option>
        <option value="price">Prix</option>
    </select><br>
    <input type="radio" name="order" value="asc" checked>asc<br>
    <input type="radio" name="order" value="desc">desc<br>
    <input type="text" name="search" placeholder="Vous cherchez quelque chose ?">
    <input type="submit" value="chercheh">
</form>
