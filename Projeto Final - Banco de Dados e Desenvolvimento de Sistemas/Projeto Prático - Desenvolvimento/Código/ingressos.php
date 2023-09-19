<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="./image/film-roll.png"/>
    <title>ᑕIᑎEᗰIᑕ Iᖴ</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <style>
        img{ width: 20px;
            height: 20px;}
    </style>
    
    <header class="header">
        <nav class="menu">
            <ul>
                <li>
                    <a href="./index.html"><img src="./image/de-volta.png"></a>
                </li>
                <li>
                    <p>"𝕆 𝕞𝕖𝕝𝕙𝕠𝕣 ℂ𝕚𝕟𝕖𝕞𝕒 𝕕𝕠 𝕊𝕖𝕦 𝕀𝔽𝕊ℙ."</p>
                </li>
            </ul>
        </nav>
    </header>

    <fieldset>
        <div id="div2"><h1>ᑕIᑎEᗰIᑕ Iᖴ - 𝙄𝙣𝙜𝙧𝙚𝙨𝙨𝙤𝙨</h1></div>
    </fieldset>

    <br>

    <fieldset>
    <?php
        include("classes.php");

        $sessao1->imprimeIngressos();
        $sessao2->imprimeIngressos();
        $sessao3->imprimeIngressos();
        

    ?>
    </fieldset>

</body>
</html>