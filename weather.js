

let weather = {

    "apiKey":"c6cdde7b24dc4244d584f5ac2ffe04ff",
     fetchWeather : function (city) {
         fetch(
             "https://api.openweathermap.org/data/2.5/weather?q="+ city + "&units=metric&appid="+this.apiKey
             )
         .then((response) => response.json())
         .then((data) => this.displayWeather(data));

    },

    displayWeather:function(data){
        const {name} = data;
        const{icon, description} = data.weather [0];
        const{temp, humidity} = data.main;
        const {speed} = data.wind;
        console.log(name,icon,description,temp,humidity,speed);
        document.querySelector(".city").innerText = " Weather in " + name;
        document.querySelector(".icon").src = "https://openweathermap.org/img/wn/"+ icon + ".png";
        document.querySelector(".description").innerText = description;
        document.querySelector(".temp").innerText = temp + "°C";
        document.querySelector(".humidity").innerText = " Humidity: " + humidity; + "%";
        document.querySelector(".wind").innerText = " Wind speed is " + speed  + " km/h ";
        

    },
    
    search: function () {
        this.fetchWeather(document.querySelector(".search-bar").value);
    }

};

document
.querySelector(".search button").addEventListener("click", function(){

    weather.search();

});

let slideIndex = 0;
showSlides();
            
function showSlides() {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 10000); // Change image every 2 seconds
}



