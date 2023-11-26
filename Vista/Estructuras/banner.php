
<!-- ________________________________________ BANNER ___________________________________________ -->
<style>

    /*-------------------------------------- FUENTES ---------------------------------------------*/
    @font-face {
    font-family: 'playballregular';
    src: url('../fonts/Playball/playball-regular-webfont.woff2') format('woff2'),
         url('../fonts/Playball/playball-regular-webfont.woff') format('woff');
    font-weight: normal;
    font-style: normal;
    }

    @font-face {
    font-family: 'robotolight';
    src: url('../fonts/Roboto/roboto-light-webfont.woff2') format('woff2'),
         url('../fonts/Roboto/roboto-light-webfont.woff') format('woff');
    font-weight: normal;
    font-style: normal;
    }

    /*-------------------------------------- ESTILO h1 -------------------------------------------*/
    .display-4 {
        font-family: 'playballregular', sans-serif;
        font-size: 6em;
    }

    /*-------------------------------------- ESTILO p --------------------------------------------*/
    .lead {
        font-family: 'robotolight', sans-serif;
        font-weight: bold;
        font-size: 1.3em;
    }

    /*-------------------------------------- ESTILO BANNER ---------------------------------------*/
    .jumbotron {
        background-image: linear-gradient(rgba(0, 0, 0, 0.226), rgba(0, 0, 0, 0.2)),
            url('../img/Banners/Banner10.jpg');
        background-size: cover;
        color: white; /*Color del texto dentro del banner*/
        height: 300px; /*Alto del banner*/
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

</style>

<div class="jumbotron text-center mx-auto">
    <h1 class="display-4">Tecno-Mates</h1>
    <p class="lead">Explora una experiencia única de mate en nuestra tienda: calidad, sabor y momentos inolvidables</p>
</div>
<!-- ________________________________________ FIN BANNER _______________________________________ -->
