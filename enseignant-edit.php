<?php
require_once "class/Enseignant.php";

$enseignant = new Enseignant;
$resultat = $enseignant->selectId("enseignant", "idenseignant", $_GET["idenseignant"]);


foreach ($resultat as $key => $value) {
    $$key = $value;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Enseignant - Edit</title>
</head>

<body>
    <header class="header">
        <div class="container flex">
            <div class="header__text">
                <h1>Conception et Programmation de Site web</h1>
                <h3>par Jaeri Park</h3>
            </div>
            <div class="header__img">
                <img src="./assets/img/codinggirl.svg" alt="a girl working on a laptop" class="header__image">
            </div>
        </div>
    </header>

    <div class="list">
        <div class="px">
            <div class="container">
                <h1 class="list__title">Enseignant - Edit</h1>
                <form action="enseignant-edit-post.php" method="post" class="form__create">
                    <input type="hidden" value="<?php echo $idenseignant; ?>" name="idenseignant">

                    <div class="form__nomComplet flex">
                        <div class="form__prenom">
                            <label for="prenom">Prénom</label>
                            <input type="text" id="prenom" name="prenom" maxlenght="30" value="<?php echo $prenom; ?>">
                        </div>

                        <div class="form__nom">
                            <label for="nom">Nom</label>
                            <input type="text" id="nom" name="nom" maxlenght="30" value="<?php echo $nom; ?>">
                        </div>
                    </div>

                    <div class="form__contact flex">
                        <div class="form__phone">
                            <label for="phone">Phone</label>
                            <input type="text" id="phone" name="phone" maxlenght="20" value="<?php echo $phone; ?>">
                        </div>

                        <div class="form__courriel">
                            <label for="courriel">Courriel</label>
                            <input type="text" id="courriel" name="courriel" maxlenght="100" value="<?php echo $courriel; ?>">
                        </div>
                    </div>

                    <div class="form__groupeSubmit flex">
                        <div class="form__btn">
                            <input class="form__submit" type="submit">
                            <a href="enseignant-delete.php?idenseignant=<?php echo $idenseignant; ?>" class="delete"><i class="fa-solid fa-trash"></i></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


</body>

</html>