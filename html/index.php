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
        <h2>Description</h2>
        <p>This a demo that uses the new UCP web service ClickCall.</p>

      </div>
      
      <!-- Form --> 
      <div class="col-md-5">
  <!--input type="text" class="form-control input-lg" name="ip" placeholder="IP Address" value="62.181.215.140">
  <input type="number" class="form-control input-lg" name="port" placeholder="Port" value="7878" min="1" max="65535">
  <input type="text" class="form-control input-lg" id="username" placeholder="User name" required>
  <input type="number" class="form-control input-lg" id="extension" placeholder="Extension number" required>
  <input type="text" class="form-control input-lg" id="password" placeholder="Password" required>
  <input type="number" class="form-control input-lg" id="callto" placeholder="Phone number" required-->  
       <h2>Settings</h2>
        <form data-toggle="validator" role="form">  
          <h4>URL to UCP</h4>        
          <div class="form-group">
            <label for="url" class="control-label sr-only">UCP URL</label>
            <input type="url" class="form-control input-lg" id="url" placeholder="Service URL" data-error="UCP only supports Https access. The default port is 7878. Example: https://62.181.215.143:7878/ipecs_svc." required>
            <span class="help-block with-errors"></span>
          </div>       
          <h4>Extension settings</h4>
          <div class="form-group">
            <label for="username" class="control-label sr-only">Username</label>
            <input type="text" class="form-control input-lg" id="username" placeholder="User name" required>
            <div class="help-block with-errors"></div>
          </div>
          <div class="form-group">
            <label for="extension" class="control-label sr-only">Extension number</label>
            <input type="number" class="form-control input-lg" id="extension" placeholder="Extension number" data-error="Only numeric input allowed." required>
            <div class="help-block with-errors"></div>
          </div>  
          <div class="form-group">
            <label for="password" class="control-label sr-only">Password</label>
            <input type="text" class="form-control input-lg" id="password" placeholder="Password" required>
          </div>
        </form> 
      
        <form data-toggle="validator" role="form" class="form-inline">
          <h2>Generate call</h3>
          <div class="form-group callto">
            <label for="callto" class="control-label sr-only">Call to</label>
            <input type="number" class="form-control input-lg col-sm-2" id="callto" placeholder="Phone number" data-error="Only numeric input allowed, e.g. 08123456." required>
            <div class="help-block with-errors"></div>
          </div>            
          <button type="reset" class="btn btn-primary btn-lg pull-right" id="reset">Reset</button>
          <button type="button" class="btn btn-success btn-lg ladda-button pull-right" data-style="expand-right" id="dopost"><span class="ladda-label">Call</span></button>
          <!-- Alert -->
          <div id="error-messages" class="alert" role="alert"></div> 
        </form> 
        
        <div id="response" class="hide">
          <h2>Response</h2> 
          <div><span class="url">URL: </span><span class="urlstr"></span></div>        
          <div class="alert alert-info" role="alert">
            <h4>Response from UCP</h4>
            <div id="ucpxml-response" class="">...</div>
            <h4>XML Request to UCP</h4>
            <div id="ucpxml-request" class="">...</div>        
          </div>
        </div>
        
      </div>
      
    </div>    

  </div>

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
  <script src="licencia/validator.min.js"></script>
  <script src="licencia/spin.min.js"></script>
  <script src="licencia/ladda.min.js"></script>
  <script src="httppost.js"></script>  
</body>
</html>