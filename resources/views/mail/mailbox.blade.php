<html>
<head>
    <title>Invitation</title>
</head>
<body>
<img src="{{asset('assets\images\brand\logo.png')}}" class="h-8" alt="">
<h2 style="font-family:'Courier New', Courier, monospace; color: red">Examination Site</h2>
<br>
<h4>{!! $sendtext['content'] !!}</h4>
<br>
<h3>Please click this link to take a test!</h3>
<h4><a href="http://exam.drugregimenreview.com/verify?email={{$sendtext['email']}}&token={{$sendtext['token']}}">Click here</a></h4>
</body>
</html>