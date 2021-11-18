<template>
       <div>
              <h5>Command</h5> 
              <div class="form-group row"> 
                  <div class="col-md-8">
                        <input class="form-control" type="text" name="command" value="" id="command">  
                  </div>
                  <div class="col-md-4">
                        <input class="btn btn-primary" value="Submit">
                  </div>
                           
              
              </div>
              
               <hr>
                 <div class="form-group">                   
                     <label>   <u>Logs</u><br>   </label>
                     <div>
                         <!-- {{$command}} -->
                     </div>
                            
                 </div>                     
                 <hr>    
                 <div> 
                     <div class="form-group">                   
                             <label>
                                     <u>Output</u><br>
                                     <!-- Result = ( {{$x}} , {{$y}} ) <br> -->
                                     <!-- Direction = {{ $dir}} -->
                             </label>  
                      </div> 
                 </div> 
       </div> 
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
