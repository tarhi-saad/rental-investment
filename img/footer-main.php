<footer class="motopress-wrapper footer hide-block">
  <div class="container">
    <div class="row">
      <div class="<?php echo cherry_get_layout_class( 'full_width_content' ); ?>" data-motopress-wrapper-file="wrapper/wrapper-footer.php" data-motopress-wrapper-type="footer" data-motopress-id="<?php echo uniqid() ?>">

        <?php /* Wrapper Name: Footer */ ?>
        <div class="container">
          <div class="row d-flex footer-widgets">
            <div class="span2 col-auto" data-motopress-type="dynamic-sidebar" data-motopress-sidebar-id="footer-sidebar-1">
              <?php dynamic_sidebar("footer-sidebar-1"); ?>
            </div>
            <div class="span2 col-auto" data-motopress-type="dynamic-sidebar" data-motopress-sidebar-id="footer-sidebar-2">
              <?php dynamic_sidebar("footer-sidebar-2"); ?>
            </div>
            <div class="span2 col-auto" data-motopress-type="dynamic-sidebar" data-motopress-sidebar-id="footer-sidebar-3">
              <?php dynamic_sidebar("footer-sidebar-3"); ?>
            </div>
            <div class="span4 col-auto ml-auto">
              <div class="indent_left">
                <div data-motopress-type="dynamic-sidebar" data-motopress-sidebar-id="footer-sidebar-5">
                  <?php dynamic_sidebar("footer-sidebar-5"); ?>
                </div>
                <div data-motopress-type="static" data-motopress-static-file="static/static-footer-text.php">
                  <?php get_template_part("static/static-footer-text"); ?>
                </div>
                <div data-motopress-type="static" data-motopress-static-file="static/static-footer-nav.php">
                  <?php get_template_part("static/static-footer-nav"); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <img src="https://confiance-invest.fr/tracking/pixinf.php?i=827&t=view" alt="pixinf" border="0" height="1" width="1" style="display:none;" />
        <link href='//fonts.googleapis.com/css?family=Roboto:400,300,500,700,900|Ubuntu:400,400italic,700|Archivo+Narrow:400,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo get_stylesheet_directory_uri() . "/unikapps/parrainage/css/style.css?v=".time(); ?>"/>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
      </div>
    </div>
  </div>
</footer>
<!--End #motopress-main-->
</div>
<div id="back-top-wrapper" class="visible-desktop">
<p id="back-top">
  <?php echo apply_filters( 'cherry_back_top_html', '<a href="#top"><span></span></a>' ); ?>
</p>
</div>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$( function() {
$( "#datepicker" ).datepicker({ minDate: 0 });
});

/* French initialisation for the jQuery UI date picker plugin. */
/* Written by Keith Wood (kbwood{at}iinet.com.au),
    Stéphane Nahmani (sholby@sholby.net),
    Stéphane Raimbault <stephane.raimbault@gmail.com> */
( function( factory ) {
if ( typeof define === "function" && define.amd ) {

// AMD. Register as an anonymous module.
define( [ "../widgets/datepicker" ], factory );
} else {

// Browser globals
factory( jQuery.datepicker );
}
}( function( datepicker ) {

datepicker.regional.fr = {
closeText: "Fermer",
prevText: "Précédent",
nextText: "Suivant",
currentText: "Aujourd'hui",
monthNames: [ "janvier", "février", "mars", "avril", "mai", "juin",
"juillet", "août", "septembre", "octobre", "novembre", "décembre" ],
monthNamesShort: [ "janv.", "févr.", "mars", "avr.", "mai", "juin",
"juil.", "août", "sept.", "oct.", "nov.", "déc." ],
dayNames: [ "dimanche", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi" ],
dayNamesShort: [ "dim.", "lun.", "mar.", "mer.", "jeu.", "ven.", "sam." ],
dayNamesMin: [ "D","L","M","M","J","V","S" ],
weekHeader: "Sem.",
dateFormat: "dd/mm/yy",
firstDay: 1,
isRTL: false,
showMonthAfterYear: false,
yearSuffix: "" };
datepicker.setDefaults( datepicker.regional.fr );

return datepicker.regional.fr;

} ) );
</script>
<script>
document.addEventListener( 'wpcf7mailsent', function( event ) {
location = 'https://confiance-invest.fr/synthese-du-parrainage/';
}, false );
</script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/unikapps/parrainage/js/script.js"></script>
<?php if(of_get_option('ga_code')) { ?>
<script type="text/javascript">
  <?php echo stripslashes(of_get_option('ga_code')); ?>
</script>
<!-- Show Google Analytics -->
<?php } ?>

<?php
$body_classes = get_body_class();
if(in_array("blog", $body_classes) || is_blog()) {
?>
<div id="blog-popup" style="display:none">
  <a class="close" href>x</a>
  <div style="text-align:center">
    <img style="width:100%;height:auto;margin-bottom:10px" src="http://www.confiance-invest.fr/wp-content/uploads/2015/11/logo-confiance-invest-transparent.png" >
  </div>
  <p>Inscrivez-vous pour recevoir des informations sur l’investissement locatif.</p>
  <?php  echo do_shortcode("[wysija_form id='1']"); ?>
</div>
<?php
}
?>
<?php wp_footer(); ?> <!-- this is used by many Wordpress features and for plugins to work properly -->
<script type="text/javascript">
(function(a,e,c,f,g,h,b,d){var k={ak:"968230380",cl:"QfUtCPT65mgQ7IvYzQM"};a[c]=a[c]||function(){(a[c].q=a[c].q||[]).push(arguments)};a[g]||(a[g]=k.ak);b=e.createElement(h);b.async=1;b.src="//www.gstatic.com/wcm/loader.js";d=e.getElementsByTagName(h)[0];d.parentNode.insertBefore(b,d);a[f]=function(b,d,e){a[c](2,b,k,d,null,new Date,e)};a[f]()})(window,document,"_googWcmImpl","_googWcmGet","_googWcmAk","script");
</script>
</body>
</html>
