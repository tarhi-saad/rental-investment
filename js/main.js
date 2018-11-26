$(document).ready(function () {
  var guide;
  var tel;
  var label = false;
  $('.sendlink').on('click', function () {
    $('#guide-modal').fadeIn(200);
    guide = $(this).attr('href');
    guide = guide.replace('#', '');
  });

  $('#send-link').on('click', function () {
    tel = $('#tel').val();
    tel = tel.replace(/ /g, '');
    tel = tel.replace(/-/g, '');
    tel = tel.replace(/\//g, '');
    var reg = new RegExp(/^(06|07)[0-9]{8}/gi);
    if (!reg.test(tel)) {
      alert('Erreur sur le numéro de téléphone.');
      return false;
    }

    $('#block1').hide();
    $('#block2').show();
    $('#send-code').click();
  });

  function goog_snippet_vars() {
    var w = window;
    w.google_conversion_id = 968230380;
    w.google_conversion_label = label;
    w.google_remarketing_only = false;
  }

  function goog_report_conversion(url) {
    goog_snippet_vars();
    window.google_conversion_format = '3';
    window.google_is_call = true;
    var opt = new Object();
    opt.onload_callback = function () {
      if (typeof (url) != 'undefined') {
        window.location = url;
      }
    };

    var conv_handler = window['google_trackConversion'];
    if (typeof (conv_handler) == 'function') {
      conv_handler(opt);
      console.log('url tracking');
    }
  }

  $('#block4 a').click(function () {
    var account;
    var index;
    switch (guide) {
      case 'pinel':
        index = 0;
        account = 'pinel';
        label = 'A4PYCOyrtmAQ7IvYzQM';
        break;
      case 'lmnp':
        index = 0;
        account = 'lmnp';
        label = 'yn1ZCInGtmAQ7IvYzQM';
        break;
      case 'etudiant':
        index = 0;
        account = 'etudiant';
        break;
      case 'tourisme':
        index = 0;
        account = 'tourisme';
        break;
      case 'guide-2019':
        index = 0;
        account = 'guide-2019';
        break;
    }
    $('#code').val('');
    $('#tel').val('');
    tel = '';
    $('#guide-modal').hide();
    $('#block4,#block3,#block2').hide();
  });

  $('#send-code').click(function () {
    $('#block3').hide();
    $('#block2').show();
    $.post('/prostat/sendguide.php', {
      guide: guide,
      tel: tel,
    }, function (data) {
      $('#block2').hide();
      console.log(data);
      data = $.parseJSON(data);
      if (data.success) {
        $('#link').attr('href', '/prostat/sendguide.php?tel='
         + tel + '&guide=' + guide);
        $('#block4').show();
        switch (guide) {
          case 'pinel':
            label = 'A4PYCOyrtmAQ7IvYzQM';
            break;
          case 'lmnp':
            label = 'yn1ZCInGtmAQ7IvYzQM';
            break;
          case 'etudiant':
            label = 'RtL7CN_KsWAQ7IvYzQM';
            break;
          case 'tourisme':
            label = 'WAIpCNnQsWAQ7IvYzQM';
            break;
        }
        if (label) {
          goog_report_conversion('/prostat/sendguide.php?tel=' + tel +
          '&guide=' + guide);
          if (typeof (data.simid) != 'undefined') $('body').
          append('<img src="http://www.confiance-invest.fr/tracking/pixinf.php?i=827&t=conv&simid='
           + data.simid + ' border="0" height="1" width="1" style="display:none;" />');
        }
      }
    });
  });
});
