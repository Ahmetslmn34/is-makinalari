<table>
<h1 class="mt-4 text-primary"><i>KAYIT DÜZENLE</i></h1>
<?=validation_list_errors()?> 
     <header>KAYIT DUZENLEME</header>
     <form action="<?=base_url('kayit_duzenle/'.$veri['id'])?>" method="post">
     <?=csrf_field()?>
      <div class="field email">
        <div class="input-area">
          <input type="text" id="baslik" name="baslik" placeholder="Başlık" value="<?=esc($veri['baslik'])?>">
          <i class="icon fas fa-envelope"></i>
          <i class="error error-icon fas fa-exclamation-circle"></i>
        </div>
       
      </div>
      <div class="field password">
        <div class="input-area">
          
          <textarea cols="10" class="form-control"  name="icerik" id="icerik"><?=esc($veri['icerik'])?></textarea>
        </div>
        
        
      
      <input type="submit" name="gonder" class="btn btn-primary" value="GUNCELLE">
    </form>
    
  </div>
<div class='pb-5'></div>
</table>