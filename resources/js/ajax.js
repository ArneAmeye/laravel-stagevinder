var autoFillBtn = document.querySelector('#ajaxFillBtn');
//Check if autoFillBtn is on page (Edit parameter in URL only)
if(autoFillBtn !== null){
    autoFillBtn.addEventListener('click', function(e){
        getCompanyDetails(); //run Ajax function
        e.preventDefault();
    });
}


//Ajax function to get company details when the getCompanyDetails() function is called on a btn click
function getCompanyDetails(){
    //Get company name and location from form
    let businessName =  document.querySelector('#businessName').value;
    let businessLocation = document.querySelector('#businessLocation').value;
    console.log(businessLocation + " " + businessName)
    //Make the actual API GET request
    axios.post('/getcompanydetails', {
          businessName: businessName,
          businessLocation: businessLocation
    })
    .then(res => {
        console.log(res.data.response);
        //Add response data to empty form fields
        document.querySelector('#sector').value = res.data.response.venues[0].categories[0].name;
        document.querySelector('#street').value = res.data.response.venues[0].location.address;
        document.querySelector('#postal').value = res.data.response.venues[0].location.postalCode;
        //etc...
    })
    .catch(function (error) {
        //Log request error
        console.log(error);
    })

}