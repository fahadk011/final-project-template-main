const menuIcon = document.querySelector('#menu-icon');
const navlinks = document.querySelector('.nav-links');

menuIcon.onclick = () => {
    navlinks.classList.toggle('active');
}


document.addEventListener("DOMContentLoaded", () => {
    const weatherElement = document.getElementById("weather");
    const timeElement = document.getElementById("time"); // Fixed the ID here

    // WEATHER API CALL - OpenWeatherMap
    const city = "New York"; // Replace with your city
    const apiKey = "209e4db1283046db0325fdc38f22ed91"; // Replace with your API key

    fetch(`https://api.openweathermap.org/data/2.5/weather?q=${city}&units=metric&appid=${apiKey}`)
      .then((response) => response.json())
      .then((data) => {
        console.log(data);
        const temperature = Math.round(data.main.temp);
        const description = data.weather[0].description;
        weatherElement.innerText = `${city}: ${temperature}°C, ${description}`;
      })
      .catch((error) => {
        console.error("Error fetching weather:", error);
        weatherElement.innerText = "Failed to load weather. Try again later.";
      });

    // TIME API CALL - WorldTimeAPI
    fetch("https://worldtimeapi.org/api/ip")
      .then((response) => response.json())
      .then((data) => {
        console.log(data);
        const dateTime = new Date(data.datetime);
        const formattedTime = dateTime.toLocaleTimeString();
        timeElement.innerText = `${data.timezone}: ${formattedTime}`;
      })
      .catch((error) => {
        console.error("Error fetching time:", error);
        timeElement.innerText = "Failed to load time. Try again later.";
      });
});

  
  
  
  

  
  
document.addEventListener('DOMContentLoaded', () => {
    const ctx = document.getElementById('skillsChart').getContext('2d');
  
    const skillsChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['HTML', 'CSS', 'JavaScript', 'React', 'PHP', 'SQL'],
        datasets: [{
          label: 'Skill Proficiency (%)',
          data: [95, 90, 85, 80, 75, 70],
          backgroundColor: [
            'rgba(255, 99, 132, 0.6)', 
            'rgba(54, 162, 235, 0.6)', 
            'rgba(255, 206, 86, 0.6)', 
            'rgba(75, 192, 192, 0.6)', 
            'rgba(153, 102, 255, 0.6)', 
            'rgba(255, 159, 64, 0.6)'
          ],
          borderColor: [
            'rgba(255, 99, 132, 1)', 
            'rgba(54, 162, 235, 1)', 
            'rgba(255, 206, 86, 1)', 
            'rgba(75, 192, 192, 1)', 
            'rgba(153, 102, 255, 1)', 
            'rgba(255, 159, 64, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false, // Allows vertical growth
        scales: {
          y: {
            beginAtZero: true,
            ticks: {
              stepSize: 10
            }
          }
        }
      }
    });
  });
  

