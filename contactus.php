<?php error_reporting(0) ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .contact{
            position:absolute;
            top:150px;
            left:300px;
            background-color:#045174;
            padding:10px;
            height:500px;
            width:900px;
            box-shadow:10px 10px 20px black;
        }
        .feed{
            margin-left:450px;
            margin-top:-55%;
        }
        .cont{
            color:white;
        }
        label{
            color:white;
            font-weight:bold;
        }
        .fname{
            margin-left:10px;
            height:20px;
            width:300px;
        }
        .lname{
            margin-left:12px;
            margin-top:10px;
            height:20px;
            width:300px;
        }
        .email{
            margin-left:45px;
            margin-top:10px;
            height:20px;
            width:300px;
        }
        .subject{
            margin-left:35px;
            margin-top:10px;
            width:300px;
        }
        .button{
            width:400px;
            font-size:15px;
            font-weight:bold;
            height:30px;
            margin-top:10px;
        }
    </style>
</head>
<body>
    <?php include('header.php'); ?>
<div class="contact" id="contact-me">
    <div class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3888.9520361378845!2d74.89610237479287!3d12.910804316208846!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba359dfac132663%3A0xa7bf228838232d32!2sSt%20Joseph%20Engineering%20College!5e0!3m2!1sen!2sin!4v1716262644748!5m2!1sen!2sin" width="400" height="500" style="border:0;border-radius:10px" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <div class="feed  ">
      <h1 class="cont">Contact Us</h1>
      <form action="https://formsubmit.co/gaurav654413@gmail.com" method="POST" />
        <label for="fname">First Name</label>
        <input type="text" class="fname" name="firstname" placeholder="Your name.."><br>
    
        <label for="lname">Last Name</label>
        <input type="text" class="lname" name="lastname" placeholder="Your last name.."><br>
        
        <label for="email">Email</label>
        <input type="text" class="email" class="email" name="email" placeholder="Your email .."><br>

        <label for="subject">Subject</label>
        <textarea id="subject" name="subject" class="subject" placeholder="Write something.." style="height:200px"></textarea><br>

        <input type="hidden" name="_url" value="https://portfolio/portfolio.html">

        <input type="submit" class="button" value="Submit">
      </form>
    </div>
  </div>
</body>
</html>