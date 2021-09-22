<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" >

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-7">
                <form id="demo-form" method="post" action="<?php echo base_url(); ?>test/validate">
                <div class="form-group">
                        <label for="exampleInputName">Name</label>
                        <input type="text" class="form-control" id="exampleInputName" placeholder="Enter name" name="name" required>
                        
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter email" required>
                        
                    </div>
                    <div class="form-group">
                        <label for="exampleInputDOB">DOB</label>
                        <input type="text" class="form-control datepicker" id="datepicker" name="dob" required>
                    </div>
                    <div class="form-group ">
                        <label for="exampleInputAbout">About</label>
                        <textarea class="form-control" name="about" id="exampleInputAbout" cols="10" rows="4" required></textarea>
                    </div>
                    <div class="form-group">
                    <div class="g-recaptcha" data-sitekey="6LeeWYQcAAAAANbuLpDRRmnMxmwp27lYmberjmjg"></div>
      <br/>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

                <label id="minutes">00</label>:<label id="seconds">00</label>
            </div>
        </div>
    </div>

</body>
</html>


<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.js"></script>

<script>

$(function(){
    $('#datepicker').datepicker({
        format: 'dd/mm/yyyy',
        endDate: '+0d',
        autoclose: true
    });
});
</script>




<script>



var minutesLabel = document.getElementById("minutes");
var secondsLabel = document.getElementById("seconds");
var totalSeconds = 00;
setInterval(setTime, 1000);

function setTime() {
  ++totalSeconds;
  secondsLabel.innerHTML = pad(totalSeconds % 60);
  var time = parseInt(totalSeconds / 60);
  //.log(time);
  if( totalSeconds == 180){
	
  location.reload();
  } else {
	minutesLabel.innerHTML = pad(time);
  }
  
}

function pad(val) {
  var valString = val + "";
  if (valString.length < 2) {
    return "0" + valString;
  } else {
    return valString;
  }
}


</script>

