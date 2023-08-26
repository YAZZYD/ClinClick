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

    themeToggler.querySelector("span:nth-child(1)").classList.toggle('active');
    themeToggler.querySelector("span:nth-child(2)").classList.toggle('active');
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





/*test*/
document.addEventListener('DOMContentLoaded', function() {
        const addProductButton = document.getElementById('addProductButton');
        const modal = document.getElementById('modal');
        const closeButton = document.getElementsByClassName('close')[0];

        addProductButton.addEventListener('click', function() {
            modal.style.display = 'block';
        });

        closeButton.addEventListener('click', function() {
            modal.style.display = 'none';
        });

        window.addEventListener('click', function(event) {
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        });
    }); 


    document.addEventListener('DOMContentLoaded', function() {
        const addProductButton = document.getElementById('addProductButton1');
        const modal = document.getElementById('modal');
        const closeButton = document.getElementsByClassName('close')[0];

        addProductButton.addEventListener('click', function() {
            modal.style.display = 'block';
        });

        closeButton.addEventListener('click', function() {
            modal.style.display = 'none';
        });

        window.addEventListener('click', function(event) {
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        });
    }); 


    document.addEventListener('DOMContentLoaded', function() {
        const addProductButton = document.getElementById('ModifyProductButton');
        const modal = document.getElementById('modal1');
        const closeButton = document.getElementsByClassName('close')[0];

        addProductButton.addEventListener('click', function() {
            modal.style.display = 'block';
        });

        closeButton.addEventListener('click', function() {
            modal.style.display = 'none';
        });

        window.addEventListener('click', function(event) {
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        });
    });





// Get the form and button elements
const quantityForm = document.getElementById('quantityForm');
const addToCartBtn = document.getElementById('addToCartBtn');

// Add event listener to the Add to Cart button
addToCartBtn.addEventListener('click', function() {
  // Get the selected quantity from the form input
  const quantityInput = document.getElementById('quantity');
  const selectedQuantity = quantityInput.value;

  // Perform validation if needed

  // Add the selected quantity to the cart
  addToCart(selectedQuantity);

  // Close the modal
  $('#quantityModal').modal('hide');
});

// Function to add the selected quantity to the cart
function addToCart(quantity) {
  // Add your logic here to add the quantity to the cart
  console.log(`Adding ${quantity} to the cart`);
}



/**   tab  manipulation**/

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
            const tabContent = document.getElementById(tabId + '-tab-content');

            // Ajouter la classe active au contenu d'onglet correspondant
            tabContent.classList.add('active');
        });
    });
});




 