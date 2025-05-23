//Stores drop down box elements
let hamburgerMenu = document.getElementsByTagName('img')[1];
let dropDownMenu = document.getElementById('dropdown-box')
let logButton = document.getElementById('dropdown-item')

//Event listener

//Shows drop down menu when hamburger icon is clicked
hamburgerMenu.addEventListener('click',function(event){
    showMenu();
})

//Makes the drop down menu invisible if the user clicks on anything other than the menu in the window 
window.addEventListener('click', function(event){

    if(!(event.target.matches('.drop-down-box')) && !event.target.matches('#menu')){
       
        //Removes the visible css class styling from the drop down menu making the menu invisible
        if(dropDownMenu.classList.contains("visible")){
           
            dropDownMenu.classList.remove("visible")
           
        }
    }
})

logButton.addEventListener('click', function(){
    //logOut();
})

function showMenu(){

    //Makes the drop down menu visible by adding the visible css class styling to the drop downbox
    if(dropDownMenu.classList.contains("visible")){

        dropDownMenu.classList.remove("visible")
    }
    else{
        dropDownMenu.classList.add("visible")
    }
   
}

//Handles log out processes
function logOut(){

    console.log("hey")

    if(sessionStorage.getItem("path")){

        let path  = JSON.parse(sessionStorage.getItem("path"))
        
        //Logs out and updates log in status information for the driver
        if(path.path.includes('driver')){

            let driverLogIn = {
                "isLoggedOn" : false
            }
            sessionStorage.setItem("LogInStatus", JSON.stringify(driverLogIn))

            //Deletes the logged in driver's Temporary Info (driverInfo in sessionStorage)
            if(sessionStorage.getItem("driverInfo")){
                sessionStorage.removeItem("driverInfo")
            }
            
            
            //redirects user to driver login page
            window.open("../../php/driver/index.php","_self")
        }

        //Logs out and updates the log in status information for the employee
        if(path.path.includes('admin')){

            let employeeLogIn = {
                "isLoggedOn" : false
            }

            sessionStorage.setItem("EmployeeLogInStatus", JSON.stringify(employeeLogIn))

            //Deletes the logged in employee's Temporary Info (employeeinfo in sessionStorage)
            if(sessionStorage.getItem("employeeinfo")){
                sessionStorage.removeItem("employeeinfo")
            }

            //redirects employee to employee login page
            window.open("../../php/admin/index.php","_self")
        }
    }

   if(!sessionStorage.getItem("path")){

        //Sets both the employee and driver login status to false
        let employeeLogIn = {
            "isLoggedOn" : false
        }
        let driverLogIn = {
            "isLoggedOn" : false
        }

        //Updates the login status in session storage
        sessionStorage.setItem("EmployeeLogInStatus", JSON.stringify(employeeLogIn))
        sessionStorage.setItem("LogInStatus", JSON.stringify(driverLogIn))
   }

}
