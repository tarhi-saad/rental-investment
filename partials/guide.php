<div class="container page-block" id="guideModalBlock">
  <div class="row align-items-lg-center bg-lighter-blue no-gutters">
    <div class="col-lg">
      <div>
        <img class="img-fluid" src="img/guide-annuel-2019.jpg" alt="Guide annuel 2019 - Impôts et patrimoine" width="100%" />
      </div>
    </div>
    <div class="col-lg">
      <div class="text-block">
        <p class="text-uppercase text-white large-size">
          Guide annuel <span class="font-weight-bold">2019</span><br />
          <span class="font-weight-bold larger-size">Impôts & patrimoine</span>
        </p>
        <!-- <a role="button" href="#" class="btn btn-outline-primary button telecharger-btn">Télécharger</a> -->

        <!-- Button trigger modal -->
        <!-- <button type="button" class="btn btn-outline-primary button telecharger-btn" data-toggle="modal" data-target="#guideModal">
          Télécharger
        </button> -->

        <a role="button" href="#guide-2019" class="btn btn-outline-primary button telecharger-btn sendlink" data-toggle="modal" data-target="#guideModal">
          Télécharger
        </a>

        <!-- Modal -->
        <div class="modal fade guide-modal" id="guideModal" tabindex="-1" role="dialog" aria-labelledby="guideModalTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <img src="/img/guide-annuel-2019.jpg" class="img-fluid" alt="Guide annuel 2019 - investissement locatif">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p>
                  Pour télécharger gratuitement notre Guide, veuillez svp entrer votre numéro de téléphone.
                </p>
              </div>
              <div class="modal-footer">
                <div id="block1">
                  <input type="tel" id="tel" class="form-control" placeholder="Numéro en 06 ou 07">
                  <button id="send-link" class="btn btn-outline-primary button telecharger-btn">Recevoir mon lien de téléchargement</button>
                </div>
                <div class="loader-block" id="block2">
                  <div class="loader"></div>
                  <span>Veuillez patienter</span>
                </div>
                <div id="block3">
                  <p>Merci de saisir le code de téléchargement reçu</p>
                  <input type="text" id="code"><br>
                  <button id="send-code" style="background:#428bca;color:white"  class="btn btn-primary btn-normal btn-primary" >Valider mon code</button>
                </div>
                <div id="block4">
                  <a id="link" href=""  class="btn btn-outline-primary button telecharger-btn" target="_blank" >Télécharger le guide.</a>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
