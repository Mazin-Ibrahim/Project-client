<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $createTecnical = \App\Permission::create([
            'name' => 'create-tecnical',
            'display_name' => 'أضافة فني جديد',
             'description' => 'أضافة فني جديد'
        ]);

        $editTecnical = \App\Permission::create([
            'name' => 'edit-tecnical',
            'display_name' => 'تعديل فني',
             'description' => 'تعديل فني '
        ]);

        $deleteTecnical = \App\Permission::create([
            'name' => 'delete-tecnical',
            'display_name' => 'حذف فني',
             'description' => 'حذف فني'
        ]);
        
        // ---------------Device------------------
        
        $createDevice = \App\Permission::create([
            'name' => 'create-device',
            'display_name' => 'أضافة جهاز جديد',
             'description' => 'أضافة جهاز جديد'
        ]);

        $editDevice  = \App\Permission::create([
            'name' => 'edit-device',
            'display_name' => 'تعديل جهاز ',
             'description' => 'تعديل جهاز '
        ]);

        $deleteDevice  = \App\Permission::create([
            'name' => 'delete-device',
            'display_name' => 'حذف جهاز',
            'description' => 'حذف جهاز'
        ]);

        // ------------Maintenance-----------
         
        
        $createMaintenance = \App\Permission::create([
            'name' => 'create-maintenance',
            'display_name' => 'أضافة نوع صيانة جديد',
             'description' => 'أضافة نوع صيانة جديد'
        ]);

        $editMaintenance = \App\Permission::create([
            'name' => 'edit-maintenance',
            'display_name' => 'تعديل الصيانة',
             'description' => 'تعديل نوع صيانة '
        ]);

        $deleteMaintenance = \App\Permission::create([
            'name' => 'delete-maintenance',
            'display_name' => 'حذف نوع صيانة',
            'description' => 'حذف نوع صيانة'
        ]);

        // -------------Areas-------------
        $createArea = \App\Permission::create([
            'name' => 'create-area',
            'display_name' => 'أضافة منطقة جديد',
             'description' => 'أضافة  منطقة جديد'
        ]);

        $editArea = \App\Permission::create([
            'name' => 'edit-area',
            'display_name' => 'تعديل  المنطقة',
             'description' => 'تعديل  المنطقة '
        ]);

        $deleteArea = \App\Permission::create([
            'name' => 'delete-area',
            'display_name' => 'حذف  المنطقة',
            'description' => 'حذف  المنطقة'
        ]);

        // ---------------Town--------------

        $createTown = \App\Permission::create([
            'name' => 'create-town',
            'display_name' => 'أضافة حي جديد',
             'description' => 'أضافة حي جديد'
        ]);

        $editTown = \App\Permission::create([
            'name' => 'edit-town',
            'display_name' => 'تعديل الحي',
             'description' => 'تعديل الحي  '
        ]);

        $deleteTown = \App\Permission::create([
            'name' => 'delete-town',
            'display_name' => 'حذف الحي',
            'description' => 'حذف  الحي'
        ]);

        // --------------Client-----------

        $createClient= \App\Permission::create([
            'name' => 'create-client',
            'display_name' => 'أضافة عميل جديد',
             'description' => 'أضافة عميل جديد'
        ]);

        $editClient = \App\Permission::create([
            'name' => 'edit-client',
            'display_name' => 'تعديل العميل',
             'description' => 'تعديل العميل  '
        ]);

        $deleteClient = \App\Permission::create([
            'name' => 'delete-client',
            'display_name' => 'حذف العميل',
            'description' => 'حذف  العميل'
        ]);

        
        //   ------------------clientMain-------------------
        $showClientMain = \App\Permission::create([
            'name' => 'show-clientMain',
            'display_name' => 'عرض صيانة العملاء',
            'description' => ' عرض صيانة العملاء'
        ]);

        $createClientMain = \App\Permission::create([
            'name' => 'create-clientMain',
            'display_name' => ' أضافة صيانة العملاء',
            'description' => ' أضافة صيانة العملاء'
        ]);

        $editClientMain = \App\Permission::create([
            'name' => 'edit-clientMain',
            'display_name' => 'تعديل صيانة العملاء',
            'description' => 'تعديل صيانة العملاء'
        ]);

        $deleteClientMain = \App\Permission::create([
            'name' => 'delete-clientMain',
            'display_name' => 'حذف صيانة العملاء',
            'description' => 'حذف صيانة العملاء'
        ]);

        //  ----------------Notice------------------

        $editNotice = \App\Permission::create([
            'name' => 'edit-notice',
            'display_name' => 'معالجة البلاغ',
            'description' => 'معالجة البلاغ'
        ]);

        $deleteNotice = \App\Permission::create([
            'name' => 'delete-notice',
            'display_name' => 'حذف البلاغ',
            'description' => 'حذف البلاغ'
        ]);

        $showNotice = \App\Permission::create([
            'name' => 'show-notice',
            'display_name' => 'عرض البلاغ',
            'description' => 'عرض البلاغ'
        ]);

        $createNotice = \App\Permission::create([
            'name' => 'create-notice',
            'display_name' => 'أضافة بلاغ',
            'description' => 'أضافة بلاغ'
        ]);

    }
}
