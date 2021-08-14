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
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo site_url(); ?>/pegawai">Pegawai<span class="sr-only">(current)</a>
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

      <form action="<?php echo site_url() ?>/pegawai/tambah_detai_pegawai" method="post">
        <div class="box-menu">
            Nik  :
            <br>
            <input type="number" name="id_pegawai" >
            <br>
            Nama :
            <br>
            <input type="text" name="nama_pegawai" >
            <br>
            Jabatan :
            <br>
            <select name="kd_jabatan" class="form-control">
                <option value="">Pilih Jabatan</option>
                <option value="10001">Manajer</option>
                <option value="10002">Wakil Manajer</option>
                <option value="20001">Sekretaris</option>
                <option value="20002">Wakil Sekretaris</option>
                <option value="30001">Pegawai</option>
            </select>
            <br>
            Alamat :
            <br>
            <input type="text" name="alamat" >
            <br>
            No hp :
            <br>
            <input type="number" name="no_hp" >
            <br>
            Tanggal Lahir : YYYY-MM-DD
            <br>
            <input type="text" name="tgl_lahir" > 
            <br>
            Gmail :
            <br>
            <input type="text" name="gmail" class="form-control" id="exampleFormControlInput1" > 
            <br>
            Jenis Kelamin :
            <br>
            <select name="jenis_kelamin" class="form-control">
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
            </select> 
            <br>
            Password :
            <br>
            <input type="text" name="password" > 
            <br>
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">submit</button>
        </div>
      </form>
  </body>
</html>
