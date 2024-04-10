<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Courier;
use Modules\Admin\Http\Requests\CourierPostRequest;
use App\Traits\LogError;
use App\Traits\ImageHelper;

class CourierController extends Controller
{
    use LogError;
    use ImageHelper;

     // LIST PAGE START
     public function list()                                                                                                                                   
     {
         try {
             return view('admin::courier.list');        
         } catch (\Exception $e) {
              $this->logError($e); 
             return view('admin::error.404')->with('error','something went wrong');
         } 
     }
     // LIST PAGE END
 
     // DATATABLE START
     public function courierList(Request $request)                                                                                          
     {
         try {
             $dataList = (new Courier())->listCourier($request);
             echo json_encode($dataList);     
         } catch (\Exception $e) {
              $this->logError($e); 
             return view('admin::error.404')->with('error','something went wrong');
         } 
     }
     // DATATABLE END
     
 
     // ADD PAGE START
     public function courierView()                                                                                                                 
     {
         try {
             return view('admin::courier.add');        
         } catch (\Exception $e) {
              $this->logError($e); 
             return view('admin::error.404')->with('error','Something went wrong');
         } 
     }
     // ADD PAGE END
     
     // STORE FUNCTION START
     public function courierStore(CourierPostRequest $request)                                                       
     {
         try {
             $store = Courier::create([
                 'customer_name' => $request->customer_name,
                 'product_detail' => $request->product_detail,
                 'product_weight' => $request->product_weight,
                 'from_address' => $request->from_address,
                 'delivery_address' => $request->delivery_address,
                 'shipping_method' => $request->shipping_method,
                 'status' => 1,
             ]);
     
             return redirect('admin/courier')->with('status', 'Added Successfully');
         } catch (\Exception $e) {
             $this->logError($e); 
             return view('admin::error.404')->with('error','Error occurred while updating the data.');
         }
     }
     // STORE FUNCTION START
     
 
     //  EDIT PAGE START
     public function courierEditView(Request $request)                                                                     
     {
        try {
             $id =   decrypt($request->id);
             $data=  Courier::where('id',$id)->first();
             return view('admin::courier/edit',compact('data'));        
         } catch (\Exception $e) {
             $this->logError($e); 
             return view('admin::error.404')->with('error','Something went wrong');
         } 
     }
     //  EDIT PAGE END
 
     //  UPADE FUNCTION START
     public function courierUpdate(CourierPostRequest $request)                                                      
     {
         try {
             $dataUpdate = Courier::find($request->id);
             $dataUpdate->customer_name = $request->customer_name ?? NULL;
             $dataUpdate->product_detail = $request->product_detail ?? NULL;
             $dataUpdate->product_weight = $request->product_weight ?? "";
             $dataUpdate->from_address = $request->from_address ?? "";
             $dataUpdate->delivery_address = $request->delivery_address ?? "";
             $dataUpdate->shipping_method = $request->shipping_method ?? "";
             $dataUpdate->save();
     
             return redirect('admin/courier')->with('status', 'Updated Successfully');
         } catch (\Exception $e) {
             $this->logError($e); 
             return view('admin::error.404')->with('error','Error occurred while updating the data.');
         }
     }
     //  UPADE FUNCTION END

      //  EDIT PAGE START
      public function deliveryStatusEditView(Request $request)                                                                     
      {
         try {
              $id =   decrypt($request->id);
              $data=  Courier::where('id',$id)->first();
              return view('admin::courier/delivery-status',compact('data'));        
          } catch (\Exception $e) {
              $this->logError($e); 
              return view('admin::error.404')->with('error','Something went wrong');
          } 
      }
      //  EDIT PAGE END
  
      //  UPADE FUNCTION START
      public function deliveryStatusUpdate(Request $request)                                                      
      {
          try {
              $dataUpdate = Courier::find($request->id);
              $dataUpdate->customer_name = $request->customer_name ?? NULL;
              $dataUpdate->product_detail = $request->product_detail ?? NULL;
              $dataUpdate->product_weight = $request->product_weight ?? "";
              $dataUpdate->from_address = $request->from_address ?? "";
              $dataUpdate->delivery_address = $request->delivery_address ?? "";
              $dataUpdate->shipping_method = $request->shipping_method ?? "";
              $dataUpdate->save();
      
              return redirect('admin/courier')->with('status', 'Updated Successfully');
          } catch (\Exception $e) {
              $this->logError($e); 
              return view('admin::error.404')->with('error','Error occurred while updating the data.');
          }
      }
      //  UPADE FUNCTION END

       //  UPADE FUNCTION START
       public function deliveryStatusPickUpUpdate(Request $request)                                                      
       {
           try {
               $dataUpdate = Courier::find($request->id);
               $dataUpdate->pickup_note = $request->pickup_note ?? NULL;
               $dataUpdate->save();
       
               return redirect('admin/courier/delivery-status/'.encrypt($request->id))->with('status', 'Updated Successfully');
           } catch (\Exception $e) {
               $this->logError($e); 
               return view('admin::error.404')->with('error','Error occurred while updating the data.');
           }
       }
       //  UPADE FUNCTION END

         //  UPADE FUNCTION START
         public function deliveryStatusBookedUpdate(Request $request)                                                      
         {
             try {
                 $dataUpdate = Courier::find($request->id);
                 $dataUpdate->booked_note = $request->booked_note ?? NULL;
                 $dataUpdate->save();
         
                 return redirect('admin/courier/delivery-status/'.encrypt($request->id))->with('status', 'Updated Successfully');
             } catch (\Exception $e) {
                 $this->logError($e); 
                 return view('admin::error.404')->with('error','Error occurred while updating the data.');
             }
         }
         //  UPADE FUNCTION END

            //  UPADE FUNCTION START
            public function deliveryStatusOnHisWayUpdate(Request $request)                                                      
            {
                try {
                    $dataUpdate = Courier::find($request->id);
                    $dataUpdate->on_his_way_note = $request->on_his_way_note ?? NULL;
                    $dataUpdate->save();
            
                    return redirect('admin/courier/delivery-status/'.encrypt($request->id))->with('status', 'Updated Successfully');
                } catch (\Exception $e) {
                    $this->logError($e); 
                    return view('admin::error.404')->with('error','Error occurred while updating the data.');
                }
            }
            //  UPADE FUNCTION END

             //  UPADE FUNCTION START
             public function deliveryStatusAtDestinationUpdate(Request $request)                                                      
             {
                 try {
                     $dataUpdate = Courier::find($request->id);
                     $dataUpdate->at_destination_note = $request->at_destination_note ?? NULL;
                     $dataUpdate->save();
             
                     return redirect('admin/courier/delivery-status/'.encrypt($request->id))->with('status', 'Updated Successfully');
                 } catch (\Exception $e) {
                     $this->logError($e); 
                     return view('admin::error.404')->with('error','Error occurred while updating the data.');
                 }
             }
             //  UPADE FUNCTION END

              //  UPADE FUNCTION START
              public function deliveryStatusOutOfDeliveryUpdate(Request $request)                                                      
              {
                  try {
                      $dataUpdate = Courier::find($request->id);
                      $dataUpdate->out_of_delivery_note = $request->out_of_delivery_note ?? NULL;
                      $dataUpdate->save();
              
                      return redirect('admin/courier/delivery-status/'.encrypt($request->id))->with('status', 'Updated Successfully');
                  } catch (\Exception $e) {
                      $this->logError($e); 
                      return view('admin::error.404')->with('error','Error occurred while updating the data.');
                  }
              }
              //  UPADE FUNCTION END

              //  UPADE FUNCTION START
              public function deliveryStatusDeliveredUpdate(Request $request)                                                      
              {
                  try {
                      $dataUpdate = Courier::find($request->id);
                      $dataUpdate->delivered_note = $request->delivered_note ?? NULL;
                      $dataUpdate->save();
              
                      return redirect('admin/courier/delivery-status/'.encrypt($request->id))->with('status', 'Updated Successfully');
                  } catch (\Exception $e) {
                      $this->logError($e); 
                      return view('admin::error.404')->with('error','Error occurred while updating the data.');
                  }
              }
              //  UPADE FUNCTION END

               //  UPADE FUNCTION START
               public function deliveryStatusCanceledUpdate(Request $request)                                                      
               {
                   try {
                       $dataUpdate = Courier::find($request->id);
                       $dataUpdate->cancel_note = $request->cancel_note ?? NULL;
                       $dataUpdate->save();
               
                       return redirect('admin/courier/delivery-status/'.encrypt($request->id))->with('status', 'Updated Successfully');
                   } catch (\Exception $e) {
                       $this->logError($e); 
                       return view('admin::error.404')->with('error','Error occurred while updating the data.');
                   }
               }
               //  UPADE FUNCTION END











 
     // DELETE FUNCTION START
     public function courierDelete(Request $request)                                                                       
     {
         try {
             $deleteData = Courier::where('id', $request->id)->delete();
             return response()->json(['status' => 'success']);
         } catch (\Exception $e) {
             $this->logError($e); 
             return response()->json(['status' => 'error', 'message' => 'An error occurred while deleting.']);
         }
     }
     // DELETE FUNCTION END
     
 
     // STATUS FUNCTION START 
     public function courierStatusUpdate(Request $request)                                                                   
     {
        
         try {
             $chanageStatus = Courier::where('id', $request->id)
                     ->update([
                         'status' => $request->status,
                     ]);
     
                 return response()->json(['status' => 'success']);
         
         } catch (\Exception $e) {
             $this->logError($e); 
             return response()->json(['status' => 'error', 'message' => 'An error occurred while updating  status.']);
         }
     }
     // STATUS FUNCTION END
}
