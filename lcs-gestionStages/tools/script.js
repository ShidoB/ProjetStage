/*
///////
PAGE REGISTER VERIF EGALITE MDP
///////
*/
$(document).ready(function () {
  var psw2 = document.getElementById("psw2");
  var psw1 = document.getElementById("psw1");
  var subBtn = document.getElementById("subRegister");

  psw2.oninput = function () {
    if (psw1.value.normalize() === psw2.value.normalize()) {
      psw2.style.borderColor = "green";
      subBtn.disabled = false;
    } else {
      psw2.style.borderColor = "red";
      subBtn.disabled = true;
    }
  };
});
//! ////////////////////////////////////////////////////

//! ////////// Début Javascript navbar//////////////////

function showResponsiveMenu() {
  var menu = document.getElementById("topnav_responsive_menu");
  var icon = document.getElementById("topnav_hamburger_icon");
  var root = document.getElementById("root");
  if (menu.className === "") {
    menu.className = "open";
    icon.className = "open";
    root.style.overflowY = "hidden";
  } else {
    menu.className = "";
    icon.className = "";
    root.style.overflowY = "";
  }
}
//! ///////////Fin Javascript navbar/////////////////////

// ! ////////// Début Javascript select userType on register page//////////////////
$(document).ready(function () {
  var divE = document.getElementById("registerStudent");
  var divP = document.getElementById("registerTeacher");
  var divA = document.getElementById("setAdmin");
  var divName = document.getElementById("first&Name");
  var inputName = document.getElementById("name");
  var inputFirstname = document.getElementById("firstname");
  var radios = document.querySelectorAll('input[type=radio][name="userType"]');

  radios.forEach((radio) =>
    radio.addEventListener("change", function () {
      if (radio.value == "eleve") {
        divP.classList.add("hidden");
        divE.classList.remove("hidden");
        divA.classList.add("hidden");
        divA.value="0";
        inputName.setAttribute("required", "")
        inputFirstname.setAttribute("required", "")
      } else if(radio.value == "professeur"){
        divE.classList.add("hidden");
        divP.classList.remove("hidden");
        divA.classList.add("hidden");
        divA.value="0";
        inputName.setAttribute("required", "")
        inputFirstname.setAttribute("required", "")
      }else{
        divP.classList.add("hidden");
        divE.classList.add("hidden");
        divName.classList.add("hidden");
        divA.classList.remove("hidden");
        divA.value="1";
        inputName.removeAttribute("required")
        inputFirstname.removeAttribute("required")
      }
      
    })
  );
});
//! Fin Javascript select UserType on register page //////////////////////

//! ////////// Début Javascript search GestionEleve//////////////////
$(document).ready(function () {
  $("#userSearch").editableSelect();
});
//! ////////// Fin Javascript search GestionEleve//////////////////

//! ////////// Debut Javascript updateViewUser GestionEleve//////////////////
function UpdateUserView() {
  var select = document.getElementById("userSearch");
  var str = select.value.replace(/\s/g, "");
  if (str == "") {
    location.href = "./?action=viewUsers";
  } else {
    //console.log('You selected: ', this.value);
    location.href = "./?action=viewUsers&login=" + select.value;
  }
}
//! ////////// Fin Javascript updateViewUser GestionEleve//////////////////

//! ////////// Debut Javascript updateUser GestionEleve//////////////////
function updateUser(username) {
  //console.log(username);
  location.href = "./?action=modifUser&login=" + username;
}
//! ////////// Fin Javascript updateUser GestionEleve//////////////////

//! ////////// Debut Javascript deleteUser GestionEleve//////////////////
function deleteUser(usrn) {
  // console.log(usrn);
  swal({
    title: "Voulez-vous vraiment supprimer " + usrn + " ?",
    text: "Une fois supprimé, vous ne pourrez plus récupérer " + usrn + " !",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  }).then((willDelete) => {
    if (willDelete) {
      $.ajax({
        type: "POST",
        url: "./modele/ajax/ajax_deleteUser.php",
        data: { username: usrn },
        success: function(response) {
          swal("Poof ! " + usrn + " a disparu !", { icon: "success" });
        },
        error: function(response) {
          swal("Erreur ! queryUser", { icon: "error" });
        },
        catch: function(response) {
          swal("Erreur ! try Catch", { icon: "error" });
        },
        admin: function(response) {
          swal("Erreur ! admin", { icon: "error" });
        }
      });
      swal("Poof ! " + usrn + " a disparu !", {
        icon: "success",
      });
    } else {
      swal("Hop la, ìsch güet ! Suppression annulée !", { icon: "error" });
    }
  });
}
//! ////////// Fin Javascript deleteUser GestionEleve//////////////////

//! ////////// Debut Javascript  pdf //////////////////

//function printPDFinNewTab()
function openPdf(file_path) {
  if(file_path != ""){

    file_path = file_path.replace(".", "");
    // console.log(file_path);
    const url = window.location.origin + file_path;
    window.open(url, '_blank');
  }else{
  
    swal({
      title: "Uh-ho !",
      text: "Il n'y a pas de convention de stage disponible !",
      icon: "error",
    });
  }
}
    //! ////////// Fin Javascript pdf//////////////////
