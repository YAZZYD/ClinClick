/*suspender un client  */
  // Écouter l'événement de clic sur le bouton
  document.querySelector('button.warning').addEventListener('click', function() {
    // Afficher la boîte de dialogue SweetAlert
    Swal.fire({
      title: "Êtes-vous sûr de suspendre ce client ?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonText: "Oui",
      cancelButtonText: "Non"
    }).then((result) => {
      // Si l'utilisateur clique sur "Oui"
      if (result.isConfirmed) {
        // Effectuer l'action de suspension
        // Ajoutez ici le code pour suspendre le client
        Swal.fire("Client suspendu", "", "success");
      }
    });
  });

  /* valider user request  */
  function confirmValidationU(event) {
    event.preventDefault(); // Prevent default form submission
    Swal.fire({
      text: "Compte utilisateur validé",
      icon: 'success',
      confirmButtonColor: '#d33',
      timer: 1000, // Set the timer to 1000 milliseconds (1 second)
      showConfirmButton: false // Hide the "OK" button
    }).then(() => {
      event.target.submit()
    });
  }
  

/* supprimer un produit alert*/ 
function confirmDelete(event) {
    event.preventDefault(); // Prevent default form submission

    Swal.fire({
      title: 'Êtes-vous sûr de vouloir supprimer ce produit ?',
      text: "Cette action est irréversible.",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'Supprimer',
      cancelButtonText: 'Annuler'
    }).then((result) => {
      if (result.isConfirmed) {
        // If the user confirms, submit the form
        event.target.form.submit();
      }
    });
  }

  /*supprimer commande  */
  function confirmDeleteC(event) {
    event.preventDefault(); // Prevent default form submission

    Swal.fire({
      title: 'Êtes-vous sûr de vouloir supprimer cette commande ?',
      text: "Cette action est irréversible.",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'Supprimer',
      cancelButtonText: 'Annuler'
    }).then((result) => {
      if (result.isConfirmed) {
        // If the user confirms, submit the form
        event.target.form.submit();
      }
    });
  }
  /*valider commande */
  function confirmValidationC(event) {
    event.preventDefault(); // Prevent default form submission
    Swal.fire({
      text: "Commande Validé",
      icon: 'success',
      confirmButtonColor: '#d33',
      timer: 1000, // Set the timer to 1000 milliseconds (1 second)
      showConfirmButton: false // Hide the "OK" button
    }).then(() => {
      event.target.submit()
    });
  }

  
