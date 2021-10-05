<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Employees</div>
                   
                    <div class="card-body">
                       <Index/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Index from './employees/Index'
    export default {
        
     components:{
         Index
     }
    }
</script>
