// Referenced this example of how to make an accordion menu
//https://www.w3schools.com/w3css/tryit.asp?filename=tryw3css_sidebar_accordion

function accordion(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") === -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += " w3-gray";
    } else {
        x.className = x.className.replace(" w3-show", "");
        x.previousElementSibling.className =
            x.previousElementSibling.className.replace(" w3-gray", "");
    }
}

// Change the theme color of header, footer, and menuPanel based on what button is pressed
function changeThemeColor(color) {
    var header = document.getElementById("header");
    var footer = document.getElementById("footer");
    var menu = document.getElementById("menuPanel");

    header.style.backgroundColor = color;
    footer.style.backgroundColor = color;
    menu.style.backgroundColor = color;
}

// Referenced code from w3schools for carousel function
// https://www.w3schools.com/howto/tryit.asp?filename=tryhow_js_slideshow_auto

var imageIndex = 0;

function carousel() {
    var i;
    var image = document.getElementsByClassName("logoImages");

    for (let i = 0; i < image.length; i++) {
        image[i].style.display = 'none';
    }

    imageIndex++;
    if (imageIndex > image.length) {
        imageIndex = 1;
    }

    image[imageIndex - 1].style.display = 'block';
    setTimeout(carousel, 60000); //change image every minute
}

// Use link below as a reference to make the clock, used example with .toLocalString() function
// https://stackoverflow.com/questions/39418405/making-a-live-clock-in-javascript

function currentTime() {
    var today = new Date();
    // var hour = today.getHours();
    // var minute = today.getMinutes();
    // var second = today.getSeconds();

    document.getElementById('currentDate').innerHTML = today.toLocaleString();
    setTimeout(currentTime, 1000);
}


// Change the subtitle of the page to be whatever tab/link is clicked (Labs, projects)
function changeSubtitle() {
    var currentPath = window.location.pathname.split('/');
    document.querySelector(".subtitle").innerText = currentPath[2];

}

// Change the title of the page to be whatever tab/link is clicked (Labs, projects)
function changeTitle() {
    var currentPath = window.location.pathname.split('/');
    var section = document.querySelector(".subtitle").innerText = currentPath[2];
    document.querySelector("title").innerText = "Jacob Sullivan's " + section;
}

// function changePlaceholderText() {
//     var currentPath = window.location.pathname.split('/');
//     var section = document.querySelector(".subtitle").innerText = currentPath[3];
//     document.querySelector("placeHolder").innerText = "This is a placeholder for " + section;
// }











