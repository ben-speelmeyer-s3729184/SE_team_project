<?php
  include("config.php");
  session_start();
  
  $locationId = $_GET['q'];
  $int_cast = (int)$locationId;

  $sql = "SELECT locationId, locationName, locationX, locationY, locationDescription, locationMinTime FROM locations WHERE locationId = ?";

  $stmt = $db->prepare($sql);
  $stmt->bind_param("i",$int_cast);
  $stmt->execute();
  $stmt->store_result();
  $stmt->bind_result($locationId, $locationName, $locationX, $locationY, $locationDescription, $locationMinTime);
  $stmt->fetch();
  $stmt->close();

echo "<form method=post action=editlocal.php class=form-contact contact_form >";
echo "   <div class=row>";
echo "       <div class=col-12>";
echo "           <div class=form-group>";
echo "               <input class=form-control valid name=locationId id=locationId type=text  readonly value=$locationId>";
echo "           </div>";
echo "       </div>";
echo "       <div class=col-12>";
echo "           <div class=form-group>";
echo "               <input required pattern=[A-Za-z]{1,20} title='Please enter only letters and a maximum of 20 charaters.' class=form-control valid name=locationName id=locationName type=text  value=$locationName>";
echo "          </div>";
echo "       </div>";
echo "       <div class=col-12>";
echo "           <div class=form-group>";
echo "               <input  required pattern=[A-Z]{1} title='Please enter one capital letter.' class=form-control valid name=coordinateX id=coordinateX type=text value=$locationX>";
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