// //Getting value from "ajax.php".
// function fill(Value) {
//     //Assigning value to "search" div in "search.php" file.
//     $('#search').val(Value);
//     //Hiding "display" div in "search.php" file.
//     $('#display').hide();
// }
// $(document).ready(function() {
//     //On pressing a key on "Search box" in "search.php" file. This function will be called.
//     $("#search").keyup(function() {
//         //Assigning search box value to javascript variable named as "society".
//         var society = $('#search').val();
//         //Validating, if "society" is empty.
//         if (society == "") {
//             //Assigning empty value to "display" div in "search.php" file.
//             $("#display").html("");
//         }
//         //If society is not empty.
//         else {
//             //AJAX is called.
//             $.ajax({
//                 //AJAX type is "Post".
//                 type: "POST",
//                 //Data will be sent to "ajax.php".
//                 url: "./controler/loans/ctrl_add_loan.php",
//                 //Data, that will be sent to "ajax.php".
//                 data: {
//                     //Assigning value of "society" into "search" variable.
//                     search: society
//                 },
//                 //If result found, this funtion will be called.
//                 success: function(html) {
//                     //Assigning result to "display" div in "search.php" file.
//                     $("#display").html(html).show();
//                 }
//             });
//         }
//     });
// });

// Creating and Adding Dynamic Form Elements.
var itemProperty = 1; // Global Variable for property
var propertyValue = 1; // Global Variable for value
/*
=================
Creating Text Box for property and value fields in the Form.
=================
*/
function createItemProperty() {
    // let i = 1; // Global Variable for Name
    // let j = 1; // Global Variable for E-mail
    var inputProperty = document.createElement("INPUT");
    var addProperty = document.createElement('p');
    addProperty.innerHTML = "Ajouter un propriété : ";
    inputProperty.setAttribute("type", "text");
    inputProperty.setAttribute("placeholder", "Property_" + itemProperty);
    inputProperty.setAttribute("name", "property" + itemProperty);
    // document.getElementById("itemForm1").appendChild(addProperty);
    document.getElementById("itemForm1").appendChild(inputProperty);
    itemProperty += 1;

    var inputValue = document.createElement("INPUT");
    var addValue = document.createElement('p');
    addValue.innerHTML = "Ajouter un valeur : ";
    inputValue.setAttribute("type", "text");
    inputValue.setAttribute("placeholder", "Value_" + propertyValue);
    inputValue.setAttribute("name", "value" + propertyValue);
    // document.getElementById("itemForm2").appendChild(addValue);
    document.getElementById("itemForm2").appendChild(inputValue);
    propertyValue += 1;
}

var displayMode = 0;
window.onload = function () {
    document.getElementById('searchForm').onsubmit = function () {
        var a = document.getElementById('search');
        showResult(a.value);

        return false;
    }
}

function fillSearch(str) {
    var a = document.getElementById('search');
    a.value = str;
    showResult(str);
}

function showKeys(str) {
    if (displayMode != 0) {
        displayMode = 0;
        return;
    }
    if (str.length == 0) {
        document.getElementById('livesearch').innerHTML = "";
        document.getElementById('liversearch').style.border = '0px';
    }
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
    }
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("livesearch").innerHTML = this.responseText;
	
        }
    }

    xmlhttp.open('GET', '../../controler/loans/ctrl_add_loan.php?q=' + str, true);
    xmlhttp.send();
}
