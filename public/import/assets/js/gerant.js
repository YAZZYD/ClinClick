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




var signalerpanne = document.querySelectorAll('.btn-signal-panne');


signalerpanne.forEach(function(link) {
    link.addEventListener('click', function(event) {
        event.preventDefault();

        var equipId = this.getAttribute('data-id');


        var modal = document.querySelector('#modal1' + equipId );

        modal.style.display = 'block';
    });
});


var closeButtons = document.querySelectorAll('.close');
closeButtons.forEach(function(button) {
    button.addEventListener('click', function() {
   
        var modal = this.parentElement.parentElement;

        modal.style.display = 'none';
    });
    
});

  
