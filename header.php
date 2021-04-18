<?php
function getTheme(){
  return trim(file_get_contents("selected_theme.txt"));
}

function setTheme($theme)
{
  file_put_contents("selected_theme.txt",$theme);
}

if(isset($_POST['themeSelect'])){
  setTheme($_POST['themeSelect']);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    
    <!-- <link id="themeStylesheet" rel="stylesheet" href="style3.css"> -->
    <link id="themeStylesheet" rel="stylesheet" href="<?= getTheme() ?>.css">
   

    <title>Users</title>
    <style>

.sideContainer{
  width: 300px;
  height: 230px;
   /* background-color: rgba(0, 0, 0, 0);  */

  box-sizing: border-box;
  position: fixed;
  top: 20%;
  right: calc(100% - 30px);
  transition: 0.7s;
  cursor: pointer;
 
  z-index:50;
}
.sideContainer .header{
  margin-top:2px;
  width: 30px;
  overflow: hidden;
  letter-spacing: 10px;
  word-break:break-all;
  font-size: 20px;
  line-height: 18px;
  text-align: center;
  padding:30px 5px 0px 10px;
  background-color: red;
  height: 10%;
  font-weight: bold;
  border: 2px solid white;
  border-left: 0px;
  border-radius:0 5px 5px 0;
  float: right;
  color: red;
  display:flex;
  justify-content:center;
  align-items:center;
}
.sideContainer .header svg{
  color:white;
 
  height:24px;
  width:36px;
 
  margin-top:-28px;
  margin-left:-10px;
  transition:transform 0.3s ease;
}
.sideContainer .header svg:hover{
  transform:rotate(180deg);
}
.sideContainer .content1{
  float: left;
  height: 100%;
  overflow:hidden;
  /* padding: 10px 20px 0px 0px; */
  width: calc(100% - 30px);
  font-size: 15px;
  color: #000000;
  background-color: white;
  font-family:poppins;
  border:2px solid black;

}
.sideContainer:hover{
  right:calc(100% - 300px);
  /* box-shadow: 10px 10px 10px  */
}
/* .sideContainer .content1 ul li{
  color: black;
  font-family:poppins;
} */
.form{
  margin: 12px 16px;

}
.info{
  margin-top:7px;
  text-align:center;
  font-family:poppins;
  margin-bottom:5px;
}
select {
  height: 30px;
  width: 13%;
  border-radius: 5px;
}
.theme{
  height: 30px;
  width: 13%;
  border-radius: 5px;
  outline:none;
  border: 0;
  background:#FF0B00;
  box-shadow:2px 2px 4px;
  color:white;
}
.theme:hover{
  filter:brightness(0.9);
}

</style>
</head>
<body>
     
<div class="sideContainer" id="tips">
    <div class="header">
    <svg xmlns="http://www.w3.org/2000/svg" ><path d="M5 3l3.057-3 11.943 12-11.943 12-3.057-3 9-9z"/></svg>
      
    </div>
    <div class="content1">
    <div class="info">
    <h3>Select your desired theme and press save theme Button</h3>
    </div>
    <hr>
    <form action="" method="post" class="form">
      <select name="themeSelect" id="themeSelect">
        <option value="light" <?= getTheme() === "light" ? "selected" :""  ?> >Light</option>
        <option value="dark" <?= getTheme() === "dark" ? "selected" :""  ?>>Dark</option>
        <option value="color" <?= getTheme() === "color" ? "selected" :""  ?>>Vibrant</option>
      </select>
      <input type="submit" value="Save Theme" class="theme">
    </form>
       
    </div>
</div>

<script>
  const themeSelect = document.getElementById("themeSelect");
  const themeStylesheet = document.getElementById("themeStylesheet");

  // themeSelect.addEventListner('change',function () {
  //   console.dir(this);
   
  // });
  function theme() {
    console.dir(this);
    themeStylesheet.setAttribute("href",this.value+".css");
}

themeSelect.addEventListener("change", theme, false);
</script>


</body>
