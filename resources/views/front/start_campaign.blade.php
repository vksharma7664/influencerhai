<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Campaign - Influencer Hai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

  <style>
    @import url("https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&amp;family=Roboto:wght@500;700&amp;display=swap");


    .login-page{
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #0f74d9;
    padding: 30px;
    }

    .content-login{
        background-color: #f7f7f8;
        padding: 50px;
        border-radius: 8px;
        filter: drop-shadow(1px 2px 3px);
    }

    .login-text-content{
        color: #333;
        text-align: center;
        font-family: "Nunito", sans-serif !important;
    }
    .login-span{
        color : #0f74d9;
        font-weight: 700;
        font-family: "Nunito", sans-serif !important;
    }
    .input-login{
        width: 100%;
        height: 48px;
        border: none;
        border-radius: 8px;
        padding: 6px 35px;
    }
    .form-login-control{
        margin-top: 10px;
        position: relative;
    }
    .span-input{
        position: absolute;
        left: 10px;
        top: 12px;
        color: #fd7403;
    }
    .login-btn{
       
        background-color: #0f74d9;
        color: #fff;
        padding: 12px 28px;
        font-size: 18px;
        border-radius: 8px;
        font-family: "Nunito", sans-serif !important;
    }
    .login-text-content{
        margin-top: 20px;
    }
    a{
        text-decoration: none;
    }
    
    .login-image{
        width: 250px;
    }
    
    @media (max-width: 768px) {
    .content-login{
     padding: 20px !important;
  }
  .login-button{
    text-align: center;
  }
}

@media (max-width: 992px) {
  .login-button{
    text-align: center;
  }
}

    @media (max-width: 400px) {
    .content-login{
     padding: 10px !important;
     text-align: center;
  }
}
  </style>
  <body>
   
     <section class="login-page">
        <div class="container">
            <div class="row">
                <div class="col-md-10 m-auto content-login">
                    <div class="row">
                       <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="login-text-content">

                            <a href="{{ route('home') }}" class="logo-login-image">
                            <img src="{{ asset('front_assets/img/logo-image.jpeg') }}" class="img-fluid login-image" alt="">
                            </a>
                            <h4 class="mt-4">India's <span class="login-span">Leading</span> Influencer Marketing <br> Agency
                            </h4>
                            <h4 class="mt-3">Get <span class="login-span">FREE</span> Influencer Marketing <br> Campaign Portfolio for your <span class="login-span">BRAND</span> <br> within <span class="login-span">30</span> Minutes.
                            </h4>
                        </div>
                       </div>
                       <div class="col-lg-6 col-md-12 col-sm-12">
                        @if(Session::get('success', false))
                            <?php $data = Session::get('success'); ?>
                            <div class="alert alert-success" role="alert">
                                <i class="fa fa-check"></i>
                                {{ $data }}
                            </div>
                        @endif
                         <div class="input-form-content">
                            <form method="POST" action="{{ route('campaign.submit')}}">
                            @csrf
                                <div class="col-md-12">
                                    <div class="form-login-control">
                                    <input type="text" name="name" class="input-login" placeholder="Your name" required>
                                    <span class="span-input"><i class="bi bi-person-fill"></i></span>
                                 </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-login-control">
                                    <input type="email" name="email" class="input-login" placeholder="Your email" required>
                                    <span class="span-input"><i class="bi bi-envelope"></i></span>
                                 </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-login-control">
                                    <input type="number" name="phone" class="input-login" placeholder="Your phone" required>
                                    <span class="span-input"><i class="bi bi-phone-fill"></i></span>
                                 </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-login-control">
                                    <input type="text" name="website" class="input-login" placeholder="Your website" required>
                                    <span class="span-input"><i class="bi bi-globe"></i></span>
                                 </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-login-control">
                                    <input type="text" name="message" class="input-login" placeholder="Your message" required>
                                    <span class="span-input"><i class="bi bi-chat-right-text"></i> </span>
                                 </div>
                                </div>
                                <div class="login-button mt-5 mb-3">
                                <button type="submit" class="login-btn"> Free Audit</button>
                                </div>
                            </form>
                         </div>
                       </div>
                    </div>
                </div>
            </div>
        </div>
     </section>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>