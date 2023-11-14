<style>
 body {
  
  font: 16px/22px "Open Sans", sans-serif;
}
.container {
  margin: 0 auto;
  max-width: 980px;
}
.panel1 {
  box-sizing: border-box;
  position: relative;
  display: inline-block;
  width: 280px;
  height: 160px;
  margin: 10px;
  font-size: 32px;
  font-weight: 600;
  color: #fff;
  overflow: hidden;
  border-radius: 8px;
}
.panel1 a {
  position: relative;
  display: block;
  padding: 12px 25px 25px 25px;
  
  text-decoration: none;
  z-index: 2;
}
.panel1 a span {
  display: block;
  font-size: 96px;
  font-weight: 700;
  line-height: 96px;
}
.panel1:after {
  position: absolute;
  font-family: FontAwesome;
  color: #000000;
  z-index: 1;
  transition: all 0.5s;
  line-height: normal;
}
.panel1.post {
  background-color: #010039;
}
.panel1.post:after {
  
  font-size: 200px;
  color: #a5980d;
  top: -27px;
  right: 56px;

}
.panel1.post:hover:after {
  top: 8px;
}
.panel1.comment {
  background-color:  #010039;
}
.panel1.comment:after {
  
  font-size: 180px;
  color: #036bac;
  top: -27px;
  right: 1px;
}
.panel1.comment:hover:after {
  top: -5px;
}
  .panel1:hover:after {
    transition: all 0.5s;
  }

</style>



<link rel="stylesheet" href="dashboard.css">

<div class="container">

<div class="panel1 post">
 <a  style="color: #fff;" href="#home" data-toggle="tab">List of Subjects</a>
</div>


<div class="panel1 comment">
  <a style=" background-color:# ;color: #fff;" href="#actsmodsquis" data-toggle="tab">Learning Materials</a>
</div>

</div>

<div class="tab-content">
    <div class="tab-pane active" id="home">
              <?php require_once  ("subs.php"); ?>
              </div>
               
           
            <div class="tab-pane" id="actsmodsquis">
         
              <?php require_once  ("actmodqui.php"); ?>
          
       
            </div>
        
  </div><!--/tab-content-->