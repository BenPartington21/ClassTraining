<style>


    .folder{
        list-style-image: url(images/icons/folder_icon.png)
    }

    
    
    
    .file{
        list-style-image: url(images/icons/icon_arrow.gif)
    }





</style>


<link rel="stylesheet" href="colorbox-master/example1/colorbox.css">







<?php

class Tree{

        function __construct($dir){
    
        //echo 'Create tree menu for ' . $dir;
         $this->listFilesAndFolders($dir);
    }
    
    
    
    private function listFilesAndFolders($dir){
        
        //get all the items in the $dir
        $items = scandir($dir);
        
        echo '<ul>';
        foreach($items as $item){
           
            
            if($item[0] != '.'){
                
                
    //check if file or folder and set $class variable as required
                
    if(is_dir($dir . '/' . $item)){
        $cssClass = 'folder';
    }else{
        $cssClass = 'file';
    }
    
                        
                
            echo '<li class="'.$cssClass.'"><a href="' .$dir . '/' . $item . '">' .
        $item . '</a>';
            //check if $item is a folder
            if(is_dir($dir . '/' . $item)){
                //recursion
    $this->listFilesAndFolders($dir . '/' . $item);
            }
            
                
            
            echo '</li>';
            
            
            }
            
            
            
            
        }
        
        
        echo '</ul>';
        
        
        
    }




}




?>





<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<script src="colorbox-master/jquery.colorbox-min.js"></script>


<script>

$(document).ready(function(){
    
    $('ul ul').hide();
    $('.folder > a').click(function(e){
        e.preventDefault();
        var listToToggle = 
        $(this).parent().find('>ul');
        listToToggle.toggle('fade');
    });
    
    
});



</script>






