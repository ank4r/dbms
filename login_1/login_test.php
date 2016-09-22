<?

?>


<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <meta name="google" value="notranslate">


    <title>Log In | Sign Up &amp; Sign Up</title>
    
    
    
    
<style>
    body {
    font-size: 12px;
    max-width: 10000px;
    background: #F5F5F5;
    min-width: 960px;
    width: 100%;
    font-family: Roboto;
    text-rendering: optimizeLegibility;
 /* 2 */
    -webkit-font-smoothing: antialiased;
 /* 3 */
    -moz-osx-font-smoothing: grayscale;
 /* 4 */
}

p {
    font-feature-settings: "kern" 1;
 /* 5 */
    font-kerning: normal;
 /* 5 */
    hyphens: auto;
 /* 6 */
}

.fullwidth,
body#bp-default #wp-admin-bar .padder {
    width: 100% !important;
    max-width: 10000px !important;
    min-width: 960px;
    margin: 0 auto;
    clear: both;
    float: left;
}

h2 {
    font-size: 30px;
    font-weight: 300;
    color: #03A9F4;
}

.form-group {
    height: 55px;
    display: -webkit-box;
    display: -moz-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    margin-top: -10px;
}

.control-label {
    font-size: 16px;
    font-weight: 400;
    opacity: 0.4;
    pointer-events: none;
    position: absolute;
    -webkit-transform: translate3d(0, 22px, 0) scale(1);
    -moz-transform: translate3d(0, 22px, 0) scale(1);
    transform: translate3d(0, 22px, 0) scale(1);
    -webkit-transform-origin: left top;
    -moz-transform-origin: left top;
    transform-origin: left top;
    -webkit-transition: 240ms;
    -moz-transition: 240ms;
    transition: 240ms;
}

.form-group.focused .control-label {
    opacity: 1;
    -webkit-transform: scale(0.75);
    -moz-transform: scale(0.75);
    transform: scale(0.75);
    color: #03A9F4 !important;
}

.form-control {
    align-self: flex-end;
}

.form-control::-webkit-input-placeholder {
    color: transparent;
    -webkit-transition: 240ms;
    -moz-transition: 240ms;
    transition: 240ms;
}

.form-control:focus::-webkit-input-placeholder {
    -webkit-transition: none
    -moz-transition: none;
    transition: none;
}

.form-group.focused .form-control::-webkit-input-placeholder {
    color: #bbb;
}

#textbox {
    width: 50%;
    max-height: 100%;
    height: 100%;
    overflow: hidden;
    margin-left: 50%;
    position: absolute;
    box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
}

.toplam {
    width: 200%;
    height: 100%;
    position: relative;
    left: 0;
    left: -100%;
}

.left {
    width: 50%;
    height: 100%;
    background: #2C3034;
    left: 0;
    position: absolute;
}

.right {
    width: 50%;
    height: 100%;
    background: #F9F9F9;
    right: 0;
    position: absolute;
}

#ic {
    width: 250px;
    margin: 0 auto;
    top: 50%;
    margin-top: -162px;
    position: absolute;
    left: 50%;
    margin-left: -125px;
}

.left #ic {
    margin-top: -232px;
}

#ic p {
    font-size: 15px;
    font-weight: 400;
    line-height: 26px;
    color: #757575;
    margin-bottom: 30px;
}

form#girisyap input {
    border-bottom: 1px solid #cdcdcd;
    color: #959595;
    font-size: 14px;
    width: 100%;
    resize: none;
    max-height: 20px;
    outline: 0;
    border-left: 0;
    border-right: 0;
    padding: 8px 0;
    margin-top: 20px !important;
    background: none;
    border-top: 0;
    overflow: hidden;
    transition: border .2s;
    -webkit-transition: border .2s;
}

#girisyap .form-group {
    width: 100%;
    float: left;
    margin-bottom: 20px;
}

#girisyap h2 {
    font-size: 28px;
    font-weight: 400;
    color: #0BAFBF;
    line-height: 35px;
}

#girisyap .soninpt {
    margin-bottom: 30px;
}

.left form#girisyap input {
    border-bottom: 1px solid #45494C;
}

.left .control-label {
    color: #959595;
}

.left .yarim {
    width: 46% !important;
    float: left;
    margin-right: 8%;
}

.left .sn {
    margin-right: 0;
}

form#girisyap .girisbtn {
    width: auto;
    float: right;
    background: #03A9F4;
    padding: 10px 16px;
    cursor: pointer;
    font-size: 14px;
    font-weight: 600;
    color: #fff;
    margin: 0 !important;
    line-height: 16px;
    font-family: Roboto;
    text-transform: uppercase;
    max-height: 36px;
    height: 36px;
    letter-spacing: 0.5px;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;
    -webkit-box-shadow: 0 2px 6px rgba(0,0,0,0.1), 0 3px 6px rgba(0,0,0,0.1);
    -moz-box-shadow: 0 2px 6px rgba(0,0,0,0.1), 0 3px 6px rgba(0,0,0,0.1);
    box-shadow: 0 2px 6px rgba(0,0,0,0.1), 0 3px 6px rgba(0,0,0,0.1);
    -webkit-transition-duration: 0.25s;
    transition-duration: 0.25s;
    -webkit-transition-property: background-color,-webkit-box-shadow;
    transition-property: background-color,box-shadow;
    border: 0;
}

form#girisyap .girisbtn:hover {
    background: #0288D1;
    -webkit-box-shadow: 0 4px 7px rgba(0,0,0,0.1), 0 3px 6px rgba(0,0,0,0.1);
    -moz-box-shadow: 0 4px 7px rgba(0,0,0,0.1), 0 3px 6px rgba(0,0,0,0.1);
    box-shadow: 0 4px 7px rgba(0,0,0,0.1), 0 3px 6px rgba(0,0,0,0.1);
}

#moveleft, #moveright {
    width: auto;
    float: right;
    background: none;
    padding: 10px 16px;
    font-family: Roboto;
    font-size: 14px;
    color: #03A9F4;
    font-weight: 600;
    margin: 0 10px !important;
    line-height: 16px;
    text-transform: uppercase;
    cursor: pointer;
    max-height: 36px;
    height: 36px;
    letter-spacing: 0.5px;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;
    -webkit-transition-duration: 0.25s;
    transition-duration: 0.25s;
    -webkit-transition-property: background-color;
    transition-property: background-color;
    border: 0;
    outline: 0;
}

#moveleft:hover {
    background: #eee;
}

#moveright:hover {
    background: #363A3D;
}

#fback {
    width: 100%;
    height: 100%;
    position: absolute;
    z-index: -9999;
}

.girisback {
    position: absolute;
    right: 0;
    width: 50%;
    height: 100%;
    background: #03A9F4 url(http://ertekinn.com/loginsignup/signup.jpg);
    background-size: cover;
    background-position: 50% 50%;
}

.kayitback {
    position: absolute;
    left: 0;
    width: 50%;
    height: 100%;
    background: #03A9F4 url(http://ertekinn.com/loginsignup/login.png);
    background-size: cover;
    background-position: 50% 50%;
}

</style>

    
    
    
  </head>

  <body>

    <link href='http://fonts.googleapis.com/css?family=Roboto:900,900italic,500,400italic,100,700italic,300,700,500italic,100italic,300italic,400' rel='stylesheet' type='text/css'>

<div id="fback"><div class="girisback"></div><div class="kayitback"></div></div>

<div id="textbox">
  <div class="toplam">

    <div class="left">
      <div id="ic">
        <h2>Sign Up</h2>
        <form id="girisyap" name="signup_form" id="signup_form" method="post" enctype="multipart/form-data" onsubmit="return false;">

          <div class="yarim form-group">
            <label class="control-label" for="inputNormal">Userid</label>
            <input type="text" name="signup_username" id="signup_username" class="bp-suggestions form-control" cols="50" rows="10" ></input>
          </div>
        <div class="yarim sn form-group">
          <label class="control-label" for="inputNormal">Full Name</label>
          <input type="text" name="field_1" id="field_1" value="" class="bp-suggestions form-control" cols="50" rows="10"></input>
      </div>
      <div class="form-group">
        <label class="control-label" for="inputNormal">Email</label>
        <input type="text" name="signup_email" id="signup_email" class="bp-suggestions form-control" cols="50" rows="10"></input>
    </div>
    <div class="form-group">
      <label class="control-label" for="inputNormal">Password</label>
      <input type="password" name="signup_password" id="signup_password" value="" class="bp-suggestions form-control" cols="50" rows="10" ></input>
  </div>
  <div class="form-group soninpt">
    <label class="control-label" for="inputNormal">About</label>
    <input type="text" name="field_2" id="field_2" class="bp-suggestions form-control" cols="50" rows="10"></input>
</div>
<input type="submit" name="signup_submit" id="signup_submit" value="Sign Up" class="girisbtn"  />
</form>

<button id="moveright">Login</button>
</div>
</div>

<div class="right">
  <div id="ic">
    <h2>Login</h2>
    <form name="login-form" id="girisyap" id="sidebar-user-login" method="post" onsubmit="return false;">

      <div class="form-group">
        <label class="control-label" for="inputNormal">Userid</label>
        <input type="text" name="log" class="bp-suggestions form-control" cols="50" rows="10" ></input>
      </div>
    <div class="form-group soninpt">
      <label class="control-label" for="inputNormal">Password</label>
      <input type="password" name="pwd" class="bp-suggestions form-control" cols="50" rows="10"></input>
  </div>
  <div>
  <select name = "role">
    <option value = "Admin">
       Admin
    </option>
 
    <option value = "Faculty">
       Faculty
    </option>

    <option value = "Student">
       Student
    </option>
</select>
</div>

  <input type="submit" value="Login" class="girisbtn" tabindex="100" />
  </form>
<button id="moveleft">Sign Up</button>
</div>
</div>

</div>
</div>
    <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script>
      $('.form-control').on('focus blur', function (e) {
    $(this).parents('.form-group').toggleClass('focused', (e.type === 'focus' || this.value.length > 0));
}).trigger('blur');

$('#moveleft').click(function() {
  $('#textbox').animate({
    'marginLeft': "0" //moves left
  });

  $('.toplam').animate({
    'marginLeft': "100%" //moves right
  });
});

$('#moveright').click(function() {
  $('#textbox').animate({
    'marginLeft': "50%" //moves right
  });

  $('.toplam').animate({
    'marginLeft': "0" //moves right
  });
});
      //@ sourceURL=pen.js
    </script>

    
    
    
  </body>
</html>
 

