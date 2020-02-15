<template>
    <div class="container">
        <div class="col-md-4">
  
    <table class="table">
        <thead>
            <tr>
                   <th></th>
                   <th>
                           <div class="form-group">
                             <label for="">الاحياء حسب المنطقة</label>
                            <select class="form-control" name="area_id" v-on:change="getTowns($event)">
                                <option v-for="area in areas" :value="area.id" v-text="area.name" :key="area.id">{{area.name}}</option>
                                
                            </select>
                           </div>
                       
                    </th>
            </tr>
        </thead>
    </table>
    </div>


 <div class="row">
       <div class="col-md-8 col-md-offset-1" style="direction: rtl">
          
         <table class="table" id="town">
             <thead>
                 <tr>
                     <th>#</th>
                     <th>أسم الحي</th>
                     <th>ملاحظه</th>
                     <th>التحكم</th>
                 </tr>
             </thead>
             <tbody>
                 
                 <tr v-for="(town , index) in allTowns" :key="town.id">
                     <td>{{index+1}}</td>
                     <td>{{town.name}}</td>
                     <td>{{town.note}}</td>

                     <span v-if="canEdit"><td>
                          <a :href="/towns/+town.id+'/'+'edit'" class="btn btn-info">تعديل</a>
                      </td></span>

                      
                          <span v-if="canDelete">
                              <td>
                              <a :href="/townClear/+town.id" class="btn btn-danger">حذف</a>
                              </td>
                          </span>
                      
                      
                      
                 </tr>
           
             </tbody>
         </table>
      </div>
      </div>

    </div>
</template>

<script>
    export default {
        mounted() {
            this.getAreas()
            this.getPermissions()
            this.getAllTowns()
        },
        data(){
            return {
                areas:[],
                towns:[],
                allTowns:[],
                canEdit:false,
                canDelete:false
            }
        },
       methods: {
           getAreas(){
               axios.get('/api/getAreas').then(
                   response =>{
                       this.areas = response.data
                   }
               )
           },
           getTowns(event){
               let id = event.target.value ? event.target.value : 1;
               if(!isNaN(event.target.value)){
                   let id = event.target.value;
                 axios.get('/api/getTowns/'+id).then(response => {
                       
                           this.allTowns = response.data.data
                      
                   });
               }
           },
           getPermissions(){
               let town = 'towns'
                axios.get('/getPermissions/'+town).then(response => {
                   if(response.data){
                       this.canEdit = response.data.edit;
                       this.canDelete = response.data.delete
                   }
               });
           },
        getAllTowns(){
               axios.get('/api/allTowns').then(response =>{
                   console.log(response.data)
                   this.allTowns = response.data.data
               });
       },
    }}

</script>
