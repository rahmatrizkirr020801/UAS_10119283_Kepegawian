<!DOCTYPE html>
<html lang="id" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'css/stambah.css'; ?>">
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
            <li class="nav-item">
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
        <?php echo form_open("login/logout") ?>
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
        <?php echo form_close() ?>
      </div>
    </nav>
    <form action="<?php echo site_url() ?>/pegawai/tambah_gaji_pegawai" method="post">
        <?php foreach ($data as $value): ?>
            <div class="box-menu">
                Nik  :
                <br>
                <select name="id_pegawai" class="form-control">
                    <option value="<?php echo $value->id_pegawai ?>"><?php echo $value->id_pegawai ?></option>
                </select>
                <br>
                Nama :
                <br>
                <select name="nama_pegawai" class="form-control">
                    <option value="<?php echo $value->nama_pegawai ?>"><?php echo $value->nama_pegawai ?></option>
                </select>
                <br>
                Jabatan :
                <br>
                <select name="kd_jabatan" class="form-control">
                    <option value="<?php echo $value->kd_jabatan ?>"><?php if($value->kd_jabatan == '10001') {echo "Manajer";} elseif($value->kd_jabatan == '10002') {echo "Wakil Manajer";} elseif($value->kd_jabatan == '20001') {echo "Sekretaris";} elseif($value->kd_jabatan == '20002') {echo "Wakil Sekretaris";} elseif($value->kd_jabatan == '30001') {echo "Pegawai";} elseif($value->kd_jabatan == '40001') {echo "Bendahara";} elseif($value->kd_jabatan == '40002') {echo "Wakil Bendahara";}?></option>
                </select>
                <br>
                Tanggal : YYYY-MM-DD
                <br>
                <select name="tanggal_gaji" class="form-control">
                    <option value="<?php echo date('Y-m-d') ?>"><?php echo date('Y-m-d') ?></option>
                </select>
                <br>
                Jumlah Gaji :
                <br>
                <select name="jumlah_gaji" class="form-control">
                    <option value="<?php if($value->kd_jabatan == '10001') {echo '50000000';} elseif($value->kd_jabatan == '10002') {echo '30000000';} elseif($value->kd_jabatan == '20001') {echo '20000000';} elseif($value->kd_jabatan == '20002') {echo '15000000';} elseif($value->kd_jabatan == '30001') {echo '10000000';} elseif($value->kd_jabatan == '40001') {echo '20000000';} elseif($value->kd_jabatan == '40002') {echo '15000000';}?>">
                    <?php if($value->kd_jabatan == '10001') {echo "Rp 50.000.000";} elseif($value->kd_jabatan == '10002') {echo "Rp 30.000.000";} elseif($value->kd_jabatan == '20001') {echo "Rp 20.000.000";} elseif($value->kd_jabatan == '20002') {echo "Rp 15.000.000";} elseif($value->kd_jabatan == '30001') {echo "Rp 10.000.000";} elseif($value->kd_jabatan == '40001') {echo "Rp 20.000.000";} elseif($value->kd_jabatan == '40002') {echo "Rp 15.000.000";}?>
                    </option>
                </select>
                <br>
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">submit</button>
            </div>
        <?php endforeach; ?>
    </form>
  </body>
</html>
