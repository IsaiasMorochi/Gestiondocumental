<!DOCTYPE >
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> GESTION DOCUMENTAL</title>
<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">

<link href="{{asset('admin/css/font-awesome.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('admin/css/animate.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('admin/css/admin.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('admin/css/jquerysctipttop.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('admin/plugins/kalendar/kalendar.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('admin/plugins/scroll/nanoscroller.css')}}">
<link href="{{asset('admin/plugins/morris/morris.css')}}" rel="stylesheet" />
</head>

<?php
error_reporting(E_ALL and E_NOTICE);
session_start();
$a=$_SESSION['username'];?>

  <body class="{{$a->t}} {{$a->c}} {{$a->l}}  fixed_header left_nav_fixed">

<div class="wrapper">
  <!--\\\\\\\ wrapper Start \\\\\\-->
  <div class="header_bar">
    <!--\\\\\\\ header Start \\\\\\-->
    <div class="brand">
      <!--\\\\\\\ brand Start \\\\\\-->
      <div class="logo" style="display:block"><span class="theme_color">GI-</span>FILE</div>
      <div class="small_logo" style="display:none"><img src="images/s-logo.png" width="50" height="47" alt="s-logo" /> <img src="images/r-logo.png" width="122" height="20" alt="r-logo" /></div>
    </div>
    <!--\\\\\\\ brand end \\\\\\-->
    <div class="header_top_bar">
      <!--\\\\\\\ header top bar start \\\\\\-->
      <a href="javascript:void(0);" class="menutoggle"> <i class="fa fa-bars"></i> </a>
     <!--  <div class="top_left">
        <div class="top_left_menu">
          <ul>
            <li> <a href="javascript:void(0);"><i class="fa fa-repeat"></i></a> </li>
            <li class="dropdown"> <a data-toggle="dropdown" href="javascript:void(0);"> <i class="fa fa-th-large"></i> </a>
      <ul class="drop_down_task dropdown-menu" style="margin-top:39px">
        <div class="top_left_pointer"></div>
        <li><div class="checkbox">
                  <label>
                    <input type="checkbox" name="remember">
                    Remember me </label>
                </div></li>
        <li> <a href="help.html"><i class="fa fa-question-circle"></i> Help</a> </li>
        <li> <a href="settings.html"><i class="fa fa-cog"></i> Setting </a></li>
        <li> <a href="login.html"><i class="fa fa-power-off"></i> Logout</a> </li>
      </ul>
      </li>
          </ul>
        </div>
      </div> -->
     <!--  <a href="javascript:void(0);" class="add_user" data-toggle="modal" data-target="#myModal"> <i class="fa fa-plus-square"></i> <span> New Task</span> </a> -->
      <div class="top_right_bar">
        <div class="top_right">
          <div class="top_right_menu">
            <ul>
              <!-- <li class="dropdown"> <a href="javascript:void(0);" data-toggle="dropdown"> Tasks <span class="badge badge">8</span> </a>
                <ul class="drop_down_task dropdown-menu">
                  <div class="top_pointer"></div>
                  <li>
                    <p class="number">You have 7 pending tasks</p>
                  </li>
                  <li> <a href="task.html" class="task">
                    <div class="green_status task_height" style="width:80%;"></div>
                    <div class="task_head"> <span class="pull-left">Task Heading</span> <span class="pull-right green_label">80%</span> </div>
                    <div class="task_detail">Task details goes here</div>
                    </a> </li>
                  <li> <a href="task.html" class="task">
                    <div class="yellow_status task_height" style="width:50%;"></div>
                    <div class="task_head"> <span class="pull-left">Task Heading</span> <span class="pull-right yellow_label">50%</span> </div>
                    <div class="task_detail">Task details goes here</div>
                    </a> </li>
                  <li> <a href="task.html" class="task">
                    <div class="blue_status task_height" style="width:70%;"></div>
                    <div class="task_head"> <span class="pull-left">Task Heading</span> <span class="pull-right blue_label">70%</span> </div>
                    <div class="task_detail">Task details goes here</div>
                    </a> </li>
                  <li> <a href="task.html" class="task">
                    <div class="red_status task_height" style="width:85%;"></div>
                    <div class="task_head"> <span class="pull-left">Task Heading</span> <span class="pull-right red_label">85%</span> </div>
                    <div class="task_detail">Task details goes here</div>
                    </a> </li>
                  <li> <span class="new"> <a href="task.html" class="pull_left">Create New</a> <a href="task.html" class="pull-right">View All</a> </span> </li>
                </ul>
              </li> -->
              <!-- <li class="dropdown"> <a href="javascript:void(0);" data-toggle="dropdown"> Mail <span class="badge badge color_1">4</span> </a>
                <ul class="drop_down_task dropdown-menu">
                  <div class="top_pointer"></div>
                  <li>
                    <p class="number">You have 4 mails</p>
                  </li>
                      <li> <a href="readmail.html" class="mail"> <span class="photo"><img src="images/user.png" /></span> <span class="subject"> <span class="from">sarat m</span> <span class="time">just now</span> </span> <span class="message">Hello,this is an example msg.</span> </a> </li>
                  <li> <a href="readmail.html" class="mail"> <span class="photo"><img src="images/user.png" /></span> <span class="subject"> <span class="from">sarat m</span> <span class="time">just now</span> </span> <span class="message">Hello,this is an example msg.</span> </a> </li>
                  <li> <a href="readmail.html" class="mail red_color"> <span class="photo"><img src="images/user.png" /></span> <span class="subject"> <span class="from">sarat m</span> <span class="time">just now</span> </span> <span class="message">Hello,this is an example msg.</span> </a> </li>
                  <li> <a href="readmail.html" class="mail"> <span class="photo"><img src="images/user.png" /></span> <span class="subject"> <span class="from">sarat m</span> <span class="time">just now</span> </span> <span class="message">Hello,this is an example msg.</span> </a> </li>
              
                </ul>
              </li> -->

                <?php
                error_reporting(E_ALL and E_NOTICE);
                session_start();
                $a=$_SESSION['institucion'];?>
              <li class="dropdown"> <a href="javascript:void(0);" data-toggle="dropdown"> {{ $a->nombre or 'ADMINISTRADOR GENERAL'}}  </a>
                <div class="notification_drop_down dropdown-menu">
                  <div class="top_pointer"></div>
                  <div class="box"> <a href="inbox.html"> <span class="block primery_6"> <i class="fa fa-envelope-o"></i> </span> <span class="block_text">Mailbox</span> </a> </div>
                  <div class="box"> <a href="calendar.html"> <span class="block primery_2"> <i class="fa fa-calendar-o"></i> </span> <span class="block_text">Calendar</span> </a> </div>
                  <div class="box"> <a href="maps.html"> <span class="block primery_4"> <i class="fa fa-map-marker"></i> </span> <span class="block_text">Map</span> </a> </div>
                  <div class="box"> <a href="todo.html"> <span class="block primery_3"> <i class="fa fa-plane"></i> </span> <span class="block_text">To-Do</span> </a> </div>
                  <div class="box"> <a href="task.html"> <span class="block primery_5"> <i class="fa fa-picture-o"></i> </span> <span class="block_text">Tasks</span> </a> </div>
                  <div class="box"> <a href="timeline.html"> <span class="block primery_1"> <i class="fa fa-clock-o"></i> </span> <span class="block_text">Timeline</span> </a> </div>
                </div>
              </li>
            </ul>
          </div>
        </div>


          <?php
          error_reporting(E_ALL and E_NOTICE);
          session_start();
          $p=$_SESSION['username'];?>



        <div class="user_admin dropdown"> <a href="javascript:void(0);" data-toggle="dropdown"><img src="dist/img/usuario.png" /><span class="user_adminname">{{$p->n}} </span> <b class="caret"></b> </a>
          <ul class="dropdown-menu">
            <div class="top_pointer"></div>
            <li> <a href="profile.html"><i class="fa fa-user"></i> Profile</a> </li>
            <li> <a href="help.html"><i class="fa fa-question-circle"></i> Help</a> </li>
            <li> <a href="settings.html"><i class="fa fa-cog"></i> Setting </a></li>
            <li> <a href="{{ route('logout') }}"
                         onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                         class="fa fa-question-circle">Cerrar Sesion</a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                      </form>
            </li>
          </ul>
        </div>

        <a href="javascript:;" class="toggle-menu menu-right push-body jPushMenuBtn rightbar-switch"><i class="fa fa-comment chat"></i></a>
        
      </div>
    </div>
    <!--\\\\\\\ header top bar end \\\\\\-->
  </div>
  <!--\\\\\\\ header end \\\\\\-->
  <div class="inner">
    <!--\\\\\\\ inner start \\\\\\--><div class="left_nav">

      <!--\\\\\\\left_nav start \\\\\\-->
      <div class="search_bar"> <i class="fa fa-search"></i>
        <input name="" type="text" class="search" placeholder="Buscar..." />
      </div>
      <div class="left_nav_slidebar">
        <ul>

            <?php
            error_reporting(E_ALL and E_NOTICE);
            session_start();
            $P = $_SESSION['m1'];?>
            @if(count($P) > 0)
          <li ><a href="javascript:void(0);"><i class="fa fa-home"></i>ADM GENERAL <span class="left_nav_pointer"></span> <span class="plus"><i class="fa fa-plus"></i></span> </a>
            <ul>
                <?php
                error_reporting(E_ALL and E_NOTICE);
                session_start();?>
              @foreach($_SESSION['m1'] as $priv)
                <li> <a href="{{url('AdmGeneral/'.$priv->ruta)}}"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>{{$priv->nombre}}</b> </a> </li>
              @endforeach
            </ul>
          </li>
             @endif



             <?php
                error_reporting(E_ALL and E_NOTICE);
                session_start();
                $P = $_SESSION['m2'];?>
             @if(count($P) > 0)
          <li> <a href="javascript:void(0);"> <i class="fa fa-edit"></i> DOCUMENTO <span class="plus"><i class="fa fa-plus"></i></span></a>
            <ul>
                <?php
                error_reporting(E_ALL and E_NOTICE);
                session_start();?>
              @foreach($_SESSION['m2'] as $priv)
                <li> <a href="{{url('Documento/'.$priv->ruta)}}"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>{{$priv->nombre}}</b> </a> </li>
              @endforeach
            </ul>
          </li>
            @endif

            <?php
                error_reporting(E_ALL and E_NOTICE);
                session_start();
                $P = $_SESSION['m3'];?>
            @if(count($P) > 0)
          <li> <a href="javascript:void(0);"> <i class="fa fa-tasks"></i> SITIOS COMPARTIDOS <span class="plus"><i class="fa fa-plus"></i></span></a>
            <ul>
                <?php
                error_reporting(E_ALL and E_NOTICE);
                session_start();?>
              @foreach($_SESSION['m3'] as $priv)
                <li> <a href="{{url('SitioCompartido/'.$priv->ruta)}}"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>{{$priv->nombre}}</b> </a> </li>
              @endforeach
            </ul>
          </li>
              @endif


              <?php
                error_reporting(E_ALL and E_NOTICE);
                session_start();
                $P = $_SESSION['m4'];?>
              @if(count($P) > 0)
          <li> <a href="javascript:void(0);"> <i class="fa fa-users icon"></i> USUARIO <span class="plus"><i class="fa fa-plus"></i></span> </a>
            <ul>
                <?php
                error_reporting(E_ALL and E_NOTICE);
                session_start();?>
              @foreach($_SESSION['m4'] as $priv)
                <li> <a href="{{url('Usuario/'.$priv->ruta)}}"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>{{$priv->nombre}}</b> </a> </li>
              @endforeach
            </ul>
          </li>
              @endif


                <?php
                error_reporting(E_ALL and E_NOTICE);
                session_start();
                $P = $_SESSION['m5'];?>
              @if(count($P) > 0)
          <li> <a href="javascript:void(0);"> <i class="fa fa-users icon"></i> HERRAMIENTA <span class="plus"><i class="fa fa-plus"></i></span> </a>
            <ul>
                <?php
                error_reporting(E_ALL and E_NOTICE);
                session_start();?>
              @foreach($_SESSION['m5'] as $priv)
                <li> <a href="{{url('admin/'.$priv->ruta)}}"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>{{$priv->nombre}}</b> </a> </li>
              @endforeach
            </ul>
          </li>
                @endif

         </ul>
      </div>
    </div>
    <!--\\\\\\\left_nav end \\\\\\-->
    <div class="contentpanel">
      <!--\\\\\\\ contentpanel start\\\\\\-->
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <!-- <h1>Dashboard</h1>
          <h2 class="">Subtitle goes here...</h2> -->
        </div>
        <!-- <div class="pull-right">
          <ol class="breadcrumb">
            <li><a href="#">Menu</a></li>
            <li><a href="#">DASHBOARD</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </div> -->
      </div>
      @yield('prueba')
      <div class="container clear_both padding_fix">

        <div class="row">

          <div class="col-md-12">
            <div class="block-web">
              <!-- <div class="header">
                <h3 class="content-header">Graph</h3>
              </div> -->

              <!-- <div class="porlets-content">
                <div id="graph"></div>
              </div> -->
              <!--/porlets-content-->
                <!--Contenido-->
                  @yield('contenido')
                <!--Fin Contenido-->
            </div>
            <!--/block-web-->
          </div>
          <!--/col-md-12-->
        </div>
        <!--/row-->
              
      </div>
      <!--\\\\\\\ container  end \\\\\\-->
    </div>
    <!--\\\\\\\ content panel end \\\\\\-->
  </div>
  <!--\\\\\\\ inner end\\\\\\-->
</div>
<!--\\\\\\\ wrapper end\\\\\\-->
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Compose New Task</h4>
      </div>
      <div class="modal-body"> content </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


<!-- sidebar chats -->
<nav class="atm-spmenu atm-spmenu-vertical atm-spmenu-right side-chat">
  <div class="header">
    <input type="text" class="form-control chat-search" placeholder=" Search">
  </div>
  <div href="#" class="sub-header">
    <div class="icon"><i class="fa fa-user"></i></div> <p>Online (4)</p>
  </div>
  <div class="content">
    <p class="title">Operadores</p>
    <ul class="nav nav-pills nav-stacked contacts">
      <li class="online"><a href="#"><i class="fa fa-circle-o"></i> Juan Jose</a></li>
      <li class="online"><a href="#"><i class="fa fa-circle-o"></i> John Doe</a></li>
      <li class="online"><a href="#"><i class="fa fa-circle-o"></i> Michael Smith</a></li>
      <li class="busy"><a href="#"><i class="fa fa-circle-o"></i> Chris Rogers</a></li>
    </ul>
    
    <p class="title">Friends</p>
    <ul class="nav nav-pills nav-stacked contacts">
      <li class="online"><a href="#"><i class="fa fa-circle-o"></i> Vernon Philander</a></li>
      <li class="outside"><a href="#"><i class="fa fa-circle-o"></i> Kyle Abbott</a></li>
      <li><a href="#"><i class="fa fa-circle-o"></i> Dean Elgar</a></li>
    </ul>   
    
    <p class="title">Work</p>
    <ul class="nav nav-pills nav-stacked contacts">
      <li><a href="#"><i class="fa fa-circle-o"></i> Dale Steyn</a></li>
      <li><a href="#"><i class="fa fa-circle-o"></i> Morne Morkel</a></li>
    </ul>
    
  </div>
  <div id="chat-box">
    <div class="header">
      <span>Richard Avedon</span>
      <a class="close"><i class="fa fa-times"></i></a>    </div>
    <div class="messages nano nscroller has-scrollbar">
      <div class="content" tabindex="0" style="right: -17px;">
        <ul class="conversation">
          <li class="odd">
            <p>Hi John, how are you?</p>
          </li>
          <li class="text-right">
            <p>Hello I am also fine</p>
          </li>
          <li class="odd">
            <p>Tell me what about you?</p>
          </li>
          <li class="text-right">
            <p>Sorry, I'm late... see you</p>
          </li>
          <li class="odd unread">
            <p>OK, call me later...</p>
          </li>
        </ul>
      </div>
    <div class="pane" style="display: none;"><div class="slider" style="height: 20px; top: 0px;"></div></div></div>
    <div class="chat-input">
      <div class="input-group">
        <input type="text" placeholder="Enter a message..." class="form-control">
        <span class="input-group-btn">
        <button class="btn btn-danger" type="button">Send</button>
        </span>      </div>
    </div>
  </div>
</nav>
<!-- /sidebar chats -->   














<!-- sidebar chats -->
<nav class="atm-spmenu atm-spmenu-vertical atm-spmenu-right side-chat">
  <div class="header">
    <input type="text" class="form-control chat-search" placeholder=" Search">
  </div>
  <div href="#" class="sub-header">
      <?php
      error_reporting(E_ALL and E_NOTICE);
      session_start();
      $userC=$_SESSION['cantO'];?>

    <div class="icon"><i class="fa fa-user"></i></div> <p>Online ( {{$userC}} )</p>
  </div>

  <div class="content">
      <?php
      error_reporting(E_ALL and E_NOTICE);
      session_start();
      $user=$_SESSION['usernameO'];?>


    <p class="title">Usuarios en Linea</p>
    <ul class="nav nav-pills nav-stacked contacts">
      @foreach($user as $u)
        @if($u->online==1)
      <li class="online"><a href="#"><i class="fa fa-circle-o"></i> {{$u->nombreU}}</a></li>
        @else
          <li class="busy"><a href="#"><i class="fa fa-circle-o"></i> {{$u->nombreU}}</a></li>
        @endif
      @endforeach

    </ul>
    

    
  </div>
  <div id="chat-box">
    <div class="header">
      <span>Richard Avedon</span>
      <a class="close"><i class="fa fa-times"></i></a>    </div>
    <div class="messages nano nscroller has-scrollbar">
      <div class="content" tabindex="0" style="right: -17px;">
        <ul class="conversation">
          <li class="odd">
            <p>Hi John, how are you?</p>
          </li>
          <li class="text-right">
            <p>Hello I am also fine</p>
          </li>
          <li class="odd">
            <p>Tell me what about you?</p>
          </li>
          <li class="text-right">
            <p>Sorry, I'm late... see you</p>
          </li>
          <li class="odd unread">
            <p>OK, call me later...</p>
          </li>
        </ul>
      </div>
    <div class="pane" style="display: none;"><div class="slider" style="height: 20px; top: 0px;"></div></div></div>
    <div class="chat-input">
      <div class="input-group">
        <input type="text" placeholder="Enter a message..." class="form-control">
        <span class="input-group-btn">
        <button class="btn btn-danger" type="button">Send</button>
        </span>      </div>
    </div>
  </div>
</nav>
<!-- /sidebar chats -->   



<div class="demo"><span id="demo-setting"><i class="fa fa-cog txt-color-blueDark"></i></span> <form><legend class="no-padding margin-bottom-10" style="color:#FFFFFF;">Panel</legend>
  <section><label><input type="checkbox" class="checkbox style-0" id="smart-fixed-header" name="subscription"><span>Encabezado Fijo</span></label><label><input type="checkbox" class="checkbox style-0" id="smart-fixed-navigation" name="terms"><span>Fixed Navigation</span></label><label><input type="checkbox" class="checkbox style-0" id="smart-rigth-navigation" name="terms"><span>Navegacion hacia la Derecha</span></label><label><input type="checkbox" class="checkbox style-0" id="smart-boxed-layout" name="terms"><span>Diseño en Caja</span></label><span id="smart-bgimages" style="display: none;"></span></section>
<h6 class="margin-top-10 semi-bold margin-bottom-5">Temas</h6>
<section id="smart-styles">


    <?php
    error_reporting(E_ALL and E_NOTICE);
    session_start();
    $a=$_SESSION['username'];?>

 <?php $idu= $a->id;?>


<a style="background-color:#23262F;" class="btn btn-block btn-xs txt-color-white margin-right-5" id="dark_theme"  href="{{ url('usuariot/' . 'dark_theme/' .$idu) }}"><i id="skin-checked" class="fa fa-check fa-fw"></i> Oscuro</a>
<a style="background:#FFFFFF" class="btn btn-xs btn-block txt-color-black margin-top-5" id="light_theme"  href="{{ url('usuariot/' . 'light_theme/' .$idu) }}" > Claro</a>


<h6 class="margin-top-10 semi-bold margin-bottom-5"> Colores de la Barra</h6>
<a style="background:#F4D03F" class="btn btn-xs btn-block txt-color-black margin-top-5" id="yellow_thm"  href="{{ url('usuariob/' . 'yellow_thm/' .$idu) }}"> Amarillo</a>
<a style="background:#E35154;" class="btn btn-block btn-xs txt-color-white" id="red_thm"  href="{{ url('usuariob/' . 'red_thm/' .$idu) }}"> Rojo</a>
<a style="background:#34B077;" class="btn btn-xs btn-block txt-color-darken margin-top-5" id="green_thm"  href="{{ url('usuariob/' . 'green_thm/' .$idu) }}"> Verde</a>
<a style="background:#56A5DB" class="btn btn-xs btn-block txt-color-white margin-top-5" data-skinlogo="img/logo-pale.png" id="blue_thm"  href="{{ url('usuariob/' . 'blue_thm/' .$idu) }}"> Celeste</a>
<a style="background:#9C6BAD" class="btn btn-xs btn-block txt-color-white margin-top-5" id="magento_thm"  href="{{ url('usuariob/' . 'magento_thm/' .$idu) }}"> Purpura</a>

<h6 class="margin-top-10 semi-bold margin-bottom-5"> Tipo de Letra</h6>
<a style="background:#7F8C8D" class="btn btn-xs btn-block txt-color-black margin-top-5" id="arial_f" href="{{ url('usuariol/' . 'arial_f/' .$idu) }}"> Arial</a>
<a style="background:#7F8C8D" class="btn btn-xs btn-block txt-color-black margin-top-5" id="courier_f" href="{{ url('usuariol/' . 'courier_f/' .$idu) }}"> Courier New</a>
<a style="background:#7F8C8D" class="btn btn-xs btn-block txt-color-black margin-top-5" id="timesNewRoman_f" href="{{ url('usuariol/' . 'timesNewRoman_f/' .$idu) }}"> Times New Roman</a>
</section></form> </div>





<div class="help"><span id="help-setting"><i class="fa fa-question-circle txt-color-blueDark"></i></span> <form><legend class="no-padding margin-bottom-10" style="color:#FFFFFF;">Panel</legend>
<section><h6 class="margin-top-10 semi-bold margin-bottom-5">Clear Localstorage</h6><a id="reset-smart-widget" class="btn btn-xs btn-block btn-primary" href="javascript:void(0);"><i class="fa fa-refresh"></i> Factory Reset</a></section> 
</form> </div>







<script src="{{asset('admin/js/jquery-2.1.0.js')}}"></script>
<script src="{{asset('admin/js/bootstrap.min.js')}}"></script>
@stack('scriptReport')
@stack('scriptasignacion')
<script src="{{asset('admin/js/common-script.js')}}"></script>
<script src="{{asset('admin/js/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('admin/js/jquery.sparkline.js')}}"></script>
<script src="{{asset('admin/js/sparkline-chart.js')}}"></script>
<script src="{{asset('admin/js/graph.js')}}"></script>
<script src="{{asset('admin/js/edit-graph.js')}}"></script>
<script src="{{asset('admin/plugins/kalendar/kalendar.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/plugins/kalendar/edit-kalendar.js')}}" type="text/javascript"></script>

<script src="{{asset('admin/plugins/sparkline/jquery.sparkline.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/plugins/sparkline/jquery.customSelect.min.js')}}" ></script> 
<script src="{{asset('admin/plugins/sparkline/sparkline-chart.js')}}"></script> 
<script src="{{asset('admin/plugins/sparkline/easy-pie-chart.js')}}"></script>
<script src="{{asset('admin/plugins/morris/morris.min.js')}}" type="text/javascript"></script> 
<script src="{{asset('admin/plugins/morris/raphael-min.js')}}" type="text/javascript"></script>  
<script src="{{asset('admin/plugins/morris/morris-script.js')}}"></script> 





<script src="{{asset('admin/plugins/demo-slider/demo-slider.js')}}"></script>
<script src="{{asset('admin/plugins/knob/jquery.knob.min.js')}}"></script> 




<script src="{{asset('admin/js/jPushMenu.js')}}"></script> 
<script src="{{asset('admin/js/side-chats.js')}}"></script>
<script src="{{asset('admin/js/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('admin/plugins/scroll/jquery.nanoscroller.js')}}"></script>
<script src="{{ asset('/vendor/ckeditor/ckeditor.js') }}"></script>


</body>

</html>