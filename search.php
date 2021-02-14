<input type="text" id= "search" class="form-control" placeholder="Search...">
<div id="result"></div>

<script src="js/jquery.js"></script>
<script>
$(document).ready(function(){
    $('#search').keyup(function (){
        
        var k = $(this).val();


        if(k == ''){
            $('#result').hide();
        }else{
    
            $.ajax({

                url:'find.php',     //action
                type:'GET',         //method    
                data:'letter=' + k ,
            
                success:function(show){
                $('#result').fadeIn();
                $('#result').html(show);
                }
    
        });
        
        }
    
        });
    });
</script>