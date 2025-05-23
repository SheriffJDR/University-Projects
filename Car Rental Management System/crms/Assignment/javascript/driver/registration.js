
//Variables holding the  values of the inputs
let LicenseString = document.getElementsByClassName('License-Number')[0];
let idString = document.getElementsByClassName('national-id')[0];
let firstNameString = document.getElementsByClassName('first-name')[0];
let lastNameString = document.getElementsByClassName('last-name')[0];
let prefixString = document.getElementsByClassName('prefix')[0];
let lineNumberString = document.getElementsByClassName('lineNumber')[0];
let firstAddressString = document.getElementsByClassName('address-style')[0];
let secondAddressString = document.getElementsByClassName('address-style')[1];
let register = document.getElementsByTagName('button')[0];
let message = document.getElementById('message');
let jsStatus = document.getElementById('jscheck');
let form = document.getElementsByTagName('form')[0];

//Constants
const LICENSE_RANDOM_LENGTH = 7 //Stores the correct length of the random part of the generated license number according to the validation criteria
const ID_LENGTH = 15 //Stores the correct length of the id string according to the validation criteria

//Stores the file path of the webpage
const  FILE_PATH = "driver/index/registration"

//Event Listeners
window.addEventListener('load', function(){

    //Stores current location in the wedsite directory in sessionStorage
    //Updates the location in the wedsite directory in sessionStorage to the current location using a JSON objet
    if(sessionStorage.getItem("path")){

        let path = JSON.parse(sessionStorage.getItem("path"))
        path.path = FILE_PATH
        sessionStorage.setItem("path", JSON.stringify(path))
    }

    //Creates and adds the current location in the wedsite directory to sessionStorage using a JSON object
    if(!sessionStorage.getItem("path")){
        
        let path ={
            "path" : FILE_PATH
        }
        sessionStorage.setItem("path",JSON.stringify(path))
    }
})

document.onreadystatechange = function(){
    
    if(document.readyState === 'complete'){
        loadParishes();
        
        //Updates the location in the wedsite directory in sessionStorage to the current location using a JSON objet
        if(sessionStorage.getItem("path")){

        let path = JSON.parse(sessionStorage.getItem("path"))
        path.path = FILE_PATH
        sessionStorage.setItem("path", JSON.stringify(path))
        }

        //Creates and adds the current location in the wedsite directory to sessionStorage using a JSON object
        if(!sessionStorage.getItem("path")){
            
            let path ={
                "path" : FILE_PATH
            }
            sessionStorage.setItem("path",JSON.stringify(path))
        }
    }

    form.addEventListener('submit',function(event){
        
        if(!update()){
            event.preventDefault();
        }
       else{
            //event.preventDefault();
            jsStatus.value = true
            event.stopImmediatePropagation();
       }
       
        
    })
    document.getElementsByTagName('input')[0].addEventListener('blur', function(event){    
        
        //Generates License when user moves focus from the national id box
        generateLicense();
    })
}     
   
function checkIfEmpty()
{
    //If field is filled after being checked as empty, border color is set back to black
    if(LicenseString.value !== '')
    {
        LicenseString.style.borderColor = 'black';
    }

    //Checks if the license number field is empty
    if(LicenseString.value === '')
    {
        console.log('License number field is empty');
        LicenseString.style.borderColor = 'red';
        return true;
    }

    //If field is filled after being checked as empty, border color is set back to black
    if(idString.value !== '')
    {
        idString.style.borderColor = 'black';
    }

    //Checks if the ID number field is empty
    if(idString.value === '')
    {
        console.log('ID number field is empty');
        idString.style.borderColor = 'red'
        return true;
    }
 
    //If field is filled after being checked as empty, border color is set back to black
    if(firstNameString.value !== '')
    {
        firstNameString.style.borderColor = 'black'
    }

    //Checks if the first name number field is empty
    if(firstNameString.value === '')
    {
        console.log('First name field is empty');
        firstNameString.style.borderColor = 'red'
        return true;
    }

    //If field is filled after being checked as empty, border color is set back to black
    if(lastNameString.value !== '')
    {
        lastNameString.style.borderColor = 'black'
    }

    //Checks if the last name number field is empty
    if(lastNameString.value === '')
    {
        console.log('Last name field is empty');
        lastNameString.style.borderColor = 'red'
        return true;
    }

    //If field is filled after being checked as empty, border color is set back to black
    if(firstAddressString.value !== '')
    {
        firstAddressString.style.borderColor = 'black'
    }

    //Checks if the first address number field is empty
    if(firstAddressString.value === '')
    {
        console.log('Address 1 field is empty');
        firstAddressString.style.borderColor = 'red'
        return true;
    }

   //If field is filled after being checked as empty, border color is set back to black
    if(secondAddressString.value !== '')
    {
        secondAddressString.style.borderColor = 'black'
    }

    //Checks if the second address number field is empty
    if(secondAddressString.value === '')
    {
        console.log('Address 2 field is empty');
        secondAddressString.style.borderColor = 'red'
        return true;
    }

    return false
}

//Validates the license number
function checkLicense(nationalId){
     
    let license = nationalId

    //checks if the textbox is empty
    if(license == ''){
       console.log('License Number Check Failed: No license number entered')
       
       //Displays errors message on the page
       message.innerHTML = "Error: information missing"
       message.classList.add('red-text')
       
       //Changes the color of the input boxes when an error is detected
       if(LicenseString.classList.contains('License-Number')){
           
        LicenseString.classList.remove('License-Number')
        LicenseString.classList.add('red-box')
 
       }
       return false
    }
 
    //checks if the the string is the required length
    if(license.length != 15){
       console.log('License Number Check Failed: license number entered must be 15 characters long')
       
       //Displays errors message on the page
       message.innerHTML = "License No. Check Failed: No. must be 15 characters long"
       message.classList.add('red-text')
       
       //Changes the color of the input boxes when an error is detected
       if(LicenseString.classList.contains('License-Number')){
          
        LicenseString.classList.remove('License-Number')
        LicenseString.classList.add('red-box')
 
       }
       return false
    }
       
    //Checks if the string only contains a digits
    for(i = 0 ; i < license.length; i++){
 
       let char_val = license.charCodeAt(i)
 
       //Checks that each character in the string is a number
       if(!(char_val >= 48 && char_val <= 57)){
          console.log('License Number Check Failed: License number must only contain digits')
          
          //Displays errors message on the page
          message.innerHTML = "License Number Check Failed: License number must only contain digits"
          message.classList.add('red-text')
          
          //Changes the color of the input boxes when an error is detected
          if(LicenseString.classList.contains('License-Number')){
             
            LicenseString.classList.remove('License-Number')
            LicenseString.classList.add('red-box')
 
          }
          return false
       }
    }
 
    //Splits the national id section of license string into its respective fields for validation 
    let licenseArray = []
    for(i = 7 ; i < license.length; i++){
 
       //Stores the individual characters of the license string 
       licenseArray.push(String.fromCharCode(license.charCodeAt(i)))
 
       //Separates the yyyy,mm,dd,xxxx fields by a space in License array
       if(i == 10 ){licenseArray.push(' ');}
 
       if(i == 12 ){licenseArray.push(' ');}
    }
 
    //Stores the fields in an array
    let nationalIdFields = licenseArray.join('').split(' ')
 
    //Checks that the year field of the id lies between 1952 and 2002
    if(!(parseInt(nationalIdFields[0]) >= 1952 && parseInt(nationalIdFields[0]) <= 2006)){
       console.log('License checks failed: Year must between 1952 and 2006');
        
          //Displays errors message on the page
          message.innerHTML = "License Number Check Failed: Year must between 1952 and 2006"
          message.classList.add('red-text')
          
          //Changes the color of the input boxes when an error is detected
          if(LicenseString.classList.contains('License-Number')){
             
            LicenseString.classList.remove('License-Number')
            LicenseString.classList.add('red-box')
 
          }
       return false
   }
 
   //Checks that the month field of the id lies between 1 and 12
   if(!(parseInt(nationalIdFields[1]) >= 1 && parseInt(nationalIdFields[1]) <= 12)){
       console.log('License checks failed: Month must between 01 and 12');
 
       //Displays errors message on the page
       message.innerHTML = "License Number Check Failed: Month must between 01 and 12"
       message.classList.add('red-text')
       
       //Changes the color of the input boxes when an error is detected
       if(LicenseString.classList.contains('License-Number')){
          
        LicenseString.classList.remove('License-Number')
        LicenseString.classList.add('red-box')
 
       }
 
       return false
   }
 
   //Checks that the day field of the id lies between 1 and 31
   if(!(parseInt(nationalIdFields[2]) >= 1 && parseInt(nationalIdFields[2]) <= 31)){
       console.log('License checks failed: Day must between 01 and 31');
       
       //Displays errors message on the page
       message.innerHTML = "License Number Check Failed: Day must between 01 and 31"
       message.classList.add('red-text')
       
       //Changes the color of the input boxes when an error is detected
       if(LicenseString.classList.contains('License-Number')){
          
        LicenseString.classList.remove('License-Number')
        LicenseString.classList.add('red-box')
 
       }
 
       return false
   }
 
   console.log('License number is valid')
 
   //Removes error message when error is rectified
   if(message.classList.contains('red-text')){
       message.innerHTML = ""
       message.classList.remove('red-text')
   }
 
   //Changes text box colour back to the default color when the error is rectified
   if(LicenseString.classList.contains('red-box')){
        LicenseString.classList.remove('red-box')
        LicenseString.classList.add('License-Number')
   }
    return true
} 

//Generates License number
function generateLicense(){
    
    //If the national id is not then dont start generations
    // if(idString.value.length != ID_LENGTH){
    //     console.log('License No.: (Auto-Genarated)')
    //     return "License No.: (Auto-Genarated)"
    // }
    
    if(!checkId(idString.value)){
        console.log('License No.: (Auto-Genarated)')
        return "License No.: (Auto-Genarated)"
    }

    //Stores characters for the random part of the license number
    let char_array = []

    //Randomly generate 7 digits
    for(i = 0; i < LICENSE_RANDOM_LENGTH; i++){
    
        //Generates numbers from their ASCII codes and stores them in a character array
        char_array.push(String.fromCharCode(Math.floor((Math.random() * 9) + 48 )))
    }

    //Stores characters for the id date part of the license number
    let idChar_array = []

    for(i = 0; i < idString.value.length - 4; i++){
        
        //Stores all the character except the hyphens
        if(idString.value.charCodeAt(i) == 45){
            continue;
        }

        idChar_array.push(String.fromCharCode(idString.value.charCodeAt(i)))
    }

    for(i = 0; i < idChar_array.length; i++ ){

        char_array.push(idChar_array[i])
    }

    let LicenseStringVal = char_array.join('')
    console.log(LicenseString)

    //PLaces the generated  license number in the text box
    LicenseString.value = LicenseStringVal
}

//Validates the id input of the form
function checkId(id)
{
    this.id = id

    //If the id text box is empty
    if(this.id == ''){
        console.log('National ID box is empty.')

        //Displays error message on the page
        message.innerHTML = "Error: information missing"
        message.classList.add('red-text')
        
        //Changes the border color of the text box to red
    
        idString.classList.remove('national-id')
        idString.classList.add('red-box')
    
        return false
    }

    //checks if the id is the right length
    if(this.id.length != 15)
    {
        console.log('ID check failed: ID must be 12 characters in length.')

        //Displays error message on the page
        message.innerHTML = "ID check failed: ID must be 12 characters in length."
        message.classList.add('red-text')
        console.log(this.id)

        //Changes the border color of the text box to red
 
        idString.classList.remove('national-id')
        idString.classList.add('red-box')

        return false
    } 
    
    //Iterates over each character in the string to to check if their are valid characters(only numbers and dashes)
    //As well as if the id string is in the correct format (yyyy-mm-dd-xxxx)

    for(i = 0; i < this.id.length; i++){

        //Stored the ascii code of the curent charater in the string
        char_val = this.id.charCodeAt(i);

        if(i == 4 && !(char_val == 45)){
            console.log('ID check failed: Incorrect format.')

            //Displays error message on the page
            message.innerHTML = "ID check failed: Must be in the format (yyyy-mm-dd-xxxx)"
            message.classList.add('red-text')

            //Changes the border color of the text box to red
            idString.classList.remove('national-id')
            idString.classList.add('red-box')

            return false
        }
        if(i == 7 && !(char_val == 45)){
            console.log('ID check failed: Incorrect format.')

            //Displays error message on the page
            message.innerHTML = "ID check failed: Must be in the format (yyyy-mm-dd-xxxx)"
            message.classList.add('red-text')

            //Changes the border color of the text box to red
            idString.classList.remove('national-id')
            idString.classList.add('red-box')

            return false
        }
        if(i == 10 && !(char_val == 45)){
            console.log('ID check failed: Incorrect format.')

            //Displays error message on the page
            message.innerHTML = "ID check failed: Must be in the format (yyyy-mm-dd-xxxx)"
            message.classList.add('red-text')

            //Changes the border color of the text box to red
            idString.classList.remove('national-id')
            idString.classList.add('red-box')

            return false
        }

        //Checks that only numbers and dashes are in the string.
        if(!(((char_val >= 48 && char_val <= 57)) || (char_val == 45))){
            
            console.log('ID check failed: ID contains illegal characters.')

            //Displays error message on the page
            message.innerHTML = "ID check failed: ID contains illegal characters."
            message.classList.add('red-text')

            //Changes the border color of the text box to red
            idString.classList.remove('national-id')
            idString.classList.add('red-box')

            return false
        }
    }

    //Splits the id string into the yyyy,mm,dd,xxxx
    let idFields  = this.id.split('-');

    //Checks that the year field of the id lies between 1952 and 2002
    if(!(parseInt(idFields[0]) >= 1952 && parseInt(idFields[0]) <= 2006)){
        console.log('ID checks failed: Year must between 1952 and 2006');

        //Displays error message on the page
        message.innerHTML = "ID checks failed: Year must between 1952 and 2006"
        message.classList.add('red-text')

        //Changes the border color of the text box to red
        idString.classList.remove('national-id')
        idString.classList.add('red-box')

        return false
    }

    //Checks that the month field of the id lies between 1 and 12
    if(!(parseInt(idFields[1]) >= 1 && parseInt(idFields[1]) <= 12)){
        console.log('ID checks failed: Month must between 01 and 12');

        //Displays error message on the page
        message.innerHTML = "ID checks failed: Month must between 01 and 12"
        message.classList.add('red-text')

        //Changes the border color of the text box to red
        idString.classList.remove('national-id')
        idString.classList.add('red-box')

        return false
    }

    //Checks that the day field of the id lies between 1 and 31
    if(!(parseInt(idFields[2]) >= 1 && parseInt(idFields[2]) <= 31)){
        console.log('ID checks failed: Day must between 01 and 31');

        //Displays error message on the page
        message.innerHTML = "ID checks failed: Day must between 01 and 31"
        message.classList.add('red-text')

        //Changes the border color of the text box to red
        idString.classList.remove('national-id')
        idString.classList.add('red-box')

        return false
    }

    //Checks that the random number field of the id lies between 1 and 9999
    if(!(parseInt(idFields[3]) >= 1 && parseInt(idFields[3]) <= 9999)){
        console.log('ID checks failed: Last must be between 0001 and 9999');

        //Displays error message on the page
        message.innerHTML = "ID checks failed: Last 4 digits must be between 0001 and 9999"
        message.classList.add('red-text')

        //Changes the border color of the text box to red
        idString.classList.remove('national-id')
        idString.classList.add('red-box')

        return false
    }
    
    //Removes errors message styling
    if(message.classList.contains('red-text')){

        message.innerHTML = "All fields Required"
        message.classList.remove('red-text')
    }

    //Changes the border color of the text box to black

        idString.classList.remove('red-box')
        idString.classList.add('national-id')

    return true

}

//Validates First name and Last Name inputs
function checkName(name,type){
    this.name = name

    //checks if the string is empty
    if(this.name == ''){
        console.log('Name check failed : Name is empty.')

        //Displays error message on the page
        message.innerHTML = "Error: information missing."
        message.classList.add('red-text')

        //Changes the border color of the text box to red
        firstNameString.classList.remove('first-name')
        firstNameString.classList.add('red-box')

        return false
    }

    //Checks if type is valid
    if((!type == "first")&&(!type == "last")){

        console.log('Name check failed :'+ type + ' is invaid.')

        //Displays error message on the page
        message.innerHTML = "Name check failed :"+ type + " is invaid."
        message.classList.add('red-text')

        //Changes the border color of the text box to red
        firstNameString.classList.remove('first-name')
        firstNameString.classList.add('red-box')

        return false
    }

    //Iterates over each character in the string to to check if their are valid characters(only letters of the alphabet)

    if(type == "first")
    {
        for(i = 0; i < this.name.length;i++){

            //Stores the ascii code of the current charater in the string
            let char_val = this.name.charCodeAt(i);

            if(!(char_val >= 65 && char_val <= 90) && !(char_val >= 97 && char_val <= 122)){
                console.log('Name check failed: First name incorrect format')
                
                //Displays error message on the page
                message.innerHTML = "First Name check failed: First name must be characters only"
                message.classList.add('red-text')

                //Changes the border color of the text box to red
                firstNameString.classList.remove('first-name')
                firstNameString.classList.add('red-box')

                return false
            }

        }
        
        //Removes errors message styling
        if(message.classList.contains('red-text')){

            message.innerHTML = "All fields Required"
            message.classList.remove('red-text')
        }
        if(firstNameString.classList.contains('red-box')){


            firstNameString.classList.remove('red-box')
            firstNameString.classList.add('first-name')
        }

        return true
    }
    else{
        for(i = 0; i < this.name.length;i++){
            //Stored the ascii code of the current charater in the string
            char_val = this.name.charCodeAt(i);

            //Returns false if an invalid character is decteced
            if(!(((char_val >= 65 && char_val <= 90)) || ((char_val >= 97 && char_val <= 122)) || (char_val == 45))){

                console.log('Name check failed: Second name is incorrect format')

                 //Displays error message on the page
                 message.innerHTML = "Second Name check failed: invalid character decteced"
                 message.classList.add('red-text')

                 //Changes the border color of the text box to red
                 lastNameString.classList.remove('last-name')
                 lastNameString.classList.add('red-box')
                
                return false
            }
        }

       //Removes errors message styling
       if(message.classList.contains('red-text')){

            message.innerHTML = "All fields Required"
            message.classList.remove('red-text')
        }

        if(lastNameString.classList.contains('red-box')){


            lastNameString.classList.remove('red-box')
            lastNameString.classList.add('last-name')
        }

        return true
    }

    
}

//Validates telephone number input
function checkTelNum(prefix, line_number){

    this.prefix = prefix
    let lineNumber = line_number
    
    //Checks if both boxes are empty
    if(prefix == '' && lineNumber == ''){
        return true
    }
    //Checks if one box is empty and not the other
    if((!prefix == '' && lineNumber == '') || (prefix == '' && !lineNumber == '')){
        
       //Displays error message on the page
       message.innerHTML = "Error: Telphone number information missing"
       message.classList.add('red-text')

       //Changes the border color of the text box to red
       if(prefixString.classList.contains('prefix')){
           
        prefixString.classList.remove('prefix')
        prefixString.classList.add('red-box')

       }
       //Changes the border color of the text box to red
       if(lineNumberString.classList.contains('lineNumber')){

            lineNumberString.classList.remove('lineNumber')
            lineNumberString.classList.add('red-box')
       }

       return false
    }

    //Checks if the prefix is the correct length
    if(!(prefix.length == 3)){

        //Displays error message on the page
        message.innerHTML = "Error: Telephone number prefix must be 3 numbers in length"
        message.classList.add('red-text')

        //Changes the border color of the text box to red
        if(prefixString.classList.contains('prefix')){
           
            prefixString.classList.remove('prefix')
            prefixString.classList.add('red-box')
       }
       return false
    }

    //Checks if the  line number is the correct length
    if(!(lineNumber.length == 4)){

        //Displays error message on the page
        message.innerHTML = "Error: Telephone line number must be 4 numbers in length"
        message.classList.add('red-text')

        //Changes the border color of the text box to red
        if(lineNumberString.classList.contains('lineNumber')){

        lineNumberString.classList.remove('lineNumber')
        lineNumberString.classList.add('red-box')
        }

        return false
    }

    //Checks that the input only contains numbers
    for( i = 0; i < prefix.length; i++){

        let char_val = prefix.charCodeAt(i);
        
        //Checks if the first digit is a 1 or 0
        if(i == 0 && (char_val == 48 || char_val == 49)){
            //Displays error message on the page
            message.innerHTML = "Error: Prefix invalid character"
            message.classList.add('red-text')

            //Changes the border color of the text box to red
            if(prefixString.classList.contains('prefix')){
                
                prefixString.classList.remove('prefix')
                prefixString.classList.add('red-box')

            }
            return false
        }

        if(!(char_val >= 48 && char_val <= 57))
        {
            //Displays error message on the page
            message.innerHTML = "Error: Prefix invalid character"
            message.classList.add('red-text')

            //Changes the border color of the text box to red
            if(prefixString.classList.contains('prefix')){
                
                prefixString.classList.remove('prefix')
                prefixString.classList.add('red-box')

            }
            return false
        }
    }

    //Checks that the input only contains numbers
    for( i = 0; i < lineNumber.length; i++){

        let char_val = lineNumber.charCodeAt(i);

        if(!(char_val >= 48 && char_val <= 57))
        {
            //Displays error message on the page
            message.innerHTML = "Error: Line number invalid character"
            message.classList.add('red-text')

            //Changes the border color of the text box to red
            if(lineNumberString.classList.contains('lineNumber')){

                lineNumberString.classList.remove('lineNumber')
                lineNumberString.classList.add('red-box')
            }
            return false
        }
    }

    return true
}

//Validates the address section of the form
function checkAddress(addr){
    address = addr.value

    //checks if the string is empty
    if(this.address == ''){
        console.log('Address check failed : Address is empty.')

        //Displays error message on the page
        message.innerHTML = "Error: information missing"
        message.classList.add('red-text')

        //Changes the border color of the text box to red
        if(addr.classList.contains('address-style')){
            
            addr.classList.remove('address-style')
            addr.classList.add('red-box')
        }
        return false
    }

    for(i = 0; i < address.length; i++){

        //Stored the ascii code of the curent charater in the string
        let char_val = address.charCodeAt(i);

        //Checks that only alphanumeric characters and spaces are in the string.
        if(!((char_val >= 48 && char_val <= 57) || (char_val == 32) || (char_val >= 65 && char_val <= 90) || (char_val >= 97 && char_val <= 122))){
            
            console.log('Address check failed: Addresses must be only alphanumeric characters and spaces')

            //Displays error message on the page
            message.innerHTML = "Address check failed: Addresses must be only alphanumeric characters and spaces"
            message.classList.add('red-text')

            //Changes the border color of the text box to red
            if(addr.classList.contains('address-style')){
                
                addr.classList.remove('address-style')
                addr.classList.add('red-box')
            }
            return false
        }
    }

    //Removes errors message styling
    if(message.classList.contains('red-text')){

        message.innerHTML = "All fields Required"
        message.classList.remove('red-text')
    }

    if(addr.classList.contains('red-box')){

        addr.classList.add('address-style')
        addr.classList.remove('red-box')
    }

    return true
}

//Adds the parishes drop down box to the html DOM 
function loadParishes(){

    /*Stores the parish strings in the parishes array, then stores the array in local storage
    if it does not already exist in local storage.Then generates the dropdown box containing the parishes */

    if(!localStorage.getItem("parishes")){

        //Stores the string for the options to be showen in the drop down box
        let parishes = ["St.Lucy","St.Peter","St.Andrew","St.James","St.Thomas",
        "St.Joseph","St.George","St.Michael","St.John","Christ Church","St.Philip"]

        localStorage.setItem("parishes",JSON.stringify(parishes))

        //Variables used to dynamically add the parishes drop box
        let newDropDownBox = document.createElement("select")
        let newOption
        let newOptionText
        let parishesSection = document.querySelector('form')

        for(i = 0 ; i < parishes.length;i++){

            //Creates an option html element to add to the select html element
            newOption = document.createElement("option")

            //Sets the text of the option element 
            newOptionText = document.createTextNode(parishes[i])
            newOption.appendChild(newOptionText)

            //Adds the option element to the select element and then styles select element using the parishes classes 
            newDropDownBox.appendChild(newOption)
            newDropDownBox.classList.add('parishes')

            //Add the select HTML element to the form
            parishesSection.appendChild(newDropDownBox)
        }

        return true
    }
    
    //Retrives the parish strings from the parishes array in local storage and then uses them to generate the dropdown box
    let parishStrings = JSON.parse(localStorage.getItem("parishes"));

    //Variables used to dynamically add the parishes drop box
    let newDropDownBox = document.createElement("select")
    let newOption
    let newOptionText
    let parishesSection = document.querySelector('form')

    for(i = 0 ; i < parishStrings.length;i++){

        //Creates an option html element to add to the select html element
        newOption = document.createElement("option")

        //Sets the text of the option element 
        newOptionText = document.createTextNode(parishStrings[i])
        newOption.appendChild(newOptionText)

        //Adds the option element to the select element and then styles select element using the parishes classes 
        newDropDownBox.appendChild(newOption)
        newDropDownBox.classList.add('parishes')

        //Add the select HTML element to the form
        parishesSection.appendChild(newDropDownBox)
    }
    
    return true
   
}

//Generates a password and updates localStorage with the new record that includes the password
function newDriver(driver){

    this.driver = driver
    this.driver.nationalId = idString.value;
    this.driver.licenseNo = LicenseString.value;
    this.driver.firstName = firstNameString.value;
    this.driver.lastName = lastNameString.value;
    this.driver.address1 = firstAddressString.value;
    this.driver.address2 = secondAddressString.value;
    this.driver.parish = document.querySelector('select').options[document.querySelector('select').selectedIndex].value;

    //Password Generation
    //Randomly generates the length of the password
    let length = Math.floor((Math.random()*8) + 10)
    let char_array = [];
    let chars = null;

    //Randomly generates ascii codes that match the criteria for the characters of a password
    for(i = 0; i < length; i++){

        //Genearate a character for the first char of the password
        if(i == 0){

            //Generates ascii codes which match lower and upper case characters
            while(!((chars >= 65 && chars <= 90) || (chars >= 97 && chars <= 122))){
                chars = Math.floor((Math.random()*(57)) + 65)
            }

            //Adds the character which matches the ascii code to the array
            char_array.push(String.fromCharCode(chars))

            continue;
        }

        //Generates ascii codes which match lower and upper case characters and numbers
        do
        {
            chars = Math.floor((Math.random()*(74)) + 48)
           
        }while(!((chars >= 65 && chars <= 90) || (chars >= 97 && chars <= 122) || (chars >= 48 && chars <= 57)))
        
     
        //Adds the character which matches the ascii code to the array
        char_array.push(String.fromCharCode(chars))
    }


    //Checks if the password contains at least one upper case character and at least one number
    let upperCaseCount = 0;
    let numCount = 0;

    for(i = 0; i < char_array.length; i++){

       if(char_array[i].charCodeAt(0) >= 65 && char_array[i].charCodeAt(0) <= 90 ){

            upperCaseCount++
       }
       if(char_array[i].charCodeAt(0) >= 48 && char_array[i].charCodeAt(0) <= 57){

            numCount++
       }
    }

    //If an upper case character is missing from the password one is added to a random position
    let insertionPosition = 0;

    if(upperCaseCount == 0 ){

        //Inserts a capital letter into the character array for the password
        insertionPosition = Math.floor((Math.random()* (char_array.length - 1 )) + 1)
        chars = Math.floor((Math.random()*25) + 65)

        char_array[insertionPosition] = (String.fromCharCode(chars))
    }

    //If a number is missing from the password one is added to a random position

    //Stores the last position a correction to the password was made so further corrections do not breach the password criteria
    let previousPosition = insertionPosition 

    if(numCount == 0 ){
        
        //Generates a random position such that the inserted number is not inserted in the same position as the previous inserted character 
        while(insertionPosition == previousPosition){

            insertionPosition = Math.floor((Math.random()* (char_array.length - 1 )) + 1)
        }

        //Adds character to the cahracter array
        chars = Math.floor((Math.random()*9) + 48)
        char_array[insertionPosition] = (String.fromCharCode(chars))
        
    }
    
    //Concatenates the characters in char_array 
    this.driver.password = char_array.join('');
    
    //Stores new driver information in session Storage temporarily to be used when loading the confirmation page
    if(sessionStorage.getItem('driver')){
        sessionStorage.setItem('driver',JSON.stringify(driver))
    }
    
    //Stores new driver information in session Storage temporarily to be used when loading the confirmation page
    if(!sessionStorage.getItem('driver')){
        sessionStorage.setItem('driver',JSON.stringify(driver))
    }

    //Adds the record to the storage array
    if(localStorage.getItem('driverInfo')){

        let recordData = JSON.parse(localStorage.getItem('driverInfo'))
        recordData.push(driver)
        localStorage.setItem("driverInfo",JSON.stringify(recordData));
    }

    //If they are no records in localstorage, create a new record array containing the driver data and store it in local storage
    if(!localStorage.getItem('driverInfo')){

        let driverArray = [driver]
        localStorage.setItem("driverInfo",JSON.stringify(driverArray));
    }
    //Opens confirmation page
    window.open( '../../php/driver/confirmation.php','_self')

}

//Runs all the validation for the submission of the form
function update()
{
    //Check the form from top to bottom
    if(checkId(idString.value) && checkLicense(LicenseString.value) &&checkName(firstNameString.value,"first") && checkName(lastNameString.value,"last") && checkTelNum(prefixString.value,lineNumberString.value) && checkAddress(firstAddressString) && checkAddress(secondAddressString)){
        
        let driver = {
            "nationalId": "null",
            "licenseNo": "null",
            "firstName": "null",
            "lastName": "null",
            "address1": "null",
            "address2": "null",
            "parish": "null",
            "username": "null",
            "password":"null"
        }
        newDriver(driver)
        console.log('Submission Successful')
        return true;
    }
    return false;
}

//1990-12-13-6789