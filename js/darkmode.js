let darkButton=
document.getElementById("darkButton");

if(darkButton){

const darkButton = document.getElementById("darkButton");

// Apply saved theme on page load
if(localStorage.getItem("theme") === "dark"){
    document.body.classList.add("dark");
}

if(darkButton){
    darkButton.onclick = () => {

        document.body.classList.toggle("dark");

        if(document.body.classList.contains("dark")){
            localStorage.setItem("theme","dark");
        }
        else{
            localStorage.setItem("theme","light");
        }

    };
}

}