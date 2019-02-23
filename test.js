
    fetch('https://api.nutritionix.com/v1_1/search/' + Apple + '?results=0%3A1&cal_min=0&cal_max=50000&fields=*&appId=5d96c63f&appKey=180226172327503b35c631d309b070b0').then(response => {
      response.json().then(json => {
        let data = json;
        console.log(json) 
      });
    });
