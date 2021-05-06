 <?php 
	session_start();
	if($_SESSION['status']!="login"){
		header("location:../../index.php?pesan=belum_login");
	}
?> 
<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8">
  <title>Admin Himapala Unesa</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="../../../img/favicon.ico" rel="shortcut icon">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Roboto:100,300,400,500,700|Philosopher:400,400i,700,700i" rel="stylesheet">
   <!-- Bootstrap css -->
  <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
  <link href="../../../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="../../../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="../../../lib/owlcarousel/assets/owl.theme.default.min.css" rel="stylesheet">
  <link href="../../../lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="../../../lib/animate/animate.min.css" rel="stylesheet">
  <link href="../../../lib/modal-video/css/modal-video.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="../../../css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
</head>
 <body>
  <header id="header" class="header header-hide">
    <div class="container">
      <div id="logo" class="pull-left">
        <h1><a href="../index.php#body"><img src="../../../img/logo himapal.png" width="25" height="35">Himapala Unesa</a></h1>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#">Update Agenda</a></li>
		  <li><a href="../update_posting/index.php">Update Posting</a></li>
		  <li><a href="../update_pendanaan/index.php">Update Pendanaan</a></li>
		  <li><a href="../update_podcast/index.php">Update Podcast</a></li>
		  <li><a href="../data/index.php">Database</a></li>
		  <li><a href="../logout.php">logout</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->  
  
 
<section id="hero" class="padd-section text-center wowfadInUp">
  <div class="hero-container">
  	<div class="section-title text-center">
  	<h2 align="center">Agenda Himapala</h2>
  	</div>
  </div>
  <div id="calendar" class="container">
   <script>
   
  $(document).ready(function() {
   var calendar = $('#calendar').fullCalendar({
    editable:true,
    header:{
     left:'prev,next today',
     center:'title',
     right:'month,agendaWeek,agendaDay'
    },
    events: 'load.php',
    selectable:true,
    selectHelper:true,
    select: function(start, end, allDay)
    {
     var title = prompt("Enter Event Title");
     if(title)
     {
      var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
      var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
      $.ajax({
       url:"insert.php",
       type:"POST",
       data:{title:title, start:start, end:end},
       success:function()
       {
        calendar.fullCalendar('refetchEvents');
        alert("Added Successfully");
       }
      })
     }
    },
    editable:true,
    eventResize:function(event)
    {
     var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
     var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
     var title = event.title;
     var id = event.id;
     $.ajax({
      url:"update.php",
      type:"POST",
      data:{title:title, start:start, end:end, id:id},
      success:function(){
       calendar.fullCalendar('refetchEvents');
       alert('Event Update');
      }
     })
    },

    eventDrop:function(event)
    {
     var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
     var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
     var title = event.title;
     var id = event.id;
     $.ajax({
      url:"update.php",
      type:"POST",
      data:{title:title, start:start, end:end, id:id},
      success:function()
      {
       calendar.fullCalendar('refetchEvents');
       alert("Event Updated");
      }
     });
    },

    eventClick:function(event)
    {
     if(confirm("Are you sure you want to remove it?"))
     {
      var id = event.id;
      $.ajax({
       url:"delete.php",
       type:"POST",
       data:{id:id},
       success:function()
       {
        calendar.fullCalendar('refetchEvents');
        alert("Event Removed");
       }
      })
     }
    },

   });
  });
   
  </script>
   </div>
</section>
<div class="container">
  <div class="buttonart">
    <a href="../update_posting/index.php" class="buttonart">Post Artikel</a>
	<a href="../update_pendanaan/index.php" class="buttonart">Post Pendanaan</a>
	<a href="../update_podcast/index.php" class="buttonart">Update Podcast</a>
	<a href="../data/index.php" class="buttonart">Database</a>
	<a href="../index.php" class="buttonart">Home</a>
	<a href="../logout.php" class="buttonart">Logout</a>
   </div>
   </div>
<script src="../../../lib/jquery/jquery-migrate.min.js"></script>
  <script src="../../../lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../../lib/superfish/hoverIntent.js"></script>
  <script src="../../../lib/superfish/superfish.min.js"></script>
  <script src="../../../lib/easing/easing.min.js"></script>
  <script src="../../../lib/modal-video/js/modal-video.js"></script>
  <script src="../../../lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="../../../lib/wow/wow.min.js"></script>
  <script src="../../../contactform/contactform.js"></script>
  <script src="../../../js/main.js"></script>
  </body>
</html>