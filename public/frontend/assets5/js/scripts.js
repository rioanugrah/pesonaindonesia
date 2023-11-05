axios.get('https://booking-com.p.rapidapi.com/v1/static/hotels', {
        // params: {
        //     currency: 'AED',
        //     locale: 'en-gb'
        // },
        headers: {
            'X-RapidAPI-Key': "{{ env('X_RAPIDAPI_KEY') }}",
            'X-RapidAPI-Host': "{{ env('X_RAPIDAPI_HOST') }}"
        }
    })
        .then(function (response) {
            console.log(response.data);
        })
        .catch(function (error) {
            console.log(error);
        });