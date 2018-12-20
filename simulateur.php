<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Simulateur</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="css/main.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="partials/css/guide.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">

</head>

<body>
  <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

  <!-- Add your site or application content here -->

  <?php
    include '/partials/header.php';
  ?>

  <main id="content" role="main" class="text-center main-content">
    <div class="bg-img-hero bg-img-hero-simulateur" style="background-image: url(img/banner-simulateur-pinel.jpg)">
      <div class="container">
        <div class="row">
          <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Acceuil</a></li>
              <li class="breadcrumb-item active" aria-current="page">Simulateur</li>
            </ul>
          </nav>
        </div>
        <div class="simulateur-block">
          <h1 class="page-title">
            Simulateur pinel
            <span class="simulateur-30s">30s</span><br />
          </h1>
          <div class="simulateur-form-block d-flex justify-content-center">
            <div class="etape-demarrer tab">
              <div class="demarrer-title">Calculez votre réduction d'impôts</div>
              <button type="button" class="btn-demarrer btn btn-primary">Démarrer</button>
              <div class="note">Économisez jusqu'à <span>6000 € / an</span></div>
            </div>
            <form id='simulateurForm' method='POST' action='#'>
              <div class="etape-1 tab">
                <div class="etapes-title">Votre situation familiale</div>
                <div class="btn-group btn-group-toggle etapes-radio" data-toggle="buttons">
                  <label class="btn btn-secondary mr-sm-2">
                    <input type="radio" name="situation" id="marie" autocomplete="off"> Marié(e)
                  </label>
                  <label class="btn btn-secondary ml-sm-2">
                    <input type="radio" name="situation" id="pacse" autocomplete="off"> Pacsé(e)
                  </label>
                  <label class="btn btn-secondary mr-sm-2">
                    <input type="radio" name="situation" id="celib" autocomplete="off"> Célibataire
                  </label>
                  <label class="btn btn-secondary ml-sm-2">
                    <input type="radio" name="situation" id="divorce" autocomplete="off"> <span>Divorcé(e), veuf<br />Séparé(e)</span>
                  </label>
                </div>
              </div>
              <div class="etape-2 tab">
                <div class="etapes-title">Combien d'enfant avez-vous ?</div>
                <div class="btn-group btn-group-toggle etapes-radio" data-toggle="buttons">
                  <label class="btn btn-secondary mr-sm-2">
                    <input type="radio" name="enfant" id="enfant0" autocomplete="off"> 0
                  </label>
                  <label class="btn btn-secondary ml-sm-2">
                    <input type="radio" name="enfant" id="enfant1" autocomplete="off"> 1
                  </label>
                  <label class="btn btn-secondary mr-sm-2">
                    <input type="radio" name="enfant" id="enfant2" autocomplete="off"> 2
                  </label>
                  <label class="btn btn-secondary ml-sm-2">
                    <input type="radio" name="enfant" id="enfant3" autocomplete="off"> 3 +
                  </label>
                </div>
              </div>
              <div class="etape-3 tab">
                <div class="etapes-title">Quel âge avez-vous ?</div>
                <div class="input-group increment-input d-flex justify-content-center">
                  <input type='button' value='-' class='qtyminus btn' field='age' />
                  <input type='text' placeholder="Ex : 35" name='age' class='qty form-control' />
                  <input type='button' value='+' class='qtyplus btn' field='age' />
                </div>
              </div>
              <div class="etape-4 tab">
                <div class="etapes-title">Les revenus mensuels de votre foyer</div>
                <div class="input-group increment-input d-flex justify-content-center">
                  <input type='button' value='-' class='qtyminus btn' field='revenus' />
                  <input type='text' placeholder="Ex : 5000" name='revenus' class='qty form-control' />
                  <input type='button' value='+' class='qtyplus btn' field='revenus' />
                </div>
              </div>
              <div class="etape-5 tab">
                <div class="etapes-title">Recevoir mes résultats</div>
                <div class="form-group d-flex flex-wrap justify-content-center">
                  <input type='text' placeholder="Nom*" name='nom' class='form-control mr-sm-3' data-validation="required" data-validation-error-msg="Le nom est requis" />
                  <input type='text' placeholder="Prénom*" name='prenom' class='form-control ml-sm-3' data-validation="required" data-validation-error-msg="Le prénom est requis" />
                  <input type='text' placeholder="Code postal*" name='codePostal' class='form-control mr-sm-3' data-validation="required" data-validation-error-msg="Le code postal est requis" />
                  <input type='email' placeholder="Email*" name='email' class='form-control ml-sm-3' data-validation="email" data-validation-error-msg="L'adresse e-mail n'est pas valide" />
                  <input type='text' placeholder="Téléphone*" name='telephone' class='form-control mr-sm-3' data-validation="required" pattern="^(06|07)[0-9]{8}" data-validation-error-msg="Le numéro du téléphone est requis ou il est incorrect" />
                  <p class="ml-sm-3 text-left">
                    Dans un souci de sécurité, vous recevrez un SMS de
                     confirmation. N'oubliez pas de saisir le code à 4 chiffres
                      qui vous sera envoyé.<br />
                      <span>* Ces champs sont obligatoires</span>
                  </p>
                </div>
                <div class="d-flex flex-wrap justify-content-around">
                  <button type="submit" class="btn btn-primary">Par sms</button>
                  <button type="submit" class="btn btn-primary">Par Email</button>
                </div>
              </div>
              <div class="loading-form-simulateur"><div class="loading-inner"></div></div>
            </form>
            <!-- <span id="prevBtn" class="btn-left-simulation btn-direction-simulation"><img src="img/btn-left.png" alt="arrow left" width="37" height="37"></span>
            <span id="nextBtn" class="btn-right-simulation btn-direction-simulation"><img src="img/btn-right.png" alt="arrow right" width="37" height="37"></span> -->
            <button id="prevBtn" type="button" class="btn btn-primary btn-retour btn-nav-simulation scale">
              <i class="fas fa-undo-alt"></i>Retour
            </button>
            <button id="nextBtn" type="button" class="btn btn-primary btn-valider btn-nav-simulation scale">
              <i class="fas fa-check"></i>Valider
            </button>
          </div>
          <div class="privacy-message">
            Les données personnelles communiquées sont uniquement utilisées pour
             permettre l’utilisation des services Confiance invest.  Pour plus
              d'informations, consultez notre <a href="/politique-de-protection-des-donnees-personnelles/">politique de confidentialité</a> et de
               désinscription.
          </div>
        </div>
      </div>
    </div>

    <div class="container page-block page-block-simulateur-content">
      <h2 class="colored-line-after bg-light-blue-after-before title-simulateur-content">
        <span class="font-weight-bold">8</span> bonnes
         <span class="font-weight-bold">raisons</span><br />
         <span class="font-weight-bold sub-title">d'investir avec confiance</span>
      </h2>
      <div class="simulateur-content">
        <div class="row">
          <div class="col-md-6 pr-md-5">
            <div class="raison-block raison-block-1 text-left">
              Robien, Scellier,Duflot Pinel ….</br>
              30 ans d’expertise dans l’investissement locatif. Maitrise de la
               fiscalité et de la trésorerie, optimisation de la rentabilité.
            </div>
          </div>
          <div class="col-md-6 pl-md-5">
            <div class="raison-block raison-block-2 text-left">
              <span class="font-weight-bold">15000</span> logements construits.<br />
              Impliqué dans les programmes dès leur élaboration, Le Groupe
               Confiance assure la location des biens dès la livraison
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 pr-md-5">
            <div class="raison-block raison-block-3 text-left">
              <span class="font-weight-bold">6000</span> logements gérés.<br />
              Des savoir-faire reconnus permettent aux investisseurs de
               bénéficier des meilleures garanties locatives du marché.
            </div>
          </div>
          <div class="col-md-6 pl-md-5">
            <div class="raison-block raison-block-4 text-left">
              <span class="font-weight-bold">75%</span> des locations vacantes relouées le jour même. Offrir un cadre
               de vie harmonieux aux résidents est une mission quotidienne.
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 pr-md-5">
            <div class="raison-block raison-block-5 text-left">
              En <span class="font-weight-bold">60 jours</span> en moyenne le bien se revend. Un service dédié à la
               revente des biens en circuit-court, avec une parfaite
                connaissance de leur valeur
            </div>
          </div>
          <div class="col-md-6 pl-md-5">
            <div class="raison-block raison-block-6 text-left">
              La sécurité de vos proches est assurée. En cas d’accident de la
               vie, votre famille hérite d’un bien totalement payé et peut en
                jouir à sa convenance.
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 pr-md-5">
            <div class="raison-block raison-block-7 text-left">
              La rentabilité est optimisée.<br />
              Tout le cycle d’investissement est garanti jusqu’à la transaction
               finale, si vous souhaitez revendre votre bien.
            </div>
          </div>
          <div class="col-md-6 pl-md-5">
            <div class="raison-block raison-block-8 text-left">
              <span class="font-weight-bold">Votre avis est important.</span><br />
              Pas de démarche oppressive, aucune insistance de la part du
               conseil en investissement, une réponse claire à chacune de nos
                questions
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="guide-dark">
      <?php
        include '/partials/guide.php';
      ?>
    </div>
  </main>

  <?php
    include '/partials/footer.php';
  ?>

  <script src="js/vendor/modernizr-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script>
  window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>');
  </script>
  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>


  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments); }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('send', 'pageview');
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async defer></script>
</body>

</html>
