<template>
       <div>
              <h5>Command</h5> 
              <div class="form-group row"> 
                  <div class="col-md-8">
                        <input v-model="command" class="form-control" type="text" name="command" value="" id="command">  
                  </div>
                  <div class="col-md-4">
                        <input class="btn btn-primary" value="Submit" @click="handleClick()" >
                  </div>     
              </div>
              
               <hr>
                 <div class="form-group">                   
                     <label>   <u>Command</u><br>   </label>
                     <div>
                         {{command}}
                     </div>
                            
                 </div>                     
                 <hr>    
                 <div> 
                     <div class="form-group">                   
                             <label>
                                     <u>Output</u><br>
                                     <div v-if="ValidateOutput"> 
                                         Result = ( {{x}} , {{y}} ) <br>
                                         Direction = {{ dir}}
                                     </div>    
                                     <div v-else-if="x !== '-'">
                                         Wrong Command
                                     </div>                                 
                             </label>  
                      </div> 
                 </div> 
       </div> 
</template>

<script>
    export default {
        data () {
            return {
            command: null,
            x: '-',
            y: '-',
            dir: '-',
            ValidateOutput: false,
            }
        },
         methods: {
            handleClick: function() {
                axios
                .get(`walk/${this.command}`)
                .then(response => {
                    if(response.data.x !== null && response.data.y !== null && response.data.dir !== null  ){
                        this.x = response.data.x
                        this.y = response.data.y
                        this.dir = response.data.dir
                        this.ValidateOutput = true
                    }else{
                        this.ValidateOutput = false
                    }
                  
                })
                .catch(error => {
                    console.log(error)
                    this.errored = true
                })
            }
        },
        mounted () {
            
        }
    }
</script>
