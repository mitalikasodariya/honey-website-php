/*-------------slider------------------*/
$('.hero-slider').slick({
  autoplay: true,
  infinite: false,
  speed: 300,
  nextArrow: $('.next'),
  prevArrow: $('.prev')
});
$('.testimonial-items').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  prevArrow: $('.prev1'),
  nextArrow: $('.next1')
});

menu.addEventListener('click', function() {
  
  let nav = document.querySelector('.navbar');
  nav.classList.add('active'); // Use classList.add() instead of addClass()
});

userBtn.addEventListener('click', function() {
 
  let nav = document.querySelector('.user-box');
  nav.classList.add('active'); // Use classList.add() instead of addClass()
});

 




document.addEventListener('DOMContentLoaded', function() {
  const header = document.querySelector('header');

  function fixedNavbar() {
    header.classList.toggle('scrolled', window.pageYOffset > 0);
  }

  fixedNavbar();
  window.addEventListener('scroll', fixedNavbar);

  let menu = document.querySelector('#menu-btn');
  let userBtn = document.querySelector('#user-btn');
  
  // Function to show user details
  function showUserDetails() {
    let userBox = document.querySelector('.user-box');
    userBox.classList.toggle('active');
  }
  
  // Event listener for menu button
  menu.addEventListener('click', function() {
    let nav = document.querySelector('.navbar');
    nav.classList.toggle('active');
  });
  
  // Event listener for user button
  userBtn.addEventListener('click', showUserDetails);
  

  const closeBtn = document.querySelector('#close-form');
  closeBtn.addEventListener('click', () => {
    document.querySelector('.update-container').style.display = 'none';
  });
});
