<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminModel\Transation;

class TransactionController extends Controller
{
    
    public function index(Request $request){
     $type ='';
      if($request->type){
           $type = $request->type;
      }
    	$data = Transation::join('users','transation.user_id','=','users.id')->select('transation.*','users.fname','users.lname')->orderBy('id','DESC')->get();
    	return view('admin.transaction',compact('data'),['type'=>$type]);
    }

   public function table(Request $request){
   	 
   	 ## Read value
		$draw = $_POST['draw'];
		$row = $_POST['start'];
		$rowperpage = $_POST['length']; // Rows display per page
		$columnIndex = $_POST['order'][0]['column']; // Column index
		$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
		$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
		$searchValue = $_POST['search']['value']; // Search value

		## Search 
		$searchQuery = " ";
		if($searchValue != ''){
		   $searchQuery = " and (emp_name like '%".$searchValue."%' or 
		        email like '%".$searchValue."%' or 
		        city like'%".$searchValue."%' ) ";
		}

		$totalRecords = Transation::get()->count();
		
    	$qry_data = Transation::join('users','transation.user_id','=','users.id')->select('transation.*','users.fname','users.lname');

       if($searchValue != ''){
         $qry_data = $qry_data->where('users.fname', 'LIKE', '%'.$searchValue.'%')
        ->orWhere('users.lname', 'LIKE', '%'.$searchValue.'%')
        ->orWhere('transation.payment', 'LIKE', '%'.$searchValue.'%')
        ->orWhere('transation.type', 'LIKE', '%'.$searchValue.'%')
        ->orWhere('transation.payment_method', 'LIKE', '%'.$searchValue.'%')
        ->orWhere('transation.status', 'LIKE', '%'.$searchValue.'%')
        ->orWhere('transation.created_at', 'LIKE', '%'.$searchValue.'%')
        ->orWhere('transation.amount', 'LIKE', '%'.$searchValue.'%');     
		   }
       if(isset($_POST['id'])){
        $qry_data = $qry_data->where('transation.user_id',$_POST['id']);
       }
       if(isset($_POST['type'])){
        $qry_data = $qry_data->where('transation.type',$_POST['type']);
       }
    	$qry_data = $qry_data->orderBy('id','DESC')->skip($row)->take($rowperpage);

    	$qry_data = $qry_data->get();
		$totalRecordwithFilter = $qry_data->count();
		$data = array();

        foreach ($qry_data as $key => $val) {
              $data1['order_id'] = $val->order_id;
              $data1['name'] = $val->fname.' '. $val->lname;
              $data1['amount'] =  '$ '.$val->amount;
              $data1['payment'] =  $val->payment;
              $data1['type'] =  $val->type;
              $data1['payment_method'] =  $val->payment_method;
              $data1['status'] =  $val->status;
              $data1['created_at'] = date('Y-m-d h:i A',strtotime($val->created_at));
              $data1['view'] = '<a class="btn btn-primary"  ><i class="fa fa-eye"></i></a>';
            $data[] =$data1;
        }
		
		$response = array(
		  "draw" => intval($draw),
		  "iTotalRecords" => $totalRecordwithFilter,
		  "iTotalDisplayRecords" => $totalRecords,
		  "aaData" => $data
		);

		return Response()->json($response);


   }

}
