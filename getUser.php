<?php
  include("config.php");
  session_start();
  
  $username = $_GET['q'];
  

  $sql = "SELECT id, role, username, password, permTour, permLocation, permUser FROM users WHERE username = ?";

  $stmt = $db->prepare($sql);
  $stmt->bind_param("s",$username);
  $stmt->execute();
  $stmt->store_result();
  $stmt->bind_result($id, $role, $username,$password, $premTour, $premLocation, $premUser);
  $stmt->fetch();
  $stmt->close();

echo "<form method=post action=editUser.php onsubmit='return checkPassword(this)' class=form-contact contact_form >";
echo "   <div class=row>";
echo "       <div class=col-12>";
echo "           <div class=form-group>";
echo "               <label for=id>User Id</label>";
echo "               <input class=form-control valid name=id id=id type=text  readonly value=$id>";
echo "           </div>";
echo "       </div>";
echo "       <div class=col-12>";
echo "          <div class=form-group>";
if($role == 'admin'){
  echo "              <label for=role>Admin</label>";
  echo "              <input checked=true type=radio id=admin name=role value=admin>";
  echo "              <label for=role>Assistant</label>";
  echo "              <input type=radio id=assistant name=role value=assistant>";
}else{
  echo "              <label for=role>Admin</label>";
  echo "              <input type=radio id=admin name=role value=admin>";
  echo "              <label for=role>Assistant</label>";
  echo "              <input checked=true type=radio id=assistant name=role value=assistant>";
}
echo "          </div>";
echo "       </div>";
echo "       <div class=col-12>";
echo "           <div class=form-group>";
echo "               <label for=username>Username</label>";
echo "               <input  required pattern=[A-Za-z0-9]{5,20} title='Please username between 5 and 20 characters.' class=form-control valid name=username id=username type=text value=$username>";
echo "           </div>";
echo "       </div>";
echo "       <div class=col-12>";
echo "           <div class=form-group>";
if($premTour == 1){
  echo "               <label for=permTour>Tour Permission Granted</label>";
  echo "               <input checked=true type=checkbox id=premTour name=permTour value=1>";
}else{
  echo "               <label for=permTour>Tour Permission Granted</label>";
  echo "               <input type=checkbox id=premTour name=permTour value=1>";
}
echo "           </div>";
echo "       </div>";
echo "       <div class=col-12>";
echo "           <div class=form-group>";
if($premLocation == 1){
  echo "               <label for=permLocation>Location Permission Granted</label>";
  echo "               <input checked=true type=checkbox id=premLocation name=permLocation value=1>";
}else{
  echo "               <label for=permLocation>Location Permission Granted</label>";
  echo "               <input type=checkbox id=premLocation name=permLocation value=1>";
}
echo "           </div>";
echo "       </div>";
echo "       <div class=col-12>";
echo "          <div class=form-group>";
if($premUser == 1){
  echo "               <label for=permUser>User Permission Granted</label>";
  echo "               <input checked=true type=checkbox id=premUser name=permUser value=1>";
}else{
  echo "               <label for=permUser>User Permission Granted</label>";
  echo "               <input type=checkbox id=premUser name=permUser value=1>";
}
echo "           </div>";
echo "      </div>";
echo "      <div class=col-12>";
echo "        <div class=form-group>";
echo "            <label for=password1>Password</label>";
echo "            <input required pattern=[A-Za-z0-9]{5,20} title='Please enter password between 5 to 20 characters' value=$password class=form-control valid name=password1 id=password1 type=password onfocus=this.placeholder = '' onblur=this.placeholder = 'Enter password' placeholder=Enter password>";
echo "        </div>";
echo "      </div>";
echo "      <div class=col-12>";
echo "        <div class=form-group>";
echo "          <label for=password2>Confirm Password</label>";
echo "          <input required pattern=[A-Za-z0-9]{5,20} title='Please re-enter password' value=$password class=form-control valid name=password2 id=password2 type=password onfocus=this.placeholder = '' onblur=this.placeholder = 'Re-enter password' placeholder=Re-enter password>";
echo "        </div>";
echo "      </div>";
echo "      <div class=col-12>";
echo "        <div class=form-group mt-3>";
echo "          <input type=submit class=button button-contactForm boxed-btn value=Edit>";
echo "        </div>";
echo "      </div>";
echo " </div>";
echo"</form>";

?>