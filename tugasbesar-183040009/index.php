<?php 
   require 'php/backend/functions.php';
   // global $conn;

   $honor = query("SELECT * FROM honor");
   
   ?>
<!DOCTYPE html>
<html>
   <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
   </head>
   <style>

      .slider h3,
      .slider h5 {
      text-shadow:1px 1px 3px rgba(0,0,0,0.5);
      }

      section, footer {
      padding: 20px 0;
      }

      .col.s12.m4 {
        min-height: 180px;
       
      }
      .link ul li {
         display: inline-block;
         margin-right: 25px; 
      }
      .linkimg {
         margin-left: 220px; 
      }

   </style>
   <body>
      <div class="navbar-fixed scrollspy" id="home" >
         <nav class=" light-blue darken-4">
            <div class="container">
               <div class="nav-wrapper">
                  <a href="#home" class="brand-logo">GadgetIn Honor</a>
                  <a href="#" data-target="mobile-nav" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                  <ul class="right hide-on-med-and-down">
                     <li><a href="#home">Home</a></li>
                     <li><a href="#about">About</a></li>
                     <li><a href="#detail">Detail</a></li>
                     <li><a href="#contact">Contact</a></li>
                     <li><a href="php/login.php" class="waves-effect waves-light btn">Login</a></li>
                  </ul>
               </div>
            </div>
         </nav>
      </div>
      <ul class="sidenav" id="mobile-nav">
         <li><a href="">Home</a></li>
         <li><a href="#about">About</a></li>
         <li><a href="#detail">Detail</a></li>
         <li><a href="#contact">Contact Us</a></li>
         <li><a href="php/login.php" class="waves-effect waves-light btn">Login</a></li>
      </ul>
      <div class="slider">
         <ul class="slides">
            <li>
               <img src="img/honor3.jpg"> 
               <div class="caption left-align">
                  <h3>Find your perfect style!</h3>
                  <h5 class="light grey-text text-lighten-3">Your Vision, our future</h5>
               </div>
            </li>
            <li>
               <img src="img/h5.jpg"> 
               <div class="caption center-align">
                  <h3>The Future is Here</h3>
                  <h5 class="light grey-text text-lighten-3">Be What's Next</h5>
               </div>
            </li>
            <li>
               <img src="img/h6.jpg"> 
               <div class="caption right-align">
                  <h3>Used by Professionals!</h3>
                  <h5 class="light grey-text text-lighten-3">Because you're worth it!</h5>
               </div>
            </li>
         </ul>
      </div>
      <section id="about" class="about scrollspy">
         <div class="container">
            <div class="row">
               <h3 class="center ">About Honor</h3>
               <div class="col m6">
                  <h5>Profil Perusahaan</h5>
                  <p>
                     Honor merupakan perusahaan smartphone yang berasal dari Tiongkok, Honor bukanlah brand baru di dunia Smartphone karena telah didirikan sejak tahun 2013. Honor sendiri merupakan sub-brand dari Huawei yang mengincar segmen smartphone terjangkau maupun murah, dengan spesifikasi hardware dan desain yang menggiurkan. 
                  </p>
                  <p>
                     Sejak kehadirannya di Indonesia, Honor sudah menarik perhatian dengan menghadirkan 3 smartphone sekaligus yang terdiri dari Honor 7X, Honor 9 Lite, dan Honor View 10. Di antara ketiganya saya sangat menyukai desain bodi belakang Honor 9 Lite yang dapat menjadi cermin karena material dan warna catnya yang ajaib.
                  </p>
               </div>
               <div class="col m6">
                  <h5>Persentase Penjualan Honor di Dunia</h5>
                  <p>Asia</p>
                  <div class="progress">
                     <div class="determinate blue" style="width: 70%"></div>
                  </div>
                  <p>Eropa</p>
                  <div class="progress">
                     <div class="determinate blue" style="width: 50%"></div>
                  </div>
                  <p>Amerika</p>
                  <div class="progress">
                     <div class="determinate blue" style="width: 40%"></div>
                  </div>
                  <p>Australia</p>
                  <div class="progress">
                     <div class="determinate blue" style="width: 40%"></div>
                  </div>
                  <p>Afghanistan</p>
                  <div class="progress">
                     <div class="determinate blue" style="width: 30%"></div>
                  </div>
               </div>
            </div>
         </div>
      </section>

      <section id="detail" class="detail grey lighten-2 scrollspy">
         <div class="container ">
            <div class="row">
            <h3 class="center">Detail</h3>
            <?php foreach( $honor as $h ) : ?>
                <div class="col s12 m4">
                  <div class="card horizontal">
                     <div class="card-image">
                        <img src="img/<?= $h['photo'] ?>">
                     </div>
                     <div class="card-stacked">
                        <div class="card-content">
                           <p><?= $h['tipe'] ?></p>
                        </div>
                        <div class="card-action">
                           <a href="php/profil.php?id=<?= $h['id']; ?>">Detail</a>
                        </div>
                     </div>
                  </div>
               </div>
            <?php endforeach ?>
            </div>
         </div>
      </section>

      <section id="contact" class="contact grey lighten-3 scrollspy">
         <div class="container">
            <h3 class="light center">Contact</h3>
            <div class="row">
               <div class="col m5 s12">
                  <div class="card-panel light-blue darken-4 center white-text">
                     <i class="material-icons">email</i>
                     <h5>Contact</h5>
                  </div>
                  <ul class="collection with-header">
                     <li class="collection-header">
                        <h4>GadgetIn Honor</h4>
                     </li>
                     <li class="collection-item">Yuswita SM</li>
                     <li class="collection-item">Jl.Gerlong Tengah blok 62</li>
                     <li class="collection-item">West Java, Indonesia</li>
                  </ul>
               </div>
               <div class="col m7 s12">
                  <form>
                     <div class="card-panel">
                        <h5>Please Fill out this form</h5>
                        <div class="input-field">
                           <input type="text" name="name" id="name" required class="validate">
                           <label for="name">Name</label>
                        </div>
                        <div class="input-field">
                           <input type="email" name="email" id="email" class="validate">
                           <label for="email">Email</label>
                        </div>
                        <div class="input-field">
                           <input type="text" name="phone" id="phone">
                           <label for="phone">Phone Number</label>
                        </div>
                        <div class="input-field">
                           <textarea name="message" id="message" class="materialize-textarea"></textarea>
                           <label for="message">Message</label>
                        </div>
                        <button type="submit" class="btn light-blue darken-4">Send</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </section>

     <footer class="page-footer light blue darken-4">
          <div class="container">
            <h5 class="white-text center">GadgetIn</h5>
                <hr>
                <div class="link center">
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#home">Home</a></li> 
                  <li><a class="grey-text text-lighten-3" href="#about">About</a></li> 
                  <li><a class="grey-text text-lighten-3" href="#detail">Detail</a></li>
                  <li><a class="grey-text text-lighten-3" href="#contact">Contact</a></li>
                  <li><a class="grey-text text-lighten-3" href="php/login.php">Login </a></li>
                </ul>
                </div>
                <div class="container center">
                <div class="linkimg ">
               <table>
                  <tr>
                     <td>
                        <a href="https://www.facebook.com/rafi.firdaus.330"> <img src="img/1.png" style="width: 55px"></a>
                        <a href="https://www.instagram.com/yuswita_sm/?hl=id"><img src="img/2.png" style="width: 40px"></a>
                        <a href="https://twitter.com/yuswitasri"><img src="img/3.png" style="width: 50px"> </a> 
                     </td>
                  </tr>
               </table>
              </div>
              </div>
            </div>
          </div>       
          <div class="footer-copyright">
            <div class="container center">
            GadgetIn © 2019 Copyright
            </div>
          </div>
        </footer>
      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script >
         const sideNav = document.querySelectorAll('.sidenav');
         M.Sidenav.init(sideNav);
         
         
         const slider = document.querySelectorAll('.slider');
         M.Slider.init(slider, {
           indicators: false,
           height: 500,
           transition: 600,
           interval: 3000
         });
         
         
         const scroll = document.querySelectorAll('.scrollspy');
         M.ScrollSpy.init(scroll,{
           scrollOffset: 50
         });
         
      </script>
   </body>
</html>
