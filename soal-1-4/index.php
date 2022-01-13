<?php
// Teknikal Test Digital Oasis 2022
// File: index
/*
created by :
  nama : Puji Ermanto
  email : pujiermanto@gmail.com
  no telp : 0882 2266 8778
  github username : codesyariah122
*/
// Load file autoload class
session_start();
require_once(dirname(__FILE__)) .'/app/init.php';
/** 
  Aktifasi namespace @app/classNames
*/
use \app\BaseClass\BaseClass;
use \app\SoalSatu\SoalSatu;
use \app\SoalDua\SoalDua;
use \app\SoalTiga\SoalTiga;
use \app\SoalEmpat\SoalEmpat;
// instantiasi and using title method
$base = new BaseClass('Digital Oasis Teknikal Test');
// instantiasi and using component method
$first_component = new BaseClass;
$profile_component = new BaseClass;
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <title>
      <?=$base->title(); ?>
    </title>
    <style type="text/css">
      .my__profile{
        margin-top: 20rem;
        position: fixed;
      }
    </style>
  </head>
  <body>

    <div class="container">
      <!-- Row introduction interactive component -->
      <div class="row justify-content-center">
        <div class="col-lg-12 col-xs-12 col-sm-12 mt-3 mb-5">
          <h4 class="text-center"><?=$base->title(); ?></h4>
          <div class="alert alert-primary text-center" role="alert">
            <?= $base->paragraph('Click / Tap Button di bawah untuk membuka urutan soal yang di inginkan !!') ?>
          </div>
        </div>
      </div>

      <div class="row justify-content-center">
        <!-- panggil semua component  -->
        <?php  
          $firsts = ['soal1', 'soal2', 'soal3', 'soal4'];
          $first_component->components('components/firsts', $firsts);
        ?>
      </div>

      <div class="row justify-content-center mt-5 mb-5">
        <div class="col-lg-12 col-xs-12 col-sm-12">
          <!-- Result component pertama (component ke dua) -->
          <div class="card">
            <div class="card-body">
              <?php 
                  $soal_satu = new SoalSatu('Soal Satu', 'soal1_session', 'soal1_start');
                  $soal_dua = new SoalDua('Soal Dua', 'soal2_session', 'soal2_start');
                  $soal_tiga = new SoalTiga('Soal Tiga', 'soal3_session', 'soal3_start');
                  $soal_empat = new SoalTiga('Soal Empat', 'soal4_session', 'soal4_start');
              ?>
              <?php if(isset($_GET['soal1_start'])): 
                $soal_satu->second_component($_REQUEST, 'components/seconds/', 'soal_satu');
              ?>
              <?php elseif(isset($_GET['soal2_start'])): 
                $soal_dua->second_component($_REQUEST, 'components/seconds/', 'soal_dua');
              ?>
              <?php elseif(isset($_GET['soal3_start'])): 
                $soal_tiga->second_component($_REQUEST, 'components/seconds/', 'soal_tiga');
              ?>
              <?php elseif(isset($_GET['soal4_start'])): 
                $soal_empat->second_component($_REQUEST, 'components/seconds/', 'soal_empat');
              ?>
              <?php else: ?>
                <picture>
                  
                  Component akan muncul setelah tombol di click / tap ...

                </picture>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>


      <!-- My Profile Content -->
      <div class="position-sticky">
        <div class="position-absolute top-100 start-50 translate-middle my__profile">
          <?php 
          $profiles = ['MyProfile'];
          $profile_component->my_profile('components/profiles', $profiles);
          ?>
        </div>
      </div>
      
    </div>
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>
