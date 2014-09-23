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
  <link href="licencia/ladda-themeless.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="licencia/index.css" rel="stylesheet">

  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <script src="licencia/ie10-viewport-bug-workaround.js"></script>

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body>

  <!-- Navbar -->
  <div role="navigation" class="navbar navbar-default navbar-static-top">
    <div class="container">
      <div class="navbar-header">
        <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <!--a href="#" class="navbar-brand">iPECS UCP</a-->
        <a href="/clickcall" class="navbar-brand"><img alt="iPECS UCP" src="licencia/logo.png"></a>
      </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li class="active"><a href="#">Home</a></li>          
          <li><a href="/clickcall/doc.php">Documentation</a></li>
          <li><a href="/clickcall/mini.php" target="_blank">Mini demo</a></li>
          <li><a href="/ccm" target="_blank">Mobile demo</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="https://github.com/ropaolle/ucp-clickcall-demo">View on GitHub</a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </div>

  <!-- Begin page content -->
  <div class="container">

    <div class="row">

      <!-- Description -->
      <div class="col-md-7">

        <h1>UCP ClickCall Web Service</h1>
        <p>The ClickCall service is the first open web service Ericsson-LG adds to iPECS UCP. It is very basic and only supports one function; an external application can make a device that uses IPKTU protocol dial any number.</p>
        <p>This may not sound like much, but actually means you can do a lot of things. You can call an internal or external number and use feature codes like dnd, forwarding and so on.</p>
        <p><img alt="" src="licencia/gubbe.png"></p>

        <h3>More information</h3>
        <p>The try-it-out form on this page can be used to test the feature in your own UCP. I have also included a <a href="/clickcall/mini.php">minimalistic demo</a> that only includes the basic witch can be a good start if you like to try by yourself. </p>
        <p>Basic documentation with an example of <a href="/clickcall/doc.php">how to configure ClickCall in iPECS UCP</a>.</p>
        <p>The source code is available on <a href="https://github.com/ropaolle/ucp-clickcall-demo">GitHub</a>. If you have any comments please feel free to add a new issue in the <a href="https://github.com/ropaolle/ucp-clickcall-demo/issues">issue queue</a>.</p>
  
        <h3>Mobile demo</h3>      
        <p>A <a href="/ccs">smartphone demo</a> that shows how to use ClickCall in a more mobile friendly way have now also been added. The source code is available on <a href="https://github.com/ropaolle/ucp-clickcall-mobile">GitHub</a>.</p>
  
      </div> <!-- End col -->
      <div class="col-md-5">

        <h2>Try it out</h2>
        <p>This is a basic UCP ClickCall test form that can be used to test the web service. Before you can use this feature you need to <a href="/clickcall/doc.php">configure ClickCall in iPECS UCP</a>.</p>
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
         <!--h4>Extension settings</h4-->
          <!--div class="form-group">
            <label for="username" class="control-label sr-only">Username</label>
            <input type="text" class="form-control input-lg" id="username" placeholder="User name" required>
          </div-->
          <div class="form-group">
            <label for="extension" class="control-label sr-only">Extension number</label>
            <input type="text" class="form-control input-lg" id="extension" placeholder="Extension number" required>
          </div>
          <div class="form-group">
            <label for="password" class="control-label sr-only">Password</label>
            <input type="password" class="form-control input-lg" id="password" placeholder="Password" required>
          </div>
          <div class="form-group right">
            <button type="button" class="btn btn-primary btn-lg ladda-button" data-style="expand-right" id="reset">Reset</button>
            <button type="button" class="btn btn-primary btn-lg ladda-button" data-style="expand-right" id="save">Save</button>
          </div>
          <h4 class="clearfix">Number to call</h4>
          <div class="form-group callto">
            <label for="callto" class="control-label sr-only">Call to</label>
            <input type="text" class="form-control input-lg" id="callto" placeholder="Phone number" required>
          </div>
          <div class="form-group pull-right">
            <button type="button" class="btn btn-success btn-lg ladda-button" data-style="expand-right" id="dopost"><span class="ladda-label">Send number</span></button>
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
        <a target="_blank" href="https://www.ericssonlg-enterprise.com/" title="www.ericssonlg-enterprise.com"> Ericsson-LG Enterprise</a> in Sweden.
      </div>
    </div>

  <!-- Bootstrap core JavaScript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" ></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
  <script src="licencia/spin.min.js"></script>
  <script src="licencia/ladda.min.js"></script>
  <script src="httppost.js"></script>
</body>
</html>