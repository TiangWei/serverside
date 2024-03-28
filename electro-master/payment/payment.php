<style>
    @import url(https://fonts.googleapis.com/css?family=Lato:400,300,700);
    body,html {
    height:100%;
    margin:0;
    font-family:lato;
    }
    .image-container {
  display: flex;
  justify-content: center; /* Center horizontally */
  align-items: center; /* Center vertically */
  height: 100%; /* Ensure the container takes up the full height */
}

.right-image {
  width: 100%;
  height: auto;
  max-width: 80%;
  display: block;
}


    h2 {
    margin-bottom:0px;
    margin-top:25px;
    text-align:center;
    font-weight:200;
    font-size:19px;
    font-size:1.2rem;
    
    }
    .container {
    height:100%;
    -webkit-box-pack:center;
    -webkit-justify-content:center;
        -ms-flex-pack:center;
            justify-content:center;
    -webkit-box-align:center;
    -webkit-align-items:center;
        -ms-flex-align:center;
            align-items:center;
    display:-webkit-box;
    display:-webkit-flex;
    display:-ms-flexbox;
    display:flex;
    background:-webkit-linear-gradient(#c5e5e5, #ccddf9);
    background:linear-gradient(#c9e5e9,#ccddf9);
    }
    .dropdown-select.visible {
    display:block;
    }
    .dropdown {
    position:relative;
    }
    ul {
    margin:0;
    padding:0;
    }
    ul li {
    list-style:none;
    padding-left:10px;
    cursor:pointer;
    }
    ul li:hover {
    background:rgba(255,255,255,0.1);
    }
    .dropdown-select {
    position:absolute;
    background:#77aaee;
    text-align:left;
    box-shadow:0px 3px 5px 0px rgba(0,0,0,0.1);
    border-bottom-right-radius:5px;
    border-bottom-left-radius:5px;
    width:90%;
    left:2px;
    line-height:2em;
    margin-top:2px;
    box-sizing:border-box;
    }
    .thin {
    font-weight:400;
    }
    .small {
    font-size:12px;
    font-size:.8rem;
    }
    .half-input-table {
    border-collapse:collapse;
    width:100%;
    }
    .half-input-table td:first-of-type {
    border-right:10px solid #4488dd;
    width:50%;
    }
    .window {
    height:540px;
    width:800px;
    background:#fff;
    display:-webkit-box;
    display:-webkit-flex;
    display:-ms-flexbox;
    display:flex;
    box-shadow: 0px 15px 50px 10px rgba(0, 0, 0, 0.2);
    border-radius:30px;
    z-index:10;
    }
    .order-info {
    height:100%;
    width:50%;
    padding-left:25px;
    padding-right:25px;
    box-sizing:border-box;
    display:-webkit-box;
    display:-webkit-flex;
    display:-ms-flexbox;
    display:flex;
    -webkit-box-pack:center;
    -webkit-justify-content:center;
        -ms-flex-pack:center;
            justify-content:center;
    position:relative;
    }
    .price {
    bottom:0px;
    position:absolute;
    right:0px;
    color:#4488dd;
    }
    .order-table td:first-of-type {
    width:25%;
    }
    .order-table {
        position:relative;
    }
    .line {
    height:1px;
    width:100%;
    margin-top:10px;
    margin-bottom:10px;
    background:#ddd;
    }
    .order-table td:last-of-type {
    vertical-align:top;
    padding-left:25px;
    }
    .order-info-content {
    table-layout:fixed;

    }

    .full-width {
    width:100%;
    }
    .pay-btn {
    border:none;
    background:#22b877;
    line-height:2em;
    border-radius:10px;
    font-size:19px;
    font-size:1.2rem;
    color:#fff;
    cursor:pointer;
    position:absolute;
    bottom:25px;
    width:calc(100% - 50px);
    -webkit-transition:all .2s ease;
            transition:all .2s ease;
    }
    .pay-btn:hover {
    background:#22a877;
        color:#eee;
    -webkit-transition:all .2s ease;
            transition:all .2s ease;
    }

    .total {
    margin-top:25px;
    font-size:20px;
    font-size:1.3rem;
    position:absolute;
    bottom:30px;
    right:27px;
    left:35px;
    }
    .dense {
    line-height:1.2em;
    font-size:16px;
    font-size:1rem;
    }
    .input-field {
    background:rgba(255,255,255,0.1);
    margin-bottom:10px;
    margin-top:3px;
    line-height:1.5em;
    font-size:20px;
    font-size:1.3rem;
    border:none;
    padding:5px 10px 5px 10px;
    color:#fff;
    box-sizing:border-box;
    width:100%;
    margin-left:auto;
    margin-right:auto;
    }
    .credit-info {
    background:#4488dd;
    height:100%;
    width: 600px;
    color:#eee;
    -webkit-box-pack:center;
    -webkit-justify-content:center;
        -ms-flex-pack:center;
            justify-content:center;
    font-size:14px;
    font-size:.9rem;
    display:-webkit-box;
    display:-webkit-flex;
    display:-ms-flexbox;
    display:flex;
    box-sizing:border-box;
    padding-left:25px;
    padding-right:25px;
    border-top-right-radius:30px;
    border-bottom-right-radius:30px;
    position:relative;
    }
    .dropdown-btn {
    background:rgba(255,255,255,0.1);
    width:100%;
    border-radius:5px;
    text-align:center;
    line-height:1.5em;
    cursor:pointer;
    position:relative;
    -webkit-transition:background .2s ease;
            transition:background .2s ease;
    }
    .dropdown-btn:after {
    content: '\25BE';
    right:8px;
    position:absolute;
    }
    .dropdown-btn:hover {
    background:rgba(255,255,255,0.2);
    -webkit-transition:background .2s ease;
            transition:background .2s ease;
    }
    .dropdown-select {
    display:none;
    }
    .credit-card-image {
    display:block;
    max-height:80px;
    margin-left:auto;
    margin-right:auto;
    margin-top:35px;
    margin-bottom:15px;
    }
    .credit-info-content {
    margin-top:25px;
    -webkit-flex-flow:column;
        -ms-flex-flow:column;
            flex-flow:column;
    display:-webkit-box;
    display:-webkit-flex;
    display:-ms-flexbox;
    display:flex;
    width:100%;
    }
    @media (max-width: 600px) {
    .window {
        width: 100%;
        height: 100%;
        display:block;
        border-radius:0px;
    }
    .order-info {
        width:100%;
        height:auto;
        padding-bottom:100px;
        border-radius:0px;
    }
    .credit-info {
        width:100%;
        height:auto;
        padding-bottom:100px;
        border-radius:0px;
    }
    .pay-btn {
        border-radius:0px;
    }

   }


    </style>

<div class='container'>
  <div class='window'>
        <div class='credit-info'>
          <div class='credit-info-content'>
            <table class='half-input-table'>
              <tr><td>Please select your card: </td><td><div class='dropdown' id='card-dropdown'><div class='dropdown-btn' id='current-card'>Visa</div>
                <div class='dropdown-select'>
                <ul>
                  <li>Master Card</li>
                  <li>American Express</li>
                  </ul></div>
                </div>
               </td></tr>
            </table>
            <img src='https://dl.dropboxusercontent.com/s/ubamyu6mzov5c80/visa_logo%20%281%29.png' height='80' class='credit-card-image' id='credit-card-image'></img>

            <form method="post" action="">
            Card Number
            <input id='card_number' class='input-field' name='card_number'>
</input>
            Card Holder
            <input id='card_holder' class='input-field' name='card_holder'></input>
            <table class='half-input-table'>
            <tr>
                <td> Expires
                <input id='card_expiry' class='input-field' type="date" name='card_expiry'></input>
                </td>
<td> CVC
                <input id='card_cvc' class='input-field' name='card_cvc'></input>
               
  </td>
            </tr>
            
            </table>
            <button id='checkout-btn' class='pay-btn'>Checkout</button>
            </form> 
          </div>

        </div>

        <div class="image-container">
      <img src="/electro-master/img/tq.jpg" alt="Your Image"class="right-image">
    </div>


      </div>
</div>

<script>
    var cardDrop = document.getElementById('card-dropdown');
var activeDropdown;
cardDrop.addEventListener('click',function(){
  var node;
  for (var i = 0; i < this.childNodes.length-1; i++)
    node = this.childNodes[i];
    if (node.className === 'dropdown-select') {
      node.classList.add('visible');
       activeDropdown = node; 
    };
})

window.onclick = function(e) {
  console.log(e.target.tagName)
  console.log('dropdown');
  console.log(activeDropdown)
  if (e.target.tagName === 'LI' && activeDropdown){
    if (e.target.innerHTML === 'Master Card') {
      document.getElementById('credit-card-image').src = 'https://dl.dropboxusercontent.com/s/2vbqk5lcpi7hjoc/MasterCard_Logo.svg.png';
          activeDropdown.classList.remove('visible');
      activeDropdown = null;
      e.target.innerHTML = document.getElementById('current-card').innerHTML;
      document.getElementById('current-card').innerHTML = 'Master Card';
    }
    else if (e.target.innerHTML === 'American Express') {
         document.getElementById('credit-card-image').src = 'https://dl.dropboxusercontent.com/s/f5hyn6u05ktql8d/amex-icon-6902.png';
          activeDropdown.classList.remove('visible');
      activeDropdown = null;
      e.target.innerHTML = document.getElementById('current-card').innerHTML;
      document.getElementById('current-card').innerHTML = 'American Express';      
    }
    else if (e.target.innerHTML === 'Visa') {
         document.getElementById('credit-card-image').src = 'https://dl.dropboxusercontent.com/s/ubamyu6mzov5c80/visa_logo%20%281%29.png';
          activeDropdown.classList.remove('visible');
      activeDropdown = null;
      e.target.innerHTML = document.getElementById('current-card').innerHTML;
      document.getElementById('current-card').innerHTML = 'Visa';
    }
  }
  else if (e.target.className !== 'dropdown-btn' && activeDropdown) {
    activeDropdown.classList.remove('visible');
    activeDropdown = null;
  }
}


document.getElementById('checkout-btn').addEventListener('click', function (event) {
        // Prevent the default form submission behavior
        event.preventDefault();

        // Show the submission message
        alert('Submitted');

        // Redirect to another PHP file
        window.location.href = '../store.php';
    });
    </script>

<?php

$servername = "localhost";
$username = "root"; // Update with your database username
$password = ""; // Update with your database password
$database = "checkout";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);
echo "can";
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "can";
// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $AccountNum = $_POST['card_number'];
    $BankName   = $_POST['card_holder'];
    $ExpirationDate = $_POST['card_expiry'];
    $SecurityCode= $_POST['card_cvc'];
    $PStatus="success";
    
    // Prepare SQL statement with prepared statement
    $sql = "INSERT INTO paymentmethod (AccountNum, BankName, ExpirationDate, SecurityCode,PStatus) 
            VALUES (?, ?, ?, ?,?);"; // <-- Added semicolon here
   
    $stmt = $conn->prepare($sql);
    
    if ($stmt) {
        // Bind parameters and execute statement
        $stmt->bind_param("sssis", $AccountNum, $BankName, $ExpirationDate, $SecurityCode,$PStatus);
        echo "can";
        if ($stmt->execute()) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close statement
        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }
}


// Close connection
$conn->close();

?>