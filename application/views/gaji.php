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
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url(); ?>/pegawai">Pegawai</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="<?php echo site_url(); ?>/absen">Absen</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo site_url(); ?>/gaji">Gaji<span class="sr-only">(current)</a>
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
    <?php echo $this->session->userdata('jabatan') ?>
    <?php echo form_open("login/logout") ?>
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
    <?php echo form_close() ?>
  </div>
</nav>
    <div class="section">
        <div class="container">
        <h3>List Pembayaran</h3>
                    <table class="table table-hover">
                    <thead  align="center">
                        <tr>
                        <th scope="col">Nama Pegawai
                        <th scope="col">Tanggal Gajian
                        <th scope="col">Jumlah Gaji
                        <th scope="col">
                        </tr>
                    </thead>
                    <?php foreach ($data as $value): ?>
                        <tr align="center">
                        <td scope="row"><?php echo $value->id_pegawai ?></td>
                        <td><?php echo $value->tanggal_gaji?></td>
                        <td><?php echo $value->jumlah_gaji?></td>
                        </tr>
                    <?php endforeach; ?>
                    </table>
            <br>
        </div>
    </div>
  </body>
</html>
