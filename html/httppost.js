/**
 * Help functions.
 **/

function formatXml(xml, html_output) {
  var formatted = '';
  var reg = /(>)(<)(\/*)/g;
  xml = xml.replace(reg, '$1\r\n$2$3');
  var pad = 0;
  jQuery.each(xml.split('\r\n'), function(index, node) {
    var indent = 0;
    if (node.match( /.+<\/\w[^>]*>$/ )) {
      indent = 0;
    } else if (node.match( /^<\/\w/ )) {
      if (pad != 0) {
      pad -= 1;
      }
    } else if (node.match( /^<\w[^>]*[^\/]>.*$/ )) {
      indent = 1;
    } else {
      indent = 0;
    }

    var padding = '';
    for (var i = 0; i < pad; i++) {
      padding += ' ';
    }

    formatted += padding + node + '\r\n';
    pad += indent;
  });

  if (html_output == true) {
    return formatted.replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/ /g, '&nbsp;').replace(/\n/g,'<br />');
  } else {
    return formatted;
  }
}

$(document).ready(function(){

  function loadSettings() {
    // HELP: https://github.com/carhartl/jquery-cookie
    //$('#username').val($.cookie('cc-username'));
    $('#extension').val($.cookie('extension'));
    $('#password').val($.cookie('password'));
    $('#ip').val($.cookie('ip'));
    if ($.cookie('port') || $.cookie('port')=="") { 
      $('#port').val($.cookie('port')); 
    } else {
      $('#port').val("7878");
    }
  }  

  loadSettings();

  // Show spiner 0,5 sec
	Ladda.bind( '#save, #reset', { timeout: 500 } );
  
  // Reloade page
  $( "#reset" ).click(function() {
    //$.removeCookie('cc-username'); 
    $.removeCookie('extension'); 
    $.removeCookie('password'); 
    $.removeCookie('ip'); 
    $.removeCookie('port'); 
    loadSettings();
    //location.reload();
  });

  // Init tooltip
  // $('#tooltip').tooltip();
  
  // Save settings
  $( "#save" ).click(function() {    
    var cookieDays = 365 * 2 // 2 years
    //$.cookie('cc-username', $('#username').val(), cookieDays);
    $.cookie('extension', $('#extension').val(), cookieDays);
    $.cookie('password', $('#password').val(), cookieDays);
    $.cookie('ip', $('#ip').val(), cookieDays);
    $.cookie('port', $('#port').val(), cookieDays);   
    var l = Ladda.create(this);
    l.start();    
  });
  

  // Post xml message to UCP
  $( "#dopost" ).click(function() {
    // Load button spinner
    var l = Ladda.create(this);
    l.start();
    
    console.log($('#callto').val().toLowerCase());
    
    // Hangup
    var destinfo;
    if ($('#callto').val().toLowerCase() == 'h') {
      destinfo = '<destinfo calltype="hangup"><dialnum>0000</dialnum></destinfo>';
    } else {
      destinfo = '<destinfo calltype="single"><dialnum>' + $('#callto').val() + '</dialnum></destinfo>';      
    }

    // Build xml string
    var ucpxml = '<?xml version="1.0" encoding="utf-8"?><!DOCTYPE ipecs_svc SYSTEM "iPECSService.dtd"><ipecs_svc><request type="service" encrypt="off" servicename="clicktocall"><clicktocall>'
               + '<userinfo><stnnum>' + $('#extension').val() + '</stnnum><userid>' + $('#extension').val() + '</userid><userpwd encrypt="off">' + $('#password').val() + '</userpwd></userinfo>'
               + '<srcinfo><dialnum>' + $('#extension').val() + '</dialnum></srcinfo>'
               + destinfo
               + '</clicktocall></request></ipecs_svc>';
    var url = "https://" +  $('#ip').val() + ":" + $('#port').val() + "/ipecs_svc";
    var xmldata = '<data><ucpxml><![CDATA[' + ucpxml + ']]></ucpxml><ucpurl>' + url + '</ucpurl></data>';

    // Post data
    $.ajax({
      url:"httppost.php",
      type: 'POST',
      timeout: 5000,
      data: xmldata,
      contentType: "text/xml",
      dataType: 'xml',
    })
    .done(function(xmlResponse){
      var errorMsg = $(xmlResponse).find('error').first().text();
      if (errorMsg) {
        // Display error
        $("#error-messages").html(errorMsg).removeClass("alert-success alert-warning alert-danger").addClass("alert-danger");
      } else {
        // Update statusmessage
        var statusMsg = $(xmlResponse).find('message').first().text();
        $("#error-messages").html(statusMsg).removeClass("alert-success alert-warning alert-danger");
        if (statusMsg=='OK') {
          $("#error-messages").addClass("alert-success");
        } else {
          $("#error-messages").addClass("alert-warning");
        }
        // Show UCP XML response
        var xmlstr = xmlResponse.xml ? xmlResponse.xml : (new XMLSerializer()).serializeToString(xmlResponse);
        $("#ucpxml-response").html(formatXml(xmlstr, true));
      }
    })
    .fail(function(xhr, ajaxOptions, thrownError){
      // Error messages
      $('#error-messages').html("AJAX error: " + xhr.status + " (" + thrownError + ")");
    })
    .always(function() {
      // Show UCP XML request
      $("#response").removeClass("hide");
      $(".urlstr").html(url);
      $("#ucpxml-request").html(formatXml(ucpxml, true));
      // Stop button spinner
      l.stop();
    });

  }); // End Post Message

}); // End Document Ready