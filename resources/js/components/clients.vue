<template>
    
         

       <div>
      <div class="col-md-4">
          <table class="table">
        <thead>
            <tr>
                   <th></th>
                   <th>
                           <div class="form-group">
                             <label for="">العملاء حسب المنطقة</label>
                            <select class="form-control" name="area_id" v-on:change="getClients($event)">
                                <option v-for="area in areas" :value="area.id" v-text="area.name" :key="area.id">{{area.name}}</option>
                                
                            </select>
                           </div>
                       
                    </th>
            </tr>
        </thead>
 </table>
      </div>

       
          
         <table class="table" id="town">
             <thead>
                 <tr>
                     <th>#</th>
                     <th>أسم العميل</th>
                     <!-- <th> كود العميل</th> -->
                     <!-- <th>منطقة السكن</th> -->
                     <th>الحي</th>
                     <!-- <th>العنوان</th> -->
                     <th>نوع الجهاز</th>
                     <!-- <th>فترة الصيانه</th> -->
                     <!-- <th>تاريخ التركيب</th> -->
                     <th>ملاحظه</th>
                     <th>رقم الهاتف</th>
                     <!-- <th>حالة الحساب</th> -->
                     <th class="text-center">التحكم</th>
                 </tr>
             </thead>
             <tbody>
                 
                 <tr v-for="(client , index) in allClients" :key="client.id">
                     <td>{{index+1}}</td>
                     <td>{{client.name}}</td>
                     <!-- <td>{{client.code}}</td> -->
                     <!-- <td>{{client.area.name}}</td> -->
                     <td>{{client.town.name}}</td>
                     <!-- <td>{{client.address}}</td> -->
                     <td>{{client.device.name}}</td>
                     <!-- <td>{{client.days}} يوم</td> -->
                     <!-- <td>{{client.date}}</td> -->
                     <td>{{client.note}}</td>
                     <td>{{client.phone1}}</td>
                     <!-- <td>{{ch(client)}}</td> -->

                     <span v-if="canEdit">
                         <td>
                          <a :href="/clients/+client.id+'/'+'edit'" class="btn btn-info">تعديل</a>
                        </td>
                      </span>

                         <span>
                             <td>
                             <a :href="/clients/+client.id" class="btn btn-info">عرض</a>
                            </td>
                         </span>
                          <span v-if="canDelete">
                              <td>
                              <a :href="/clientClear/+client.id" class="btn btn-danger">حذف</a>
                              </td>
                          </span>
                    
                 </tr>
                 
                 
           
             </tbody>
         </table>
       </div>
      
      
</template>

<script>
    export default {
        mounted() {
            this.getAreas()
            this.getPermissions()
            this.getAllClients()
            
        },
        data(){
            return {
                areas:[],
                clients:[],
                allClients:[],
                canEdit:false,
                canDelete:false,
                show:false,
                showAll:true
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
           getClients(event){
               let id = event.target.value ? event.target.value : 1;
               if(!isNaN(event.target.value)){
                   let id = event.target.value;
                 axios.get('/api/getClients/'+id).then(response => {
                            console.log(response)
                            this.allClients = response.data.data
                            this.show = true
                            this.showAll = false
                           
                           console.log(this.clients)
                      
                   });
               }
           },
           getPermissions(){
               let client = 'clients'
                axios.get('/getPermissions/'+client).then(response => {
                   if(response.data){
                       this.canEdit = response.data.edit;
                       this.canDelete = response.data.delete
                   }
               });
           },
           getAllClients(){
               axios.get('/api/allClients').then(response =>{
                //    console.log(response.data)
                   this.allClients = response.data.data
               });
           },
           ch(client){
               if(client.ch ==1){
                   return "نشط"
               }
               return"معطل";
           }
       },
    }

</script>
