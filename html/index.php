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
      <div class="pull-right">
         <a href="https://github.com/ropaolle/ucp-clickcall-demo">View on GitHub</a>
      </div>
      <div class="logo"><img alt="" src="licencia/logo.png"></div>
      <div class="logo-text">ClickCall Web Service Demo</div>
    </div>
  </div>

  <!-- Begin page content -->
  <div class="container">

    <div class="row">

      <!-- Description -->
      <div class="col-md-7">
      
        <h2>UCP ClickCall</h2>
        <p>The ClickCall service is the first open web service Ericsson-LG add to iPECS UCP. It is very basic and only holds one function, an external application can make a device that uses the IPKTU protocol dial any number.</p>
        <p>This may not sound like much, but actually means you can do a lot of things. You can obviously call an internal or external number, but you can also activate features that uses codes dnd, forwarding and so on.</p>
        
        <h2>Programming</h2>
        <p>To activate ClickCall you need to enable the service in pgm 111 and associate it with a station in pgm 443.</p>


<h4>Station Data / Common Attributes (111)</h4>
<div class="scroller">
<table class="table table-striped table-bordered table-hover table-condensed"><tbody>
<tr bgcolor="#d9edf7" align="center" key="pgm111_mktbl"><th class="sort_num"> Order <img class="img_asce" src="licencia/sort_asce.png"><img style="display:none;" class="img_desc" src="licencia/sort_desc.png"></th><th> <input type="button" value="Uncheck All" class="btn_checkall" name="undefined"> </th><th class="sort_str"> Attribute <img class="img_asce" src="licencia/sort_asce.png"><img style="display:none;" class="img_desc" src="licencia/sort_desc.png"></th><th> Value </th><th> Range </th></tr>
<tr key="pgm111_clickcall"><td> 13 </td><td> <input type="checkbox" value="undefined" class="chk_checkall" name="undefined" checked="checked"> </td><td> Click To Call Service </td><td> <select class="undefined" name="CLICKCALL"><option selected="" value="0">Disable</option><option value="1">Enable</option></select> </td><td>  </td></tr>
</tbody></table>
</div>

<h4>System Data / System Attributes (160-161)</h4>
<div class="scroller">
<table class="table table-striped table-bordered table-hover table-condensed"><tbody>
<tr bgcolor="#d9edf7" align="center" key="pgm160_mktbl"><th class="sort_num"> Order <img class="img_asce" src="licencia/sort_asce.png"><img style="display:none;" class="img_desc" src="licencia/sort_desc.png"></th><th class="sort_str"> Attribute <img class="img_asce" src="licencia/sort_asce.png"><img style="display:none;" class="img_desc" src="licencia/sort_desc.png"></th><th> Value </th><th> Range </th></tr>
<tr key="pgm160_sys_msvcxmlport"><td> 83 </td><td> MSVC XML Port </td><td> <input type="text" value="7878" size="5" maxlength="5" name="SYS_MSVCXMLPORT" title="Check port numbers of Web Server, MobilePhone Presence Service, MSVC XML and the other services. Duplication is not allowed."> </td><td> 00001-65535 </td></tr>
</tbody></table>       
</div>

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

        
        
      </div> <!-- End col -->

      
      <div class="col-md-5">
      
        <h2>Try it out</h2>
        <p>This is a basic UCP ClickCall test form that can be used to test the web service. Before you can use this feature you need to port forward 7878 to your UCP.</p>
        <!-- Form -->
        <form role="form" class="form-inline cc-form">
          <h4>UCP Connection</h4>
          <div class="form-group">
            <label for="ip" class="control-label sr-only">IP Address</label>
            <input type="text" class="form-control input-lg" id="ip" placeholder="IP Address" required>
          </div>
          <div class="form-group">
            <label for="port" class="control-label sr-only">UCP port</label>
            <input type="text" class="form-control input-lg" id="port" placeholder="Port" required>
          </div>
         <h4>Extension settings</h4>
          <div class="form-group">
            <label for="username" class="control-label sr-only">Username</label>
            <input type="text" class="form-control input-lg" id="username" placeholder="User name" required>
          </div>
          <div class="form-group">
            <label for="password" class="control-label sr-only">Password</label>
            <input type="text" class="form-control input-lg" id="password" placeholder="Password" required>
          </div>
          <div class="form-group">
            <label for="extension" class="control-label sr-only">Extension number</label>
            <input type="text" class="form-control input-lg" id="extension" placeholder="Extension number" required>
          </div>
          <h4>Number to call</h4>
          <div class="form-group callto">
            <label for="callto" class="control-label sr-only">Call to</label>
            <input type="text" class="form-control input-lg" id="callto" placeholder="Phone number" required>
          </div>
          <div class="form-group buttons">
          <button type="reset" class="btn btn-primary btn-lg pull-right" id="reset">Reset</button>
          <button type="button" class="btn btn-success btn-lg ladda-button pull-right" data-style="expand-right" id="dopost"><span class="ladda-label">Call</span></button>
          </div>
          <!-- Alert -->
          <div id="error-messages" class="alert" role="alert"></div>
        </form>

        <div id="response" class="hide">
          <h2>Response</h2>
          <div class="url">URL: <span class="urlstr"></span></div>
          <div class="alert alert-info" role="alert">
            <h4>Response from UCP</h4>
            <div id="ucpxml-response" class="">...</div>
            <h4>XML Request to UCP</h4>
            <div id="ucpxml-request" class="">...</div>
          </div>
        </div>

      </div> <!-- End col -->
    </div> <!-- End row -->
  </div> <!-- End container -->

    <!-- Site footer -->
    <div class="footer">
      <div class="container">
        By <a href="mailto:olle.sjogren@licencia.se" target="_top">Olle Sjögren</a>, 2014. <a href="http://www.licencia.se">Licencia Telecom AB</a> distributor for
        <a target="_blank" href="http://www.ericssonlg.com/site/ericssonlg/menu/151.do" title="www.ericssonlg.com"> Ericsson-LG</a> in Sweden.
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