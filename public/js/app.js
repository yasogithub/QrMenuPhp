//COUNTER
const counter_container = document.querySelector("section");

counter_container.addEventListener("click", (e) => {
  if (e.target.parentElement.classList.contains("counter")) {
    const count = e.target.parentElement.children[1];

    if (count.value <= 0) {
      return (count.value = 1);
    }

    if (e.target.classList.contains("increase")) {
      count.value++;
    } else if (e.target.classList.contains("decrease")) {
      count.value--;
    }
  }
});

//RETURN BACK
function goBack(e) {
  e.parentElement.parentElement.parentElement.parentElement.classList.toggle("d-none");
}

//MENU OPEN-CLOSE
const for_menu = document.querySelector("body");
const general = document.querySelector(".bottom-menu__general");

for_menu.addEventListener("click", (e) => {
  //e.target.classList.contains('back') || e.target.parentElement.classList.contains('back') bu alanÄ± da ekle
  if (
    e.target.classList.contains("menu") ||
    e.target.parentElement.classList.contains("menu") ||
    e.target.parentElement.parentElement.classList.contains("menu") ||
    e.target.classList.contains("back-menu") ||
    e.target.parentElement.classList.contains("back-menu") ||
    e.target.parentElement.parentElement.classList.contains("back-menu")
  ) {
    general.classList.toggle("bottom-menu__general__open");
  }

  if (!general.classList.contains("bottom-menu__general__open")) {
    document.querySelector(".bottom-menu__settings").classList.add("d-none");
    document.querySelector(".menu-message-box").classList.add("d-none");
    document.querySelector(".bottom-menu__message-detail-first").classList.add("d-none");
    document.querySelector(".bottom-menu__message-detail-second").classList.add("d-none");
  }
});

//ADD ACTIVE CLASS
const main = document.querySelector("body");

main.addEventListener("click", (e) => {
  if (
    e.target.parentElement.parentElement.classList.contains("rate-images") ||
    e.target.parentElement.parentElement.classList.contains("revisit-select") ||
    e.target.parentElement.parentElement.classList.contains("feedback__options")
  ) {
    let parent = e.target.parentElement.parentElement.children;
    Object.values(parent).forEach((element) => {
      if (element.classList.contains("active")) {
        element.classList.remove("active");
      }
    });

    e.target.parentElement.classList.add("active");
  }
});

//ABOUT SLIDER
$(".general-informations-slider").owlCarousel({
  loop: false,
  margin: 10,
  dots: false,
  nav: false,
  responsive: {
    0: {
      items: 2.5,
    },
  },
});

// CENTER ACCORDION ITEM
const accordionItems = document.querySelectorAll(".accordion-item");
const menuModal = document.querySelector("#menuModal .modal-dialog .modal-content");

accordionItems.forEach((item) => {
  item.addEventListener("click", () => {
    setTimeout(() => {
      menuModal.scroll({
        top: menuModal.clientHeight,
        behavior: "smooth",
      });
    }, 200);
  });
});
