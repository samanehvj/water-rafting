function validate() {
  var name = document.career.name.value;
  var family = document.career.family.value;
  var email = document.career.email.value;
  var pos = document.career.pos.value;

  var status = false;
  if (name == "") {
    document.getElementById("namelocation").innerHTML =
      "Please enter your name";
    status = false;
  } else {
    document.getElementById("namelocation").innerHTML = "";

    status = true;
  }

  if (family == "") {
    document.getElementById("familylocation").innerHTML =
      "Please enter your family";
    status = false;
  } else {
    document.getElementById("familylocation").innerHTML = "";

    status = true;
  }

  if (email == "") {
    document.getElementById("emaillocation").innerHTML =
      "Please enter your email";
    status = false;
  } else {
    document.getElementById("emaillocation").innerHTML = "";

    status = true;
  }

  if (pos == 0) {
    document.getElementById("poslocation").innerHTML = "Please select position";
    status = false;
  } else {
    document.getElementById("poslocation").innerHTML = "";

    status = true;
  }

  return status;
}
