<!DOCTYPE html>
<html lang="id" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'css/smenu.css'; ?>">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo site_url(); ?>/pegawai">Pegawai<span class="sr-only">(current)</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url(); ?>/absen">Absen</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url(); ?>/gaji">Gaji</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url(); ?>/home">Home</a>
      </li>
    </ul>
    <?php
            $dkota = 'Medan';
            $api_key = '959a3d3951bf03d77e5487f0dd453d4f';
            $suhu = 'http://api.openweathermap.org/data/2.5/weather?q='.$dkota.'&appid='.$api_key;
            $weather_data = json_decode( file_get_contents($suhu), true);
            $temperatur = $weather_data['main']['temp'];
            $suhu_celcius = $temperatur - 273.15;        
            echo "(Medan ".$suhu_celcius." C)     ";
    ?>
    <?php echo $this->session->userdata('nama_pegawai') ?>
    -
    <?php echo form_open("login/logout") ?>
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
    <?php echo form_close() ?>
  </div>
</nav>
<div class="section">
      <div class="container">
          <a class="btn btn-primary " href="<?php echo site_url() ?>/pegawai/view_tambah_pegawai" role="button">Tambah Pegawai</a>
          <div id="accordion">
            <?php foreach ($data as $value): ?>
                <div class="card">
                  <div class="card-header" id="heading<?php echo $value->id_pegawai?>">
                    <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapse<?php echo $value->id_pegawai?>" aria-expanded="false" aria-controls="collapse<?php echo $value->id_pegawai?>">
                        <?php echo $value->nama_pegawai ?> 
                      </button>
                    </h5>
                  </div>
                  <div id="collapse<?php echo $value->id_pegawai?>" class="collapse" aria-labelledby="heading<?php echo $value->id_pegawai?>" data-parent="#accordion">
                    <div class="card-body">
                      <table class="table table-sm">
                        <tr>
                            <td>NIP</td>
                            <td><?php echo $value->id_pegawai?></td>
                        </tr>
                        <tr>
                            <td>Jabatan</td>
                            <td><?php if($value->kd_jabatan == '10001') {echo "Manajer";} elseif($value->kd_jabatan == '10002') {echo "Wakil Manajer";} elseif($value->kd_jabatan == '20001') {echo "Sekretaris";} elseif($value->kd_jabatan == '20002') {echo "Wakil Sekretaris";} elseif($value->kd_jabatan == '30001') {echo "Pegawai";} elseif($value->kd_jabatan == '40001') {echo "Bendahara";} elseif($value->kd_jabatan == '40002') {echo "Wakil Bendahara";}?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td><?php echo $value->alamat?></td>
                        </tr>
                        <tr>
                            <td>No HP</td>
                            <td><?php echo $value->no_hp?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir</td>
                            <td><?php echo $value->tgl_lahir?></td>
                        </tr>
                        <tr>
                            <td>Gmail</td>
                            <td><?php echo $value->gmail?></td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td><?php echo $value->jenis_kelamin?></td>
                        </tr>
                        <a class="btn btn-primary" href="<?php echo site_url() ?>/pegawai/ubah_pegawai?id_pegawai=<?php echo $value->id_pegawai?>" role="button">Ubah Data</a>
                        <a class="btn btn-primary" href="<?php echo site_url() ?>/pegawai/hapus_pegawai?id_pegawai=<?php echo $value->id_pegawai?>" role="button">Hapus</a>
                        <a class="btn btn-primary" href="<?php echo site_url() ?>/pegawai/absen?id_pegawai=<?php echo $value->id_pegawai?>"  role="button">Absen</a>
                        <a class="btn btn-primary" href="<?php echo site_url() ?>/pegawai/gaji?id_pegawai=<?php echo $value->id_pegawai?>"  role="button">Gaji</a>
                      </table>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
          </div>      
          <br>
      </div>
    </div>
  </body>
</html>
