<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="UCP Clickcall demo based on AJAX and Bootstrap.">
  <meta name="author" content="Olle Sjögren, Licencia Telecom AB, 2014">
  <link rel="icon" href="licencia/favicon.png">

  <title>UCP Clickcall Web Service Demo</title>

  <!-- Bootstrap core CSS -->
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="licencia/bootstrapValidator.min.css" rel="stylesheet">
  <link href="licencia/ladda-themeless.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="licencia/index.css" rel="stylesheet">

  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body>

  <!-- Fixed navbar -->
  <div class="header">
    <div class="container">      
      <div class="logo-container pull-left">
        <div class="logo"><a href="/clickcall"><img alt="" src="licencia/logo.png"></a></div>
        <div class="logo-text">ClickCall Web Service Demo</div>
      </div>
      <div class="header-menu pull-right">
         <a href="/clickcall">Try it out</a> |  <a href="/clickcall/mini.php">Mini demo</a> | <a href="https://github.com/ropaolle/ucp-clickcall-demo">View on GitHub</a>
      </div>
    </div>
  </div>

  <!-- Begin page content -->
  <div class="container">
 
    <h1>iPECS UCP Configuration</h1>
    <p>Before you can use ClickCall you need to enable the service and associate it with a device, e.g. LIP-8000.</p>

    <h3>Select TCP port</h3>
    <p>ClickCall uses TCP port 7878, the port can be changed in pgm 160-161. Make sure to port forward TCP 7878 in your firewall to your UCP.</p>
    <h4>System Data / System Attributes (160-161)</h4>
    <div class="scroller">
    <table class="table table-striped table-bordered table-hover table-condensed"><tbody>
    <tr bgcolor="#d9edf7" align="center" key="pgm160_mktbl"><th class="sort_num"> Order <img class="img_asce" src="licencia/sort_asce.png"><img style="display:none;" class="img_desc" src="licencia/sort_desc.png"></th><th class="sort_str"> Attribute <img class="img_asce" src="licencia/sort_asce.png"><img style="display:none;" class="img_desc" src="licencia/sort_desc.png"></th><th> Value </th><th> Range </th></tr>
    <tr key="pgm160_sys_msvcxmlport"><td> 83 </td><td> MSVC XML Port </td><td> <input type="text" value="7878" size="5" maxlength="5" name="SYS_MSVCXMLPORT" title="Check port numbers of Web Server, MobilePhone Presence Service, MSVC XML and the other services. Duplication is not allowed."> </td><td> 00001-65535 </td></tr>
    </tbody></table>       
    </div>

    <h3>Enable ClickCall</h3>
    <p>Next you need to enable ClickCall on all stations that should use the feature. This is done in pgm 111.</p>
    <h4>Station Data / Common Attributes (111)</h4>
    <div class="scroller">
    <table class="table table-striped table-bordered table-hover table-condensed"><tbody>
    <tr bgcolor="#d9edf7" align="center" key="pgm111_mktbl"><th class="sort_num"> Order <img class="img_asce" src="licencia/sort_asce.png"><img style="display:none;" class="img_desc" src="licencia/sort_desc.png"></th><th> <input type="button" value="Uncheck All" class="btn_checkall" name="undefined"> </th><th class="sort_str"> Attribute <img class="img_asce" src="licencia/sort_asce.png"><img style="display:none;" class="img_desc" src="licencia/sort_desc.png"></th><th> Value </th><th> Range </th></tr>
    <tr key="pgm111_clickcall"><td> 13 </td><td> <input type="checkbox" value="undefined" class="chk_checkall" name="undefined" checked="checked"> </td><td> Click To Call Service </td><td> <select class="undefined" name="CLICKCALL"><option value="0">Disable</option><option value="1" selected="">Enable</option></select> </td><td>  </td></tr>
    </tbody></table>
    </div>

    <h3>Associate a station with a ClickCall user id</h3>
    <p>To be able to use ClickCall we also need to give the station a username and a password. This is done in pgm 443.</p>
    <p>Let us assume that we like to give station 409 a username and a password. Set User ID = Olle, Password = 123abc and Desired Number = 409 and Save. This new virtual user id is now linked with station 409, i.e. the value Linked in pgm 443 is changed to S.</p>
    <h4>Device Login / Station User Login (443)</h4>
    <div class="scroller">
    <table class="table table-striped table-bordered table-hover table-condensed"><tbody>
    <tr bgcolor="#d9edf7" align="center" key="pgm443_login_list_tbl"><th class="sort_num"> Index <img class="img_asce" src="licencia/sort_asce.png"></th><th class="sort_stanum"> Regstered Number <img class="img_asce" src="licencia/sort_asce.png"></th><th> Device Type </th><th> ID </th><th> Password </th><th> Zone </th><th> Desired Number </th><th> Nation Code </th><th> Language </th><th> Linked </th><th> Version </th><th> Remark </th></tr>
    <tr><td> 18 </td><td>409</td><td>LIP-8024D </td>
    <td> <input type="text" value="olle" size="4" maxlength="12" name="LOGIN_ID_18"> </td>
    <td> <input type="text" value="123abc" size="4" maxlength="12"  disabled="disabled" name="LOGIN_PWD_18"> </td>
    <td> <input type="text" value="1" size="2" maxlength="2" name="LOGIN_ZONE_18"> </td>
    <td> <input type="text" value="409" size="4" maxlength="8"  disabled="disabled" name="LOGIN_LOGSTN_18"> </td>
    <td> <select class="undefined" name="LOGIN_LANGDP_18"><option selected="" value="4">Swedish</option></select> </td>
    <td> <select class="undefined" name="LOGIN_LANGDP_18"><option selected="" value="4">Swedish</option></select> </td>
    <td>S</td><td>..</td>
    <td><input type="text" value="ClickCall Test" size="12" maxlength="21" name="LOGIN_CMT_18"> </td></tr></tbody>
    </tbody></table>      
    </div> 

  </div> <!-- End container -->

    <!-- Site footer -->
    <div class="footer">
      <div class="container">
        By <a href="mailto:olle.sjogren@licencia.se" target="_top">Olle Sjögren</a>, 2014. <a href="http://www.licencia.se">Licencia Telecom AB</a> distributor for
        <a target="_blank" href="https://www.ericssonlg-enterprise.com/" title="www.ericssonlg-enterprise.com"> Ericsson-LG Enterprise</a> in Sweden.
      </div>
    </div>
   
  <!-- Bootstrap core JavaScript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" ></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <script src="licencia/spin.min.js"></script>
  <script src="licencia/ladda.min.js"></script>
  <script src="httppost.js"></script>
</body>
</html>