// https://www.chartjs.org/docs/next/samples/
// https://www.chartjs.org/docs/latest/getting-started/

const makeChart = data => {
    var ctx = document.getElementById("myChart");
    const last = data[data.length - 1]
    const { Confirmed, Deaths, Active, Recovered } = last || {}

    new Chart(ctx, {
        type: "bar",
        data: {
            labels: ["Confirmed", "Active", "Recovered", "Deaths"],
            datasets: [{
                label: "# of Votes",
                data: [Confirmed, Active, Recovered, Deaths]
            }]
        },
        options: {
            title: {
                display: true,
                text: "Custom Chart Title"
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

}

document
    .querySelector(".search button").addEventListener("click", function() {
        console.log("I have been fired")
        var country = document.getElementById("country").value

        var url = "https://api.covid19api.com/dayone/country/" + country

        fetch(url)
            .then((response) => response.json())
            .then((data) => {

                var length = data.length
                var index = length - 1
                var active = document.getElementById("active")
                var recovered = document.getElementById("recovered")
                var confirmed = document.getElementById("confirmed")
                var deaths = document.getElementById("deaths")

                confirmed.innerHTML = "";
                active.innerHTML = "";
                deaths.innerHTML = "";
                recovered.innerHTML = "";


                active.append(data[index].Active)
                recovered.append(data[index].Recovered)
                confirmed.append(data[index].Confirmed)
                deaths.append(data[index].Deaths)


                makeChart(data);

            })
    });


let slideIndex = 0;

function showSlides() {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) { slideIndex = 1 }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
    setTimeout(showSlides, 6000);
}

showSlides();


// var ctx = document.getElementById("myChart");



// var myChart = new Chart(ctx, {
//     type: "bar",
//     data: {
//         labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
//         datasets: [{
//             label: "# of Votes",
//             data: [12, 19, 3, 5, 2, 3]
//         }]
//     },
//     options: {
//         title: {
//             display: true,
//             text: "Custom Chart Title"
//         },
//         scales: {
//             yAxes: [{
//                 ticks: {
//                     beginAtZero: true
//                 }
//             }]
//         }
//     }
// });