<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="content-type" content="text/html; charset=windows-1256">
<title>Simple javascript password generator by Amir WS</title>
<meta name="keywords" content="Simple javascript password generator">
<meta name="description" content="Simple javascript password generator to use with forms">
<link media="screen" type="text/css" rel="stylesheet" href="style.css">
</head>

<body>
<?php
if(!empty($_POST['password']))
{
	echo '<div class="large" id="msgarea">';
	echo '<div class="msg">'.$_POST['password'].'</div>';
	echo '</div>';
}
?>

<script type="text/javascript">
			//you don't have to change any thing here
			function genpwd(pswdlen){ //pswdlen : passwordlenth, higher is stronger
				var carac = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z',0,1,2,3,4,5,6,7,8,9,1,2,3,4,5,6,7,8,9,'/','*','@','_','-','%'];
				var caraclen = carac.length;
				var minindex = 0;
				var maxindex = carac.length - 1;
				var pswd = '';
				for(i=1;i<=pswdlen;i++){
					var ind = Math.floor(Math.random()*caraclen);
					pswd+=carac[ind];
					console.log(ind);
				}
				document.client_access.password.value = pswd;
				if(document.client_access.password.value != ''){
					document.getElementById('options').innerHTML = '<img src="images/key.png" alt="key" onclick="genpwd(12)" /><img src="images/checkok.png" alt="save password" onclick="savepswd()" />';
				}else{
					document.getElementById('options').innerHTML = '<img src="images/key.png" alt="key" onclick="genpwd(12)" />';
				}
			}
			
			function savepswd(){
				document.getElementById('options').innerHTML = '';
				document.client_access.password.select();
				document.execCommand('copy');
				document.getElementById('msgarea').innerHTML = '<div id="msg">The password '+document.client_access.password.value+' was selected and copied to your clipboard</div>';
				document.client_access.password.type = 'password';
				
			}
</script>
<h1>simple javascript password generator by Amir WS</h1>
This is a simple javascript password generator to fill form<br /><br />
Click on <img src="images/key.png" alt="key" /> to generate rando password, when you choose the password click on <img src="images/checkok.png" alt="save password" /> to validate and copy it to clipboard<br /><br />
<div class="large" id="msgarea"></div>

<div class="large">
<form name="client_access" action="" method="post" enctype="multipart/form-data">
<table>
	<tr><td>Mot de passe: </td><td></td></tr>
	<!--simply add onclick="genpwd(12)" and precise the lenth of the password-->
	<tr><td><input type="text" name="password" required="required" /></td><td id="options"><img src="images/key.png" alt="key" onclick="genpwd(12)" /></td></tr>
	<tr><td colspan="2"><input type="submit" value="valider" /></td></tr>
</table>				
</form>
</div>
</body>
</html>