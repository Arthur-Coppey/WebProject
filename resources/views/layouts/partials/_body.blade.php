<title>BDE CESI Bordeaux : Accueil</title>

<div class="body">

    <section class="banniereBde">
        <img class="banniere" src="img/banniere.png">
    </section>

    <section class="nextEvents">

        <h2 class="bodyTitle" style="font-size: 2vw;">Nos prochains événements</h2>

        <hr class="traitSeparation" width="50%" color="black">

        <table class="events">
            <tbody>
                <tr>
                    <td align="center">
                        <img class="imgEvent" src="img/event/soireeBde.png">
                        <p class="eventName" style="font-size: 1vw;">Evénement 1</p>
                    </td>
                    <td align="center">
                        <img class="imgEvent" src="img/event/image.png">
                        <p class="eventName" style="font-size: 1vw;">Evénement 2</p>
                    </td>
                    <td align="center">
                        <img class="imgEvent" src="img/event/image.png">
                        <p class="eventName" style="font-size: 1vw;">Evénement 3</p>
                    </td>
                </tr>
            </tbody>
        </table>
    </section>

    {{-- @php
        $orderContent = (App\OrderContent::all('product_id'));
        $sizeOrderContent = count(App\OrderContent::all());

        for($i=0;$i<$sizeOrderContent;$i++){
            $tab = array($orderContent[$i]['product_id']);
            // echo $orderContentTab['amount'];
            // echo $orderContentTab['product_id'];
            $lol= array_count_values($tab);
            print_r(array_count_values($tab));

        }

    @endphp --}}

 
    
    <section class="shopPreview">

        <h2 class="bodyTitle" style="font-size: 2vw;">Articles</h2>

        <hr class="traitSeparation" width="50%" color="black">

        <table class="articles">
            <tbody>
                <tr>
                    <td align="center">
                        <img class="imgArticles" id="mostRecentArticle" src="img/shop/tshirtBde.png">
                        <p class="articleType" style="font-size: 1vw;">Le plus récemment ajouté</p>
                    </td>
                    <td align="center">
                        <img class="imgArticles" id="mostLikedArticle" src="img/shop/bobBde.png">
                        <p class="articleType" style="font-size: 1vw;">Le plus liké</p>
                    </td>
                    <td align="center">
                        <img class="imgArticles" id="mostSoldArticle" src="img/shop/pullBde.png">
                        <p class="articleType" style="font-size: 1vw;">Le plus vendu</p>
                    </td>
                </tr>
            </tbody>
        </table>
    </section>
</div>