
              <div class="container">
              <div class="row">
              <div class="detail-box">
            <h1 class="col-md-10 mx-auto"><i>KAYIT EKLE</i></h1>
            <?= validation_list_errors() ?>
            <form action="<?=base_url('kayit_ekle')?>" method="post" enctype="multipart/form-data">
                  <?=csrf_field()?>
                  <div class="form-group">
                  <h2 class="blu mx-auto"><i>Başlık</i></h2>
                    <input type="text" class="form-control" id="baslik" name="baslik">
                  </div>
                  <div class="form-group">
                  <h2 class="blu mx-auto"><i>İçerik</i></h2>
                       <textarea cols="10" class="form-control" name="icerik" id="icerik"></textarea>
                  </div>
                  <div class="form-group">
                  <h2 class="blu mx-auto"><i>Resim</i></h2>
                  <input type="file" class="form-control" id="resim" name="resim">
                  </div>


                <input type="submit" name="gonder" class="btn btn-primary" value="Ekle">
            </form>
            <div class='pb-5'></div>
         