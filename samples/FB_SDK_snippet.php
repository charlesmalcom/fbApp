<?php

//The following snippet of code will give the basic version of the SDK where the options are set to their most common defaults. You should insert it directly after the opening <body> tag on each page you want to load it:


<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '468421253315686',
      xfbml      : true,
      version    : 'v2.3'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>