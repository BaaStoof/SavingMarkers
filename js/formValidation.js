function VerifForm(form) {
    var nomPrenom = document.getElementById('form').nomPrenom.value;
    var codeClient = document.getElementById('form').codeClient.value;
    var adresse = document.getElementById('form').adresse.value;
    
    if (codeClient == "") {
        document.getElementById('msg_erreur_code').innerHTML= '&#9660;Veuillez Saisir un Code Client Unique !';
        document.getElementById('msg_erreur_code').style.display='block';
        document.getElementById('msg_erreur_code').className='focus';
        form.codeClient.focus();
        return false;
    } else {
        document.getElementById('msg_erreur_code').style.display='none';
    }

    if (nomPrenom == "") {
        document.getElementById('msg_erreur_nom').innerHTML= '&#9660;Veuillez indiquer Nom et Prenom !';
        document.getElementById('msg_erreur_nom').style.display='block';
        document.getElementById('msg_erreur_nom').className='focus';
        form.nomPrenom.focus();
        return false;
    } else {
        document.getElementById('msg_erreur_nom').style.display='none';
    }

    if (adresse == "") {
        document.getElementById('msg_erreur_adresse').innerHTML= '&#9660;Veuillez Saisir l\'adresse !';
        document.getElementById('msg_erreur_adresse').style.display='block';
        document.getElementById('msg_erreur_adresse').className='focus';
        form.adresse.focus();
        return false;
    } else {
        document.getElementById('msg_erreur_adresse').style.display='none';
    }
    
    


    return true;
}


function resetForm() {
    document.getElementById("form").reset(); 
}

// function search to filter table
function search() {
  // Declare variables
  var input, filter, table, tr, td, i;
  input = document.getElementById("searchInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("clientTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
