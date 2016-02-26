<?php
$codigo = $_GET['code'];
if(isset($_GET['error_description'])){
  echo $_GET['error_description'];
}
else{
?>

<form name=" " id="form1" action="http://drillster.com/api/2/token" method="POST">
  <input name="code" type="hidden" value="<?php echo "$codigo" ?>">
  <input name="client_id" type="hidden" value="ff12967fdf9b47c5b0eddb1f6465eedf">
  <input name="client_secret" type="hidden" value="627914e887ae4b3cab766928f7317463">
  <input name="grant_type" type="hidden" value="authorization_code">
</form>
  <script type="text/javascript">
  document.getElementById("form1").submit(); // Here formid is the id of your form
  </script>
<?php
}
?>
