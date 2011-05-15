$(function() {
  // Sliders
  $( "#slider0" ).slider({
    value:100,
    min: 0,
    max: 1,
    step: 0.1,
    value: 0.3,
    slide: function( event, ui ) {
      $( "#threshold" ).val( ui.value );
    }
  });
  $( "#threshold" ).val( $( "#slider0" ).slider( "value" ) );

  $( "#slider1" ).slider({
    value:100,
    min: 0,
    max: 1,
    step: 0.1,
    value: 1,
    slide: function( event, ui ) {
      $( "#dcthreshold" ).val( ui.value );
    }
  });
  $( "#dcthreshold" ).val( $( "#slider1" ).slider( "value" ) );

  $( "#slider2" ).slider({
    value:100,
    min: -100,
    max: 0,
    step: 1,
    value: -70,
    slide: function( event, ui ) {
      $( "#silence" ).val( ui.value );
    }
  });
  $( "#silence" ).val( $( "#slider2" ).slider( "value" ) );

  $( "#slider3" ).slider({
    value:100,
    min: 0,
    max: 1,
    step: 0.001,
    value: 0.048,
    slide: function( event, ui ) {
      $( "#mintol" ).val( ui.value );
    }
  });
  $( "#mintol" ).val( $( "#slider3" ).slider( "value" ) );

  $( "#slider4" ).slider({
    value:100,
    min: 0,
    max: 10,
    step: 0.1,
    value: 0,
    slide: function( event, ui ) {
      $( "#delay" ).val( ui.value );
    }
  });
  $( "#delay" ).val( $( "#slider4" ).slider( "value" ) );

  $( "#slider5" ).slider({
    value:100,
    min: 0,
    max: 1,
    step: 0.00001,
    value: 0.00008,
    slide: function( event, ui ) {
      $( "#zerocross" ).val( ui.value );
    }
  });
  $( "#zerocross" ).val( $( "#slider5" ).slider( "value" ) );

  $( "#slider6" ).slider({
    value:100,
    min: 0,
    max: 1024,
    step: 1,
    value: 512,
    slide: function( event, ui ) {
      $( "#bufsize" ).val( ui.value );
    }
  });
  $( "#bufsize" ).val( $( "#slider6" ).slider( "value" ) );

  $( "#slider7" ).slider({
    value:100,
    min: 0,
    max: 1024,
    step: 1,
    value: 256,
    slide: function( event, ui ) {
      $( "#hopsize" ).val( ui.value );
    }
  });
  $( "#hopsize" ).val( $( "#slider7" ).slider( "value" ) );

  // Radios
  $( "#mode" ).buttonset();
  $( "#beat" ).buttonset();
  $( "#derivate" ).buttonset();
  $( "#silencecut" ).buttonset();

  // Upload
  $('.upload').fileinput({
    buttonText: 'Pick a beat',
  });

  // Submit button
  $( "button, input:submit", ".upload_form" ).button({
    icons: {
        primary: "ui-icon-shuffle"
    }
  });

	$( ".button:first" ).button({
    icons: {
        primary: "ui-icon-volume-on"
    },
  })
  .next().button({
    icons: {
        primary: "ui-icon-seek-first"
    }
  });

  // Tabs
  $( "#tabs" ).tabs({
    fx: { height: 'toggle', duration: 'fast' }
  });

  // Error
  $('#dialog').dialog({
    modal: true
  });

//    var $dialog = $('<div></div>')
//      .load('/ci/proxy?url=http://google.com')
//      .dialog({
//        autoOpen: false,
//        title: 'Basic Dialog'
//      });

//    $('#opener').click(function() {
//      $dialog.dialog('open');
//      // prevent the default action, e.g., following a link
//      return false;
//    });

});

