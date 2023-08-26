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



   // Get the modal element
   var modal = document.getElementById("modal");

   // Get the button that opens the modal
   var openModalButton = document.getElementById("envoioffre");

   // Get the <span> element that closes the modal
   var closeButton = document.getElementsByClassName("close")[0];

   // Function to open the modal
   function openModal() {
       modal.style.display = "block";
   }

   // Function to close the modal
   function closeModal() {
       modal.style.display = "none";
   }

   // Event listener for open modal button
   openModalButton.addEventListener("click", openModal);

   // Event listener for close modal button
   closeButton.addEventListener("click", closeModal);

   // Close the modal when the user clicks outside of it
   window.addEventListener("click", function (event) {
       if (event.target == modal) {
           closeModal();
       }
   });
