const sideMenu = document.querySelector("aside");
const menuBtn = document.querySelector("#menu-btn");
const closeBtn = document.querySelector("#close-btn");
const themeToggler = document.querySelector(".theme-toggler");
//show sidebar
menuBtn.addEventListener('click' , () => {
    sideMenu.style.display = 'block';
})
//close sidebar
closeBtn.addEventListener('click' , () => {
    sideMenu.style.display = 'none';
})

//change theme 
themeToggler.addEventListener('click' , () =>{
    document.body.classList.toggle("dark-theme-variables");

    themeToggler.querySelector("span:nth-child(1)").classList.toggle("active");
    themeToggler.querySelector("span:nth-child(2)").classList.toggle("active");
})


document.addEventListener('DOMContentLoaded', function() {
    var profilePhoto = document.querySelector('.profile-photo');
    var profileMenu = document.querySelector('.profile-menu');

    profilePhoto.addEventListener('click', function() {
      profileMenu.style.display = profileMenu.style.display === 'none' ? 'block' : 'none';
    });
  });



/*===================================Tab Manipulation=========================================================== */
    document.addEventListener('DOMContentLoaded', function() {
        const tabLabels = document.querySelectorAll('.tabs .tab-label');
        const tabContents = document.querySelectorAll('.tabs .tab-content');

        // Gérer le clic sur les labels d'onglets
        tabLabels.forEach(function(label) {
            label.addEventListener('click', function() {
                // Retirer la classe active de tous les labels
                tabLabels.forEach(function(l) {
                    l.classList.remove('active');
                });

                // Retirer la classe active de tous les contenus d'onglets
                tabContents.forEach(function(content) {
                    content.classList.remove('active');
                });

                // Ajouter la classe active au label cliqué
                label.classList.add('active');

                // Récupérer l'ID de l'onglet associé
                const tabId = label.getAttribute('data-tab');
                const tabContent = document.getElementById(tabId + '-content');

                // Ajouter la classe active au contenu d'onglet correspondant
                tabContent.classList.add('active');
            });
        });
    });
    
 // Sélectionnez tous les liens "Détails du gérant"
 var detailsLinks = document.querySelectorAll('.details-link');

 // Parcourez chaque lien et ajoutez l'événement de clic
 detailsLinks.forEach(function(link) {
     link.addEventListener('click', function(event) {
         event.preventDefault();

         // Obtenez l'identifiant du gérant à partir de l'attribut data-id
         var gerantId = this.getAttribute('data-id');

         // Sélectionnez la boîte de dialogue modale correspondante en utilisant son identifiant
         var modal = document.querySelector('#modal1' + gerantId);

         // Affichez la boîte de dialogue modale
         modal.style.display = 'block';
     });
 });

 // Ajoutez un événement de clic pour fermer la boîte de dialogue modale lorsqu'on clique sur le bouton de fermeture (x)
 var closeButtons = document.querySelectorAll('.close');
 closeButtons.forEach(function(button) {
     button.addEventListener('click', function() {
         // Sélectionnez le parent de l'élément <span class="close">, qui est la boîte de dialogue modale
         var modal = this.parentElement.parentElement;

         // Masquez la boîte de dialogue modale
         modal.style.display = 'none';
     });
 });




  // Sélectionnez tous les liens "Détails du gérant"
  var detailsLinks = document.querySelectorAll('.details-link');

  // Parcourez chaque lien et ajoutez l'événement de clic
  detailsLinks.forEach(function(link) {
      link.addEventListener('click', function(event) {
          event.preventDefault();
 
          // Obtenez l'identifiant du gérant à partir de l'attribut data-id
          var fournisseurId = this.getAttribute('data-id');
 
          // Sélectionnez la boîte de dialogue modale correspondante en utilisant son identifiant
          var modal = document.querySelector('#modal2' + fournisseurId );
 
          // Affichez la boîte de dialogue modale
          modal.style.display = 'block';
      });
  });
 
  // Ajoutez un événement de clic pour fermer la boîte de dialogue modale lorsqu'on clique sur le bouton de fermeture (x)
  var closeButtons = document.querySelectorAll('.close');
  closeButtons.forEach(function(button) {
      button.addEventListener('click', function() {
          // Sélectionnez le parent de l'élément <span class="close">, qui est la boîte de dialogue modale
          var modal = this.parentElement.parentElement;
 
          // Masquez la boîte de dialogue modale
          modal.style.display = 'none';
      });
  });



  // Sélectionnez tous les liens "Détails du gérant"
  var detailsLinks = document.querySelectorAll('.details-link');

  // Parcourez chaque lien et ajoutez l'événement de clic
  detailsLinks.forEach(function(link) {
      link.addEventListener('click', function(event) {
          event.preventDefault();
 
          // Obtenez l'identifiant du gérant à partir de l'attribut data-id
          var maintenancierId = this.getAttribute('data-id');
 
          // Sélectionnez la boîte de dialogue modale correspondante en utilisant son identifiant
          var modal = document.querySelector('#modal3' + maintenancierId );
 
          // Affichez la boîte de dialogue modale
          modal.style.display = 'block';
      });
  });
 
  // Ajoutez un événement de clic pour fermer la boîte de dialogue modale lorsqu'on clique sur le bouton de fermeture (x)
  var closeButtons = document.querySelectorAll('.close');
  closeButtons.forEach(function(button) {
      button.addEventListener('click', function() {
          // Sélectionnez le parent de l'élément <span class="close">, qui est la boîte de dialogue modale
          var modal = this.parentElement.parentElement;
 
          // Masquez la boîte de dialogue modale
          modal.style.display = 'none';
      });
      
  });
