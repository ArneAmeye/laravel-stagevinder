//Ajax function to get company details when the getCompanyDetails() function is called on a btn click
function getCompanyDetails(){
    //Get company name and location from form
    let businessName =  document.querySelector('#businessName').innerHTML;
    let businessLocation = document.querySelector('#businessLocation').innerHTML;
    console.log(businessLocation + " " + businessName)
    //Make the actual API GET request
    axios.post('/getcompanydetails', {
          businessName: businessName,
          businessLocation: businessLocation
    })
    .then(res => {
        console.log(res.data.response);
        //Add response data to empty form fields
    })
    .catch(function (error) {
        //Log request error in console, maybe also show onpage?
        console.log(error);
    })

}