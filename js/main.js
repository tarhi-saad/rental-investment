$(document).ready(function() {
  var guide;
  var tel;
  var label = false;
  $('.sendlink').on('click', function() {
    $('#guide-modal').fadeIn(200);
    guide = $(this).attr('href');
    guide = guide.replace('#', '');
  });

  $('#send-link').on('click', function() {
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
    opt.onload_callback = function() {
      if (typeof(url) != 'undefined') {
        window.location = url;
      }
    };

    var conv_handler = window['google_trackConversion'];
    if (typeof(conv_handler) == 'function') {
      conv_handler(opt);
      console.log('url tracking');
    }
  }

  $('#block4 a').click(function() {
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

  $('#send-code').click(function() {
    $('#block3').hide();
    $('#block2').show();
    $.post('/prostat/sendguide.php', {
      guide: guide,
      tel: tel,
    }, function(data) {
      $('#block2').hide();
      console.log(data);
      data = $.parseJSON(data);
      if (data.success) {
        $('#link').attr('href', '/prostat/sendguide.php?tel=' +
          tel + '&guide=' + guide);
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
          append('<img src="http://www.confiance-invest.fr/tracking/pixinf.php?i=827&t=conv&simid=' +
            data.simid + ' border="0" height="1" width="1" style="display:none;" />');
        }
      }
    });
  });

  //increment input field
  // This button will increment the value
  $('.qtyplus').click(function (e) {
    // Stop acting like a button
    e.preventDefault();

    // Get the field name
    fieldName = $(this).attr('field');

    // Get its current value
    var currentVal = parseInt($('input[name=' + fieldName + ']').val());

    // If is not undefined
    if (!isNaN(currentVal)) {
      // Increment
      $('input[name=' + fieldName + ']').val(currentVal + 1);
    } else {
      // Otherwise put a 0 there
      $('input[name=' + fieldName + ']').val(0);
    }
  });

  // This button will decrement the value till 0
  $('.qtyminus').click(function (e) {
    // Stop acting like a button
    e.preventDefault();

    // Get the field name
    fieldName = $(this).attr('field');

    // Get its current value
    var currentVal = parseInt($('input[name=' + fieldName + ']').val());

    // If it isn't undefined or its greater than 0
    if (!isNaN(currentVal) && currentVal > 0) {
      // Decrement one
      $('input[name=' + fieldName + ']').val(currentVal - 1);
    } else {
      // Otherwise put a 0 there
      $('input[name=' + fieldName + ']').val(0);
    }
  });

  // form multi steps & validation
  var currentTab = 0; // Current tab is set to be the first tab (0)
  showTab(currentTab); // Display the current tab

  function showTab(n) {
    // This function will display the specified tab of the form ...
    var x = document.getElementsByClassName('tab');
    x[n].style.display = 'block';

    // ... and fix the Previous/Next buttons:

    if (n == 0 || n == 5) {
      document.getElementById('nextBtn').style.display = 'none';
      $('.loading-form-simulateur').css('display', 'none');
    } else {
      document.getElementById('nextBtn').style.display = 'block';
      $('.loading-form-simulateur').css('display', 'block');
    }

    if (n != 0 && n != 1) {
      $('.btn-left-simulation').css('display', 'block');
    } else {
      $('.btn-left-simulation').css('display', 'none');
    }

    // if (n == (x.length - 1)) {
    //   document.getElementById('nextBtn').innerHTML = 'Submit';
    // } else {
    //   document.getElementById('nextBtn').innerHTML = 'Next';
    // }

    // ... and run a function that displays the correct step indicator:
    fixStepIndicator(n);
  }

  function nextPrev(n) {
    // This function will figure out which tab to display
    var x = document.getElementsByClassName('tab');

    // Exit the function if any field in the current tab is invalid:
    //if (n == 1) return false;

    // Hide the current tab:
    x[currentTab].style.display = 'none';

    // Increase or decrease the current tab by 1:
    currentTab = currentTab + n;

    // if you have reached the end of the form... :
    if (currentTab >= x.length + 1) {
      //...the form gets submitted:
      document.getElementById('regForm').submit();
      return false;
    }

    // Otherwise, display the correct tab:
    showTab(currentTab);
  }

  function validateForm() {
    // This function deals with validation of the form fields
    var x, y, i, valid = true;
    x = document.getElementsByClassName('tab');
    y = x[currentTab].getElementsByTagName('input');

    // A loop that checks every input field in the current tab:
    for (i = 0; i < y.length; i++) {
      // If a field is empty...
      if (y[i].value == '') {
        // add an 'invalid' class to the field:
        y[i].className += ' invalid';

        // and set the current valid status to false:
        valid = false;
      }
    }

    // If the valid status is true, mark the step as finished and valid:
    if (valid) {
      document.getElementsByClassName('step')[currentTab].className += ' finish';
    }

    return valid; // return the valid status
  }

  function fixStepIndicator(n) {
    // This function removes the 'active' class of all steps...
    var y = n * 20;
    $('.loading-inner').animate({ width: y + '%' });
  }

  $('#prevBtn').click(function () {
    nextPrev(-1);
  });

  $('#nextBtn').click(function () {
    nextPrev(1);
  });

  $('.btn-demarrer').click(function () {
    nextPrev(1);
    $('#nextBtn').show();
  });

  $.validate({
    form: '#simulateurForm',
    validateOnBlur: false, // disable validation when input looses focus
    errorMessagePosition: 'top', // Instead of 'inline' which is default
    scrollToTopOnError: false, // Set this property to true on longer forms
    lang: 'fr',
  });
});
