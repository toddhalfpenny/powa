<!DOCTYPE html>
<html>
  <head>
    <style type="text/css">
    </style>
    <title>P.O.W.A - Perfect Oulook Web Access</title>
    <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>   
    <script type="text/javascript">
      $ (document). ready (function () {

      //var cal_view_ep = "test.html"
      var cal_view_ep = "http://hatmsg025/exchange/Todd.Halfpenny/Calendar/?Cmd=contents"

      $.ajaxSetup({
      headers: {
      'Authorization': "Basic xxx:xxx"
      }
      });
      
      $.ajax({

      // The 'type' property sets the HTTP method.
      // A value of 'PUT' or 'DELETE' will trigger a preflight request.
      type: 'GET',

      // The URL to make the request to.
      url: 'http://updates.html5rocks.com',

      // The 'contentType' property sets the 'Content-Type' header.
      // The JQuery default for this property is
      // 'application/x-www-form-urlencoded; charset=UTF-8', which does not trigger
      // a preflight. If you set this value to anything other than
      // application/x-www-form-urlencoded, multipart/form-data, or text/plain,
      // you will trigger a preflight request.
      contentType: 'text/plain',

      xhrFields: {
      // The 'xhrFields' property sets additional fields on the XMLHttpRequest.
      // This can be used to set the 'withCredentials' property.
      // Set the value to 'true' if you'd like to pass cookies to the server.
      // If this is enabled, your server must respond with the header
      // 'Access-Control-Allow-Credentials: true'.
      withCredentials: false 
      },

      headers: {
      // Set any custom headers here.
      // If you set any non-simple headers, your server must include these
      // headers in the 'Access-Control-Allow-Headers' response header.
      },

      success: function() {
      // Here's where you handle a successful response.
      },

      error: function() {
      // Here's where you handle an error response.
      // Note that if the error was due to a CORS issue,
      // this function will still fire, but there won't be any additional
      // information about the error.
      }
      });


      //$.get(cal_view_ep, {})
      //.done(function(data) {alert("Data Loaded: " + data); })
      //.fail(function() { alert("error"); })

      });
    </script>
  </head>
  <body> 
    
    <h1>POWA</h1>
    <div class="note">
    </div>

    <div id="msg">
    </div>


  </body>
</html>
