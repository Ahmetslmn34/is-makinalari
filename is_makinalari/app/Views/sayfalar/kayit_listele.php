<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Başlık</th>
        <th scope="col">URL</th>
        <th scope="col">İşlem</th>
    </tr>
    </thead>
    <tbody>
    <?php
    if(isset($kayitlar) && count($kayitlar)>0)
    {
        foreach ($kayitlar as $item)
        {
            echo '<tr>';
            echo '<th scope="row">'.$item['id'].'</th>';
            echo '<td>'.$item['baslik'].'</td>';
            echo '<td>'.$item['url'].'</td>';
            echo '<td>';
            echo '<a href="'.base_url('kayit_sil/'.$item['id']).'" class="btn btn-danger">Sil</a> ';
            echo '<a href="'.base_url('kayit_duzenle/'.$item['id']).'" class="btn btn-dark">Düzenle</a>';
            echo '</td>';
            echo '</tr>';
        }
    }
    else
    {
        echo 'kayıt yok';
    }
    ?>
    </tbody>
</table>