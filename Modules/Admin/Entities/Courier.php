<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Courier extends Model
{
    use HasFactory;

    protected $fillable = ['customer_name','product_detail','product_weight','from_address','delivery_address','shipping_method','status',
    'pickup_note',
    'booked_note',
    'on_his_way_note',
    'at_destination_note',
    'out_of_delivery_note',
    'delivered_note',
    'cancel_note'];
    
    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\CourierFactory::new();
    }
    public function listCourier($request)
    {
        
       
        $search   =   $request->search['value'];
        $type     =   $request->type;
        $sort     =   $request->order;
        $column   =   $sort[0]['column'];
        $order    =   $sort[0]['dir'] == 'desc' ? "ASC" : "DESC" ;
        $admins   =   self::whereNotNull('id');
        if ($search != '') 
        {
            $admins=$admins->where('title', 'LIKE', '%'.$search.'%');
        }
        $total  = $admins->count();
        if ($column == 0) {
            $admins->orderBy('id', $order);
            if ($order == 'DESC') {
                $i = 1;
            }
            else{
                $i = $total;
            }
        } else {
            $i = 1;
        }
        $admins=$admins->take($request->length)->skip($request->start)->orderBy('id','desc')->get();

        foreach ($admins as $admin) {
            $admin->encrypt_id = encrypt($admin->id);
            $admin->recordId = $i;
            if ($order == 'DESC') {
                $i++;
            }
            else{
                $i--;
            }
        }
        $result['data']             =   $admins;
        $result['recordsTotal']     =   $total;
        $result['recordsFiltered']  =   $total;
        return $result;
    }
}
