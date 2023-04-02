// const nextIcon = '<img class="arrow-R" src="../website/assets/images/Arrow-right.svg" alt="">';
// const prevIcon = '<img class="arrow-L" src="../website/assets/images/Arrow-right.svg" alt="">';

// var owl = $('.owl-carousel');
// owl.owlCarousel({
//     nav: true,
//     navText:[
//         prevIcon,
//         nextIcon
//     ],
//     items:4,
//     loop:true,
//     margin:10,
//     autoplay:true,
//     autoplayTimeout:1500,
//     autoplayHoverPause:true,
//     responsive:{
//         0:{
//             items:1,
//         },
//         600:{
//             items:3,
//         },
//         1000:{
//             items:4,
//         }
//     }

// });

// $('#carouselOpinions').owlCarousel({
//         loop:true,
//             margin:10,
//             nav:false,
//             rtl:true,
//             dots:false,
//             center:true,
//             control:false,
//             autoplay:true,
//             autoplayTimeout:4000,
//             autoplayHoverPause:true,
//   responsive:{
//       0:{
//           items:1,

//       },
//       600:{
//           items:2,

//       },
//       1000:{
//           items:3,

//       }
//   }
// });


let getNumber = document.querySelectorAll('.counter')
let arr = Array.from(getNumber)


arr.map((Counteritem)=>{

    let count = Counteritem.innerHTML
    Counteritem.innerHTML = ''
    
    let counter = 0;

    function countStart(){
        Counteritem.innerHTML = counter++

    if(counter>count){
        clearInterval(stop)
    }
    }

    let stop = setInterval(()=>{
        countStart()
    },Counteritem.dataset.speed / count);

});


// Get the navbar element
const navbar = $('.navbar');

// Add an event listener to the document object
$(document).on('click', function(event) {
  // Check if the clicked element is not inside the navbar
  if (!navbar.is(event.target) && navbar.has(event.target).length === 0) {
    // Get the dropdown component inside the navbar
    const dropdown = navbar.find('.collapse');

    // Check if the dropdown is open
    if (dropdown.hasClass('show')) {
      // Close the dropdown
      dropdown.removeClass("show");
    }
  }
});