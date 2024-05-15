<style type="text/css">


</style>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="resource/css/inicio/main.css" />
    <link rel="stylesheet" href="resource/css/inicio/inicio.css" />
    <link rel="stylesheet" href="resource/css/inicio/populares.css" />
    <link rel="stylesheet" href="resource/css/inicio/ofrece.css" />
    <link rel="stylesheet" href="resource/css/inicio/cifras.css" />
    <link rel="stylesheet" href="resource/css/inicio/niveles.css" />
    <link rel="stylesheet" href="resource/css/inicio/preguntas.css" />
    <link rel="stylesheet" href="resource/css/layouts/footer2.css" />
    <link rel="stylesheet" href="resource/css/inicio/btn.css" />
    <!-- <link rel="stylesheet" href="resource/css/inicio/nav.css" /> -->
    <title>Document</title>
    <style>
      .txt-banner p {
        height: 80px;
      }
      .txt-banner a{
        margin-bottom: 3px;
      }
      .img-banner{
        height: 150px;
      }
      .img-banner img{
        height: 100%;
      }
      
    </style>
    
    <script src="https://kit.fontawesome.com/1165876da6.js" crossorigin="anonymous"></script>
  </head>
  <body>
  <?php require_once('view/layout/nav.php');?>
  <a href="https://www.youtube.com/watch?v=fVeGYX6GWMU" class="whatsaap-btn" targer="_blank">
  <i class="fa-brands fa-whatsapp"></i>
      <div class="joinchat__tooltip"><i class="bi bi-person-circle"></i>
      <div class="text">¿Podemos ayudarte?

      </div>
    </div>
    </a>
   
    <section class="section-inicio" id='section-inicio'>
      <div class="contenedor-frase">
        <p class="frase">
          <span>Kepler Education,</span>
          expertos en reforzar tus habilidades
        </p>
        <div class="contenedor-img-inicio">
          <img src="resource/img/inicio/personas.svg" alt="imagen-animada" />
        </div>
      </div>
      <hr />
      <div class="destacados">
        <div class="destacados_texto">
          <h4>Nuestros cursos más destacados</h4>
          <p>Te gustaría adquirir alguno de ellos?</p>
          <a type="button" href='https://wa.me/+573123467007?text=Hola,%20Estoy%20interesado%20en%20sus%20cursos%20'class="btn-animado animacion-cuatro color-instagram" style="text-decoration:none;">
                    <!-- icono whatsapp -->
                    <i class="fab fa-whatsapp"></i>
                    <span class="tex-icono">Chatea con nosotros</span>
                </a>
        </div>
        <div class="destacados_banners">
          <div class="destacado_banner shadow-drop-center ">
            <div class="img-banner">
              <img src="resource/img/inicio/matematicas.jpg" alt="banner-img" />
            </div>
            <div class="txt-banner">
              <h5 class="nombre-curso">Matematicas</h5>
              <p>
              En este curso parenderas los principios basicos de las matematicas.Conoceras algunos conceptos, como aritmetica y geometria
              </p>
              <a href="https://wa.me/+573123467007?text=Hola,%20Estoy%20interesado%20en%20sus%20cursos%20" class="boton-comprar" style="text-decoration:none;">COMPRAR</a>
            </div>
          </div>
          <div class="destacado_banner">
            <div class="img-banner">
              <img src="resource/img/inicio/preicfes.png" alt="banner-img" />
            </div>
            <div class="txt-banner">
              <h5 class="nombre-curso">Preicfes</h5>
              <p>
               Con este curso, conoceras los diferentes temas y retos que se llevan a cabo en las  pruebas icfes
              
              </p>
              <a href="https://wa.me/+573123467007?text=Hola,%20Estoy%20interesado%20en%20sus%20cursos%20" class="boton-comprar" style="text-decoration:none;">COMPRAR</a>
            </div>
          </div>
          <div class="destacado_banner">
            <div class="img-banner">
              <img src="resource/img/inicio/Ingles.jpg" alt="banner-img" />
            </div>
            <div class="txt-banner">
              <h5 class="nombre-curso">Ingles</h5>
              <p>
                Con este curso podras tener un nivel B1 en ingles 
              </p>
              <a href="https://wa.me/+573123467007?text=Hola,%20Estoy%20interesado%20en%20sus%20cursos%20" class="boton-comprar" style="text-decoration:none;">COMPRAR</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="sectionimpar">
      <h2 class="h2sub">EXPLORA LAS CATEGORIAS MÁS POPULARES</h2>
      <article class="contenedor-populares">
        <div class="popular">
          <div class="popular-img">
            <img src="resource/img/inicio/icon_english.png" alt="" />
          </div>
          <div class="popular-txt">
            <h4>Inglés</h4>
            
          </div>
        </div>
        <div class="popular">
          <div class="popular-img">
            <img src="resource/img/inicio/icfes.svg" alt="" />
          </div>
          <div class="popular-txt">
            <h4>Preicfes</h4>
           
          </div>
        </div>
        <div class="popular">
          <div class="popular-img">
            <img src="resource/img/inicio/atomo.svg" alt="" />
          </div>
          <div class="popular-txt">
            <h4>Ciencias</h4>
            
          </div>
        </div>
      </article>
      <a class="boton ver" href='controller/invitado/controller_cursos_inicio.php' style="text-decoration:none;">VER TODOS LOS CURSOS</a>
    </section>
    
    <section class="">
      <h2 class="h2sub">TIPO DE CLASES DISPONIBLES</h2>
      <article class="contenedor-populares">
      <div class="card" onmouseover="this.style.backgroundColor='#8AE96E ';" onmouseout="this.style.backgroundColor='';">
          <div class="popular-img">
            <img src="resource/img/inicio/videollamada.png"width="100" alt="" />
          </div>
          <div class="popular-txt">
            <h4>virtual</h4>
          
          </div>
        </div>
        <div class="card" onmouseover="this.style.backgroundColor='#8AE96E ';" onmouseout="this.style.backgroundColor='';">
          <div class="popular-img">
            <img src="resource/img/inicio/educacion.png" width="100" alt="" />
          </div>
          <div class="popular-txt">
            <h4>presencial</h4>
          </div>
        </div>
        <div class="card" onmouseover="this.style.backgroundColor='#8AE96E ';" onmouseout="this.style.backgroundColor='';">
          <div class="popular-img">
            <img src="resource/img/inicio/casa.png" width="100" alt="" />
          </div>
          <div class="popular-txt">
            <h4>domicilio</h4>
          </div>
        </div>
      </article>
    </section>

    
    <section class="section-ofrece">
      <h2 class="h2sub">LO QUE TE OFRECEMOS EN KEPLER</h2>
      <article class="container-ofrece">
        <div class="ofrece-item">
          <div class="ofrece-img">
            <img src="resource/img/inicio/happy.svg" alt="caritafeliz" />
          </div>
          <div class="ofrece-txt">
            <h4>Aprende a tu ritmo</h4>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
              eiusmod tempor incididunt ut labore.
            </p>
          </div>
        </div>
        <div class="ofrece-item">
          <div class="ofrece-img">
            <img src="resource/img/inicio/laptop.svg" alt="caritafeliz" />
          </div>
          <div class="ofrece-txt">
            <h4>Aprende a tu ritmo</h4>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
              eiusmod tempor incididunt ut labore.
            </p>
          </div>
        </div>
        <div class="ofrece-item">
          <div class="ofrece-img">
            <img src="resource/img/inicio/like.svg" alt="caritafeliz" />
          </div>
          <div class="ofrece-txt">
            <h4>Aprende a tu ritmo</h4>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
              eiusmod tempor incididunt ut labore.
            </p>
          </div>
        </div>
        <div class="ofrece-item">
          <div class="ofrece-img">
            <img src="resource/img/inicio/Group.png" alt="caritafeliz" />
          </div>
          <div class="ofrece-txt">
            <h4>Aprende a tu ritmo</h4>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
              eiusmod tempor incididunt ut labore.
            </p>
          </div>
        </div>
        <div class="ofrece-item">
          <div class="ofrece-img">
            <img src="resource/img/inicio/cerebro.svg" alt="caritafeliz" />
          </div>
          <div class="ofrece-txt">
            <h4>Aprende a tu ritmo</h4>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
              eiusmod tempor incididunt ut labore.
            </p>
          </div>
        </div>
        <div class="ofrece-item">
          <div class="ofrece-img">
            <img src="resource/img/inicio/graduado.png" alt="caritafeliz" />
          </div>
          <div class="ofrece-txt">
            <h4>Aprende a tu ritmo</h4>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
              eiusmod tempor incididunt ut labore.
            </p>
          </div>
        </div>
      </article>
    </section>
    <section class="sectionimpar">
      <h2 class="h2sub">TENEMOS PARA TODOS LOS NIVELES</h2>
      <article class="container-niveles">
        <div class="nivel-item">
          <div class="nivel-img">
            <img src="resource/img/inicio/negritoestudiando.svg" alt="" />
          </div>
          <span>PRIMARIA</span>
        </div>
        <div class="nivel-item">
          <div class="nivel-img">
            <img src="resource/img/inicio/niñasdiario.svg" alt="" />
          </div>
          <span>SECUNDARIA</span>
        </div>
        <div class="nivel-item">
          <div class="nivel-img">
            <img src="resource/img/inicio/negritoestudiando.svg" alt="" />
          </div>
          <span>UNIVERSIDAD</span>
        </div>
      </article>
    </section>
    <section class="section-preguntas">
      <h2 class="h2sub grande">PREGUNTAS FRECUENTES</h2>
      <article class="container-preguntas">
        <details class="pregunta" name="pregunta">
          <summary class="p-pregunta">¿CUANDO PUEDO EMPEZAR MIS CLASES?</summary>
          <p>Puedes empezar desde el momento en que verifiquemos el pago de tu curso</p>
        </details>
        <details class="pregunta" name="pregunta">
          <summary class="p-pregunta">¿CUÁNDO PUEDO EMPEZAR MIS CLASES?</summary>
          <p>Puedes comenzar tus clases inmediatamente después de que hayamos verificado el pago de tu curso. ¡Estamos emocionados de tenerte con nosotros!</p>
        </details>
        
        <details class="pregunta" name="pregunta">
          <summary class="p-pregunta">¿QUÉ OFERTAS TIENEN PARA PRIMARIA?</summary>
          <p>Contamos con una amplia gama de cursos diseñados específicamente para estudiantes de primaria. Desde refuerzos en matemáticas hasta clases de idiomas, ¡tenemos algo para cada niño!</p>
        </details>
        
        <details class="pregunta" name="pregunta">
          <summary class="p-pregunta">¿CÓMO PUEDO PREPARARME PARA LA UNIVERSIDAD?</summary>
          <p>Nuestros cursos universitarios ofrecen preparación integral para diversas áreas de estudio, tambien contamos con preicfes según tu programa de interés. Desde tutorías académicas hasta consejos para el éxito en la universidad, estamos aquí para apoyarte en tu viaje educativo.</p>
        </details>
        <details class="pregunta" name="pregunta">
          <summary class="p-pregunta">¿CÓMO PUEDO MEJORAR MIS HABILIDADES EN MATEMÁTICAS?</summary>
          <p>Nuestros cursos de matemáticas ofrecen un enfoque práctico y personalizado para fortalecer tus habilidades en esta área. Desde problemas básicos hasta conceptos avanzados, tenemos recursos para todos los niveles.</p>
        </details>
        
        <details class="pregunta" name="pregunta">
          <summary class="p-pregunta">¿QUÉ IDIOMAS OFRECEN PARA APRENDER?</summary>
          <p>Te ofrecemos una variedad de cursos de idiomas, desde los más comunes hasta opciones menos convencionales. ¡Aprender un nuevo idioma nunca fue tan emocionante!</p>
        </details>
      </article>
    </section>
    <section class="cifras">
      <div class="cifra">
        <p class="cifra-number">+300</p>
        <p class="cifra-txt">alumnos</p>
      </div>
      <div class="cifra">
        <p class="cifra-number">+25</p>
        <p class="cifra-txt">cursos</p>
      </div>
      <div class="cifra">
        <p class="cifra-number">+10</p>
        <p class="cifra-txt">areas de estudio</p>
      </div>
    </section>
    <?php require_once('view/layout/footer.php');?>
  </body>
</html>
