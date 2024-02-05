
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

    <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Fonicy</title>


  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

  </head>
  <body>
    <section class="contact_section layout_padding">
      <div class="container-fluid">
        <div class="col-lg-4 col-md-5 offset-md-1">
          <div class="heading_container">
            <h2>
              Giriş Yapınız
            </h2>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-5 offset-md-1">
            <div class="form_container">
            <?= validation_list_errors() ?>
            <?php
            if(isset($uyari))
            {
                echo '<div class="alert alert-danger" role="alert">';
                echo $uyari;
                echo '</div>';
            }
            ?>
              <form action="<?=base_url('login')?>" method="post">
                  <?=csrf_field()?>
                <div>
                    <label for="kulad">Kullanıcı Adı</label>
                  <input type="text" class="form-control" id="kulad" name="kulad"  />
                </div>
                <div>
                <label for="sifre">Şifre</label>
                  <input type="password" class="form-control" id="sifre" name="sifre"  />
                </div>
                <div class="btn_box">
                  <button>
                    Oturum Aç
                  </button>
                </div>
              </form>
            </div>
          </div>
          <div class="col-lg-7 col-md-6 px-0">
            <div class="map_container">
              <div class="map">
                <div id="googleMap"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </body>
</html>