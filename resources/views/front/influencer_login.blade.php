
    

<fb:login-button 
  scope="public_profile,email"
  onlogin="checkLoginState();">
</fb:login-button>

    <!-- show influencers belongs to category -->
    
    <section class="photography-section pb-50">
    <div class="container">
        <ul class="list-group">
            <h4 class="blockquote-footer" style="">See More Influencers</h4>
            &nbsp;
            
          
        </ul>
    </div>  
</section>


<div class="fb-login-button" data-width="" data-size="large" data-button-type="continue_with" data-layout="default" data-auto-logout-link="false" data-use-continue-as="false"></div>

    <script>
    window.fbAsyncInit = function() {
        FB.init({
        appId      : '5538014736274149',
        cookie     : true,
        xfbml      : true,
        version    : 'v15.0'
        });
        
        FB.AppEvents.logPageView();   
        
        FB.getLoginStatus(function(response) {
            statusChangeCallback(response);
        });
    };

    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    function statusChangeCallback(params) {
        console.log(params);
    }
   
    </script>
