<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminModel\Packages;
use App\AdminModel\Transation;
use App\User;
use Auth;
use Log;

class PaymentController extends Controller
{

    public function index(Request $request){
        $packages =Packages::all();
        return view('payment',compact('packages'));
    }

    public function payment_form(Request $request){
          
      $json = array("result"=>false,'message'=>'Something went wrong');
       


      
      if($request->input('_token')){
         
         $packages = Packages::find($request->package_id);
         $trans_id = Transation::orderBy('id','DESC')->first();
         $save['package_id'] = $request->package_id;  
         $save['amount'] = $request->amount;  
         $save['user_id'] = Auth::user()->id;  
         $save['type'] = 'Wallet';  
         $save['payment_method'] = 'Paypal';  
         
         if($packages){
           $save['discount'] = $packages->bonus;  
         }

         if($trans_id){
           $order_id = ++$trans_id->order_id;             
           $save['order_id'] = $order_id;  
         }else{
           $save['order_id'] = 'PIC-000001';  
         }


        Transation::insert($save);


          
  
         $paypalURL = env("PAYPALURL",'https://www.sandbox.paypal.com/cgi-bin/webscr');
        
         $form = array();
         $form['business'] = env("PAYPALID",'lokesh.laabhaa-buyer@gmail.com');
         $form['cmd'] = '_xclick';
         $form['custom'] = Auth::user()->id.','.$request->package_id;
         $form['item_number'] = $save['order_id'];
         $form['item_name'] = "Package";
         $form['amount'] = $request->amount;
         $form['currency_code'] = 'AUD';
         $form['cancel_return'] = url('payment').'?status=cancel';
         $form['return'] = url('payment')."?status=success";
         $form['notify_url'] = route('payment_response');
         
          // print_r($form);

         return view('payment_form',compact('form'),['paypalURL'=>$paypalURL]);  
  
      }else{
        return Redirect()->back()->with('message','Something went wrong');
      } 

    }


    public function payment_response(Request $request){
      Log::info(json_encode($request->all()));
     if($request->input('payment_status') == 'Completed'){
         
         $save['status'] = $request->payment_status;
         $save['txn_id'] = $request->txn_id;
       
        Transation::where('order_id',$request->item_number)->update($save);
          $custom = explode(',', $request->custom);
          $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");

        $txn = Transation::where('order_id',$request->item_number)->first();


         $user = User::find($txn->user_id);

         $wallet = $user->wallet;

         if($txn->discount){
          $wallet = $wallet + $request->payment_gross + $txn->discount;
         }else{
          $wallet = $wallet + $request->payment_gross;
         } 

         
         $amount['wallet'] = $wallet;

        $up = User::where('id',$txn->user_id)->update($amount);  

     }else{
        $save['status'] = $request->payment_status;
         $save['txn_id'] = $request->txn_id;
       
        Transation::where('order_id',$request->item_number)->update($save);

     }    

    }

    public function payment_history(Request $request){
      $user = Auth::user();
     $start_date = $request->start_date;
     $end_date = $request->end_date;

     if($request->input('_token')){

        $draw = $_POST['draw'];
    $row = $_POST['start'];
    $rowperpage = $_POST['length']; // Rows display per page
    $columnIndex = $_POST['order'][0]['column']; // Column index
    $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
    $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
    $searchValue = $_POST['search']['value']; // Search value
    
    

      $qry_data = Transation::join('users','transation.user_id','=','users.id')->select('transation.*','users.fname','users.lname')->where('user_id',$user->id);
      //  if($searchValue != ''){
      //    $qry_data = $qry_data->where('users.fname', 'LIKE', '%'.$searchValue.'%')
      //   ->orWhere('users.lname', 'LIKE', '%'.$searchValue.'%')
      //   ->orWhere('transation.payment', 'LIKE', '%'.$searchValue.'%')
      //   ->orWhere('transation.type', 'LIKE', '%'.$searchValue.'%')
      //   ->orWhere('transation.payment_method', 'LIKE', '%'.$searchValue.'%')
      //   ->orWhere('transation.status', 'LIKE', '%'.$searchValue.'%')
      //   ->orWhere('transation.created_at', 'LIKE', '%'.$searchValue.'%')
      //   ->orWhere('transation.amount', 'LIKE', '%'.$searchValue.'%');     
      // }
      
      if(isset($_POST['start_date']) && isset($_POST['end_date'])){

     $start_date = $request->start_date;
     $end_date = $request->end_date;
     
      $qry_data = $qry_data->whereBetween('transation.created_at',[$start_date,$end_date]);  
      }

      $qry_data = $qry_data->orderBy('id','DESC')->skip($row)->take($rowperpage);

      $qry_data = $qry_data->get();
    $totalRecordwithFilter = $qry_data->count();
    $totalRecords = $qry_data->count();
    
    $data = array();

        
        foreach ($qry_data as $key => $val) {
              $data1['date'] = date('d-m-Y',strtotime($val->created_at));
              $data1['time'] = date('h:i A',strtotime($val->created_at));
              $data1['money'] =  '$ '.$val->amount;
              $data1['payment'] =  $val->payment;
              $data1['status'] =  $val->status;
              $data1['type'] =  $val->type;
             $data[] =$data1;
        }
    
    $response = array(
      "draw" => intval($draw),
      "iTotalRecords" => $totalRecordwithFilter,
      "iTotalDisplayRecords" => $totalRecords,
      "aaData" => $data
    );

    return Response()->json($response);
        

     }else{
      return view('payment_history',['start_date'=>$start_date,'end_date'=>$end_date]);
     }

    }


}
