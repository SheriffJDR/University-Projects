<?php
    //Read parishes from JSON file and returns a dropdown box containing the parishes as a string
    function loadParishes() : string{
        
        //Gets data from file as a JSON string
        $json = file_get_contents("../../Records/parishes.JSON",true);

        //Decodes JSON string and stores the data as string in an array
        $parishes = json_decode($json);
        $dropDownBox ='';
        $fragment ='';
    
        for($i = 0; $i < count($parishes); $i++){
        
            $fragment = '<option>'. $parishes[$i] . '</option>';
            $dropDownBox .= $fragment;
        }
        //Returns the drop down box options as string 
        return $dropDownBox;
    }

loadParishes();

