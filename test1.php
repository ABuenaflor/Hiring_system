<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="style.css" />
    <title>Responsive Side Menu</title>
  </head>

  <style>
    :root {
  --nav-width: 200px;
  --nav-collapse-width: 80px;

  --header-height: 75px;

  --nav-bg-color: #2f2e2e;
  --active-color: #ffffff;
}

*,
*:before,
*:after {
  box-sizing: border-box;
}

body {
  margin: 0;
  padding: 0;
  font-family: Montserrat, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto,
    Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
}

/* Global Style */
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
}

a {
  text-decoration: none;
  color: #343434;
}

/* Header Styles */
header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 0 1rem;
  height: var(--header-height);
  background-color: #f3f3f3;
  padding-left: calc(var(--nav-width) + 1rem);
  transition: padding-left 0.3s ease-in-out;
}

header #nav-toggler {
  font-size: 1.5rem;
  box-shadow: 0 0 1px #343434;
  background-color: #fff;
  padding: 0.25rem 0.35rem;
  border-radius: 0.25rem;
}

/* Side Menu Styles */
nav {
  z-index: 1000; /*added */
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  position: fixed;
  top: 0;
  left: 0;
  height: 100%;
  background-color: var(--nav-bg-color);
  width: var(--nav-width);
  transition: width 0.2s ease-in-out;
  box-shadow: 0 0 2px #343434;
}

nav .logo {
  display: flex;
  justify-content: flex-start;
  align-items: center;
  height: var(--header-height);
}

nav .logo span {
  margin-left: 1rem;
}

.nav__item-link,
.logo,
.sign-out {
  font-size: 1.25rem;
  display: block;
  padding: 1rem;
  color: #f3f3f3;
  white-space: nowrap;
}

.nav__item-link span,
.logo span,
.sign-out span {
  margin-left: 0.5rem;
}

.nav__item-link + ul a {
  display: block;
  padding: 1rem;
  background-color: #f3f3f3;
  white-space: nowrap;
}

/* JS Classes */
.collapse {
  width: var(--nav-collapse-width);

  /* added line */
  z-index: 999; /* Lower z-index when collapsed */
  position: fixed;
  top: 0;
  left: 0;
  width: var(--nav-collapse-width);
}

.collapse i {
  margin-left: 0.5rem;
}

.collapse span {
  display: none;
}

.collapse .nav__item-link + ul a {
  font-size: 0.85rem;
}

.collapse-header {
  padding-left: calc(var(--nav-collapse-width) + 1rem);
}

.active {
  position: relative;
  color: var(--active-color);
  background-color: rgba(0, 0, 0, 0.3);
}

.active:before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  bottom: 0;
  height: 25px;
  width: 3px;
  margin: auto 0;
  background-color: var(--active-color);
}

.d-none {
  display: none;
}

.nav__item-link + ul a.active-sub-link {
  background-color: #ddd;
}

@media screen and (max-width: 768px) {
  header {
    padding-left: 1rem;
  }

  nav {
    width: 0px;
    overflow: hidden;
  }

  .nav__item-link span,
  .logo span,
  .sign-out span {
    display: none;
  }
}
  </style>
  
  <body>
    <header id="header">
      <i class="fas fa-bars" id="nav-toggler"></i>
      <div>
        <i class="fas fa-user-alt"></i>
        <span>John Doe</span>
      </div>
    </header>
    
    <div>
    <nav id="nav">
      <div>
        <div class="logo">
          <i class="fab fa-gg-circle"></i>
          <span>GG Corp</span>
        </div>
        <ul class="nav">
          <li class="nav__item">
            <a href="#" class="nav__item-link">
              <i class="fas fa-home"></i>
              <span>Dashboard <i class="fas fa-angle-down"></i></span>
            </a>
            <ul class="d-none">
              <li>
                <a href="#" class="sub_link">Link 1</a>
              </li>
              <li>
                <a href="#" class="sub_link">Link 2</a>
              </li>
              <li>
                <a href="#" class="sub_link">Link 3</a>
              </li>
            </ul>
          </li>
          <li class="nav__item">
            <a href="#" class="nav__item-link">
              <i class="fab fa-bitcoin"></i>
              <span>Income</span>
            </a>
          </li>
          <li class="nav__item">
            <a href="#" class="nav__item-link active">
              <i class="fas fa-user-alt"></i>
              <span>Profile</span>
            </a>
          </li>
          <li class="nav__item">
            <a href="#" class="nav__item-link">
              <i class="fas fa-cogs"></i>
              <span>Settings</span>
            </a>
          </li>
        </ul>
      </div>

      <a href="#" class="sign-out">
        <i class="fas fa-sign-out-alt"></i>
        <span>Sign Out</span>
      </a>
    </nav>
    </div>

    <script src="main.js" defer></script>
    <script>
        const nav_links = document.querySelectorAll(".nav__item-link");
const sub_links = document.querySelectorAll(".sub_link");

function collapse_nav(head, toggler, sidenav) {
  const header = document.getElementById(head);
  const nav_toggler = document.getElementById(toggler);
  const nav = document.getElementById(sidenav);

  nav_toggler.addEventListener("click", function () {
    this.classList.toggle("fa-times");
    nav.classList.toggle("collapse"); // Toggle the collapse class
    header.classList.toggle("collapse-header");
  });
}

collapse_nav("header", "nav-toggler", "nav");

nav_links.forEach((link) => {
  link.addEventListener("click", function () {
    nav_links.forEach((l) => {
      if (l.classList.contains("active")) {
        l.classList.remove("active");
      }
    });

    this.classList.toggle("active");
    const sub_menu = this.nextElementSibling;
    if (sub_menu) {
      sub_menu.classList.toggle("d-none");
    }
  });
});

sub_links.forEach((link) => {
  link.addEventListener("click", () => {
    sub_links.forEach((l) => l.classList.remove("active-sub-link"));
    link.classList.toggle("active-sub-link");
  });
});
    </script>
  </body>
</html>