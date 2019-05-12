          <!DOCTYPE html>
          <html>
          <head>
            <title>Page Title</title>
            <style>
            @import url(http://fonts.googleapis.com/css?family=Bree+Serif);
            body, h1, h2, h3, h4, h5, h6{
              font-family: "Courier New", Courier;
            }
            .text-center {
              text-align: center;
            }
          </style>

          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">


          </head>
          <body>
          	<div class="container">
          		<div class="row panel panel-default">
                <div class="col-xs-4">
                  <h1>
            
                      <img src="{{ asset('logo.png')}}" style="height: 25%; width: 25%; margin-left: 100px;">
                    
                    </a>
                  </h1>
                </div>
                <div class="col-xs-4 text-center" style="margin:0 auto;">
                  <h2>Bangladesh Cadet Academy </h2>
                </div>
                <div class="col-xs-4 text-right ">
                <div class="center">
                  <button onclick="myFunction()">Print </button>

                  <script>
                    function myFunction() {
                      window.print();
                    }
                  </script>
                </div>
              </div>
              <div class="row">
                
               <div class="col-xs-12  text-center"> 
                <div style="margin-top: -20px">
                  <div class="panel-body">
                    <h4> <a href="#">Half Yearly Model Test- 2019 </a></h4>
                    <h3>  <b>Admit Card--Class{{$student->course->name}}</b>
                    
                  </h3>
                 </div>
             </div> 
             </div>
            </div> 
         <!-- / end client details section -->
          <div class="row">
            <div style="margin-left:100px;">
           <div class="col-xs-6">
           
                <h4>  Student ID:<a href="#"> {{$student->student_id}}</a></h4>
                <h4>Student Name:<a href="#"> {{$student->first_name}} {{$student->last_name}}</a></h4>
                <h4>Phone Number:<a href="#"> {{$student->mobile_number}} </a></h4>
            </div>
          
          <div class="col-xs-6" >
             
                <h4>        DOB :<a href="#"> {{$student->date_of_birth}}</a></h4>
                <h4>Institution :<a href="#"> {{$student->organization}}</a></h4>
                <h4>Exam Center :<a href="#"> BCA, Framget,Dhaka-1215 </a></h4>
             
          </div>
          </div>
           <!-- / end client details section -->
          <div class ="row">
           <div class="col-xs-6 col-xs-offset-3  text-center">
                <h4>Exam Time <a href="#"></a></h4><p>
                  Please colect your exam time in BCA.
                </p>
            </div>
          </div>
          </div>
        </div>
          <div class ="row">
           <div class="col-xs-6">
            <div style="margin-left: 50px;">
              
               <h4>.................................</h4>
               <h4>
                Student signature
              </h4>
            </div>
          </div>
          <div class="col-xs-6">
            <div style="float: right; margin-right: 50px">
               <h4>............................................</h4>
               <h4> Authorized signature
              </h4>
            </div>
          </div>
          </div>
        </div>
         
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
          </body>
          </html>