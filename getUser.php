<?php
  include("config.php");
  session_start();
  
  $username = $_GET['q'];
  

  $sql = "SELECT id, role, username, premTour, premLocation, premUser FROM users WHERE username = ?";

  $stmt = $db->prepare($sql);
  $stmt->bind_param("s",$username);
  $stmt->execute();
  $stmt->store_result();
  $stmt->bind_result($id, $role, $username, $premTour, $premLocation, $premUser);
  $stmt->fetch();
  $stmt->close();

echo "<form method=post action=editlocal.php class=form-contact contact_form >";
echo "   <div class=row>";
echo "       <div class=col-12>";
echo "           <div class=form-group>";
echo "               <input class=form-control valid name=id id=id type=text  readonly value=$id>";
echo "           </div>";
echo "       </div>";
echo "       <div class=col-12>";
echo "          <div class=form-group>";
if($role == 'admin'){
    echo "              <label for=role>Admin</label>";
    echo "              <input checked=true type=radio id=admin name=role";
    echo "              <label for=role>Assistant</label>";
    echo "              <input type=radio id=assistant name=role";
}else{
    echo "              <label for=role>Admin</label>";
    echo "              <input type=radio id=admin name=role";
    echo "              <label for=role>Assistant</label>";
    echo "              <input checked=true type=radio id=assistant name=role";
}
echo "          </div>";
echo "       </div>";
echo "       <div class=col-12>";
echo "           <div class=form-group>";
echo "               <input  required pattern=[A-Za-z0-9]{5,20} title='Please username between 5 and 20 characters.' class=form-control valid name=username id=username type=text value=$username>";
echo "           </div>";
echo "       </div>";
echo "       <div class=col-12>";
echo "           <div class=form-group>";
echo "               <input required pattern=[0-9]{1,2} title='Please enter one or two numbers' class=form-control valid name=coordinateY id=coordinateY type=text value=$locationY>";
echo "           </div>";
echo "       </div>";
echo "       <div class=col-12>";
echo "           <div class=form-group>";
echo "               <textarea class=form-control w-100 name=description id=description cols=30 rows=9 >$locationDescription</textarea>";
echo "           </div>";
echo "       </div>";
echo "       <div class=col-12>";
echo "          <div class=form-group>";
echo "              <input required pattern=[0-9]{1,4} title='Please enter the minimum time in seconds, maximum 4 digits' class=form-control name=minTime id=minTime type=text value=$locationMinTime>";
echo "           </div>";
echo "      </div>";
echo "   </div>";
echo "   <div class=form-group mt-3>";
echo "       <input type=submit class=button button-contactForm boxed-btn value=Edit>";
echo "  </div>";
echo"</form>";

?>